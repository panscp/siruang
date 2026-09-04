<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{    /**
     * Dashboard pelanggan.
     */
    public function dashboard()
    {
        $user = auth()->user();

        $latestBooking = $user->bookings()
            ->with('unit.room')
            ->latest()
            ->first();

        $totalBookings = $user->bookings()->count();

        $waitingBookings = $user->bookings()
            ->where('status', 'menunggu')
            ->count();

        $approvedBookings = $user->bookings()
            ->where('status', 'disetujui')
            ->count();

        return view(
            'customer.dashboard',
            compact(
                'latestBooking',
                'totalBookings',
                'waitingBookings',
                'approvedBookings'
            )
        );
    }

    /**
     * Riwayat pengajuan pelanggan.
     */
    public function history()
    {
        $bookings = auth()->user()
            ->bookings()
            ->with([
                'unit.room',
            ])
            ->latest()
            ->get();

        return view(
            'customer.history.index',
            compact('bookings')
        );
    }

    /**
     * Menampilkan profil pelanggan.
     */
    public function profile()
    {
        $user = auth()->user();

        $profile = $user->profile;

        return view(
            'customer.profile.index',
            compact('user', 'profile')
        );
    }

    /**
     * Menyimpan perubahan profil pelanggan.
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'organization' => [
                'nullable',
                'string',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],
        ], [
            'name.required' =>
                'Nama wajib diisi.',

            'organization.max' =>
                'Instansi / organisasi maksimal 255 karakter.',

            'phone.max' =>
                'Nomor HP maksimal 30 karakter.',
        ]);

        $user = auth()->user();

        $user->name = $validated['name'];

        $user->save();

        $user->profile()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'organization' =>
                    $validated['organization'] ?? null,

                'phone' =>
                    $validated['phone'] ?? null,
            ]
        );

        return redirect()
            ->route('customer.profile')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}