<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIRUANG - Sistem Informasi Peminjaman Ruang</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8f7;
            color: #172033;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e3e8e6;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #008f6b;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
        }

        .brand-text strong {
            display: block;
            font-size: 19px;
            color: #0d1728;
        }

        .brand-text span {
            display: block;
            color: #657087;
            font-size: 12px;
            margin-top: 1px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
            font-size: 14px;
            font-weight: 700;
            color: #445066;
        }

        .nav-menu a:hover {
            color: #008f6b;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            padding: 11px 18px;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid transparent;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-outline {
            background: #ffffff;
            color: #25324a;
            border-color: #dce4e0;
        }

        .btn-outline:hover {
            border-color: #008f6b;
            color: #008f6b;
        }

        .btn-primary {
            background: #008f6b;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #007959;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            padding: 72px 0 62px;
            background:
                linear-gradient(
                    135deg,
                    #eefaf6 0%,
                    #ffffff 60%,
                    #f6fbf9 100%
                );
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            align-items: center;
            gap: 60px;
        }

        .eyebrow {
            color: #008f6b;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: clamp(40px, 5vw, 62px);
            line-height: 1.08;
            letter-spacing: -1.5px;
            color: #071126;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 650px;
            color: #59657a;
            font-size: 17px;
            margin-bottom: 30px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-card {
            background: #ffffff;
            border: 1px solid #dde8e3;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 14px 35px rgba(16, 42, 32, 0.08);
        }

        .hero-card-title {
            font-size: 14px;
            color: #008f6b;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .hero-card h2 {
            font-size: 27px;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #101a2e;
        }

        .quick-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #edf1ef;
        }

        .quick-item:last-child {
            border-bottom: 0;
        }

        .quick-name {
            font-weight: 700;
            color: #243047;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .badge-green {
            background: #ddf8ec;
            color: #007754;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            padding: 70px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 30px;
        }

        .section-title small {
            display: block;
            color: #008f6b;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .section-title h2 {
            font-size: 32px;
            color: #0a1428;
            margin-bottom: 6px;
        }

        .section-title p {
            color: #677287;
            max-width: 700px;
        }

        /* =========================
           ROOM CARDS
        ========================= */

        .room-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .room-card {
            background: #ffffff;
            border: 1px solid #dfe7e3;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(20, 40, 30, 0.05);
        }

        .room-image {
            height: 190px;
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
            font-weight: 800;
            font-size: 30px;
        }

        .room-content {
            padding: 20px;
        }

        .room-top {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 15px;
            margin-bottom: 10px;
        }

        .room-name {
            font-size: 20px;
            font-weight: 800;
            color: #101a2e;
        }

        .room-capacity {
            color: #667187;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .room-description {
            color: #687388;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .room-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .unit-info {
            color: #536076;
            font-size: 13px;
            font-weight: 700;
        }

        /* =========================
           FEATURES
        ========================= */

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature-card {
            background: #ffffff;
            border: 1px solid #e1e8e5;
            border-radius: 16px;
            padding: 24px;
        }

        .feature-icon {
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
        }

        .feature-card h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #101a2e;
        }

        .feature-card p {
            font-size: 14px;
            color: #697489;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            padding: 55px 0;
        }

        .cta-box {
            background: #007f60;
            color: #ffffff;
            border-radius: 20px;
            padding: 38px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .cta-box h2 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .cta-box p {
            color: #d8f2e9;
            max-width: 680px;
        }

        .cta-box .btn {
            background: #ffffff;
            color: #006e53;
            flex-shrink: 0;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #ffffff;
            border-top: 1px solid #e4e9e7;
            padding: 30px 0;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: center;
        }

        .footer-brand strong {
            display: block;
            color: #101a2e;
            margin-bottom: 3px;
        }

        .footer-brand span {
            font-size: 13px;
            color: #788397;
        }

        .footer-copy {
            font-size: 13px;
            color: #788397;
            text-align: right;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .hero-grid {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                display: none;
            }

            .room-grid {
                grid-template-columns: 1fr;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .cta-box {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: min(100% - 24px, 1180px);
            }

            .navbar-inner {
                min-height: 68px;
            }

            .brand-text span {
                display: none;
            }

            .hero {
                padding: 48px 0;
            }

            .hero h1 {
                font-size: 40px;
            }

            .section {
                padding: 50px 0;
            }

            .section-title h2 {
                font-size: 27px;
            }

            .nav-actions .btn-outline {
                display: none;
            }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-copy {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container navbar-inner">

            <a href="/" class="brand">
                <div class="brand-logo">
                    SR
                </div>

                <div class="brand-text">
                    <strong>SIRUANG</strong>
                    <span>Sistem Informasi Peminjaman Ruang</span>
                </div>
            </a>

            <nav class="nav-menu">
                <a href="#ruangan">Ketersediaan Ruangan</a>
                <a href="#cara-pengajuan">Cara Pengajuan</a>
                <a href="#">Pelacakan</a>
            </nav>

            <div class="nav-actions">
                <a href="#" class="btn btn-outline">Login</a>
                <a href="#" class="btn btn-primary">Ajukan Peminjaman</a>
            </div>

        </div>
    </header>


    <!-- HERO -->
    <main>

        <section class="hero">
            <div class="container hero-grid">

                <div>
                    <div class="eyebrow">
                        SISTEM INFORMASI PEMINJAMAN RUANG
                    </div>

                    <h1>
                        Temukan ruang yang tepat untuk kegiatan Anda.
                    </h1>

                    <p>
                        Periksa ketersediaan ruangan, pilih unit yang sesuai,
                        dan ajukan peminjaman secara mudah melalui SIRUANG.
                    </p>

                    <div class="hero-actions">
                        <a href="#ruangan" class="btn btn-primary">
                            Lihat Ketersediaan
                        </a>

                        <a href="#" class="btn btn-outline">
                            Ajukan Peminjaman
                        </a>
                    </div>
                </div>


                <div class="hero-card">

                    <div class="hero-card-title">
                        Ketersediaan Hari Ini
                    </div>

                    <h2>
                        Ruang yang dapat digunakan
                    </h2>

                    <div class="quick-item">
                        <div class="quick-name">
                            Aula Utama
                        </div>

                        <span class="badge badge-green">
                            Tersedia
                        </span>
                    </div>

                    <div class="quick-item">
                        <div class="quick-name">
                            Ruang Rapat 1
                        </div>

                        <span class="badge badge-green">
                            Tersedia
                        </span>
                    </div>

                    <div class="quick-item">
                        <div class="quick-name">
                            Ruang Rapat 2
                        </div>

                        <span class="badge badge-green">
                            Tersedia
                        </span>
                    </div>

                    <div class="quick-item">
                        <div class="quick-name">
                            Ruang Diklat
                        </div>

                        <span class="badge badge-green">
                            Tersedia
                        </span>
                    </div>

                </div>

            </div>
        </section>


        <!-- ROOM -->
        <section class="section" id="ruangan">
            <div class="container">

                <div class="section-header">

                    <div class="section-title">
                        <small>RUANGAN TERSEDIA</small>

                        <h2>
                            Pilih Ruangan
                        </h2>

                        <p>
                            Setiap ruangan dapat memiliki beberapa unit.
                            Ketersediaan unit akan diperiksa berdasarkan tanggal
                            dan waktu peminjaman.
                        </p>
                    </div>

                    <a href="#" class="btn btn-outline">
                        Lihat Semua
                    </a>

                </div>


                <div class="room-grid">

                    <!-- ROOM 1 -->
                    <article class="room-card">

                        <div class="room-image">
                            AULA
                        </div>

                        <div class="room-content">

                            <div class="room-top">
                                <div class="room-name">
                                    Aula Utama
                                </div>

                                <span class="badge badge-green">
                                    Aktif
                                </span>
                            </div>

                            <div class="room-capacity">
                                Kapasitas hingga 100 orang
                            </div>

                            <div class="room-description">
                                Ruang utama untuk rapat, seminar,
                                pelatihan, dan kegiatan berskala besar.
                            </div>

                            <div class="room-footer">
                                <span class="unit-info">
                                    3 Unit tersedia
                                </span>

                                <a href="#" class="btn btn-primary">
                                    Detail
                                </a>
                            </div>

                        </div>

                    </article>


                    <!-- ROOM 2 -->
                    <article class="room-card">

                        <div class="room-image">
                            RAPAT 1
                        </div>

                        <div class="room-content">

                            <div class="room-top">
                                <div class="room-name">
                                    Ruang Rapat 1
                                </div>

                                <span class="badge badge-green">
                                    Aktif
                                </span>
                            </div>

                            <div class="room-capacity">
                                Kapasitas hingga 30 orang
                            </div>

                            <div class="room-description">
                                Ruang rapat untuk koordinasi,
                                diskusi, dan pertemuan internal.
                            </div>

                            <div class="room-footer">
                                <span class="unit-info">
                                    2 Unit tersedia
                                </span>

                                <a href="#" class="btn btn-primary">
                                    Detail
                                </a>
                            </div>

                        </div>

                    </article>


                    <!-- ROOM 3 -->
                    <article class="room-card">

                        <div class="room-image">
                            RAPAT 2
                        </div>

                        <div class="room-content">

                            <div class="room-top">
                                <div class="room-name">
                                    Ruang Rapat 2
                                </div>

                                <span class="badge badge-green">
                                    Aktif
                                </span>
                            </div>

                            <div class="room-capacity">
                                Kapasitas hingga 20 orang
                            </div>

                            <div class="room-description">
                                Ruang yang sesuai untuk diskusi,
                                rapat kecil, dan kegiatan internal.
                            </div>

                            <div class="room-footer">
                                <span class="unit-info">
                                    2 Unit tersedia
                                </span>

                                <a href="#" class="btn btn-primary">
                                    Detail
                                </a>
                            </div>

                        </div>

                    </article>


                    <!-- ROOM 4 -->
                    <article class="room-card">

                        <div class="room-image">
                            DIKLAT
                        </div>

                        <div class="room-content">

                            <div class="room-top">
                                <div class="room-name">
                                    Ruang Diklat
                                </div>

                                <span class="badge badge-green">
                                    Aktif
                                </span>
                            </div>

                            <div class="room-capacity">
                                Kapasitas hingga 40 orang
                            </div>

                            <div class="room-description">
                                Ruang untuk kegiatan pendidikan,
                                pelatihan, workshop, dan sejenisnya.
                            </div>

                            <div class="room-footer">
                                <span class="unit-info">
                                    3 Unit tersedia
                                </span>

                                <a href="#" class="btn btn-primary">
                                    Detail
                                </a>
                            </div>

                        </div>

                    </article>

                </div>

            </div>
        </section>


        <!-- FEATURES -->
        <section class="section" id="cara-pengajuan">
            <div class="container">

                <div class="section-header">
                    <div class="section-title">
                        <small>ALUR PEMINJAMAN</small>

                        <h2>
                            Pengajuan lebih terarah
                        </h2>

                        <p>
                            Proses peminjaman dirancang agar pengguna dapat
                            mengetahui ketersediaan unit dan status pengajuan
                            dengan jelas.
                        </p>
                    </div>
                </div>


                <div class="feature-grid">

                    <div class="feature-card">
                        <div class="feature-icon">
                            1
                        </div>

                        <h3>
                            Pilih Ruangan
                        </h3>

                        <p>
                            Tentukan ruangan yang sesuai dengan kebutuhan
                            kegiatan Anda.
                        </p>
                    </div>


                    <div class="feature-card">
                        <div class="feature-icon">
                            2
                        </div>

                        <h3>
                            Pilih Unit & Jadwal
                        </h3>

                        <p>
                            Pilih unit dan waktu peminjaman. Sistem akan
                            membantu memeriksa ketersediaannya.
                        </p>
                    </div>


                    <div class="feature-card">
                        <div class="feature-icon">
                            3
                        </div>

                        <h3>
                            Tunggu Persetujuan
                        </h3>

                        <p>
                            Pengajuan dikirim ke admin untuk diperiksa,
                            disetujui, atau ditolak.
                        </p>
                    </div>

                </div>

            </div>
        </section>


        <!-- CTA -->
        <section class="cta">
            <div class="container">

                <div class="cta-box">

                    <div>
                        <h2>
                            Siap mengajukan peminjaman?
                        </h2>

                        <p>
                            Pilih ruangan, tentukan unit dan jadwal,
                            kemudian kirim pengajuan kepada admin.
                        </p>
                    </div>

                    <a href="#" class="btn">
                        Ajukan Sekarang
                    </a>

                </div>

            </div>
        </section>

    </main>


    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-inner">

            <div class="footer-brand">
                <strong>SIRUANG</strong>
                <span>
                    Sistem Informasi Peminjaman Ruang
                </span>
            </div>

            <div class="footer-copy">
                © {{ date('Y') }} SIRUANG — Sistem Informasi Peminjaman Ruang
            </div>

        </div>
    </footer>

</body>
</html>