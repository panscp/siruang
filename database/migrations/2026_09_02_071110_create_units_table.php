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
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            // Setiap unit harus berada di dalam satu room
            $table->foreignId('room_id')
                ->constrained('rooms')
                ->cascadeOnDelete();

            // Nama unit
            $table->string('name');

            // Keterangan tambahan unit
            $table->text('description')->nullable();

            // Status unit: aktif / tidak aktif
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};