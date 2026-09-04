@extends('layouts.customer')

@section('content')

<section class="profile-section">

    <div class="container">

        {{-- HEADER --}}
        <div class="page-header">

            <div class="page-eyebrow">
                SIRUANG
            </div>

            <h1>
                Profil Saya
            </h1>

            <p>
                Kelola informasi pribadi yang digunakan dalam pengajuan peminjaman.
            </p>

        </div>


        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        {{-- VALIDATION ERROR --}}
        @if ($errors->any())

            <div class="alert-error">

                <strong>
                    Data belum dapat disimpan.
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

            </div>

        @endif


        <div class="profile-card">

            <div class="profile-card-header">

                <div>

                    <h2>
                        Informasi Akun
                    </h2>

                    <p>
                        Pastikan informasi Anda sudah benar.
                    </p>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('customer.profile.update') }}"
            >

                @csrf
                @method('PUT')


                {{-- NAMA --}}
                <div class="form-section">

                    <div class="section-title">
                        Data Akun
                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="name">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                placeholder="Masukkan nama"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                value="{{ $user->email }}"
                                readonly
                            >

                        </div>

                    </div>

                </div>


                {{-- DATA PROFIL --}}
                <div class="form-section">

                    <div class="section-title">
                        Data Peminjam
                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="organization">
                                Instansi / Organisasi
                            </label>

                            <input
                                type="text"
                                id="organization"
                                name="organization"
                                value="{{ old('organization', $profile?->organization) }}"
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
                                value="{{ old('phone', $profile?->phone) }}"
                                placeholder="Contoh: 081234567890"
                            >

                        </div>

                    </div>

                </div>


                {{-- INFO --}}
                <div class="profile-info">

                    <strong>
                        Informasi
                    </strong>

                    <span>
                        Email akun digunakan untuk proses autentikasi dan
                        tidak dapat diubah melalui halaman ini.
                    </span>

                </div>


                {{-- ACTION --}}
                <div class="profile-actions">

                    <a
                        href="{{ route('customer.dashboard') }}"
                        class="btn btn-outline"
                    >
                        Kembali
                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    .profile-section {
        padding: 45px 20px 70px;

        background: #f7faf9;
    }


    /* =========================
       HEADER
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

        max-width: 700px;

        color: #687388;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================
       ALERT
    ========================== */

    .alert-success,
    .alert-error {
        margin-bottom: 20px;

        padding: 14px 16px;

        border-radius: 12px;

        font-size: 13px;

        line-height: 1.6;
    }


    .alert-success {
        border: 1px solid #d6eee5;

        background: #eef8f4;

        color: #007754;
    }


    .alert-error {
        border: 1px solid #f1cccc;

        background: #fff1f1;

        color: #a33a3a;
    }


    .alert-error strong {
        display: block;

        margin-bottom: 5px;
    }


    .alert-error ul {
        margin: 5px 0 0;

        padding-left: 18px;
    }


    /* =========================
       CARD
    ========================== */

    .profile-card {
        max-width: 900px;

        padding: 26px;

        border: 1px solid #dfe7e3;

        border-radius: 18px;

        background: #ffffff;

        box-shadow:
            0 8px 25px rgba(20, 40, 30, 0.04);
    }


    .profile-card-header {
        margin-bottom: 25px;

        padding-bottom: 18px;

        border-bottom: 1px solid #edf1ef;
    }


    .profile-card-header h2 {
        margin: 0 0 5px;

        color: #101a2e;

        font-size: 20px;
    }


    .profile-card-header p {
        margin: 0;

        color: #788397;

        font-size: 12px;
    }


    /* =========================
       FORM
    ========================== */

    .form-section {
        margin-bottom: 28px;
    }


    .section-title {
        margin-bottom: 16px;

        padding-bottom: 9px;

        border-bottom: 1px solid #edf1ef;

        color: #008f6b;

        font-size: 12px;

        font-weight: 800;

        text-transform: uppercase;
    }


    .form-grid {
        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 18px;
    }


    .form-group {
        min-width: 0;
    }


    .form-group label {
        display: block;

        margin-bottom: 7px;

        color: #26324a;

        font-size: 13px;

        font-weight: 800;
    }


    .form-group input {
        width: 100%;

        padding: 12px 13px;

        border: 1px solid #dce5e1;

        border-radius: 10px;

        outline: none;

        background: #ffffff;

        color: #101a2e;

        font-size: 13px;

        box-sizing: border-box;
    }


    .form-group input:focus {
        border-color: #008f6b;
    }


    .form-group input[readonly] {
        background: #f5f7f7;

        color: #687388;

        cursor: not-allowed;
    }


    /* =========================
       INFO
    ========================== */

    .profile-info {
        display: flex;

        flex-direction: column;

        gap: 3px;

        margin-top: 10px;

        padding: 14px;

        border: 1px solid #d6eee5;

        border-radius: 12px;

        background: #eef8f4;

        color: #42685d;

        font-size: 12px;

        line-height: 1.6;
    }


    .profile-info strong {
        color: #007754;
    }


    /* =========================
       ACTION
    ========================== */

    .profile-actions {
        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

        margin-top: 25px;

        padding-top: 20px;

        border-top: 1px solid #edf1ef;
    }


    /* =========================
       RESPONSIVE
    ========================== */

    @media (max-width: 700px) {

        .form-grid {
            grid-template-columns: 1fr;
        }


        .profile-actions {
            align-items: stretch;

            flex-direction: column;
        }


        .profile-actions .btn {
            width: 100%;
        }

    }


    @media (max-width: 600px) {

        .profile-section {
            padding-left: 15px;
            padding-right: 15px;
        }


        .profile-card {
            padding: 19px;
        }

    }

</style>

@endpush