@extends('layouts.public')

@section('content')

    <section style="
        min-height: calc(100vh - 180px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        background: #f7faf9;
    ">

        <div style="
            width: 100%;
            max-width: 520px;
        ">

            <!-- HEADER -->
            <div style="
                text-align: center;
                margin-bottom: 25px;
            ">

                <div style="
                    width: 58px;
                    height: 58px;
                    margin: 0 auto 16px;
                    border-radius: 14px;
                    background: #008f6b;
                    color: #ffffff;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    font-size: 19px;
                    font-weight: 800;
                ">
                    SR
                </div>

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    margin-bottom: 6px;
                    text-transform: uppercase;
                ">
                    SIRUANG
                </div>

                <h1 style="
                    margin: 0 0 8px;
                    font-size: 32px;
                    line-height: 1.2;
                    color: #0a1428;
                ">
                    Buat akun
                </h1>

                <p style="
                    margin: 0;
                    color: #687388;
                    font-size: 14px;
                ">
                    Daftar untuk dapat mengajukan peminjaman ruang
                    dan memantau pengajuan Anda.
                </p>

            </div>


            <!-- REGISTER CARD -->
            <div style="
                background: #ffffff;
                border: 1px solid #dfe7e3;
                border-radius: 18px;
                padding: 30px;
                box-shadow: 0 10px 30px rgba(20, 40, 30, 0.06);
            ">

                <form method="POST" action="{{ route('register.submit') }}">

                    @csrf

                    <!-- ERROR -->
                    @if ($errors->any())
                        <div style="
                            margin-bottom: 20px;
                            padding: 12px 14px;
                            border-radius: 10px;
                            background: #fff1f1;
                            border: 1px solid #f1cccc;
                            color: #a33a3a;
                            font-size: 12px;
                            line-height: 1.6;
                        ">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif


                    <!-- NAMA -->
                    <div style="margin-bottom: 18px;">

                        <label
                            for="name"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                color: #26324a;
                                font-size: 13px;
                                font-weight: 800;
                            "
                        >
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama lengkap"
                            autocomplete="name"
                            value="{{ old('name') }}"
                            required
                            style="
                                width: 100%;
                                padding: 13px 14px;
                                border: 1px solid #dce5e1;
                                border-radius: 10px;
                                outline: none;
                                font-size: 14px;
                                color: #101a2e;
                                background: #ffffff;
                            "
                        >

                    </div>


                    <!-- EMAIL -->
                    <div style="margin-bottom: 18px;">

                        <label
                            for="email"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                color: #26324a;
                                font-size: 13px;
                                font-weight: 800;
                            "
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email aktif"
                            autocomplete="email"
                            value="{{ old('email') }}"
                            required
                            style="
                                width: 100%;
                                padding: 13px 14px;
                                border: 1px solid #dce5e1;
                                border-radius: 10px;
                                outline: none;
                                font-size: 14px;
                                color: #101a2e;
                                background: #ffffff;
                            "
                        >

                    </div>


                    <!-- PASSWORD -->
                    <div style="margin-bottom: 18px;">

                        <label
                            for="password"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                color: #26324a;
                                font-size: 13px;
                                font-weight: 800;
                            "
                        >
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            required
                            style="
                                width: 100%;
                                padding: 13px 14px;
                                border: 1px solid #dce5e1;
                                border-radius: 10px;
                                outline: none;
                                font-size: 14px;
                                color: #101a2e;
                                background: #ffffff;
                            "
                        >

                    </div>


                    <!-- KONFIRMASI PASSWORD -->
                    <div style="margin-bottom: 20px;">

                        <label
                            for="password_confirmation"
                            style="
                                display: block;
                                margin-bottom: 7px;
                                color: #26324a;
                                font-size: 13px;
                                font-weight: 800;
                            "
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            required
                            style="
                                width: 100%;
                                padding: 13px 14px;
                                border: 1px solid #dce5e1;
                                border-radius: 10px;
                                outline: none;
                                font-size: 14px;
                                color: #101a2e;
                                background: #ffffff;
                            "
                        >

                    </div>


                    <!-- INFO -->
                    <div style="
                        margin-bottom: 22px;
                        padding: 12px 14px;
                        border-radius: 10px;
                        background: #eef8f4;
                        border: 1px solid #d6eee5;
                        color: #42685d;
                        font-size: 12px;
                        line-height: 1.6;
                    ">
                        Setelah akun dibuat, Anda perlu melengkapi
                        data diri sebelum dapat mengajukan peminjaman.
                    </div>


                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="btn btn-primary"
                        style="
                            width: 100%;
                            border: none;
                            padding: 13px 18px;
                        "
                    >
                        Daftar
                    </button>

                </form>


                <!-- LOGIN -->
                <div style="
                    margin-top: 22px;
                    padding-top: 20px;
                    border-top: 1px solid #edf1ef;
                    text-align: center;
                    color: #687388;
                    font-size: 13px;
                ">

                    Sudah memiliki akun?

                    <a
                        href="{{ route('login') }}"
                        style="
                            color: #008f6b;
                            font-weight: 800;
                            text-decoration: none;
                        "
                    >
                        Masuk sekarang
                    </a>

                </div>

            </div>


            <!-- BACK -->
            <div style="
                margin-top: 20px;
                text-align: center;
            ">

                <a
                    href="{{ url('/') }}"
                    style="
                        color: #687388;
                        font-size: 13px;
                        font-weight: 700;
                        text-decoration: none;
                    "
                >
                    ← Kembali ke Beranda
                </a>

            </div>

        </div>

    </section>

@endsection