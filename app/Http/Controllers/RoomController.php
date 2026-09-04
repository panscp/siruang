<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Menampilkan daftar semua room yang aktif.
     */
    public function index()
    {
        $rooms = Room::withCount([
            'units' => function ($query) {
                $query->where('is_active', true);
            }
        ])
            ->where('is_active', true)
            ->orderBy('id')
            ->get();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Menampilkan detail satu room.
     */
    public function show(Room $room)
    {
        // Room yang tidak aktif tidak dapat diakses pengunjung.
        abort_unless($room->is_active, 404);

        // Ambil unit aktif dari room yang sedang dibuka.
        $room->load([
            'units' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('name');
            }
        ]);

        // Ambil room lain yang aktif.
        // Room yang sedang dibuka tidak akan muncul di daftar ini.
        $otherRooms = Room::where('is_active', true)
            ->where('id', '!=', $room->id)
            ->withCount([
                'units' => function ($query) {
                    $query->where('is_active', true);
                }
            ])
            ->orderBy('id')
            ->get();

        return view('rooms.show', [
            'room' => $room,
            'otherRooms' => $otherRooms,
        ]);
    }
}