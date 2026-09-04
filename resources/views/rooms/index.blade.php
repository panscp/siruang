@extends('layouts.public')

@section('content')

    <section style="
        padding: 60px 0 80px;
        background: #f7faf9;
    ">
        <div class="container">

            <!-- HEADER -->
            <div style="
                margin-bottom: 35px;
            ">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    letter-spacing: 0.5px;
                    margin-bottom: 8px;
                ">
                    RUANGAN SIRUANG
                </div>

                <h1 style="
                    font-size: 38px;
                    line-height: 1.2;
                    color: #0a1428;
                    margin-bottom: 10px;
                ">
                    Pilih Ruangan
                </h1>

                <p style="
                    max-width: 760px;
                    color: #677287;
                    font-size: 15px;
                ">
                    Lihat daftar ruangan yang tersedia beserta jumlah unit
                    dan kapasitasnya. Informasi jadwal peminjaman akan
                    tersedia pada halaman ketersediaan.
                </p>

            </div>


            <!-- ROOM GRID -->
            @if ($rooms->count() > 0)

                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: 24px;
                ">

                    @foreach ($rooms as $room)

                        <article style="
                            background: #ffffff;
                            border: 1px solid #dfe7e3;
                            border-radius: 18px;
                            overflow: hidden;
                            box-shadow: 0 8px 24px rgba(20, 40, 30, 0.05);
                        ">

                            <!-- ROOM IMAGE -->
                            <div style="
                                height: 210px;
                                background:
                                    linear-gradient(
                                        135deg,
                                        #dcefe9,
                                        #f7fbfa
                                    );

                                display: flex;
                                align-items: center;
                                justify-content: center;

                                color: #008f6b;
                                font-size: 26px;
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


                            <!-- ROOM CONTENT -->
                            <div style="
                                padding: 24px;
                            ">

                                <div style="
                                    display: flex;
                                    align-items: flex-start;
                                    justify-content: space-between;
                                    gap: 15px;
                                    margin-bottom: 12px;
                                ">

                                    <div>

                                        <h2 style="
                                            font-size: 22px;
                                            line-height: 1.25;
                                            color: #101a2e;
                                            margin-bottom: 7px;
                                        ">
                                            {{ $room->name }}
                                        </h2>

                                        <div style="
                                            color: #667187;
                                            font-size: 14px;
                                        ">
                                            Kapasitas
                                            {{ $room->capacity ?? '-' }}
                                            orang
                                        </div>

                                    </div>


                                    <span style="
                                        display: inline-flex;
                                        align-items: center;
                                        padding: 6px 10px;
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
                                <p style="
                                    color: #687388;
                                    font-size: 14px;
                                    line-height: 1.7;
                                    margin-bottom: 20px;
                                ">
                                    {{ $room->description ?? 'Belum ada deskripsi ruangan.' }}
                                </p>


                                <!-- FOOTER -->
                                <div style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    gap: 15px;
                                ">

                                    <div style="
                                        color: #536076;
                                        font-size: 13px;
                                        font-weight: 700;
                                    ">
                                        {{ $room->units_count }}
                                        Unit aktif
                                    </div>


                                    <a
                                        href="{{ route('rooms.show', $room) }}"
                                        class="btn btn-primary"
                                    >
                                        Lihat Detail
                                    </a>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <!-- EMPTY STATE -->
                <div style="
                    background: #ffffff;
                    border: 1px solid #dfe7e3;
                    border-radius: 16px;
                    padding: 50px 30px;
                    text-align: center;
                ">

                    <h2 style="
                        color: #101a2e;
                        font-size: 22px;
                        margin-bottom: 8px;
                    ">
                        Belum ada ruangan
                    </h2>

                    <p style="
                        color: #697489;
                        font-size: 14px;
                    ">
                        Belum ada ruangan aktif yang dapat ditampilkan.
                    </p>

                </div>

            @endif

        </div>
    </section>

@endsection