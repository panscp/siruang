@extends('layouts.customer')

@section('content')

<section class="history-section">

    <div class="container">

        {{-- =========================
             HEADER
        ========================== --}}

        <div class="page-header">

            <div class="page-eyebrow">
                SIRUANG
            </div>

            <h1>
                Riwayat Pengajuan
            </h1>

            <p>
                Berikut daftar pengajuan peminjaman ruangan yang pernah Anda lakukan.
            </p>

        </div>


        {{-- =========================
             FILTER STATUS
        ========================== --}}

        @if ($bookings->count() > 0)

            <div class="history-filter">

                <div class="history-filter-label">
                    Tampilkan
                </div>

                <div class="history-filter-buttons">

                    <button
                        type="button"
                        class="history-filter-button active"
                        data-filter="all"
                    >
                        Semua
                    </button>

                    <button
                        type="button"
                        class="history-filter-button"
                        data-filter="menunggu"
                    >
                        Menunggu
                    </button>

                    <button
                        type="button"
                        class="history-filter-button"
                        data-filter="disetujui"
                    >
                        Disetujui
                    </button>

                    <button
                        type="button"
                        class="history-filter-button"
                        data-filter="ditolak"
                    >
                        Ditolak
                    </button>

                    <button
                        type="button"
                        class="history-filter-button"
                        data-filter="selesai"
                    >
                        Selesai
                    </button>

                    <button
                        type="button"
                        class="history-filter-button"
                        data-filter="dibatalkan"
                    >
                        Dibatalkan
                    </button>

                </div>

            </div>


            {{-- =========================
                 BOOKING LIST
            ========================== --}}

            <div class="booking-list">

                @foreach ($bookings as $booking)

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

                        $statusLabel =
                            $statusLabels[$booking->status]
                            ?? ucfirst($booking->status);

                        $statusClass =
                            $statusClasses[$booking->status]
                            ?? 'status-waiting';

                    @endphp


                    <div
                        class="booking-card"
                        data-status="{{ $booking->status }}"
                    >

                        {{-- =========================
                             TOP
                        ========================== --}}

                        <div class="booking-card-top">

                            <div>

                                <div class="booking-code-label">
                                    Kode Pengajuan
                                </div>

                                <div class="booking-code">
                                    {{ $booking->booking_code }}
                                </div>

                            </div>


                            <span class="
                                booking-status
                                {{ $statusClass }}
                            ">
                                {{ $statusLabel }}
                            </span>

                        </div>


                        {{-- =========================
                             MAIN
                        ========================== --}}

                        <div class="booking-main">

                            <div class="booking-room">

                                <div class="booking-room-label">
                                    Ruangan
                                </div>

                                <div class="booking-room-name">
                                    {{ $booking->unit->room->name }}
                                </div>

                            </div>


                            <div class="booking-info-grid">

                                <div class="booking-info-item">

                                    <span>
                                        Tanggal
                                    </span>

                                    <strong>
                                        {{ $booking->start_date->translatedFormat('d F Y') }}

                                        @if (
                                            $booking->start_date->format('Y-m-d')
                                            !==
                                            $booking->end_date->format('Y-m-d')
                                        )

                                            -
                                            {{ $booking->end_date->translatedFormat('d F Y') }}

                                        @endif
                                    </strong>

                                </div>


                                <div class="booking-info-item">

                                    <span>
                                        Waktu
                                    </span>

                                    <strong>
                                        {{ substr($booking->start_time, 0, 5) }}
                                        -
                                        {{ substr($booking->end_time, 0, 5) }}
                                    </strong>

                                </div>


                                <div class="booking-info-item">

                                    <span>
                                        Kegiatan
                                    </span>

                                    <strong>
                                        {{ $booking->event_name }}
                                    </strong>

                                </div>


                                <div class="booking-info-item">

                                    <span>
                                        Instansi / Organisasi
                                    </span>

                                    <strong>
                                        {{ $booking->organization }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        {{-- =========================
                             FOOTER
                        ========================== --}}

                        <div class="booking-card-footer">

                            <div class="booking-created">

                                Diajukan
                                {{ $booking->created_at->translatedFormat('d F Y, H:i') }}

                            </div>


                            <a
                                href="{{ route('booking.show', $booking) }}"
                                class="btn btn-outline"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                @endforeach


                {{-- EMPTY FILTER RESULT --}}

                <div
                    id="filter-empty-state"
                    class="filter-empty-state"
                    style="display: none;"
                >

                    <div class="empty-icon">
                        =
                    </div>

                    <h2>
                        Belum Ada Pengajuan
                    </h2>

                    <p>
                        Belum ada pengajuan dengan status yang dipilih.
                    </p>

                </div>

            </div>

        @else

            {{-- =========================
                 EMPTY STATE
            ========================== --}}

            <div class="empty-state">

                <div class="empty-icon">
                    =
                </div>

                <h2>
                    Belum Ada Pengajuan
                </h2>

                <p>
                    Anda belum memiliki riwayat peminjaman ruangan.
                    Silakan ajukan peminjaman terlebih dahulu.
                </p>

                <a
                    href="{{ route('booking.create') }}"
                    class="btn btn-primary"
                >
                    Ajukan Peminjaman
                </a>

            </div>

        @endif

    </div>

</section>

@endsection


@push('styles')

<style>

    .history-section {
        padding: 45px 20px 70px;

        background: #f7faf9;
    }


    /* =========================
       HEADER
    ========================== */

    .page-header {
        margin-bottom: 25px;
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
        max-width: 760px;

        margin: 0;

        color: #687388;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================
       FILTER
    ========================== */

    .history-filter {
        display: flex;

        align-items: center;

        flex-wrap: wrap;

        gap: 12px;

        margin-bottom: 20px;

        padding: 14px 16px;

        border: 1px solid #dfe7e3;

        border-radius: 14px;

        background: #ffffff;
    }


    .history-filter-label {
        color: #687388;

        font-size: 12px;

        font-weight: 700;
    }


    .history-filter-buttons {
        display: flex;

        flex-wrap: wrap;

        gap: 7px;
    }


    .history-filter-button {
        padding: 7px 12px;

        border: 1px solid #dfe7e3;

        border-radius: 999px;

        background: #ffffff;

        color: #687388;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;

        transition: 0.2s ease;
    }


    .history-filter-button:hover {
        border-color: #9bcdbd;

        color: #008f6b;
    }


    .history-filter-button.active {
        border-color: #008f6b;

        background: #008f6b;

        color: #ffffff;
    }


    /* =========================
       LIST
    ========================== */

    .booking-list {
        display: grid;

        gap: 18px;
    }


    /* =========================
       CARD
    ========================== */

    .booking-card {
        background: #ffffff;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        padding: 22px 24px;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }


    .booking-card.is-hidden {
        display: none;
    }


    /* =========================
       TOP
    ========================== */

    .booking-card-top {
        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 20px;

        padding-bottom: 17px;

        border-bottom: 1px solid #edf1ef;
    }


    .booking-code-label {
        margin-bottom: 4px;

        color: #788397;

        font-size: 11px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .booking-code {
        color: #101a2e;

        font-size: 16px;

        font-weight: 800;

        letter-spacing: 0.3px;
    }


    /* =========================
       STATUS
    ========================== */

    .booking-status {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 7px 11px;

        border-radius: 999px;

        font-size: 11px;

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


    /* =========================
       MAIN
    ========================== */

    .booking-main {
        padding: 20px 0;
    }


    .booking-room {
        margin-bottom: 18px;
    }


    .booking-room-label {
        margin-bottom: 4px;

        color: #788397;

        font-size: 11px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .booking-room-name {
        color: #101a2e;

        font-size: 19px;

        font-weight: 800;
    }


    /* =========================
       INFO
    ========================== */

    .booking-info-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 18px;
    }


    .booking-info-item {
        min-width: 0;
    }


    .booking-info-item span {
        display: block;

        margin-bottom: 5px;

        color: #788397;

        font-size: 11px;
    }


    .booking-info-item strong {
        display: block;

        color: #26324a;

        font-size: 13px;

        line-height: 1.5;

        overflow-wrap: anywhere;
    }


    /* =========================
       FOOTER
    ========================== */

    .booking-card-footer {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding-top: 17px;

        border-top: 1px solid #edf1ef;
    }


    .booking-created {
        color: #8a94a3;

        font-size: 11px;
    }


    /* =========================
       EMPTY
    ========================== */

    .empty-state,
    .filter-empty-state {
        padding: 60px 25px;

        border: 1px dashed #cfdcd6;

        border-radius: 18px;

        background: #ffffff;

        text-align: center;
    }


    .filter-empty-state {
        grid-column: 1 / -1;
    }


    .empty-icon {
        width: 48px;

        height: 48px;

        display: flex;

        align-items: center;

        justify-content: center;

        margin: 0 auto 18px;

        border-radius: 50%;

        background: #eef8f4;

        color: #008f6b;

        font-size: 25px;

        font-weight: 800;
    }


    .empty-state h2,
    .filter-empty-state h2 {
        margin: 0 0 8px;

        color: #101a2e;

        font-size: 22px;
    }


    .empty-state p,
    .filter-empty-state p {
        max-width: 500px;

        margin: 0 auto 22px;

        color: #788397;

        font-size: 13px;

        line-height: 1.7;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 900px) {

        .booking-info-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

    }


    @media (max-width: 600px) {

        .history-section {
            padding-left: 15px;

            padding-right: 15px;
        }


        .history-filter {
            align-items: flex-start;

            flex-direction: column;
        }


        .booking-card {
            padding: 18px;
        }


        .booking-card-top {
            flex-direction: column;

            align-items: flex-start;
        }


        .booking-info-grid {
            grid-template-columns: 1fr;
        }


        .booking-card-footer {
            align-items: stretch;

            flex-direction: column;
        }


        .booking-card-footer .btn {
            width: 100%;
        }

    }

</style>

@endpush


@push('scripts')

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const filterButtons =
                document.querySelectorAll(
                    '.history-filter-button'
                );


            const bookingCards =
                document.querySelectorAll(
                    '.booking-card'
                );


            const emptyState =
                document.getElementById(
                    'filter-empty-state'
                );


            filterButtons.forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const filter =
                                button.dataset.filter;


                            /*
                            |--------------------------------------------------------------------------
                            | Active button
                            |--------------------------------------------------------------------------
                            */

                            filterButtons.forEach(
                                function (item) {

                                    item.classList.remove(
                                        'active'
                                    );

                                }
                            );


                            button.classList.add(
                                'active'
                            );


                            /*
                            |--------------------------------------------------------------------------
                            | Filter booking
                            |--------------------------------------------------------------------------
                            */

                            let visibleCount =
                                0;


                            bookingCards.forEach(
                                function (card) {

                                    const status =
                                        card.dataset.status;


                                    const shouldShow =
                                        filter === 'all'
                                        ||
                                        status === filter;


                                    if (
                                        shouldShow
                                    ) {

                                        card.classList.remove(
                                            'is-hidden'
                                        );

                                        visibleCount++;

                                    } else {

                                        card.classList.add(
                                            'is-hidden'
                                        );

                                    }

                                }
                            );


                            /*
                            |--------------------------------------------------------------------------
                            | Empty filter state
                            |--------------------------------------------------------------------------
                            */

                            if (
                                emptyState
                            ) {

                                emptyState.style.display =
                                    visibleCount === 0
                                    ? 'block'
                                    : 'none';

                            }

                        }
                    );

                }
            );

        }
    );

</script>

@endpush