@extends('layouts.public')

@section('content')

    <section style="
        padding: 50px 0 80px;
        background: #f7faf9;
    ">
        <div class="container">

            <!-- HEADER -->
            <div style="
                margin-bottom: 30px;
            ">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    letter-spacing: 0.4px;
                    margin-bottom: 7px;
                    text-transform: uppercase;
                ">
                    KETERSEDIAAN RUANG
                </div>

                <h1 style="
                    margin: 0 0 10px;
                    font-size: 38px;
                    line-height: 1.2;
                    color: #0a1428;
                ">
                    Kalender Ketersediaan Ruangan
                </h1>

                <p style="
                    margin: 0;
                    max-width: 800px;
                    color: #687388;
                    font-size: 15px;
                    line-height: 1.7;
                ">
                    Lihat informasi umum penggunaan ruangan berdasarkan
                    tanggal. Detail pemohon tidak ditampilkan kepada publik.
                </p>

            </div>


            <!-- CALENDAR CARD -->
            <div style="
                background: #ffffff;
                border: 1px solid #dfe7e3;
                border-radius: 18px;
                box-shadow: 0 8px 25px rgba(20, 40, 30, 0.05);
                overflow: hidden;
            ">

                <!-- CALENDAR HEADER -->
                <div style="
                    padding: 24px;
                    border-bottom: 1px solid #edf1ef;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 20px;
                ">

                    <div>

                        <div style="
                            color: #687388;
                            font-size: 13px;
                            margin-bottom: 4px;
                        ">
                            Bulan
                        </div>

                        <h2 id="calendar-title" style="
                            margin: 0;
                            color: #101a2e;
                            font-size: 24px;
                        ">
                            September 2026
                        </h2>

                    </div>


                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 8px;
                    ">

                        <button
                            type="button"
                            id="previous-month"
                            class="calendar-button"
                        >
                            ←
                        </button>

                        <button
                            type="button"
                            id="today-month"
                            class="calendar-button calendar-button-today"
                        >
                            Hari Ini
                        </button>

                        <button
                            type="button"
                            id="next-month"
                            class="calendar-button"
                        >
                            →
                        </button>

                    </div>

                </div>


                <!-- LEGEND -->
                <div style="
                    padding: 16px 24px;
                    border-bottom: 1px solid #edf1ef;
                    display: flex;
                    flex-wrap: wrap;
                    gap: 18px;
                    align-items: center;
                ">

                    <div style="
                        color: #59657a;
                        font-size: 13px;
                        font-weight: 700;
                    ">
                        Keterangan:
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot legend-available"></span>
                        Tersedia
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot legend-used"></span>
                        Digunakan
                    </div>

                    <div class="legend-item">
                        <span class="legend-dot legend-partial"></span>
                        Sebagian Unit Digunakan
                    </div>

                </div>


                <!-- WEEKDAYS -->
                <div class="calendar-weekdays">

                    <div>Min</div>
                    <div>Sen</div>
                    <div>Sel</div>
                    <div>Rab</div>
                    <div>Kam</div>
                    <div>Jum</div>
                    <div>Sab</div>

                </div>


                <!-- CALENDAR DAYS -->
                <div id="calendar-grid" class="calendar-grid"></div>


                <!-- INFORMATION -->
                <div style="
                    padding: 20px 24px;
                    border-top: 1px solid #edf1ef;
                    background: #f8fbfa;
                ">

                    <div style="
                        color: #075e49;
                        font-size: 14px;
                        font-weight: 800;
                        margin-bottom: 5px;
                    ">
                        Informasi
                    </div>

                    <p style="
                        margin: 0;
                        color: #557067;
                        font-size: 13px;
                        line-height: 1.7;
                    ">
                        Kalender publik hanya menampilkan status umum
                        ketersediaan ruangan. Informasi pemohon dan detail
                        pengajuan hanya dapat diakses oleh pihak yang berwenang.
                    </p>

                </div>

            </div>


            <!-- ROOM FILTER -->
            <div style="
                margin-top: 30px;
                background: #ffffff;
                border: 1px solid #dfe7e3;
                border-radius: 18px;
                padding: 24px;
            ">

                <div style="
                    color: #008f6b;
                    font-size: 13px;
                    font-weight: 800;
                    margin-bottom: 6px;
                    text-transform: uppercase;
                ">
                    INFORMASI RUANGAN
                </div>

                <h2 style="
                    margin: 0 0 7px;
                    font-size: 24px;
                    color: #101a2e;
                ">
                    Ketersediaan Per Ruangan
                </h2>

                <p style="
                    margin: 0 0 20px;
                    color: #687388;
                    font-size: 14px;
                ">
                    Pilih ruangan untuk melihat informasi ketersediaannya.
                </p>


                <div style="
                    display: grid;
                    grid-template-columns: repeat(4, minmax(0, 1fr));
                    gap: 14px;
                ">

                    @php
                        $calendarRooms = [
                            'Aula Utama',
                            'Ruang Rapat 1',
                            'Ruang Rapat 2',
                            'Ruang Diklat',
                        ];
                    @endphp


                    @foreach ($calendarRooms as $calendarRoom)

                        <div
                            class="room-filter-card"
                            data-room="{{ $calendarRoom }}"
                        >

                            <div style="
                                font-size: 16px;
                                font-weight: 800;
                                color: #101a2e;
                                margin-bottom: 7px;
                            ">
                                {{ $calendarRoom }}
                            </div>

                            <div style="
                                font-size: 13px;
                                color: #697489;
                                margin-bottom: 13px;
                            ">
                                Status hari ini
                            </div>

                            <span class="room-status available-status">
                                Tersedia
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>


            <!-- CTA -->
            <div style="
                margin-top: 30px;
                padding: 28px;
                background: #007f60;
                color: #ffffff;
                border-radius: 18px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 24px;
            ">

                <div>

                    <h2 style="
                        margin: 0 0 6px;
                        font-size: 24px;
                    ">
                        Ingin menggunakan salah satu ruangan?
                    </h2>

                    <p style="
                        margin: 0;
                        color: #d8f2e9;
                        font-size: 14px;
                    ">
                        Login terlebih dahulu untuk melakukan pengajuan
                        peminjaman.
                    </p>

                </div>

                <a
                    href="/login"
                    class="btn"
                    style="
                        background: #ffffff;
                        color: #006e53;
                        white-space: nowrap;
                    "
                >
                    Login untuk Mengajukan
                </a>

            </div>

        </div>
    </section>


    <style>

        .calendar-button {
            border: 1px solid #dce5e1;
            background: #ffffff;
            color: #26324a;
            min-width: 42px;
            height: 40px;
            padding: 0 12px;
            border-radius: 9px;
            cursor: pointer;
            font-weight: 800;
        }

        .calendar-button:hover {
            border-color: #008f6b;
            color: #008f6b;
        }

        .calendar-button-today {
            padding: 0 14px;
        }

        .calendar-weekdays {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            border-bottom: 1px solid #dfe7e3;
        }

        .calendar-weekdays > div {
            padding: 13px 10px;
            text-align: center;
            font-size: 13px;
            font-weight: 800;
            color: #59657a;
            border-right: 1px solid #edf1ef;
        }

        .calendar-weekdays > div:last-child {
            border-right: none;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
        }

        .calendar-day {
            min-height: 115px;
            padding: 12px;
            border-right: 1px solid #edf1ef;
            border-bottom: 1px solid #edf1ef;
            position: relative;
            background: #ffffff;
        }

        .calendar-day:nth-child(7n) {
            border-right: none;
        }

        .calendar-day-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 31px;
            height: 31px;
            border-radius: 50%;
            font-size: 13px;
            font-weight: 800;
            color: #26324a;
            margin-bottom: 9px;
        }

        .calendar-day.other-month {
            background: #fafcfb;
        }

        .calendar-day.other-month .calendar-day-number {
            color: #b7bec7;
        }

        .calendar-day.today .calendar-day-number {
            background: #008f6b;
            color: #ffffff;
        }

        .calendar-status {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 700;
            color: #59657a;
            margin-top: 6px;
        }

        .calendar-status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-available {
            background: #16a574;
        }

        .status-used {
            background: #e04444;
        }

        .status-partial {
            background: #e2a114;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #59657a;
            font-size: 13px;
        }

        .legend-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .legend-available {
            background: #16a574;
        }

        .legend-used {
            background: #e04444;
        }

        .legend-partial {
            background: #e2a114;
        }

        .room-filter-card {
            padding: 18px;
            border: 1px solid #dfe7e3;
            border-radius: 14px;
            background: #f9fbfa;
        }

        .room-status {
            display: inline-flex;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
        }

        .available-status {
            background: #ddf8ec;
            color: #007754;
        }

        @media (max-width: 900px) {

            .room-filter-card {
                grid-column: span 2;
            }

            .calendar-day {
                min-height: 100px;
            }

            .calendar-status {
                font-size: 10px;
            }

        }

        @media (max-width: 600px) {

            .container {
                width: min(100% - 24px, 1180px);
            }

            .calendar-button-today {
                display: none;
            }

            .calendar-day {
                min-height: 75px;
                padding: 7px;
            }

            .calendar-day-number {
                width: 27px;
                height: 27px;
            }

            .calendar-status {
                display: none;
            }

            .room-filter-card {
                grid-column: span 4;
            }

            .container > div[style*="007f60"] {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

        }

    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const calendarGrid = document.getElementById('calendar-grid');
            const calendarTitle = document.getElementById('calendar-title');

            const previousMonthButton = document.getElementById('previous-month');
            const nextMonthButton = document.getElementById('next-month');
            const todayButton = document.getElementById('today-month');


            let currentDate = new Date();


            function formatMonthTitle(date) {

                return new Intl.DateTimeFormat('id-ID', {
                    month: 'long',
                    year: 'numeric'
                }).format(date);

            }


            function generateCalendar(date) {

                calendarGrid.innerHTML = '';

                calendarTitle.textContent = formatMonthTitle(date);


                const year = date.getFullYear();
                const month = date.getMonth();


                const firstDay = new Date(
                    year,
                    month,
                    1
                ).getDay();


                const daysInMonth = new Date(
                    year,
                    month + 1,
                    0
                ).getDate();


                const previousMonthDays = new Date(
                    year,
                    month,
                    0
                ).getDate();


                const today = new Date();


                /*
                 * Hari pada bulan sebelumnya.
                 */
                for (let i = firstDay - 1; i >= 0; i--) {

                    const dayNumber = previousMonthDays - i;

                    createCalendarDay(
                        dayNumber,
                        true,
                        null,
                        null,
                        true
                    );

                }


                /*
                 * Hari pada bulan aktif.
                 */
                for (let day = 1; day <= daysInMonth; day++) {

                    const isToday =
                        day === today.getDate() &&
                        month === today.getMonth() &&
                        year === today.getFullYear();


                    createCalendarDay(
                        day,
                        false,
                        isToday,
                        getSampleStatus(day),
                        false
                    );

                }


                /*
                 * Hari pada bulan berikutnya.
                 */
                const totalCells = 42;

                const currentCells =
                    firstDay + daysInMonth;


                const nextMonthDays =
                    totalCells - currentCells;


                for (let day = 1; day <= nextMonthDays; day++) {

                    createCalendarDay(
                        day,
                        true,
                        null,
                        null,
                        true
                    );

                }

            }


            function createCalendarDay(
                day,
                otherMonth,
                isToday,
                status,
                hiddenStatus
            ) {

                const cell = document.createElement('div');

                cell.className = 'calendar-day';


                if (otherMonth) {
                    cell.classList.add('other-month');
                }


                if (isToday) {
                    cell.classList.add('today');
                }


                const number = document.createElement('div');

                number.className =
                    'calendar-day-number';

                number.textContent = day;


                cell.appendChild(number);


                if (!hiddenStatus && status) {

                    const statusWrapper =
                        document.createElement('div');

                    statusWrapper.className =
                        'calendar-status';


                    const dot =
                        document.createElement('span');

                    dot.className =
                        'calendar-status-dot';


                    if (status === 'available') {

                        dot.classList.add(
                            'status-available'
                        );

                    }


                    if (status === 'used') {

                        dot.classList.add(
                            'status-used'
                        );

                    }


                    if (status === 'partial') {

                        dot.classList.add(
                            'status-partial'
                        );

                    }


                    const label =
                        document.createElement('span');


                    if (status === 'available') {
                        label.textContent = 'Tersedia';
                    }

                    if (status === 'used') {
                        label.textContent = 'Digunakan';
                    }

                    if (status === 'partial') {
                        label.textContent = 'Sebagian digunakan';
                    }


                    statusWrapper.appendChild(dot);
                    statusWrapper.appendChild(label);

                    cell.appendChild(statusWrapper);

                }


                calendarGrid.appendChild(cell);

            }


            /*
             * Data sementara untuk demo kalender.
             *
             * Nantinya bagian ini akan diganti dengan data
             * dari database setelah modul jadwal/admin selesai.
             */
            function getSampleStatus(day) {

                if ([5, 12, 19, 26].includes(day)) {
                    return 'used';
                }

                if ([7, 14, 21, 28].includes(day)) {
                    return 'partial';
                }

                return 'available';

            }


            previousMonthButton.addEventListener(
                'click',
                function () {

                    currentDate.setMonth(
                        currentDate.getMonth() - 1
                    );

                    generateCalendar(currentDate);

                }
            );


            nextMonthButton.addEventListener(
                'click',
                function () {

                    currentDate.setMonth(
                        currentDate.getMonth() + 1
                    );

                    generateCalendar(currentDate);

                }
            );


            todayButton.addEventListener(
                'click',
                function () {

                    currentDate = new Date();

                    generateCalendar(currentDate);

                }
            );


            generateCalendar(currentDate);

        });
    </script>

@endsection