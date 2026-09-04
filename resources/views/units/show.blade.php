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

                <a
                    href="{{ route('rooms.show', $unit->room) }}"
                    style="
                        color: #008f6b;
                        font-weight: 700;
                    "
                >
                    {{ $unit->room->name }}
                </a>

                <span style="margin: 0 8px;">
                    /
                </span>

                <span>
                    {{ $unit->name }}
                </span>
            </div>


            <!-- UNIT DETAIL -->
            <div style="
                background: #ffffff;
                border: 1px solid #dfe7e3;
                border-radius: 20px;
                padding: 35px;
                box-shadow: 0 8px 25px rgba(20, 40, 30, 0.05);
            ">

                <!-- HEADER -->
                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    gap: 20px;
                    margin-bottom: 25px;
                ">

                    <div>

                        <div style="
                            color: #008f6b;
                            font-size: 13px;
                            font-weight: 800;
                            margin-bottom: 7px;
                            text-transform: uppercase;
                        ">
                            Detail Unit
                        </div>

                        <h1 style="
                            font-size: 38px;
                            line-height: 1.2;
                            color: #0a1428;
                            margin-bottom: 8px;
                        ">
                            {{ $unit->name }}
                        </h1>

                        <div style="
                            color: #687388;
                            font-size: 15px;
                        ">
                            Bagian dari
                            <strong>
                                {{ $unit->room->name }}
                            </strong>
                        </div>

                    </div>


                    <!-- STATUS -->
                    <span style="
                        display: inline-flex;
                        align-items: center;
                        padding: 8px 13px;
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


                <!-- DESCRIPTION -->
                <div style="
                    padding: 25px 0;
                    border-top: 1px solid #edf1ef;
                    border-bottom: 1px solid #edf1ef;
                ">

                    <div style="
                        color: #008f6b;
                        font-size: 13px;
                        font-weight: 800;
                        margin-bottom: 8px;
                    ">
                        TENTANG UNIT
                    </div>

                    <p style="
                        max-width: 850px;
                        color: #687388;
                        font-size: 15px;
                        line-height: 1.8;
                    ">
                        {{ $unit->description ?? 'Belum ada deskripsi untuk unit ini.' }}
                    </p>

                </div>


                <!-- ROOM INFO -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: 16px;
                    margin-top: 25px;
                ">

                    <div style="
                        padding: 20px;
                        background: #f7faf9;
                        border: 1px solid #e1e8e5;
                        border-radius: 14px;
                    ">

                        <div style="
                            color: #778296;
                            font-size: 13px;
                            margin-bottom: 6px;
                        ">
                            Ruangan
                        </div>

                        <div style="
                            font-size: 17px;
                            font-weight: 800;
                            color: #101a2e;
                        ">
                            {{ $unit->room->name }}
                        </div>

                    </div>


                    <div style="
                        padding: 20px;
                        background: #f7faf9;
                        border: 1px solid #e1e8e5;
                        border-radius: 14px;
                    ">

                        <div style="
                            color: #778296;
                            font-size: 13px;
                            margin-bottom: 6px;
                        ">
                            Status
                        </div>

                        <div style="
                            font-size: 17px;
                            font-weight: 800;
                            color: #007754;
                        ">
                            Aktif dan dapat digunakan
                        </div>

                    </div>

                </div>


                <!-- ACTIONS -->
                <div style="
                    display: flex;
                    flex-wrap: wrap;
                    gap: 12px;
                    margin-top: 30px;
                ">

                    <a
                        href="{{ route('rooms.show', $unit->room) }}"
                        class="btn btn-outline"
                    >
                        ← Kembali ke Ruangan
                    </a>

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


            <!-- OTHER UNITS -->
            <div style="
                margin-top: 45px;
            ">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    margin-bottom: 6px;
                ">
                    UNIT LAIN
                </div>

                <h2 style="
                    font-size: 28px;
                    color: #0a1428;
                    margin-bottom: 8px;
                ">
                    Unit lain di {{ $unit->room->name }}
                </h2>

                <p style="
                    color: #677287;
                    font-size: 15px;
                    margin-bottom: 24px;
                ">
                    Pilih unit lain untuk melihat detailnya.
                </p>


                @if ($unit->room->units->count() > 0)

                    <div style="
                        display: grid;
                        grid-template-columns: repeat(3, minmax(0, 1fr));
                        gap: 18px;
                    ">

                        @foreach ($unit->room->units as $otherUnit)

                            @if ($otherUnit->id !== $unit->id)

                                <a
                                    href="{{ route('units.show', $otherUnit) }}"
                                    style="
                                        display: block;
                                        background: #ffffff;
                                        border: 1px solid #dfe7e3;
                                        border-radius: 16px;
                                        padding: 22px;
                                        box-shadow: 0 7px 22px rgba(20, 40, 30, 0.04);
                                        transition: 0.2s ease;
                                    "
                                >

                                    <div style="
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: flex-start;
                                        gap: 10px;
                                    ">

                                        <div style="
                                            font-size: 18px;
                                            font-weight: 800;
                                            color: #101a2e;
                                        ">
                                            {{ $otherUnit->name }}
                                        </div>

                                        <span style="
                                            background: #ddf8ec;
                                            color: #007754;
                                            padding: 5px 9px;
                                            border-radius: 999px;
                                            font-size: 11px;
                                            font-weight: 800;
                                        ">
                                            Aktif
                                        </span>

                                    </div>

                                    <p style="
                                        color: #687388;
                                        font-size: 13px;
                                        margin-top: 10px;
                                    ">
                                        Klik untuk melihat detail unit.
                                    </p>

                                </a>

                            @endif

                        @endforeach

                    </div>

                @endif

            </div>


            <!-- INFORMATION -->
            <div style="
                margin-top: 35px;
                background: #eef8f4;
                border: 1px solid #d6eee5;
                border-radius: 16px;
                padding: 24px;
            ">

                <div style="
                    color: #075e49;
                    font-weight: 800;
                    margin-bottom: 7px;
                ">
                    Informasi Pengunjung
                </div>

                <p style="
                    color: #42685d;
                    font-size: 14px;
                    line-height: 1.7;
                    margin: 0;
                ">
                    Informasi detail pemohon dan jadwal peminjaman
                    tidak ditampilkan kepada pengunjung. Untuk melakukan
                    pengajuan, silakan login terlebih dahulu.
                </p>

            </div>

        </div>
    </section>

@endsection