@extends('layouts.public')

@section('content')

    <section style="
        padding: 60px 0 80px;
        background: #f7faf9;
    ">
        <div class="container">

            <!-- BREADCRUMB -->
            <div style="
                margin-bottom: 24px;
                font-size: 14px;
                color: #6b7688;
            ">
                <a
                    href="/"
                    style="
                        color: #008f6b;
                        font-weight: 700;
                    "
                >
                    Beranda
                </a>

                <span style="margin: 0 8px;">
                    /
                </span>

                <a
                    href="{{ route('rooms.index') }}"
                    style="
                        color: #008f6b;
                        font-weight: 700;
                    "
                >
                    Ruangan
                </a>

                <span style="margin: 0 8px;">
                    /
                </span>

                <span>
                    {{ $room->name }}
                </span>
            </div>


            <!-- DETAIL RUANGAN -->
            <div style="
                background: #ffffff;
                border: 1px solid #dfe7e3;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 8px 25px rgba(20, 40, 30, 0.05);
                margin-bottom: 50px;
            ">

                <!-- GAMBAR RUANGAN -->
                <div style="
                    height: 300px;
                    background: linear-gradient(
                        135deg,
                        #dcefe9,
                        #f7fbfa
                    );

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    color: #008f6b;
                    font-size: 34px;
                    font-weight: 800;
                ">

                    @if ($room->image)

                        <img
                            src="{{ asset('storage/' . $room->image) }}"
                            alt="{{ $room->name }}"
                            style="
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                            "
                        >

                    @else

                        {{ strtoupper($room->name) }}

                    @endif

                </div>


                <!-- INFORMASI RUANGAN -->
                <div style="
                    padding: 30px;
                ">

                    <div style="
                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;
                        gap: 20px;
                        margin-bottom: 15px;
                    ">

                        <div>

                            <div style="
                                color: #008f6b;
                                font-size: 13px;
                                font-weight: 800;
                                margin-bottom: 6px;
                                text-transform: uppercase;
                            ">
                                Detail Ruangan
                            </div>

                            <h1 style="
                                font-size: 34px;
                                line-height: 1.2;
                                color: #0a1428;
                                margin-bottom: 8px;
                            ">
                                {{ $room->name }}
                            </h1>

                            <div style="
                                color: #667187;
                                font-size: 15px;
                            ">
                                Kapasitas
                                <strong>
                                    {{ $room->capacity ?? '-' }}
                                </strong>
                                orang
                            </div>

                        </div>


                        <span style="
                            display: inline-flex;
                            align-items: center;
                            padding: 7px 12px;
                            border-radius: 999px;
                            background: #ddf8ec;
                            color: #007754;
                            font-size: 12px;
                            font-weight: 800;
                            white-space: nowrap;
                        ">
                            Aktif
                        </span>

                    </div>


                    <p style="
                        color: #687388;
                        font-size: 15px;
                        line-height: 1.8;
                        max-width: 850px;
                        margin-bottom: 25px;
                    ">
                        {{ $room->description ?? 'Belum ada deskripsi untuk ruangan ini.' }}
                    </p>


                    <!-- TOMBOL -->
                    <div style="
                        display: flex;
                        flex-wrap: wrap;
                        gap: 10px;
                    ">

                        <a
                            href="/calendar"
                            class="btn btn-outline"
                        >
                            Lihat Ketersediaan
                        </a>

                        <a
                            href="/login"
                            class="btn btn-primary"
                        >
                            Ajukan Peminjaman
                        </a>

                    </div>

                </div>

            </div>


            <!-- PILIHAN RUANGAN -->
            <div style="
                margin-bottom: 25px;
            ">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    margin-bottom: 6px;
                    text-transform: uppercase;
                ">
                    PILIHAN RUANGAN
                </div>

                <h2 style="
                    font-size: 30px;
                    color: #0a1428;
                    margin-bottom: 8px;
                ">
                    Ruangan Lain
                </h2>

                <p style="
                    color: #677287;
                    font-size: 15px;
                    max-width: 760px;
                ">
                    Pilih ruangan lain untuk melihat detail dan informasi
                    ketersediaannya.
                </p>

            </div>


            <!-- CARD RUANGAN LAIN -->
            @if ($otherRooms->count() > 0)

                <div style="
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                    gap: 20px;
                ">

                    @foreach ($otherRooms as $otherRoom)

                        <a
                            href="{{ route('rooms.show', $otherRoom) }}"
                            style="
                                display: block;
                                background: #ffffff;
                                border: 1px solid #dfe7e3;
                                border-radius: 18px;
                                overflow: hidden;
                                text-decoration: none;
                                color: inherit;
                                box-shadow: 0 7px 22px rgba(20, 40, 30, 0.04);
                                transition:
                                    transform 0.2s ease,
                                    box-shadow 0.2s ease,
                                    border-color 0.2s ease;
                            "
                            onmouseover="
                                this.style.transform='translateY(-4px)';
                                this.style.boxShadow='0 12px 30px rgba(20, 40, 30, 0.09)';
                                this.style.borderColor='#008f6b';
                            "
                            onmouseout="
                                this.style.transform='translateY(0)';
                                this.style.boxShadow='0 7px 22px rgba(20, 40, 30, 0.04)';
                                this.style.borderColor='#dfe7e3';
                            "
                        >

                            <!-- GAMBAR ROOM -->
                            <div style="
                                height: 180px;
                                background: linear-gradient(
                                    135deg,
                                    #dcefe9,
                                    #f7fbfa
                                );

                                display: flex;
                                align-items: center;
                                justify-content: center;

                                color: #008f6b;
                                font-size: 24px;
                                font-weight: 800;
                            ">

                                @if ($otherRoom->image)

                                    <img
                                        src="{{ asset('storage/' . $otherRoom->image) }}"
                                        alt="{{ $otherRoom->name }}"
                                        style="
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                        "
                                    >

                                @else

                                    {{ strtoupper($otherRoom->name) }}

                                @endif

                            </div>


                            <!-- INFORMASI ROOM -->
                            <div style="
                                padding: 20px;
                            ">

                                <div style="
                                    display: flex;
                                    align-items: flex-start;
                                    justify-content: space-between;
                                    gap: 10px;
                                    margin-bottom: 10px;
                                ">

                                    <h3 style="
                                        margin: 0;
                                        font-size: 19px;
                                        line-height: 1.3;
                                        color: #101a2e;
                                    ">
                                        {{ $otherRoom->name }}
                                    </h3>

                                    <span style="
                                        display: inline-flex;
                                        align-items: center;
                                        padding: 5px 9px;
                                        border-radius: 999px;
                                        background: #ddf8ec;
                                        color: #007754;
                                        font-size: 11px;
                                        font-weight: 800;
                                        white-space: nowrap;
                                    ">
                                        Aktif
                                    </span>

                                </div>


                                <div style="
                                    color: #667187;
                                    font-size: 13px;
                                    margin-bottom: 10px;
                                ">
                                    Kapasitas
                                    {{ $otherRoom->capacity ?? '-' }}
                                    orang
                                </div>


                                <div style="
                                    color: #536076;
                                    font-size: 13px;
                                    font-weight: 700;
                                    margin-bottom: 16px;
                                ">
                                    {{ $otherRoom->units_count }}
                                    Unit aktif
                                </div>


                                <div style="
                                    padding-top: 14px;
                                    border-top: 1px solid #edf1ef;

                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                ">

                                    <span style="
                                        color: #007754;
                                        font-size: 13px;
                                        font-weight: 700;
                                    ">
                                        Lihat detail
                                    </span>

                                    <span style="
                                        color: #008f6b;
                                        font-size: 18px;
                                        font-weight: 800;
                                    ">
                                        →
                                    </span>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div style="
                    background: #ffffff;
                    border: 1px solid #dfe7e3;
                    border-radius: 16px;
                    padding: 45px 30px;
                    text-align: center;
                ">

                    <h3 style="
                        font-size: 21px;
                        color: #101a2e;
                        margin-bottom: 8px;
                    ">
                        Belum ada ruangan lain
                    </h3>

                    <p style="
                        color: #697489;
                        font-size: 14px;
                        margin: 0;
                    ">
                        Saat ini belum ada ruangan lain yang aktif.
                    </p>

                </div>

            @endif


            <!-- INFORMASI -->
            <div style="
                margin-top: 40px;
                background: #eef8f4;
                border: 1px solid #d6eee5;
                border-radius: 16px;
                padding: 24px;
            ">

                <div style="
                    color: #075e49;
                    font-weight: 800;
                    margin-bottom: 8px;
                ">
                    Informasi Pengunjung
                </div>

                <p style="
                    color: #42685d;
                    font-size: 14px;
                    line-height: 1.7;
                    margin: 0;
                ">
                    Pengunjung dapat melihat informasi umum ruangan
                    tanpa login. Informasi pemohon dan detail pengajuan
                    tidak ditampilkan. Untuk melakukan peminjaman,
                    pengguna harus login terlebih dahulu.
                </p>

            </div>

        </div>
    </section>


    <!-- RESPONSIVE -->
    <style>

        @media (max-width: 900px) {

            .container > div[style*="repeat(3"] {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

        }


        @media (max-width: 600px) {

            .container {
                width: min(100% - 24px, 1180px);
            }

            .container > div[style*="repeat(3"] {
                grid-template-columns: 1fr !important;
            }

        }

    </style>

@endsection