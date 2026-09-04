<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Mengisi data awal room
        $this->call(RoomSeeder::class);

        // Mengisi unit yang berada di dalam masing-masing room
        $this->call(UnitSeeder::class);
    }
}