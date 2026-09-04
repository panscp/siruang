@extends('layouts.customer')

@section('content')

<section style="
    padding: 45px 20px 70px;
    background: #f7faf9;
">

    <div class="container">

        <!-- =========================
             HEADER
        ========================== -->

        <div class="page-header">

            <div class="page-eyebrow">
                SIRUANG
            </div>

            <h1>
                Detail Pengajuan
            </h1>

            <p>
                Berikut informasi lengkap mengenai pengajuan peminjaman ruangan Anda.
            </p>

        </div>


        <!-- =========================
             SUCCESS MESSAGE
        ========================== -->

        @if (session('success'))

            <div class="success-message">
                <strong>
                    {{ session('success') }}
                </strong>
            </div>

        @endif


        <!-- =========================
             ERROR MESSAGE
        ========================== -->

        @if (session('error'))

            <div class="error-message">
                <strong>
                    {{ session('error') }}
                </strong>
            </div>

        @endif


        <!-- =========================
             STATUS CARD
        ========================== -->

        @php

            $statusLabels = [
                'menunggu' => 'Menunggu',
                'disetujui' => 'Disetujui',
                'ditolak' => 'Ditolak',
                'selesai' => 'Selesai',
                'dibatalkan' => 'Dibatalkan',
            ];

            $statusClasses = [
                'menunggu' => 'status-waiting',
                'disetujui' => 'status-approved',
                'ditolak' => 'status-rejected',
                'selesai' => 'status-completed',
                'dibatalkan' => 'status-cancelled',
            ];

            $statusDescriptions = [
                'menunggu' =>
                    'Pengajuan Anda sudah diterima dan sedang diperiksa oleh admin.',

                'disetujui' =>
                    'Pengajuan Anda telah disetujui dan ruangan dapat digunakan sesuai jadwal.',

                'ditolak' =>
                    'Pengajuan Anda belum dapat disetujui. Silakan perhatikan catatan admin jika tersedia.',

                'selesai' =>
                    'Peminjaman telah selesai sesuai jadwal yang diajukan.',

                'dibatalkan' =>
                    'Pengajuan ini telah dibatalkan dan tidak lagi digunakan untuk peminjaman.',
            ];

            $currentStatusLabel =
                $statusLabels[$booking->status]
                ?? ucfirst($booking->status);

            $currentStatusClass =
                $statusClasses[$booking->status]
                ?? 'status-waiting';

            $currentStatusDescription =
                $statusDescriptions[$booking->status]
                ?? 'Informasi status pengajuan belum tersedia.';

        @endphp


        <div class="status-card">

            <div class="status-content">

                <div class="status-label">
                    Status Pengajuan
                </div>


                <div class="status-row">

                    <span class="
                        status-badge
                        {{ $currentStatusClass }}
                    ">
                        {{ $currentStatusLabel }}
                    </span>

                </div>


                <div class="status-description">
                    {{ $currentStatusDescription }}
                </div>

            </div>


            <div class="booking-code">

                <div class="booking-code-label">
                    Kode Pengajuan
                </div>

                <strong>
                    {{ $booking->booking_code }}
                </strong>

            </div>

        </div>


        <!-- =========================
             MAIN GRID
        ========================== -->

        <div class="detail-grid">


            <!-- =========================
                 DATA PEMINJAMAN
            ========================== -->

            <div class="detail-card">

                <div class="detail-card-title">
                    Data Peminjaman
                </div>


                <div class="detail-list">

                    <div class="detail-row">

                        <span>
                            Ruangan
                        </span>

                        <strong>
                            {{ $booking->unit->room->name }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Tanggal
                        </span>

                        <strong>

                            {{ $booking->start_date->translatedFormat('l, d F Y') }}

                            @if (
                                $booking->start_date->format('Y-m-d')
                                !==
                                $booking->end_date->format('Y-m-d')
                            )

                                <br>

                                s/d

                                <br>

                                {{ $booking->end_date->translatedFormat('l, d F Y') }}

                            @endif

                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Waktu
                        </span>

                        <strong>
                            {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Unit
                        </span>

                        <strong>
                            {{ $booking->unit->name }}
                        </strong>

                    </div>

                </div>

            </div>


            <!-- =========================
                 DATA PEMINJAM
            ========================== -->

            <div class="detail-card">

                <div class="detail-card-title">
                    Data Peminjam
                </div>


                <div class="detail-list">

                    <div class="detail-row">

                        <span>
                            Nama
                        </span>

                        <strong>
                            {{ $booking->borrower_name }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Email
                        </span>

                        <strong>
                            {{ $booking->user->email }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Instansi / Organisasi
                        </span>

                        <strong>
                            {{ $booking->organization }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Nomor HP
                        </span>

                        <strong>
                            {{ $booking->phone }}
                        </strong>

                    </div>

                </div>

            </div>


        </div>


        <!-- =========================
             KEGIATAN
        ========================== -->

        <div class="detail-card full-card">

            <div class="detail-card-title">
                Data Kegiatan
            </div>


            <div class="activity-item">

                <div class="activity-label">
                    Nama Kegiatan
                </div>

                <div class="activity-value">
                    {{ $booking->event_name }}
                </div>

            </div>


            <div class="activity-item">

                <div class="activity-label">
                    Keperluan Peminjaman
                </div>

                <div class="activity-value">
                    {{ $booking->notes }}
                </div>

            </div>

        </div>


        <!-- =========================
             ADMIN NOTE
        ========================== -->

        @if ($booking->admin_note)

            <div class="detail-card full-card">

                <div class="detail-card-title">
                    Catatan Admin
                </div>

                <div class="admin-note">
                    {{ $booking->admin_note }}
                </div>

            </div>

        @endif


        <!-- =========================
             FOOTER ACTION
        ========================== -->

        <div class="detail-actions">

            <a
                href="{{ route('customer.dashboard') }}"
                class="btn btn-outline"
            >
                Kembali ke Beranda
            </a>


            <a
                href="{{ route('customer.history') }}"
                class="btn btn-primary"
            >
                Lihat Riwayat
            </a>


            @if ($booking->status === 'menunggu')

                <form
                    method="POST"
                    action="{{ route('booking.cancel', $booking) }}"
                    onsubmit="return confirm('Batalkan pengajuan peminjaman ini?');"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        Batalkan Pengajuan
                    </button>

                </form>

            @endif

        </div>

    </div>

</section>


@push('styles')

<style>

    /* =========================
       PAGE HEADER
    ========================== */

    .page-header {
        margin-bottom: 30px;
    }


    .page-eyebrow {
        margin-bottom: 7px;

        color: #008f6b;

        font-size: 13px;

        font-weight: 800;

        text-transform: uppercase;
    }


    .page-header h1 {
        margin: 0 0 8px;

        color: #0a1428;

        font-size: 34px;

        line-height: 1.2;
    }


    .page-header p {
        margin: 0;

        color: #687388;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================
       MESSAGE
    ========================== */

    .success-message,
    .error-message {
        margin-bottom: 22px;

        padding: 14px 16px;

        border-radius: 12px;

        font-size: 13px;

        line-height: 1.6;
    }


    .success-message {
        border: 1px solid #d6eee5;

        background: #eef8f4;

        color: #006e53;
    }


    .error-message {
        border: 1px solid #f1cccc;

        background: #fff1f1;

        color: #a33a3a;
    }


    /* =========================
       STATUS
    ========================== */

    .status-card {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 25px;

        margin-bottom: 22px;

        padding: 23px 25px;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        background: #ffffff;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }


    .status-content {
        min-width: 0;
    }


    .status-label {
        margin-bottom: 8px;

        color: #788397;

        font-size: 12px;
    }


    .status-row {
        display: flex;

        align-items: center;
    }


    .status-badge {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 7px 12px;

        border-radius: 999px;

        font-size: 12px;

        font-weight: 800;

        white-space: nowrap;
    }


    .status-waiting {
        background: #fff6df;

        color: #9b6b00;
    }


    .status-approved {
        background: #eef8f4;

        color: #007754;
    }


    .status-rejected {
        background: #fff1f1;

        color: #a33a3a;
    }


    .status-completed {
        background: #eef2f7;

        color: #536076;
    }


    .status-cancelled {
        background: #f2f3f4;

        color: #687388;
    }


    .status-description {
        max-width: 680px;

        margin-top: 9px;

        color: #687388;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =========================
       BOOKING CODE
    ========================== */

    .booking-code {
        flex-shrink: 0;

        text-align: right;
    }


    .booking-code-label {
        margin-bottom: 4px;

        color: #788397;

        font-size: 12px;
    }


    .booking-code strong {
        color: #101a2e;

        font-size: 15px;
    }


    /* =========================
       GRID
    ========================== */

    .detail-grid {
        display: grid;

        grid-template-columns:
            1fr
            1fr;

        gap: 22px;

        margin-bottom: 22px;
    }


    /* =========================
       CARD
    ========================== */

    .detail-card {
        padding: 25px;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        background: #ffffff;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }


    .full-card {
        margin-bottom: 22px;
    }


    .detail-card-title {
        margin-bottom: 18px;

        padding-bottom: 10px;

        border-bottom: 1px solid #edf1ef;

        color: #008f6b;

        font-size: 12px;

        font-weight: 800;

        text-transform: uppercase;
    }


    /* =========================
       DETAIL LIST
    ========================== */

    .detail-list {
        display: grid;

        gap: 3px;
    }


    .detail-row {
        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 20px;

        padding: 9px 0;
    }


    .detail-row span {
        color: #788397;

        font-size: 13px;
    }


    .detail-row strong {
        max-width: 60%;

        color: #101a2e;

        font-size: 13px;

        line-height: 1.5;

        text-align: right;

        overflow-wrap: anywhere;
    }


    /* =========================
       ACTIVITY
    ========================== */

    .activity-item {
        margin-bottom: 18px;
    }


    .activity-item:last-child {
        margin-bottom: 0;
    }


    .activity-label {
        margin-bottom: 6px;

        color: #788397;

        font-size: 12px;
    }


    .activity-value {
        color: #26324a;

        font-size: 14px;

        line-height: 1.7;

        white-space: pre-line;

        overflow-wrap: anywhere;
    }


    /* =========================
       ADMIN NOTE
    ========================== */

    .admin-note {
        padding: 14px;

        border-radius: 11px;

        background: #f7faf9;

        color: #465169;

        font-size: 13px;

        line-height: 1.7;

        white-space: pre-line;
    }


    /* =========================
       ACTIONS
    ========================== */

    .detail-actions {
        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

        margin-top: 22px;
    }


    .detail-actions form {
        margin: 0;
    }


    .btn-danger {
        border: 1px solid #efcccc;

        background: #ffffff;

        color: #a33a3a;

        cursor: pointer;
    }


    .btn-danger:hover {
        border-color: #dca8a8;

        background: #fff5f5;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 760px) {

        .detail-grid {
            grid-template-columns: 1fr;
        }


        .status-card {
            align-items: flex-start;

            flex-direction: column;
        }


        .booking-code {
            text-align: left;
        }

    }


    @media (max-width: 600px) {

        .detail-actions {
            flex-direction: column;

            align-items: stretch;
        }


        .detail-actions .btn,
        .detail-actions form,
        .detail-actions form .btn {
            width: 100%;
        }


        .detail-row {
            flex-direction: column;

            gap: 3px;
        }


        .detail-row strong {
            max-width: 100%;

            text-align: left;
        }


        .status-description {
            max-width: 100%;
        }

    }

</style>

@endpush

@endsection