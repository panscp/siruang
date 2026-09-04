<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'unit_id',
        'booking_code',
        'organization',
        'borrower_name',
        'phone',
        'event_name',
        'notes',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'status',
        'admin_note',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    /**
     * Pengajuan dimiliki oleh satu user/pemohon.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pengajuan menggunakan satu unit.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}