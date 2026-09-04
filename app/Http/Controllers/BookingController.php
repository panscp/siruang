<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Halaman utama proses pengajuan peminjaman.
     */
    public function create()
    {
        $rooms = Room::where('is_active', true)
            ->withCount([
                'units' => function ($query) {
                    $query->where('is_active', true);
                }
            ])
            ->orderBy('id')
            ->get();

        return view('booking.create', compact('rooms'));
    }

    /**
     * Mengecek ketersediaan ruangan berdasarkan
     * tanggal dan waktu yang dipilih.
     */
    public function checkAvailability(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'room_id' => [
                'required',
                'integer',
                'exists:rooms,id',
            ],

            'date' => [
                'required',
                'date',
            ],

            'start_time' => [
                'required',
                'date_format:H:i',
            ],

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],
        ], [
            'room_id.required' =>
                'Ruangan wajib dipilih.',

            'room_id.exists' =>
                'Ruangan yang dipilih tidak ditemukan.',

            'date.required' =>
                'Tanggal wajib dipilih.',

            'date.date' =>
                'Tanggal tidak valid.',

            'start_time.required' =>
                'Jam mulai wajib diisi.',

            'start_time.date_format' =>
                'Format jam mulai tidak valid.',

            'end_time.required' =>
                'Jam selesai wajib diisi.',

            'end_time.date_format' =>
                'Format jam selesai tidak valid.',

            'end_time.after' =>
                'Jam selesai harus lebih besar dari jam mulai.',
        ]);

        $room = Room::where('id', $validated['room_id'])
            ->where('is_active', true)
            ->with([
                'units' => function ($query) {
                    $query
                        ->where('is_active', true)
                        ->with([
                            'bookings' => function ($bookingQuery) {
                                $bookingQuery
                                    ->whereIn(
                                        'status',
                                        [
                                            'menunggu',
                                            'disetujui',
                                        ]
                                    )
                                    ->orderBy('start_date')
                                    ->orderBy('start_time');
                            },
                        ]);
                },
            ])
            ->first();

        if (!$room) {
            return response()->json([
                'available' => false,
                'message' => 'Ruangan tidak tersedia.',
            ], 404);
        }

        $requestedStart = Carbon::parse(
            $validated['date']
            . ' '
            . $validated['start_time']
        );

        $requestedEnd = Carbon::parse(
            $validated['date']
            . ' '
            . $validated['end_time']
        );

        $availableUnits = $room->units->filter(
            function ($unit) use (
                $requestedStart,
                $requestedEnd
            ) {

                foreach ($unit->bookings as $booking) {

                    $bookingStart = Carbon::parse(
                        $booking->start_date->format('Y-m-d')
                        . ' '
                        . $booking->start_time
                    );

                    $bookingEnd = Carbon::parse(
                        $booking->end_date->format('Y-m-d')
                        . ' '
                        . $booking->end_time
                    );

                    $isConflict =
                        $requestedStart->lt($bookingEnd)
                        &&
                        $requestedEnd->gt($bookingStart);

                    if ($isConflict) {
                        return false;
                    }
                }

                return true;
            }
        );

        $availableCount =
            $availableUnits->count();

        if ($availableCount > 0) {

            return response()->json([
                'available' => true,
                'room_id' => $room->id,
                'room_name' => $room->name,
                'available_units' => $availableCount,
                'message' =>
                    'Ruangan tersedia pada tanggal dan waktu yang dipilih.',
            ]);
        }

        return response()->json([
            'available' => false,
            'room_id' => $room->id,
            'room_name' => $room->name,
            'available_units' => 0,
            'message' =>
                'Ruangan tidak tersedia pada tanggal dan waktu yang dipilih.',
        ]);
    }

    /**
     * Menampilkan detail pengajuan milik user yang sedang login.
     */
    public function show(Booking $booking)
    {
        abort_unless(
            $booking->user_id === auth()->id(),
            403
        );

        $booking->load([
            'unit.room',
            'user',
        ]);

        return view(
            'customer.booking.show',
            compact('booking')
        );
    }

    /**
     * Menyimpan pengajuan peminjaman.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'room_id' => [
                'required',
                'integer',
                'exists:rooms,id',
            ],

            'start_date' => [
                'required',
                'date',
            ],

            'start_time' => [
                'required',
                'date_format:H:i',
            ],

            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
            ],

            'end_time' => [
                'required',
                'date_format:H:i',
            ],

            'organization' => [
                'required',
                'string',
                'max:255',
            ],

            'borrower_name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'event_name' => [
                'required',
                'string',
                'max:255',
            ],

            'notes' => [
                'required',
                'string',
            ],
        ], [
            'room_id.required' =>
                'Ruangan wajib dipilih.',

            'room_id.exists' =>
                'Ruangan yang dipilih tidak ditemukan.',

            'start_date.required' =>
                'Tanggal mulai wajib dipilih.',

            'start_time.required' =>
                'Jam mulai wajib dipilih.',

            'end_date.required' =>
                'Tanggal selesai wajib dipilih.',

            'end_time.required' =>
                'Jam selesai wajib diisi.',

            'organization.required' =>
                'Instansi / organisasi wajib diisi.',

            'borrower_name.required' =>
                'Nama peminjam wajib diisi.',

            'phone.required' =>
                'Nomor HP wajib diisi.',

            'event_name.required' =>
                'Nama kegiatan wajib diisi.',

            'notes.required' =>
                'Keperluan peminjaman wajib diisi.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Validasi waktu pada tanggal yang sama
        |--------------------------------------------------------------------------
        */

        if (
            $validated['start_date']
            ===
            $validated['end_date']
            &&
            $validated['end_time']
            <=
            $validated['start_time']
        ) {

            return response()->json([
                'success' => false,
                'message' =>
                    'Jam selesai harus lebih besar dari jam mulai.',
                'errors' => [
                    'end_time' => [
                        'Jam selesai harus lebih besar dari jam mulai.',
                    ],
                ],
            ], 422);
        }

        /*
        |--------------------------------------------------------------------------
        | Transaction
        |--------------------------------------------------------------------------
        */

        return DB::transaction(
            function () use ($validated, $request) {

                $room = Room::where(
                        'id',
                        $validated['room_id']
                    )
                    ->where(
                        'is_active',
                        true
                    )
                    ->with([
                        'units' => function ($query) {
                            $query
                                ->where(
                                    'is_active',
                                    true
                                )
                                ->lockForUpdate();
                        },
                    ])
                    ->lockForUpdate()
                    ->first();

                if (
                    !$room
                    ||
                    $room->units->isEmpty()
                ) {

                    return response()->json([
                        'success' => false,
                        'message' =>
                            'Ruangan tidak memiliki unit aktif yang dapat digunakan.',
                    ], 422);
                }

                $requestedStart =
                    Carbon::parse(
                        $validated['start_date']
                        . ' '
                        . $validated['start_time']
                    );

                $requestedEnd =
                    Carbon::parse(
                        $validated['end_date']
                        . ' '
                        . $validated['end_time']
                    );

                $availableUnit = null;

                foreach (
                    $room->units
                    as $unit
                ) {

                    $hasConflict =
                        Booking::where(
                            'unit_id',
                            $unit->id
                        )
                        ->whereIn(
                            'status',
                            [
                                'menunggu',
                                'disetujui',
                            ]
                        )
                        ->where(
                            function ($query)
                            use ($validated) {

                                $query
                                    ->whereDate(
                                        'start_date',
                                        '<=',
                                        $validated['end_date']
                                    )
                                    ->whereDate(
                                        'end_date',
                                        '>=',
                                        $validated['start_date']
                                    );
                            }
                        )
                        ->get()
                        ->contains(
                            function ($booking)
                            use (
                                $requestedStart,
                                $requestedEnd
                            ) {

                                $bookingStart =
                                    Carbon::parse(
                                        $booking
                                            ->start_date
                                            ->format('Y-m-d')
                                        . ' '
                                        . $booking->start_time
                                    );

                                $bookingEnd =
                                    Carbon::parse(
                                        $booking
                                            ->end_date
                                            ->format('Y-m-d')
                                        . ' '
                                        . $booking->end_time
                                    );

                                return
                                    $requestedStart
                                        ->lt($bookingEnd)
                                    &&
                                    $requestedEnd
                                        ->gt($bookingStart);
                            }
                        );

                    if (!$hasConflict) {

                        $availableUnit =
                            $unit;

                        break;
                    }
                }

                if (!$availableUnit) {

                    return response()->json([
                        'success' => false,
                        'message' =>
                            'Ruangan sudah tidak tersedia pada waktu tersebut. Silakan pilih waktu atau ruangan lain.',
                        'errors' => [
                            'room_id' => [
                                'Ruangan sudah tidak tersedia pada waktu tersebut.',
                            ],
                        ],
                    ], 409);
                }

                do {

                    $bookingCode =
                        'SR-'
                        . now()->format('Ymd')
                        . '-'
                        . strtoupper(
                            Str::random(6)
                        );

                } while (
                    Booking::where(
                        'booking_code',
                        $bookingCode
                    )->exists()
                );

                $booking = Booking::create([
                    'user_id' =>
                        $request->user()->id,

                    'unit_id' =>
                        $availableUnit->id,

                    'booking_code' =>
                        $bookingCode,

                    'organization' =>
                        $validated['organization'],

                    'borrower_name' =>
                        $validated['borrower_name'],

                    'phone' =>
                        $validated['phone'],

                    'event_name' =>
                        $validated['event_name'],

                    'notes' =>
                        $validated['notes'],

                    'start_date' =>
                        $validated['start_date'],

                    'start_time' =>
                        $validated['start_time'],

                    'end_date' =>
                        $validated['end_date'],

                    'end_time' =>
                        $validated['end_time'],

                    'status' =>
                        'menunggu',

                    'admin_note' =>
                        null,
                ]);

                return response()->json([
                    'success' => true,
                    'message' =>
                        'Pengajuan peminjaman berhasil dikirim.',
                    'booking_id' =>
                        $booking->id,
                    'booking_code' =>
                        $booking->booking_code,
                    'redirect_url' =>
                        route(
                            'booking.show',
                            $booking
                        ),
                ], 201);
            }
        );
    }

    /**
     * Membatalkan pengajuan milik user yang sedang login.
     */
    public function cancel(Booking $booking)
    {
        /*
        |--------------------------------------------------------------------------
        | Pastikan booking milik user yang sedang login
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $booking->user_id === auth()->id(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | Hanya pengajuan yang masih menunggu yang dapat dibatalkan
        |--------------------------------------------------------------------------
        */

        if ($booking->status !== 'menunggu') {
            return back()
                ->with(
                    'error',
                    'Pengajuan ini tidak dapat dibatalkan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Ubah status
        |--------------------------------------------------------------------------
        */

        $booking->update([
            'status' => 'dibatalkan',
        ]);

        return redirect()
            ->route('booking.show', $booking)
            ->with(
                'success',
                'Pengajuan berhasil dibatalkan.'
            );
    }
}