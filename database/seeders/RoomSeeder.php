<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Aula Utama',
            'description' => 'Aula utama untuk kegiatan rapat, seminar, pelatihan, dan kegiatan besar lainnya.',
            'capacity' => 100,
            'image' => null,
            'is_active' => true,
        ]);

        Room::create([
            'name' => 'Ruang Rapat 1',
            'description' => 'Ruang rapat untuk kegiatan koordinasi dan pertemuan internal.',
            'capacity' => 30,
            'image' => null,
            'is_active' => true,
        ]);

        Room::create([
            'name' => 'Ruang Rapat 2',
            'description' => 'Ruang rapat dengan kapasitas lebih kecil untuk pertemuan dan diskusi.',
            'capacity' => 20,
            'image' => null,
            'is_active' => true,
        ]);

        Room::create([
            'name' => 'Ruang Diklat',
            'description' => 'Ruang untuk kegiatan pendidikan, pelatihan, workshop, dan kegiatan sejenis.',
            'capacity' => 40,
            'image' => null,
            'is_active' => true,
        ]);
    }
}