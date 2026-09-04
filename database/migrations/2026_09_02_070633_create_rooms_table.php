<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            // Nama ruangan
            $table->string('name');

            // Deskripsi singkat ruangan
            $table->text('description')->nullable();

            // Kapasitas maksimal ruangan
            $table->unsignedInteger('capacity')->nullable();

            // Foto/gambar ruangan
            $table->string('image')->nullable();

            // Status ruangan: aktif / tidak aktif
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};