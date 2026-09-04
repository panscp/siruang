@extends('layouts.customer')

@section('content')

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
        'selesai' => 'status-finished',
        'dibatalkan' => 'status-cancelled',
    ];
@endphp


<section class="dashboard-section">

    <div class="container">

        {{-- =========================
             HEADER
        ========================== --}}

        <div class="dashboard-header">

            <div>

                <div class="dashboard-eyebrow">
                    SIRUANG
                </div>

                <h1>
                    Selamat datang, {{ auth()->user()->name }}
                </h1>

                <p>
                    Kelola pengajuan peminjaman ruangan Anda dari satu halaman.
                </p>

            </div>

            <a
                href="{{ route('booking.create') }}"
                class="btn btn-primary"
            >
                Ajukan Peminjaman
            </a>

        </div>


        {{-- =========================
             SUMMARY
        ========================== --}}

        <div class="summary-grid">

            <div class="summary-card">

                <div class="summary-label">
                    Total Pengajuan
                </div>

                <div class="summary-value">
                    {{ $totalBookings }}
                </div>

                <div class="summary-description">
                    Seluruh pengajuan yang pernah dibuat
                </div>

            </div>


            <div class="summary-card">

                <div class="summary-label">
                    Menunggu
                </div>

                <div class="summary-value">
                    {{ $waitingBookings }}
                </div>

                <div class="summary-description">
                    Pengajuan yang masih diperiksa admin
                </div>

            </div>


            <div class="summary-card">

                <div class="summary-label">
                    Disetujui
                </div>

                <div class="summary-value">
                    {{ $approvedBookings }}
                </div>

                <div class="summary-description">
                    Pengajuan yang sudah disetujui
                </div>

            </div>

        </div>


        {{-- =========================
             LATEST BOOKING
        ========================== --}}

        <div class="dashboard-grid">

            <div class="dashboard-card">

                <div class="card-header">

                    <div>

                        <h2>
                            Pengajuan Terbaru
                        </h2>

                        <p>
                            Informasi pengajuan terakhir Anda.
                        </p>

                    </div>

                    @if ($latestBooking)
                        <a
                            href="{{ route('customer.history') }}"
                            class="text-link"
                        >
                            Lihat Semua
                        </a>
                    @endif

                </div>


                @if ($latestBooking)

                    @php
                        $statusLabel =
                            $statusLabels[$latestBooking->status]
                            ?? ucfirst($latestBooking->status);

                        $statusClass =
                            $statusClasses[$latestBooking->status]
                            ?? 'status-waiting';
                    @endphp


                    <div class="latest-booking">

                        <div class="latest-booking-top">

                            <div>

                                <div class="booking-code-label">
                                    Kode Pengajuan
                                </div>

                                <div class="booking-code">
                                    {{ $latestBooking->booking_code }}
                                </div>

                            </div>


                            <span class="
                                booking-status
                                {{ $statusClass }}
                            ">
                                {{ $statusLabel }}
                            </span>

                        </div>


                        <div class="latest-room">
                            {{ $latestBooking->unit->room->name }}
                        </div>


                        <div class="latest-info-grid">

                            <div class="latest-info">

                                <span>
                                    Tanggal
                                </span>

                                <strong>
                                    {{ $latestBooking->start_date->translatedFormat('d F Y') }}
                                </strong>

                            </div>


                            <div class="latest-info">

                                <span>
                                    Waktu
                                </span>

                                <strong>
                                    {{ substr($latestBooking->start_time, 0, 5) }}
                                    -
                                    {{ substr($latestBooking->end_time, 0, 5) }}
                                </strong>

                            </div>


                            <div class="latest-info">

                                <span>
                                    Kegiatan
                                </span>

                                <strong>
                                    {{ $latestBooking->event_name }}
                                </strong>

                            </div>

                        </div>


                        <div class="latest-footer">

                            <span>
                                Diajukan
                                {{ $latestBooking->created_at->translatedFormat('d F Y, H:i') }}
                            </span>

                            <a
                                href="{{ route('booking.show', $latestBooking) }}"
                                class="btn btn-outline"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">
                            +
                        </div>

                        <h3>
                            Belum Ada Pengajuan
                        </h3>

                        <p>
                            Anda belum memiliki pengajuan peminjaman ruangan.
                        </p>

                        <a
                            href="{{ route('booking.create') }}"
                            class="btn btn-primary"
                        >
                            Buat Pengajuan

                        </a>

                    </div>

                @endif

            </div>


            {{-- =========================
                 QUICK ACTION
            ========================== --}}

            <div class="dashboard-card">

                <div class="card-header">

                    <div>

                        <h2>
                            Akses Cepat
                        </h2>

                        <p>
                            Menu yang sering digunakan.
                        </p>

                    </div>

                </div>


                <div class="quick-actions">

                    <a
                        href="{{ route('booking.create') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            +
                        </div>

                        <div>

                            <strong>
                                Ajukan Peminjaman
                            </strong>

                            <span>
                                Buat pengajuan ruangan baru
                            </span>

                        </div>

                    </a>


                    <a
                        href="{{ route('customer.history') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            ≡
                        </div>

                        <div>

                            <strong>
                                Riwayat Pengajuan
                            </strong>

                            <span>
                                Lihat seluruh pengajuan Anda
                            </span>

                        </div>

                    </a>


                    <a
                        href="{{ route('customer.profile') }}"
                        class="quick-action"
                    >

                        <div class="quick-action-icon">
                            ○
                        </div>

                        <div>

                            <strong>
                                Profil
                            </strong>

                            <span>
                                Kelola informasi akun
                            </span>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    .dashboard-section {
        padding: 45px 20px 70px;
        background: #f7faf9;
    }


    /* =========================
       HEADER
    ========================== */

    .dashboard-header {
        display: flex;

        align-items: flex-end;
        justify-content: space-between;

        gap: 25px;

        margin-bottom: 30px;
    }


    .dashboard-eyebrow {
        margin-bottom: 7px;

        color: #008f6b;

        font-size: 13px;
        font-weight: 800;

        text-transform: uppercase;
    }


    .dashboard-header h1 {
        margin: 0 0 8px;

        color: #0a1428;

        font-size: 32px;
        line-height: 1.2;
    }


    .dashboard-header p {
        margin: 0;

        color: #687388;

        font-size: 14px;
        line-height: 1.6;
    }


    /* =========================
       SUMMARY
    ========================== */

    .summary-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 16px;

        margin-bottom: 22px;
    }


    .summary-card {
        padding: 22px;

        border: 1px solid #dfe7e3;

        border-radius: 16px;

        background: #ffffff;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }


    .summary-label {
        margin-bottom: 8px;

        color: #788397;

        font-size: 12px;
        font-weight: 700;
    }


    .summary-value {
        margin-bottom: 5px;

        color: #101a2e;

        font-size: 30px;

        font-weight: 800;
    }


    .summary-description {
        color: #8a94a3;

        font-size: 11px;

        line-height: 1.5;
    }


    /* =========================
       GRID
    ========================== */

    .dashboard-grid {
        display: grid;

        grid-template-columns:
            1.4fr
            0.8fr;

        gap: 22px;

        align-items: start;
    }


    .dashboard-card {
        padding: 24px;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        background: #ffffff;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }


    .card-header {
        display: flex;

        align-items: flex-start;
        justify-content: space-between;

        gap: 15px;

        margin-bottom: 20px;
    }


    .card-header h2 {
        margin: 0 0 5px;

        color: #101a2e;

        font-size: 19px;
    }


    .card-header p {
        margin: 0;

        color: #788397;

        font-size: 12px;
    }


    .text-link {
        color: #008f6b;

        font-size: 12px;

        font-weight: 800;

        text-decoration: none;

        white-space: nowrap;
    }


    .text-link:hover {
        text-decoration: underline;
    }


    /* =========================
       LATEST BOOKING
    ========================== */

    .latest-booking {
        padding: 18px;

        border: 1px solid #dcefe6;

        border-radius: 14px;

        background: #f8fcfa;
    }


    .latest-booking-top {
        display: flex;

        align-items: flex-start;
        justify-content: space-between;

        gap: 15px;

        margin-bottom: 16px;
    }


    .booking-code-label {
        margin-bottom: 4px;

        color: #788397;

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .booking-code {
        color: #101a2e;

        font-size: 15px;

        font-weight: 800;
    }


    .booking-status {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        padding: 7px 11px;

        border-radius: 999px;

        font-size: 10px;

        font-weight: 800;

        white-space: nowrap;
    }


    .status-waiting {
        background: #fff7df;

        color: #946c00;
    }


    .status-approved {
        background: #eef8f4;

        color: #007754;
    }


    .status-rejected {
        background: #fff1f1;

        color: #a33a3a;
    }


    .status-finished {
        background: #eef2f7;

        color: #536078;
    }


    .status-cancelled {
        background: #f3f4f4;

        color: #6d7474;
    }


    .latest-room {
        margin-bottom: 18px;

        color: #101a2e;

        font-size: 18px;

        font-weight: 800;
    }


    .latest-info-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 15px;
    }


    .latest-info span {
        display: block;

        margin-bottom: 5px;

        color: #788397;

        font-size: 10px;
    }


    .latest-info strong {
        display: block;

        color: #26324a;

        font-size: 12px;

        line-height: 1.5;

        overflow-wrap: anywhere;
    }


    .latest-footer {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-top: 18px;

        padding-top: 15px;

        border-top: 1px solid #e4efea;

        color: #8a94a3;

        font-size: 10px;
    }


    /* =========================
       QUICK ACTION
    ========================== */

    .quick-actions {
        display: grid;

        gap: 10px;
    }


    .quick-action {
        display: flex;

        align-items: center;

        gap: 12px;

        padding: 13px;

        border: 1px solid #e3e9e6;

        border-radius: 12px;

        background: #ffffff;

        color: inherit;

        text-decoration: none;

        transition: 0.2s ease;
    }


    .quick-action:hover {
        border-color: #9bcdbd;

        background: #f8fcfa;
    }


    .quick-action-icon {
        width: 35px;
        height: 35px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background: #eef8f4;

        color: #008f6b;

        font-size: 18px;

        font-weight: 800;
    }


    .quick-action strong {
        display: block;

        margin-bottom: 3px;

        color: #26324a;

        font-size: 12px;
    }


    .quick-action span {
        display: block;

        color: #8a94a3;

        font-size: 10px;
    }


    /* =========================
       EMPTY
    ========================== */

    .empty-state {
        padding: 35px 20px;

        border: 1px dashed #cfdcd6;

        border-radius: 14px;

        text-align: center;
    }


    .empty-icon {
        width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin: 0 auto 14px;

        border-radius: 50%;

        background: #eef8f4;

        color: #008f6b;

        font-size: 22px;

        font-weight: 800;
    }


    .empty-state h3 {
        margin: 0 0 7px;

        color: #101a2e;

        font-size: 17px;
    }


    .empty-state p {
        margin: 0 0 18px;

        color: #788397;

        font-size: 12px;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 900px) {

        .dashboard-grid {
            grid-template-columns: 1fr;
        }


        .latest-info-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

    }


    @media (max-width: 700px) {

        .summary-grid {
            grid-template-columns: 1fr;
        }


        .dashboard-header {
            align-items: stretch;

            flex-direction: column;
        }


        .dashboard-header .btn {
            width: 100%;
        }

    }


    @media (max-width: 600px) {

        .dashboard-section {
            padding-left: 15px;
            padding-right: 15px;
        }


        .dashboard-card {
            padding: 18px;
        }


        .latest-booking-top {
            flex-direction: column;
        }


        .latest-info-grid {
            grid-template-columns: 1fr;
        }


        .latest-footer {
            align-items: stretch;

            flex-direction: column;
        }


        .latest-footer .btn {
            width: 100%;
        }

    }

</style>

@endpush