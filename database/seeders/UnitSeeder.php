<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Aula Utama
         */
        $aulaUtama = Room::where('name', 'Aula Utama')->first();

        if ($aulaUtama) {
            Unit::create([
                'room_id' => $aulaUtama->id,
                'name' => 'Unit A',
                'description' => 'Unit A pada Aula Utama.',
                'is_active' => true,
            ]);

            Unit::create([
                'room_id' => $aulaUtama->id,
                'name' => 'Unit B',
                'description' => 'Unit B pada Aula Utama.',
                'is_active' => true,
            ]);

            Unit::create([
                'room_id' => $aulaUtama->id,
                'name' => 'Unit C',
                'description' => 'Unit C pada Aula Utama.',
                'is_active' => true,
            ]);
        }

        /*
         * Ruang Rapat 1
         */
        $ruangRapat1 = Room::where('name', 'Ruang Rapat 1')->first();

        if ($ruangRapat1) {
            Unit::create([
                'room_id' => $ruangRapat1->id,
                'name' => 'Unit A',
                'description' => 'Unit A pada Ruang Rapat 1.',
                'is_active' => true,
            ]);

            Unit::create([
                'room_id' => $ruangRapat1->id,
                'name' => 'Unit B',
                'description' => 'Unit B pada Ruang Rapat 1.',
                'is_active' => true,
            ]);
        }

        /*
         * Ruang Rapat 2
         */
        $ruangRapat2 = Room::where('name', 'Ruang Rapat 2')->first();

        if ($ruangRapat2) {
            Unit::create([
                'room_id' => $ruangRapat2->id,
                'name' => 'Unit A',
                'description' => 'Unit A pada Ruang Rapat 2.',
                'is_active' => true,
            ]);

            Unit::create([
                'room_id' => $ruangRapat2->id,
                'name' => 'Unit B',
                'description' => 'Unit B pada Ruang Rapat 2.',
                'is_active' => true,
            ]);
        }

        /*
         * Ruang Diklat
         */
        $ruangDiklat = Room::where('name', 'Ruang Diklat')->first();

        if ($ruangDiklat) {
            Unit::create([
                'room_id' => $ruangDiklat->id,
                'name' => 'Unit A',
                'description' => 'Unit A pada Ruang Diklat.',
                'is_active' => true,
            ]);

            Unit::create([
                'room_id' => $ruangDiklat->id,
                'name' => 'Unit B',
                'description' => 'Unit B pada Ruang Diklat.',
                'is_active' => true,
            ]);

            Unit::create([
                'room_id' => $ruangDiklat->id,
                'name' => 'Unit C',
                'description' => 'Unit C pada Ruang Diklat.',
                'is_active' => true,
            ]);
        }
    }
}