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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Relasi ke user/pemohon
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Relasi ke unit yang dipinjam
            $table->foreignId('unit_id')
                ->constrained('units')
                ->restrictOnDelete();

            // Nomor pengajuan yang mudah dibaca
            $table->string('booking_code')->unique();

            // Data pemohon
            $table->string('organization');
            $table->string('borrower_name');
            $table->string('phone', 30);

            // Data kegiatan
            $table->string('event_name');
            $table->text('notes')->nullable();

            // Jadwal peminjaman
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');

            // Status pengajuan
            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak',
                'selesai',
                'dibatalkan',
            ])->default('menunggu');

            // Catatan dari admin, terutama untuk alasan penolakan
            $table->text('admin_note')->nullable();

            $table->timestamps();

            // Index untuk mempercepat pencarian berdasarkan unit dan jadwal
            $table->index([
                'unit_id',
                'start_date',
                'end_date',
            ]);

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};