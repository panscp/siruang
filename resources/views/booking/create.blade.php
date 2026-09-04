@extends('layouts.customer')

@section('content')

<section style="
    padding: 45px 20px 70px;
    background: #f7faf9;
">

    <div class="container">

        <!-- =========================
             HEADER
        ========================= -->

        <div class="page-header">

            <div class="page-eyebrow">
                SIRUANG
            </div>

            <h1>
                Pengajuan Peminjaman
            </h1>

            <p>
                Pilih ruangan dan jadwal terlebih dahulu,
                kemudian lengkapi data peminjaman.
            </p>

        </div>


        <!-- =========================
             STEP INDICATOR
        ========================= -->

        <div class="booking-steps">

            <div
                id="step-indicator-1"
                class="booking-step active"
            >

                <div class="booking-step-number">
                    1
                </div>

                <div>

                    <div class="booking-step-label">
                        Langkah 1
                    </div>

                    <div class="booking-step-title">
                        Ruangan & Jadwal
                    </div>

                </div>

            </div>


            <div
                id="step-indicator-2"
                class="booking-step"
            >

                <div class="booking-step-number">
                    2
                </div>

                <div>

                    <div class="booking-step-label">
                        Langkah 2
                    </div>

                    <div class="booking-step-title">
                        Data Peminjam
                    </div>

                </div>

            </div>


            <div
                id="step-indicator-3"
                class="booking-step"
            >

                <div class="booking-step-number">
                    3
                </div>

                <div>

                    <div class="booking-step-label">
                        Langkah 3
                    </div>

                    <div class="booking-step-title">
                        Ringkasan
                    </div>

                </div>

            </div>

        </div>


        <!-- =========================================================
             STEP 1
        ========================================================== -->

        <div
            id="booking-step-1"
            class="booking-step-content"
        >

            <div class="booking-grid">


                <!-- =========================
                     RUANGAN
                ========================= -->

                <div class="booking-card">

                    <div class="booking-card-header">

                        <h2>
                            Pilih Ruangan
                        </h2>

                        <p>
                            Pilih salah satu ruangan yang akan digunakan.
                        </p>

                    </div>


                    <div class="room-list">

                        @forelse ($rooms as $room)

                            <button
                                type="button"
                                class="room-card"
                                data-room-id="{{ $room->id }}"
                                data-room-name="{{ $room->name }}"
                                data-room-capacity="{{ $room->capacity }}"
                            >

                                <div class="room-card-main">

                                    <div class="room-card-info">

                                        <div class="room-name">
                                            {{ $room->name }}
                                        </div>

                                        <div class="room-capacity">
                                            Kapasitas
                                            {{ $room->capacity ?? '-' }}
                                            orang
                                        </div>

                                        @if ($room->description)

                                            <div class="room-description">
                                                {{ $room->description }}
                                            </div>

                                        @endif

                                    </div>


                                    <div class="room-selected-indicator">
                                        ✓
                                    </div>

                                </div>


                                <div class="room-card-footer">

                                    <span>
                                        Pilih ruangan ini
                                    </span>

                                    <strong>
                                        {{ $room->units_count }} Unit
                                    </strong>

                                </div>

                            </button>

                        @empty

                            <div class="empty-room">
                                Belum ada ruangan yang tersedia.
                            </div>

                        @endforelse

                    </div>

                </div>


                <!-- =========================
                     TANGGAL & WAKTU
                ========================= -->

                <div class="booking-side">


                    <!-- CALENDAR -->

                    <div class="booking-card">

                        <div class="calendar-header">

                            <div>

                                <h2 id="calendar-title">
                                </h2>

                                <p>
                                    Pilih tanggal peminjaman.
                                </p>

                            </div>


                            <div class="calendar-navigation">

                                <button
                                    type="button"
                                    id="prev-month"
                                    class="calendar-nav-button"
                                >
                                    ←
                                </button>

                                <button
                                    type="button"
                                    id="next-month"
                                    class="calendar-nav-button"
                                >
                                    →
                                </button>

                            </div>

                        </div>


                        <div
                            id="calendar"
                            class="calendar-grid"
                        ></div>


                        <div class="calendar-note">
                            Tanggal sebelumnya tidak dapat dipilih.
                            Ketersediaan akan mengikuti data sistem.
                        </div>

                    </div>


                    <!-- TIME -->

                    <div class="booking-card">

                        <div class="booking-card-header">

                            <h2>
                                Pilih Waktu
                            </h2>

                            <p>
                                Tentukan jam mulai dan jam selesai.
                            </p>

                        </div>


                        <div class="time-grid">

                            <!-- JAM MULAI -->
                            <div class="form-group">

                                <label for="start-time-trigger">
                                    Jam Mulai
                                </label>

                                <div class="time-picker" data-time-picker>

                                    <input
                                        type="hidden"
                                        id="start_time"
                                        name="start_time"
                                    >

                                    <button
                                        type="button"
                                        id="start-time-trigger"
                                        class="time-picker-trigger"
                                        aria-haspopup="dialog"
                                        aria-expanded="false"
                                    >
                                        <span class="time-picker-value-group">
                                            <span
                                                id="start-time-label"
                                                class="time-picker-value placeholder"
                                            >
                                                Pilih jam
                                            </span>

                                            <span
                                                id="start-time-period"
                                                class="time-picker-period"
                                            ></span>
                                        </span>

                                        <span class="time-picker-icon">⌄</span>
                                    </button>

                                    <div
                                        id="start-time-panel"
                                        class="time-picker-panel"
                                        hidden
                                    >
                                        <div class="time-picker-panel-title">
                                            Pilih jam mulai
                                        </div>

                                        <div class="time-picker-panel-subtitle">
                                            Pilih jam, lalu menit.
                                        </div>

                                        <div class="time-picker-section-label">
                                            Jam
                                        </div>

                                        <div
                                            class="time-hour-grid"
                                            data-time-hours
                                        >
                                            @for ($hour = 0; $hour < 24; $hour++)
                                                <button
                                                    type="button"
                                                    class="time-option time-hour-option"
                                                    data-hour="{{ sprintf('%02d', $hour) }}"
                                                >
                                                    {{ sprintf('%02d', $hour) }}
                                                </button>
                                            @endfor
                                        </div>

                                        <div class="time-picker-section-label">
                                            Menit
                                        </div>

                                        <div
                                            class="time-minute-scroll"
                                            data-time-minutes
                                        >
                                            @for ($minute = 0; $minute < 60; $minute++)
                                                <button
                                                    type="button"
                                                    class="time-option time-minute-option"
                                                    data-minute="{{ sprintf('%02d', $minute) }}"
                                                >
                                                    {{ sprintf('%02d', $minute) }}
                                                </button>
                                            @endfor
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <!-- JAM SELESAI -->
                            <div class="form-group">

                                <label for="end-time-trigger">
                                    Jam Selesai
                                </label>

                                <div class="time-picker" data-time-picker>

                                    <input
                                        type="hidden"
                                        id="end_time"
                                        name="end_time"
                                    >

                                    <button
                                        type="button"
                                        id="end-time-trigger"
                                        class="time-picker-trigger"
                                        aria-haspopup="dialog"
                                        aria-expanded="false"
                                    >
                                        <span class="time-picker-value-group">
                                            <span
                                                id="end-time-label"
                                                class="time-picker-value placeholder"
                                            >
                                                Pilih jam
                                            </span>

                                            <span
                                                id="end-time-period"
                                                class="time-picker-period"
                                            ></span>
                                        </span>

                                        <span class="time-picker-icon">⌄</span>
                                    </button>

                                    <div
                                        id="end-time-panel"
                                        class="time-picker-panel"
                                        hidden
                                    >
                                        <div class="time-picker-panel-title">
                                            Pilih jam selesai
                                        </div>

                                        <div class="time-picker-panel-subtitle">
                                            Pilih jam, lalu menit.
                                        </div>

                                        <div class="time-picker-section-label">
                                            Jam
                                        </div>

                                        <div
                                            class="time-hour-grid"
                                            data-time-hours
                                        >
                                            @for ($hour = 0; $hour < 24; $hour++)
                                                <button
                                                    type="button"
                                                    class="time-option time-hour-option"
                                                    data-hour="{{ sprintf('%02d', $hour) }}"
                                                >
                                                    {{ sprintf('%02d', $hour) }}
                                                </button>
                                            @endfor
                                        </div>

                                        <div class="time-picker-section-label">
                                            Menit
                                        </div>

                                        <div
                                            class="time-minute-scroll"
                                            data-time-minutes
                                        >
                                            @for ($minute = 0; $minute < 60; $minute++)
                                                <button
                                                    type="button"
                                                    class="time-option time-minute-option"
                                                    data-minute="{{ sprintf('%02d', $minute) }}"
                                                >
                                                    {{ sprintf('%02d', $minute) }}
                                                </button>
                                            @endfor
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- AVAILABILITY -->

                        <div
                            id="availability-status"
                            class="availability-status neutral"
                        >
                            Pilih ruangan, tanggal, dan waktu terlebih dahulu.
                        </div>


                        <!-- CURRENT SELECTION -->

                        <div class="selection-summary">

                            <div class="selection-summary-label">
                                Pilihan Saat Ini
                            </div>

                            <div
                                id="booking-summary"
                                class="selection-summary-content"
                            >
                                Belum ada pilihan.
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================
                 STEP 1 ACTION
            ========================= -->

            <div class="booking-footer">

                <div>

                    <div class="booking-footer-title">
                        Ruangan dan jadwal
                    </div>

                    <div class="booking-footer-text">
                        Pilih ruangan, tanggal, dan waktu yang tersedia
                        untuk melanjutkan.
                    </div>

                </div>


                <button
                    type="button"
                    id="continue-button"
                    class="btn btn-primary"
                    disabled
                >
                    Lanjutkan
                </button>

            </div>

        </div>


        <!-- =========================================================
             STEP 2
        ========================================================== -->

        <div
            id="booking-step-2"
            class="booking-step-content"
            style="display: none;"
        >

            <div class="booking-card">

                <div class="booking-card-header">

                    <h2>
                        Data Peminjam & Kegiatan
                    </h2>

                    <p>
                        Lengkapi data yang akan digunakan pada pengajuan.
                    </p>

                </div>


                <!-- =========================
                     SELECTED BOOKING
                ========================= -->

                <div class="chosen-booking">

                    <div>

                        <div class="chosen-booking-label">
                            Pilihan Peminjaman
                        </div>

                        <div
                            id="chosen-booking-summary"
                            class="chosen-booking-value"
                        >
                            -
                        </div>

                    </div>


                    <button
                        type="button"
                        id="change-schedule-button"
                        class="btn btn-outline"
                    >
                        Ubah Jadwal
                    </button>

                </div>


                <!-- =========================
                     DATA PEMINJAM
                ========================= -->

                <div class="section-title">
                    Data Peminjam
                </div>


                <div class="form-grid">

                    <div class="form-group">

                        <label for="borrower_name">
                            Nama Peminjam
                        </label>

                        <input
                            type="text"
                            id="borrower_name"
                            name="borrower_name"
                            value="{{ auth()->user()->name }}"
                            placeholder="Masukkan nama peminjam"
                        >

                    </div>


                    <div class="form-group">

                        <label for="borrower_email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="borrower_email"
                            name="borrower_email"
                            value="{{ auth()->user()->email }}"
                            readonly
                        >

                    </div>


                    <div class="form-group">

                        <label for="organization">
                            Instansi / Organisasi
                        </label>

                        <input
                            type="text"
                            id="organization"
                            name="organization"
                            placeholder="Masukkan instansi / organisasi"
                        >

                    </div>


                    <div class="form-group">

                        <label for="phone">
                            Nomor HP
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="Contoh: 081234567890"
                        >

                    </div>

                </div>


                <!-- =========================
                     DATA KEGIATAN
                ========================= -->

                <div
                    class="section-title"
                    style="margin-top: 30px;"
                >
                    Data Kegiatan
                </div>


                <div class="form-grid">

                    <div class="form-group full-width">

                        <label for="event_name">
                            Nama Kegiatan
                        </label>

                        <input
                            type="text"
                            id="event_name"
                            name="event_name"
                            placeholder="Masukkan nama kegiatan"
                        >

                    </div>


                    <div class="form-group full-width">

                        <label for="notes">
                            Keperluan Peminjaman
                        </label>

                        <textarea
                            id="notes"
                            name="notes"
                            rows="5"
                            placeholder="Jelaskan keperluan penggunaan ruangan..."
                        ></textarea>

                    </div>

                </div>


                <div class="form-info">

                    <strong>
                        Catatan
                    </strong>

                    <span>
                        Data diri dan data kegiatan akan digunakan
                        dalam proses pemeriksaan pengajuan oleh admin.
                    </span>

                </div>

            </div>


            <!-- =========================
                 STEP 2 ACTION
            ========================= -->

            <div class="booking-footer">

                <div>

                    <div class="booking-footer-title">
                        Data peminjam
                    </div>

                    <div class="booking-footer-text">
                        Pastikan seluruh data wajib telah diisi.
                    </div>

                </div>


                <button
                    type="button"
                    id="review-button"
                    class="btn btn-primary"
                >
                    Lihat Ringkasan
                </button>

            </div>

        </div>


        <!-- =========================================================
             STEP 3
        ========================================================== -->

        <div
            id="booking-step-3"
            class="booking-step-content"
            style="display: none;"
        >

            <div class="booking-card">

                <div class="booking-card-header">

                    <h2>
                        Ringkasan Peminjaman
                    </h2>

                    <p>
                        Periksa kembali seluruh informasi sebelum
                        mengirim pengajuan.
                    </p>

                </div>


                <!-- =========================
                     PEMINJAMAN
                ========================= -->

                <div class="summary-section">

                    <div class="summary-section-title">
                        Peminjaman
                    </div>


                    <div class="summary-row">

                        <span>
                            Ruangan
                        </span>

                        <strong id="summary-room">
                            -
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Tanggal
                        </span>

                        <strong id="summary-date">
                            -
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Waktu
                        </span>

                        <strong id="summary-time">
                            -
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Ketersediaan
                        </span>

                        <strong
                            id="summary-availability"
                            class="summary-status"
                        >
                            -
                        </strong>

                    </div>

                </div>


                <!-- =========================
                     DATA PEMINJAM
                ========================= -->

                <div class="summary-section">

                    <div class="summary-section-title">
                        Data Peminjam
                    </div>


                    <div class="summary-row">

                        <span>
                            Nama
                        </span>

                        <strong id="summary-borrower">
                            -
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Email
                        </span>

                        <strong id="summary-email">
                            -
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Instansi / Organisasi
                        </span>

                        <strong id="summary-organization">
                            -
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Nomor HP
                        </span>

                        <strong id="summary-phone">
                            -
                        </strong>

                    </div>

                </div>


                <!-- =========================
                     DATA KEGIATAN
                ========================= -->

                <div class="summary-section">

                    <div class="summary-section-title">
                        Data Kegiatan
                    </div>


                    <div class="summary-row vertical">

                        <span>
                            Nama Kegiatan
                        </span>

                        <strong id="summary-event">
                            -
                        </strong>

                    </div>


                    <div class="summary-row vertical">

                        <span>
                            Keperluan Peminjaman
                        </span>

                        <div
                            id="summary-notes"
                            class="summary-description"
                        >
                            -
                        </div>

                    </div>

                </div>


                <!-- =========================
                     ACTIONS
                ========================= -->

                <div class="summary-actions">

                    <button
                        type="button"
                        id="edit-summary-button"
                        class="btn btn-outline"
                    >
                        Ubah
                    </button>


                    <button
                        type="button"
                        id="cancel-booking-button"
                        class="btn btn-danger"
                    >
                        Batal
                    </button>


                    <button
                        type="button"
                        id="submit-booking-button"
                        class="btn btn-primary"
                    >
                        Kirim Pengajuan
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>


@push('styles')

<style>

    /* =========================
       HEADER
    ========================= */

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

        max-width: 760px;

        color: #687388;

        font-size: 14px;
    }


    /* =========================
       STEPS
    ========================= */

    .booking-steps {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 12px;

        margin-bottom: 25px;
    }

    .booking-step {
        display: flex;

        align-items: center;

        gap: 10px;

        padding: 13px 15px;

        border: 1px solid #dfe7e3;

        border-radius: 12px;

        background: #ffffff;

        color: #687388;

        transition: 0.2s ease;
    }

    .booking-step.active {
        background: #008f6b;

        border-color: #008f6b;

        color: #ffffff;
    }

    .booking-step.completed {
        border-color: #9bcdbd;

        background: #f3fbf7;

        color: #008f6b;
    }

    .booking-step-number {
        width: 30px;
        height: 30px;

        border-radius: 50%;

        display: flex;

        align-items: center;
        justify-content: center;

        background: #eef8f4;

        color: #008f6b;

        font-size: 12px;
        font-weight: 800;

        flex-shrink: 0;
    }

    .booking-step.active .booking-step-number {
        background: rgba(255, 255, 255, 0.18);

        color: #ffffff;
    }

    .booking-step.completed .booking-step-number {
        background: #008f6b;

        color: #ffffff;
    }

    .booking-step-label {
        display: block;

        margin-bottom: 2px;

        font-size: 10px;
        font-weight: 800;

        text-transform: uppercase;

        opacity: 0.8;
    }

    .booking-step-title {
        display: block;

        font-size: 13px;
        font-weight: 800;
    }


    /* =========================
       GRID
    ========================= */

    .booking-grid {
        display: grid;

        grid-template-columns: 1.15fr 0.85fr;

        gap: 22px;

        align-items: start;
    }

    .booking-side {
        display: grid;

        gap: 22px;
    }


    /* =========================
       CARD
    ========================= */

    .booking-card {
        background: #ffffff;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        padding: 25px;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }

    .booking-card-header {
        margin-bottom: 20px;
    }

    .booking-card-header h2 {
        margin: 0 0 5px;

        color: #101a2e;

        font-size: 21px;
    }

    .booking-card-header p {
        margin: 0;

        color: #788397;

        font-size: 13px;
    }


    /* =========================
       ROOM
    ========================= */

    .room-list {
        display: grid;

        gap: 14px;
    }

    .room-card {
        width: 100%;

        padding: 18px;

        border: 1px solid #dfe7e3;

        border-radius: 14px;

        background: #ffffff;

        text-align: left;

        cursor: pointer;

        transition: 0.2s ease;
    }

    .room-card:hover {
        border-color: #9bcdbd;

        box-shadow:
            0 6px 18px rgba(20, 40, 30, 0.06);
    }

    .room-card.selected {
        border-color: #008f6b;

        background: #f3fbf7;

        box-shadow:
            0 6px 18px rgba(0, 143, 107, 0.08);
    }

    .room-card-main {
        display: flex;

        align-items: flex-start;
        justify-content: space-between;

        gap: 15px;
    }

    .room-card-info {
        min-width: 0;
    }

    .room-name {
        margin-bottom: 5px;

        color: #101a2e;

        font-size: 17px;
        font-weight: 800;
    }

    .room-capacity {
        margin-bottom: 10px;

        color: #788397;

        font-size: 13px;
    }

    .room-description {
        color: #667187;

        font-size: 13px;

        line-height: 1.6;
    }

    .room-selected-indicator {
        width: 28px;
        height: 28px;

        border-radius: 50%;

        display: flex;

        align-items: center;
        justify-content: center;

        border: 1px solid #dfe7e3;

        color: #008f6b;

        font-size: 12px;
        font-weight: 800;

        opacity: 0;

        flex-shrink: 0;
    }

    .room-card.selected
    .room-selected-indicator {
        background: #eef8f4;

        border-color: #c9e6da;

        opacity: 1;
    }

    .room-card-footer {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 10px;

        margin-top: 14px;
        padding-top: 12px;

        border-top: 1px solid #edf1ef;

        color: #687388;

        font-size: 12px;
    }

    .room-card-footer strong {
        color: #008f6b;

        font-size: 11px;
        font-weight: 800;

        white-space: nowrap;
    }

    .empty-room {
        padding: 20px;

        border: 1px dashed #cfdcd6;

        border-radius: 14px;

        color: #788397;

        font-size: 13px;

        text-align: center;
    }


    /* =========================
       CALENDAR
    ========================= */

    .calendar-header {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 12px;

        margin-bottom: 18px;
    }

    .calendar-header h2 {
        margin: 0 0 3px;

        color: #101a2e;

        font-size: 20px;
    }

    .calendar-header p {
        margin: 0;

        color: #788397;

        font-size: 12px;
    }

    .calendar-navigation {
        display: flex;

        gap: 6px;
    }

    .calendar-nav-button {
        width: 32px;
        height: 32px;

        border: 1px solid #dfe7e3;

        border-radius: 8px;

        background: #ffffff;

        color: #465169;

        cursor: pointer;
    }

    .calendar-nav-button:hover {
        border-color: #008f6b;

        color: #008f6b;
    }

    .calendar-nav-button:disabled {
        opacity: 0.4;

        cursor: not-allowed;
    }

    .calendar-grid {
        display: grid;

        grid-template-columns: repeat(7, 1fr);

        gap: 5px;
    }

    .calendar-day-header {
        padding: 6px 2px;

        color: #788397;

        font-size: 11px;
        font-weight: 800;

        text-align: center;
    }

    .calendar-day {
        width: 100%;
        min-height: 36px;

        padding: 0;

        border: 1px solid transparent;

        border-radius: 8px;

        background: #ffffff;

        color: #465169;

        font-size: 12px;

        cursor: pointer;
    }

    .calendar-day:hover {
        border-color: #b9dacc;

        background: #f3f9f6;
    }

    .calendar-day.selected {
        border-color: #008f6b;

        background: #008f6b;

        color: #ffffff;

        font-weight: 800;
    }

    .calendar-day.disabled {
        color: #bcc5c1;

        background: #fafcfc;

        cursor: not-allowed;
    }

    .calendar-empty {
        min-height: 36px;
    }

    .calendar-note {
        margin-top: 16px;
        padding-top: 14px;

        border-top: 1px solid #edf1ef;

        color: #687388;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =========================
       FORM
    ========================= */

    .time-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 12px;
    }

    .time-picker {
        position: relative;
    }

    .time-picker-trigger {
        width: 100%;
        min-height: 46px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;

        padding: 11px 13px;

        border: 1px solid #dce5e1;
        border-radius: 10px;

        background: #ffffff;
        color: #101a2e;

        font-size: 13px;
        font-weight: 700;
        text-align: left;

        cursor: pointer;
        transition: 0.2s ease;
    }

    .time-picker-trigger:hover,
    .time-picker-trigger.open {
        border-color: #008f6b;
        box-shadow: 0 0 0 3px rgba(0, 143, 107, 0.08);
    }

    .time-picker-value.placeholder {
        color: #9aa5a1;
        font-weight: 500;
    }

    .time-picker-icon {
        flex-shrink: 0;

        color: #687388;
        font-size: 16px;
        line-height: 1;

        transition: transform 0.2s ease;
    }

    .time-picker-trigger.open .time-picker-icon {
        transform: rotate(180deg);
    }

    .time-picker-panel {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;

        z-index: 50;

        padding: 15px;

        border: 1px solid #dfe7e3;
        border-radius: 14px;

        background: #ffffff;

        box-shadow: 0 16px 35px rgba(20, 40, 30, 0.14);
    }

    .time-picker-panel[hidden] {
        display: none;
    }

    .time-picker-panel-title {
        color: #101a2e;

        font-size: 13px;
        font-weight: 800;
    }

    .time-picker-panel-subtitle {
        margin-top: 2px;

        color: #788397;
        font-size: 11px;
    }

    .time-picker-section-label {
        margin: 14px 0 8px;

        color: #687388;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .time-hour-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 6px;
    }

    .time-picker-value-group {
        display: inline-flex;
        align-items: baseline;
        gap: 6px;
        min-width: 0;
    }

    .time-picker-period {
        color: #687388;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        flex-shrink: 0;
    }

    .time-minute-scroll {
        max-height: 150px;
        overflow-y: auto;
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 6px;
        padding-right: 4px;
    }

    .time-minute-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .time-minute-scroll::-webkit-scrollbar-track {
        background: #f1f5f3;
        border-radius: 10px;
    }

    .time-minute-scroll::-webkit-scrollbar-thumb {
        background: #c4d7d0;
        border-radius: 10px;
    }

    .time-minute-scroll::-webkit-scrollbar-thumb:hover {
        background: #9bbbae;
    }

    .time-option {
        min-height: 34px;

        padding: 6px 4px;

        border: 1px solid #e0e7e4;
        border-radius: 8px;

        background: #ffffff;
        color: #465169;

        font-size: 12px;
        font-weight: 700;

        cursor: pointer;
        transition: 0.15s ease;
    }

    .time-option:hover {
        border-color: #9bcdbd;
        background: #f3f9f6;
        color: #008f6b;
    }

    .time-option.selected {
        border-color: #008f6b;
        background: #008f6b;
        color: #ffffff;
    }

    .form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;

        margin-bottom: 7px;

        color: #26324a;

        font-size: 13px;
        font-weight: 800;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;

        padding: 12px 13px;

        border: 1px solid #dce5e1;

        border-radius: 10px;

        outline: none;

        background: #ffffff;

        color: #101a2e;

        font-size: 13px;
    }

    .form-group textarea {
        resize: vertical;

        line-height: 1.6;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #008f6b;
    }

    .form-group input[readonly] {
        background: #f5f7f7;

        color: #687388;

        cursor: not-allowed;
    }


    /* =========================
       AVAILABILITY
    ========================= */

    .availability-status {
        margin-top: 18px;

        padding: 13px 14px;

        border-radius: 10px;

        font-size: 12px;

        line-height: 1.5;
    }

    .availability-status.neutral {
        border: 1px solid #e2e7e5;

        background: #f5f7f7;

        color: #687388;
    }

    .availability-status.loading {
        border: 1px solid #e2e7e5;

        background: #f5f7f7;

        color: #687388;
    }

    .availability-status.available {
        border: 1px solid #d6eee5;

        background: #eef8f4;

        color: #006e53;

        font-weight: 700;
    }

    .availability-status.unavailable {
        border: 1px solid #f1cccc;

        background: #fff1f1;

        color: #a33a3a;

        font-weight: 700;
    }


    /* =========================
       SELECTION
    ========================= */

    .selection-summary {
        margin-top: 18px;

        padding: 14px;

        border: 1px solid #dcefe6;

        border-radius: 12px;

        background: #f3f9f6;
    }

    .selection-summary-label {
        margin-bottom: 5px;

        color: #008f6b;

        font-size: 11px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .selection-summary-content {
        color: #687388;

        font-size: 13px;

        line-height: 1.7;
    }


    /* =========================
       CHOSEN BOOKING
    ========================= */

    .chosen-booking {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-bottom: 30px;

        padding: 16px;

        border: 1px solid #dcefe6;

        border-radius: 12px;

        background: #f3f9f6;
    }

    .chosen-booking-label {
        margin-bottom: 4px;

        color: #008f6b;

        font-size: 11px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .chosen-booking-value {
        color: #26324a;

        font-size: 13px;

        line-height: 1.7;
    }

    .chosen-booking-value strong {
        color: #101a2e;
    }


    /* =========================
       SECTION TITLE
    ========================= */

    .section-title {
        margin-bottom: 15px;

        padding-bottom: 9px;

        border-bottom: 1px solid #edf1ef;

        color: #008f6b;

        font-size: 12px;
        font-weight: 800;

        text-transform: uppercase;
    }


    /* =========================
       FORM INFO
    ========================= */

    .form-info {
        display: flex;

        flex-direction: column;

        gap: 3px;

        margin-top: 25px;

        padding: 14px;

        border: 1px solid #d6eee5;

        border-radius: 12px;

        background: #eef8f4;

        color: #42685d;

        font-size: 12px;

        line-height: 1.6;
    }

    .form-info strong {
        color: #007754;
    }


    /* =========================
       SUMMARY
    ========================= */

    .summary-section {
        padding: 20px 0;

        border-top: 1px solid #edf1ef;
    }

    .summary-section:first-of-type {
        padding-top: 0;

        border-top: none;
    }

    .summary-section-title {
        margin-bottom: 12px;

        color: #008f6b;

        font-size: 12px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .summary-row {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 9px 0;
    }

    .summary-row span {
        color: #788397;

        font-size: 13px;
    }

    .summary-row strong {
        color: #101a2e;

        font-size: 13px;

        text-align: right;

        overflow-wrap: anywhere;
    }

    .summary-row.vertical {
        display: block;
    }

    .summary-row.vertical span {
        display: block;

        margin-bottom: 7px;
    }

    .summary-row.vertical strong {
        display: block;

        text-align: left;
    }

    .summary-description {
        color: #465169;

        font-size: 13px;

        line-height: 1.7;

        white-space: pre-line;

        overflow-wrap: anywhere;
    }

    .summary-status {
        color: #007754 !important;
    }


    /* =========================
       ACTION
    ========================= */

    .booking-footer {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 20px;

        margin-top: 22px;

        padding: 20px 25px;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        background: #ffffff;
    }

    .booking-footer-title {
        margin-bottom: 4px;

        color: #101a2e;

        font-size: 14px;

        font-weight: 800;
    }

    .booking-footer-text {
        color: #788397;

        font-size: 12px;
    }

    .booking-footer .btn:disabled {
        opacity: 0.5;

        cursor: not-allowed;
    }

    .summary-actions {
        display: flex;

        align-items: center;
        justify-content: flex-end;

        gap: 10px;

        margin-top: 20px;
        padding-top: 20px;

        border-top: 1px solid #edf1ef;
    }

    .btn-danger {
        border-color: #efcccc;

        background: #ffffff;

        color: #a33a3a;
    }

    .btn-danger:hover {
        border-color: #dca8a8;

        background: #fff5f5;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .booking-grid {
            grid-template-columns: 1fr;
        }

        .booking-steps {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 700px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .summary-row {
            align-items: flex-start;

            flex-direction: column;

            gap: 3px;
        }

        .summary-row strong {
            text-align: left;
        }

    }


    @media (max-width: 600px) {

        .time-grid {
            grid-template-columns: 1fr;
        }

        .booking-footer {
            flex-direction: column;

            align-items: stretch;
        }

        .booking-footer .btn {
            width: 100%;
        }

        .room-card-main {
            flex-direction: column;
        }

        .chosen-booking {
            align-items: stretch;

            flex-direction: column;
        }

        .chosen-booking .btn {
            width: 100%;
        }

        .summary-actions {
            flex-direction: column;
        }

        .summary-actions .btn {
            width: 100%;
        }

    }

</style>

@endpush


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | STATE
    |--------------------------------------------------------------------------
    */

    let selectedRoom = null;

    let selectedDate = null;

    let availabilityAvailable = false;

    let currentStep = 1;


    /*
    |--------------------------------------------------------------------------
    | ELEMENTS
    |--------------------------------------------------------------------------
    */

    const step1 =
        document.getElementById('booking-step-1');

    const step2 =
        document.getElementById('booking-step-2');

    const step3 =
        document.getElementById('booking-step-3');


    const indicator1 =
        document.getElementById('step-indicator-1');

    const indicator2 =
        document.getElementById('step-indicator-2');

    const indicator3 =
        document.getElementById('step-indicator-3');


    /*
    |--------------------------------------------------------------------------
    | ROOM SELECTION
    |--------------------------------------------------------------------------
    */

    const roomCards =
        document.querySelectorAll('.room-card');


    roomCards.forEach(function (card) {

        card.addEventListener('click', function () {

            roomCards.forEach(function (item) {

                item.classList.remove(
                    'selected'
                );

            });


            card.classList.add(
                'selected'
            );


            selectedRoom = {

                id:
                    card.dataset.roomId,

                name:
                    card.dataset.roomName,

                capacity:
                    card.dataset.roomCapacity

            };


            resetAvailability();

            updateSelectionSummary();

            checkAvailability();

        });

    });


    /*
    |--------------------------------------------------------------------------
    | CALENDAR
    |--------------------------------------------------------------------------
    */

    const calendar =
        document.getElementById('calendar');

    const calendarTitle =
        document.getElementById('calendar-title');

    const prevMonth =
        document.getElementById('prev-month');

    const nextMonth =
        document.getElementById('next-month');


    const today =
        new Date();


    const todayOnly =
        new Date(
            today.getFullYear(),
            today.getMonth(),
            today.getDate()
        );


    let calendarMonth =
        new Date(
            today.getFullYear(),
            today.getMonth(),
            1
        );


    const monthNames = [

        'Januari',

        'Februari',

        'Maret',

        'April',

        'Mei',

        'Juni',

        'Juli',

        'Agustus',

        'September',

        'Oktober',

        'November',

        'Desember'

    ];


    const dayNames = [

        'Sn',

        'Sl',

        'Rb',

        'Km',

        'Jm',

        'Sb',

        'Mg'

    ];


    function formatDate(date) {

        const year =
            date.getFullYear();


        const month =
            String(
                date.getMonth() + 1
            )
            .padStart(
                2,
                '0'
            );


        const day =
            String(
                date.getDate()
            )
            .padStart(
                2,
                '0'
            );


        return (
            year
            + '-'
            + month
            + '-'
            + day
        );

    }


    function renderCalendar() {

        calendar.innerHTML = '';


        calendarTitle.textContent =
            monthNames[
                calendarMonth.getMonth()
            ]
            + ' '
            + calendarMonth.getFullYear();


        const currentMonthStart =
            new Date(
                todayOnly.getFullYear(),
                todayOnly.getMonth(),
                1
            );


        prevMonth.disabled =
            calendarMonth <= currentMonthStart;


        /*
        |--------------------------------------------------------------------------
        | DAY NAMES
        |--------------------------------------------------------------------------
        */

        dayNames.forEach(function (dayName) {

            const header =
                document.createElement(
                    'div'
                );


            header.className =
                'calendar-day-header';


            header.textContent =
                dayName;


            calendar.appendChild(
                header
            );

        });


        /*
        |--------------------------------------------------------------------------
        | STARTING DAY
        |--------------------------------------------------------------------------
        */

        const firstDay =
            new Date(
                calendarMonth.getFullYear(),
                calendarMonth.getMonth(),
                1
            );


        let startingDay =
            firstDay.getDay();


        /*
        * Javascript:
        * Minggu = 0
        * Senin = 1
        *
        * Ubah menjadi:
        * Senin = 0
        * Minggu = 6
        */

        startingDay =
            startingDay === 0
                ? 6
                : startingDay - 1;


        /*
        |--------------------------------------------------------------------------
        | EMPTY CELLS
        |--------------------------------------------------------------------------
        */

        for (
            let index = 0;
            index < startingDay;
            index++
        ) {

            const empty =
                document.createElement(
                    'div'
                );


            empty.className =
                'calendar-empty';


            calendar.appendChild(
                empty
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DAYS
        |--------------------------------------------------------------------------
        */

        const daysInMonth =
            new Date(
                calendarMonth.getFullYear(),
                calendarMonth.getMonth() + 1,
                0
            ).getDate();


        for (
            let day = 1;
            day <= daysInMonth;
            day++
        ) {

            const button =
                document.createElement(
                    'button'
                );


            button.type =
                'button';


            button.className =
                'calendar-day';


            button.textContent =
                day;


            const currentDate =
                new Date(
                    calendarMonth.getFullYear(),
                    calendarMonth.getMonth(),
                    day
                );


            const dateString =
                formatDate(
                    currentDate
                );


            /*
            |--------------------------------------------------------------------------
            | PAST DATE
            |--------------------------------------------------------------------------
            */

            if (
                currentDate < todayOnly
            ) {

                button.disabled =
                    true;


                button.classList.add(
                    'disabled'
                );

            } else {

                /*
                |--------------------------------------------------------------------------
                | SELECTED DATE
                |--------------------------------------------------------------------------
                */

                if (
                    selectedDate ===
                    dateString
                ) {

                    button.classList.add(
                        'selected'
                    );

                }


                button.addEventListener(
                    'click',
                    function () {

                        document
                            .querySelectorAll(
                                '.calendar-day'
                            )
                            .forEach(
                                function (item) {

                                    item.classList.remove(
                                        'selected'
                                    );

                                }
                            );


                        button.classList.add(
                            'selected'
                        );


                        selectedDate =
                            dateString;


                        resetAvailability();

                        updateSelectionSummary();

                        checkAvailability();

                    }
                );

            }


            calendar.appendChild(
                button
            );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | MONTH NAVIGATION
    |--------------------------------------------------------------------------
    */

    prevMonth.addEventListener(
        'click',
        function () {

            const currentMonthStart =
                new Date(
                    todayOnly.getFullYear(),
                    todayOnly.getMonth(),
                    1
                );


            if (
                calendarMonth <=
                currentMonthStart
            ) {

                return;

            }


            calendarMonth.setMonth(
                calendarMonth.getMonth() - 1
            );


            renderCalendar();

        }
    );


    nextMonth.addEventListener(
        'click',
        function () {

            calendarMonth.setMonth(
                calendarMonth.getMonth() + 1
            );


            renderCalendar();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | TIME PICKER
    |--------------------------------------------------------------------------
    */

    const startTime =
        document.getElementById(
            'start_time'
        );


    const endTime =
        document.getElementById(
            'end_time'
        );


    const startTimePeriod =
        document.getElementById(
            'start-time-period'
        );


    const endTimePeriod =
        document.getElementById(
            'end-time-period'
        );


    function setupTimePicker({
        input,
        trigger,
        panel,
        label,
        period
    }) {

        let selectedHour = '';
        let selectedMinute = '';


        function syncSelectedButtons() {

            panel
                .querySelectorAll('[data-hour]')
                .forEach(
                    function (button) {

                        button.classList.toggle(
                            'selected',
                            button.dataset.hour ===
                                selectedHour
                        );

                    }
                );


            panel
                .querySelectorAll('[data-minute]')
                .forEach(
                    function (button) {

                        button.classList.toggle(
                            'selected',
                            button.dataset.minute ===
                                selectedMinute
                        );

                    }
                );

        }


        function openPicker() {

            document
                .querySelectorAll('.time-picker-panel')
                .forEach(
                    function (otherPanel) {

                        if (otherPanel !== panel) {
                            otherPanel.hidden = true;
                        }

                    }
                );


            document
                .querySelectorAll('.time-picker-trigger')
                .forEach(
                    function (otherTrigger) {

                        if (otherTrigger !== trigger) {
                            otherTrigger.classList.remove('open');
                            otherTrigger.setAttribute(
                                'aria-expanded',
                                'false'
                            );
                        }

                    }
                );


            panel.hidden = false;
            trigger.classList.add('open');
            trigger.setAttribute(
                'aria-expanded',
                'true'
            );

            syncSelectedButtons();

        }


        function closePicker() {

            panel.hidden = true;
            trigger.classList.remove('open');
            trigger.setAttribute(
                'aria-expanded',
                'false'
            );

        }


        trigger.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                if (panel.hidden) {
                    openPicker();
                } else {
                    closePicker();
                }

            }
        );


        panel
            .querySelectorAll('[data-hour]')
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            selectedHour =
                                button.dataset.hour;

                            syncSelectedButtons();

                        }
                    );

                }
            );


        panel
            .querySelectorAll('[data-minute]')
            .forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            selectedMinute =
                                button.dataset.minute;


                            if (
                                selectedHour === ''
                            ) {

                                return;

                            }


                            input.value =
                                selectedHour
                                + ':'
                                + selectedMinute;


                            const hourNumber =
                                parseInt(
                                    selectedHour,
                                    10
                                );


                            let displayHour =
                                hourNumber % 12;


                            if (
                                displayHour === 0
                            ) {

                                displayHour = 12;

                            }


                            const displayTime =
                                String(
                                    displayHour
                                ).padStart(
                                    2,
                                    '0'
                                )
                                + ':'
                                + selectedMinute;


                            const displayPeriod =
                                hourNumber >= 12
                                    ? 'PM'
                                    : 'AM';


                            label.textContent =
                                displayTime;


                            period.textContent =
                                displayPeriod;


                            label.classList.remove(
                                'placeholder'
                            );


                            input.dispatchEvent(
                                new Event(
                                    'change',
                                    {
                                        bubbles: true
                                    }
                                )
                            );


                            syncSelectedButtons();

                            closePicker();

                        }
                    );

                }
            );


        return {
            syncSelectedButtons
        };

    }


    setupTimePicker({
        input: startTime,
        trigger: document.getElementById(
            'start-time-trigger'
        ),
        panel: document.getElementById(
            'start-time-panel'
        ),
        label: document.getElementById(
            'start-time-label'
        ),
        period: startTimePeriod
    });


    setupTimePicker({
        input: endTime,
        trigger: document.getElementById(
            'end-time-trigger'
        ),
        panel: document.getElementById(
            'end-time-panel'
        ),
        label: document.getElementById(
            'end-time-label'
        ),
        period: endTimePeriod
    });


    startTime.addEventListener(
        'change',
        function () {

            validateTime();

        }
    );


    endTime.addEventListener(
        'change',
        function () {

            validateTime();

        }
    );


    function validateTime() {

        endTime.setCustomValidity(
            ''
        );


        if (
            startTime.value &&
            endTime.value
        ) {

            if (
                endTime.value <=
                startTime.value
            ) {

                endTime.setCustomValidity(
                    'Jam selesai harus lebih besar dari jam mulai.'
                );

            }

        }


        resetAvailability();

        updateSelectionSummary();

        checkAvailability();

    }


    document.addEventListener(
        'click',
        function (event) {

            if (
                !event.target.closest('[data-time-picker]')
            ) {

                document
                    .querySelectorAll('.time-picker-panel')
                    .forEach(
                        function (panel) {
                            panel.hidden = true;
                        }
                    );

                document
                    .querySelectorAll('.time-picker-trigger')
                    .forEach(
                        function (trigger) {

                            trigger.classList.remove('open');
                            trigger.setAttribute(
                                'aria-expanded',
                                'false'
                            );

                        }
                    );

            }

        }
    );


    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key !== 'Escape') {
                return;
            }

            document
                .querySelectorAll('.time-picker-panel')
                .forEach(
                    function (panel) {
                        panel.hidden = true;
                    }
                );

            document
                .querySelectorAll('.time-picker-trigger')
                .forEach(
                    function (trigger) {

                        trigger.classList.remove('open');
                        trigger.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }
                );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | AVAILABILITY
    |--------------------------------------------------------------------------
    */

    const availabilityStatus =
        document.getElementById(
            'availability-status'
        );


    async function checkAvailability() {

        if (
            !selectedRoom ||
            !selectedDate ||
            !startTime.value ||
            !endTime.value
        ) {

            return;

        }


        if (
            endTime.value <=
            startTime.value
        ) {

            availabilityAvailable =
                false;


            availabilityStatus.className =
                'availability-status unavailable';


            availabilityStatus.textContent =
                'Jam selesai harus lebih besar dari jam mulai.';


            updateContinueButton();

            return;

        }


        availabilityStatus.className =
            'availability-status loading';


        availabilityStatus.textContent =
            'Sedang memeriksa ketersediaan ruangan...';


        try {

            const response =
                await fetch(
                    '{{ route('booking.checkAvailability') }}',
                    {

                        method:
                            'POST',

                        headers: {

                            'Content-Type':
                                'application/json',

                            'Accept':
                                'application/json',

                            'X-CSRF-TOKEN':
                                '{{ csrf_token() }}'

                        },

                        body:
                            JSON.stringify({

                                room_id:
                                    selectedRoom.id,

                                date:
                                    selectedDate,

                                start_time:
                                    startTime.value,

                                end_time:
                                    endTime.value

                            })

                    }
                );


            const data =
                await response.json();


            if (
                !response.ok
            ) {

                throw new Error(
                    data.message
                    ||
                    'Gagal memeriksa ketersediaan.'
                );

            }


            availabilityAvailable =
                data.available === true;


            if (
                availabilityAvailable
            ) {

                availabilityStatus.className =
                    'availability-status available';


                availabilityStatus.textContent =
                    '✓ '
                    + data.message;

            } else {

                availabilityStatus.className =
                    'availability-status unavailable';


                availabilityStatus.textContent =
                    '✕ '
                    + data.message;

            }


            updateContinueButton();

        } catch (error) {

            availabilityAvailable =
                false;


            availabilityStatus.className =
                'availability-status unavailable';


            availabilityStatus.textContent =
                'Gagal memeriksa ketersediaan. Silakan coba lagi.';


            updateContinueButton();


            console.error(
                error
            );

        }

    }


    function resetAvailability() {

        availabilityAvailable =
            false;


        availabilityStatus.className =
            'availability-status neutral';


        availabilityStatus.textContent =
            'Pilih ruangan, tanggal, dan waktu terlebih dahulu.';


        updateContinueButton();

    }


    /*
    |--------------------------------------------------------------------------
    | STEP 1 SUMMARY
    |--------------------------------------------------------------------------
    */

    const bookingSummary =
        document.getElementById(
            'booking-summary'
        );


    function updateSelectionSummary() {

        const parts = [];


        if (
            selectedRoom
        ) {

            parts.push(
                '<strong>'
                +
                escapeHtml(
                    selectedRoom.name
                )
                +
                '</strong>'
            );

        }


        if (
            selectedDate
        ) {

            const dateObject =
                new Date(
                    selectedDate
                    + 'T00:00:00'
                );


            const readableDate =
                dateObject.toLocaleDateString(
                    'id-ID',
                    {

                        weekday:
                            'long',

                        day:
                            'numeric',

                        month:
                            'long',

                        year:
                            'numeric'

                    }
                );


            parts.push(
                escapeHtml(
                    readableDate
                )
            );

        }


        if (
            startTime.value &&
            endTime.value &&
            endTime.value >
            startTime.value
        ) {

            parts.push(
                escapeHtml(
                    startTime.value
                    +
                    ' - '
                    +
                    endTime.value
                )
            );

        }


        if (
            parts.length === 0
        ) {

            bookingSummary.textContent =
                'Belum ada pilihan.';

        } else {

            bookingSummary.innerHTML =
                parts.join(
                    '<br>'
                );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | CONTINUE BUTTON
    |--------------------------------------------------------------------------
    */

    const continueButton =
        document.getElementById(
            'continue-button'
        );


    function updateContinueButton() {

        const ready =
            selectedRoom &&
            selectedDate &&
            startTime.value &&
            endTime.value &&
            endTime.value >
            startTime.value &&
            availabilityAvailable;


        continueButton.disabled =
            !ready;

    }


    continueButton.addEventListener(
        'click',
        function () {

            if (
                continueButton.disabled
            ) {

                return;

            }


            showStep(
                2
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | STEP 2
    |--------------------------------------------------------------------------
    */

    const chosenBookingSummary =
        document.getElementById(
            'chosen-booking-summary'
        );


    function updateChosenBooking() {

        if (
            !selectedRoom ||
            !selectedDate
        ) {

            return;

        }


        const dateObject =
            new Date(
                selectedDate
                + 'T00:00:00'
            );


        const readableDate =
            dateObject.toLocaleDateString(
                'id-ID',
                {

                    weekday:
                        'long',

                    day:
                        'numeric',

                    month:
                        'long',

                    year:
                        'numeric'

                }
            );


        chosenBookingSummary.innerHTML =
            '<strong>'
            +
            escapeHtml(
                selectedRoom.name
            )
            +
            '</strong><br>'
            +
            escapeHtml(
                readableDate
            )
            +
            '<br>'
            +
            escapeHtml(
                startTime.value
                +
                ' - '
                +
                endTime.value
            );

    }


    const changeScheduleButton =
        document.getElementById(
            'change-schedule-button'
        );


    changeScheduleButton.addEventListener(
        'click',
        function () {

            showStep(
                1
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | FORM FIELDS
    |--------------------------------------------------------------------------
    */

    const borrowerName =
        document.getElementById(
            'borrower_name'
        );


    const borrowerEmail =
        document.getElementById(
            'borrower_email'
        );


    const organization =
        document.getElementById(
            'organization'
        );


    const phone =
        document.getElementById(
            'phone'
        );


    const eventName =
        document.getElementById(
            'event_name'
        );


    const notes =
        document.getElementById(
            'notes'
        );


    /*
    |--------------------------------------------------------------------------
    | REVIEW BUTTON
    |--------------------------------------------------------------------------
    */

    const reviewButton =
        document.getElementById(
            'review-button'
        );


    reviewButton.addEventListener(
        'click',
        function () {

            const fields = [

                {
                    element:
                        borrowerName,

                    message:
                        'Nama peminjam wajib diisi.'
                },

                {
                    element:
                        organization,

                    message:
                        'Instansi / organisasi wajib diisi.'
                },

                {
                    element:
                        phone,

                    message:
                        'Nomor HP wajib diisi.'
                },

                {
                    element:
                        eventName,

                    message:
                        'Nama kegiatan wajib diisi.'
                },

                {
                    element:
                        notes,

                    message:
                        'Keperluan peminjaman wajib diisi.'
                }

            ];


            for (
                const field of fields
            ) {

                if (
                    !field.element.value.trim()
                ) {

                    field.element.focus();


                    alert(
                        field.message
                    );


                    return;

                }

            }


            updateChosenBooking();

            updateFinalSummary();

            showStep(
                3
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | FINAL SUMMARY
    |--------------------------------------------------------------------------
    */

    function updateFinalSummary() {

        const summaryRoom =
            document.getElementById(
                'summary-room'
            );


        const summaryDate =
            document.getElementById(
                'summary-date'
            );


        const summaryTime =
            document.getElementById(
                'summary-time'
            );


        const summaryAvailability =
            document.getElementById(
                'summary-availability'
            );


        const summaryBorrower =
            document.getElementById(
                'summary-borrower'
            );


        const summaryEmail =
            document.getElementById(
                'summary-email'
            );


        const summaryOrganization =
            document.getElementById(
                'summary-organization'
            );


        const summaryPhone =
            document.getElementById(
                'summary-phone'
            );


        const summaryEvent =
            document.getElementById(
                'summary-event'
            );


        const summaryNotes =
            document.getElementById(
                'summary-notes'
            );


        const dateObject =
            new Date(
                selectedDate
                +
                'T00:00:00'
            );


        const readableDate =
            dateObject.toLocaleDateString(
                'id-ID',
                {

                    weekday:
                        'long',

                    day:
                        'numeric',

                    month:
                        'long',

                    year:
                        'numeric'

                }
            );


        summaryRoom.textContent =
            selectedRoom.name;


        summaryDate.textContent =
            readableDate;


        summaryTime.textContent =
            startTime.value
            +
            ' - '
            +
            endTime.value;


        summaryAvailability.textContent =
            availabilityAvailable
                ? 'Tersedia'
                : 'Tidak tersedia';


        summaryBorrower.textContent =
            borrowerName.value;


        summaryEmail.textContent =
            borrowerEmail.value;


        summaryOrganization.textContent =
            organization.value;


        summaryPhone.textContent =
            phone.value;


        summaryEvent.textContent =
            eventName.value;


        summaryNotes.textContent =
            notes.value;

    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    const editSummaryButton =
        document.getElementById(
            'edit-summary-button'
        );


    editSummaryButton.addEventListener(
        'click',
        function () {

            showStep(
                2
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | CANCEL
    |--------------------------------------------------------------------------
    */

    const cancelBookingButton =
        document.getElementById(
            'cancel-booking-button'
        );


    cancelBookingButton.addEventListener(
        'click',
        function () {

            const confirmed =
                confirm(
                    'Batalkan proses peminjaman dan kembali ke beranda?'
                );


            if (
                !confirmed
            ) {

                return;

            }


            window.location.href =
                '{{ route('customer.dashboard') }}';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | SUBMIT
    |--------------------------------------------------------------------------
    */

    const submitBookingButton =
        document.getElementById(
            'submit-booking-button'
        );


    submitBookingButton.addEventListener(
        'click',
        function () {

            /*
             * Belum disimpan ke database.
             *
             * Endpoint submit akan kita sambungkan
             * pada tahap berikutnya.
             */

            alert(
                'Data pengajuan sudah lengkap. Tahap berikutnya adalah mengirim pengajuan ke sistem.'
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | STEP NAVIGATION
    |--------------------------------------------------------------------------
    */

    function showStep(step) {

        currentStep =
            step;


        step1.style.display =
            step === 1
                ? 'block'
                : 'none';


        step2.style.display =
            step === 2
                ? 'block'
                : 'none';


        step3.style.display =
            step === 3
                ? 'block'
                : 'none';


        /*
        |--------------------------------------------------------------------------
        | INDICATOR
        |--------------------------------------------------------------------------
        */

        indicator1.classList.remove(
            'active',
            'completed'
        );


        indicator2.classList.remove(
            'active',
            'completed'
        );


        indicator3.classList.remove(
            'active',
            'completed'
        );


        if (
            step === 1
        ) {

            indicator1.classList.add(
                'active'
            );

            indicator2.classList.remove(
                'active'
            );

            indicator3.classList.remove(
                'active'
            );

        }


        if (
            step === 2
        ) {

            indicator1.classList.add(
                'completed'
            );

            indicator2.classList.add(
                'active'
            );

        }


        if (
            step === 3
        ) {

            indicator1.classList.add(
                'completed'
            );

            indicator2.classList.add(
                'completed'
            );

            indicator3.classList.add(
                'active'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        if (
            step === 2
        ) {

            updateChosenBooking();

        }


        if (
            step === 3
        ) {

            updateFinalSummary();

        }


        /*
        |--------------------------------------------------------------------------
        | SCROLL TOP
        |--------------------------------------------------------------------------
        */

        window.scrollTo({

            top:
                0,

            behavior:
                'smooth'

        });

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        return String(
            value
        )
            .replace(
                /&/g,
                '&amp;'
            )
            .replace(
                /</g,
                '&lt;'
            )
            .replace(
                />/g,
                '&gt;'
            )
            .replace(
                /"/g,
                '&quot;'
            )
            .replace(
                /'/g,
                '&#039;'
            );

    }


    /*
    |--------------------------------------------------------------------------
    | INITIALIZE
    |--------------------------------------------------------------------------
    */

    renderCalendar();

    updateSelectionSummary();

    resetAvailability();

    showStep(
        1
    );

});

</script>

@endpush

@endsection