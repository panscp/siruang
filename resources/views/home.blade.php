@extends('layouts.public')

@section('content')

    <!-- =========================
         HERO
    ========================== -->

    <section style="
        padding: 80px 0;
        background: linear-gradient(135deg, #eefaf6 0%, #ffffff 65%, #f6fbf9 100%);
    ">
        <div class="container" style="
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            align-items: center;
            gap: 60px;
        ">

            <div>

                <div style="
                    color: #008f6b;
                    font-size: 14px;
                    font-weight: 800;
                    margin-bottom: 12px;
                ">
                    SISTEM INFORMASI PEMINJAMAN RUANG
                </div>


                <h1 style="
                    font-size: clamp(40px, 5vw, 62px);
                    line-height: 1.08;
                    letter-spacing: -1.5px;
                    color: #071126;
                    margin-bottom: 20px;
                ">
                    Pilih ruang yang sesuai untuk kegiatan Anda.
                </h1>


                <p style="
                    max-width: 650px;
                    color: #59657a;
                    font-size: 17px;
                    margin-bottom: 30px;
                ">
                    Lihat pilihan ruangan, tentukan jadwal, dan ajukan peminjaman
                    sesuai kebutuhan kegiatan Anda.
                </p>


                <div style="
                    display: flex;
                    flex-wrap: wrap;
                    gap: 12px;
                ">

                    <a href="/rooms" class="btn btn-primary">
                        Lihat Ruangan
                    </a>

                    <a href="/login" class="btn btn-outline">
                        Ajukan Peminjaman
                    </a>

                </div>

            </div>


            <!-- =========================
                 HERO INFO CARD
            ========================== -->

            <div style="
                background: #ffffff;
                border: 1px solid #dde8e3;
                border-radius: 20px;
                padding: 28px;
                box-shadow: 0 14px 35px rgba(16, 42, 32, 0.08);
            ">

                <div style="
                    color: #008f6b;
                    font-size: 14px;
                    font-weight: 800;
                    margin-bottom: 6px;
                ">
                    SIRUANG
                </div>


                <h2 style="
                    font-size: 27px;
                    line-height: 1.2;
                    margin-bottom: 20px;
                    color: #101a2e;
                ">
                    Peminjaman ruang yang lebih mudah
                </h2>


                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px 0;
                    border-bottom: 1px solid #edf1ef;
                ">

                    <span style="font-weight: 700;">
                        4 Ruangan
                    </span>

                    <span style="
                        background: #ddf8ec;
                        color: #007754;
                        padding: 6px 10px;
                        border-radius: 999px;
                        font-size: 12px;
                        font-weight: 800;
                    ">
                        Tersedia
                    </span>

                </div>


                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px 0;
                    border-bottom: 1px solid #edf1ef;
                ">

                    <span style="font-weight: 700;">
                        Pilihan Unit
                    </span>

                    <span style="
                        background: #ddf8ec;
                        color: #007754;
                        padding: 6px 10px;
                        border-radius: 999px;
                        font-size: 12px;
                        font-weight: 800;
                    ">
                        Aktif
                    </span>

                </div>


                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px 0;
                    border-bottom: 1px solid #edf1ef;
                ">

                    <span style="font-weight: 700;">
                        Kalender
                    </span>

                    <span style="
                        background: #ddf8ec;
                        color: #007754;
                        padding: 6px 10px;
                        border-radius: 999px;
                        font-size: 12px;
                        font-weight: 800;
                    ">
                        Tersedia
                    </span>

                </div>


                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px 0 0;
                ">

                    <span style="font-weight: 700;">
                        Status Pengajuan
                    </span>

                    <span style="
                        background: #ddf8ec;
                        color: #007754;
                        padding: 6px 10px;
                        border-radius: 999px;
                        font-size: 12px;
                        font-weight: 800;
                    ">
                        Dapat dipantau
                    </span>

                </div>

            </div>

        </div>
    </section>


    <!-- =========================
         PILIHAN RUANGAN
    ========================== -->

    <section style="
        padding: 70px 0;
        background: #ffffff;
    ">

        <div class="container">

            <div style="margin-bottom: 30px;">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    margin-bottom: 5px;
                ">
                    RUANGAN SIRUANG
                </div>


                <h2 style="
                    font-size: 32px;
                    color: #0a1428;
                    margin-bottom: 6px;
                ">
                    Pilihan Ruang
                </h2>


                <p style="
                    color: #677287;
                    max-width: 750px;
                ">
                    Pilih ruangan sesuai kebutuhan kegiatan Anda.
                    Setiap ruangan memiliki kapasitas dan karakteristik
                    yang dapat disesuaikan dengan kebutuhan peminjaman.
                </p>

            </div>


            <div style="
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            ">

                @php

                    $rooms = [

                        [
                            'name' => 'Aula Utama',
                            'capacity' => '100 orang',
                            'units' => '3 Unit',
                            'description' => 'Ruang utama untuk rapat, seminar, pelatihan, dan kegiatan berskala besar.',
                        ],

                        [
                            'name' => 'Ruang Rapat 1',
                            'capacity' => '30 orang',
                            'units' => '2 Unit',
                            'description' => 'Ruang rapat untuk koordinasi, diskusi, dan pertemuan internal.',
                        ],

                        [
                            'name' => 'Ruang Rapat 2',
                            'capacity' => '20 orang',
                            'units' => '2 Unit',
                            'description' => 'Ruang untuk rapat kecil, diskusi, dan koordinasi internal.',
                        ],

                        [
                            'name' => 'Ruang Diklat',
                            'capacity' => '40 orang',
                            'units' => '3 Unit',
                            'description' => 'Ruang untuk pendidikan, pelatihan, workshop, dan kegiatan sejenis.',
                        ],

                    ];

                @endphp


                @foreach ($rooms as $room)

                    <article style="
                        background: #ffffff;
                        border: 1px solid #dfe7e3;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 8px 25px rgba(20, 40, 30, 0.05);
                    ">


                        <div style="
                            height: 180px;
                            background: linear-gradient(135deg, #dcefe9, #f7fbfa);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #008f6b;
                            font-weight: 800;
                            font-size: 28px;
                        ">
                            {{ strtoupper($room['name']) }}
                        </div>


                        <div style="padding: 20px;">

                            <div style="
                                display: flex;
                                justify-content: space-between;
                                align-items: start;
                                gap: 15px;
                                margin-bottom: 10px;
                            ">

                                <div style="
                                    font-size: 20px;
                                    font-weight: 800;
                                    color: #101a2e;
                                ">
                                    {{ $room['name'] }}
                                </div>


                                <span style="
                                    background: #ddf8ec;
                                    color: #007754;
                                    padding: 6px 10px;
                                    border-radius: 999px;
                                    font-size: 12px;
                                    font-weight: 800;
                                ">
                                    Aktif
                                </span>

                            </div>


                            <div style="
                                color: #667187;
                                font-size: 14px;
                                margin-bottom: 12px;
                            ">
                                Kapasitas {{ $room['capacity'] }}
                            </div>


                            <div style="
                                color: #687388;
                                font-size: 14px;
                                margin-bottom: 18px;
                            ">
                                {{ $room['description'] }}
                            </div>


                            <div style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            ">

                                <span style="
                                    color: #536076;
                                    font-size: 13px;
                                    font-weight: 700;
                                ">
                                    {{ $room['units'] }}
                                </span>


                                <a href="/rooms" class="btn btn-primary">
                                    Lihat Detail
                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        </div>

    </section>


    <!-- =========================
         CARA PENGAJUAN
    ========================== -->

    <section style="
        padding: 70px 0;
        background: #f7faf9;
    ">

        <div class="container">

            <div style="margin-bottom: 30px;">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    margin-bottom: 5px;
                ">
                    CARA PENGAJUAN
                </div>


                <h2 style="
                    font-size: 32px;
                    color: #0a1428;
                    margin-bottom: 6px;
                ">
                    Ajukan peminjaman dengan mudah
                </h2>


                <p style="
                    color: #677287;
                    max-width: 750px;
                ">
                    Pilih ruangan, tentukan jadwal, lalu lengkapi data
                    pengajuan sebelum dikirim.
                </p>

            </div>


            <div style="
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            ">


                <!-- STEP 1 -->

                <div style="
                    background: #ffffff;
                    border: 1px solid #e1e8e5;
                    border-radius: 16px;
                    padding: 24px;
                ">

                    <div style="
                        width: 44px;
                        height: 44px;
                        border-radius: 12px;
                        background: #e4f8f1;
                        color: #008f6b;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 900;
                        margin-bottom: 16px;
                    ">
                        1
                    </div>


                    <h3 style="
                        font-size: 18px;
                        margin-bottom: 8px;
                    ">
                        Pilih Ruangan
                    </h3>


                    <p style="
                        font-size: 14px;
                        color: #697489;
                    ">
                        Tentukan ruangan yang sesuai dengan kebutuhan kegiatan.
                    </p>

                </div>


                <!-- STEP 2 -->

                <div style="
                    background: #ffffff;
                    border: 1px solid #e1e8e5;
                    border-radius: 16px;
                    padding: 24px;
                ">

                    <div style="
                        width: 44px;
                        height: 44px;
                        border-radius: 12px;
                        background: #e4f8f1;
                        color: #008f6b;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 900;
                        margin-bottom: 16px;
                    ">
                        2
                    </div>


                    <h3 style="
                        font-size: 18px;
                        margin-bottom: 8px;
                    ">
                        Tentukan Jadwal
                    </h3>


                    <p style="
                        font-size: 14px;
                        color: #697489;
                    ">
                        Pilih tanggal dan waktu yang masih tersedia.
                    </p>

                </div>


                <!-- STEP 3 -->

                <div style="
                    background: #ffffff;
                    border: 1px solid #e1e8e5;
                    border-radius: 16px;
                    padding: 24px;
                ">

                    <div style="
                        width: 44px;
                        height: 44px;
                        border-radius: 12px;
                        background: #e4f8f1;
                        color: #008f6b;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: 900;
                        margin-bottom: 16px;
                    ">
                        3
                    </div>


                    <h3 style="
                        font-size: 18px;
                        margin-bottom: 8px;
                    ">
                        Kirim Pengajuan
                    </h3>


                    <p style="
                        font-size: 14px;
                        color: #697489;
                    ">
                        Lengkapi data yang diperlukan dan kirim pengajuan untuk diproses.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         CTA
    ========================== -->

    <section style="
        padding: 10px 0 70px;
    ">

        <div class="container">

            <div style="
                background: #007f60;
                color: #ffffff;
                border-radius: 20px;
                padding: 38px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 30px;
            ">


                <div>

                    <h2 style="
                        font-size: 30px;
                        margin-bottom: 8px;
                    ">
                        Siap menggunakan ruangan?
                    </h2>


                    <p style="color: #d8f2e9;">
                        Pilih ruangan dan jadwal yang sesuai untuk kegiatan Anda.
                    </p>

                </div>


                <a href="/login" class="btn" style="
                    background: #ffffff;
                    color: #006e53;
                    flex-shrink: 0;
                ">
                    Ajukan Peminjaman
                </a>

            </div>

        </div>

    </section>


@endsection