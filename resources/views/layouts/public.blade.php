<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'SIRUANG' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7faf9;
            color: #172033;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
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
            border-bottom: 1px solid #e4eae7;
            position: sticky;
            top: 0;
            z-index: 1000;
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

            font-size: 16px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
            color: #0e1728;
        }

        .brand-subtitle {
            font-size: 12px;
            color: #677287;
            margin-top: 1px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-menu a {
            font-size: 14px;
            font-weight: 700;
            color: #465169;
            transition: 0.2s ease;
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
            align-items: center;
            justify-content: center;

            padding: 11px 18px;

            border-radius: 10px;
            border: 1px solid transparent;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-primary {
            background: #008f6b;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #007957;
        }

        .btn-outline {
            background: #ffffff;
            color: #26324a;
            border-color: #dce5e1;
        }

        .btn-outline:hover {
            color: #008f6b;
            border-color: #008f6b;
        }

        /* =========================
           MAIN
        ========================= */

        main {
            min-height: calc(100vh - 150px);
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 60px;
            background: #ffffff;
            border-top: 1px solid #e4eae7;
        }

        .footer-inner {
            min-height: 100px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .footer-brand strong {
            display: block;
            color: #101a2d;
            margin-bottom: 3px;
        }

        .footer-brand span {
            color: #788397;
            font-size: 13px;
        }

        .footer-copy {
            color: #788397;
            font-size: 13px;
            text-align: right;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .nav-menu {
                display: none;
            }

            .footer-inner {
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                padding: 20px 0;
            }

            .footer-copy {
                text-align: left;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: min(100% - 24px, 1180px);
            }

            .brand-subtitle {
                display: none;
            }

            .nav-actions .btn-outline {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- =========================
         NAVBAR PUBLIK
    ========================= -->

    <header class="navbar">
        <div class="container navbar-inner">

            <a href="/" class="brand">

                <div class="brand-logo">
                    SR
                </div>

                <div>
                    <div class="brand-name">
                        SIRUANG
                    </div>

                    <div class="brand-subtitle">
                        Sistem Informasi Peminjaman Ruang
                    </div>
                </div>

            </a>


            <nav class="nav-menu">

                <a href="/">
                    Beranda
                </a>

                <a href="/rooms">
                    Ruangan
                </a>

                <a href="/calendar">
                    Ketersediaan
                </a>

            </nav>


            <div class="nav-actions">

                <a href="/login" class="btn btn-outline">
                    Login
                </a>

                <a href="/login" class="btn btn-primary">
                    Ajukan Peminjaman
                </a>

            </div>

        </div>
    </header>


    <!-- =========================
         CONTENT
    ========================= -->

    <main>
        @yield('content')
    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer class="footer">

        <div class="container footer-inner">

            <div class="footer-brand">

                <strong>
                    SIRUANG
                </strong>

                <span>
                    Sistem Informasi Peminjaman Ruang
                </span>

            </div>

            <div class="footer-copy">

                © {{ date('Y') }} SIRUANG
                — Sistem Informasi Peminjaman Ruang

            </div>

        </div>

    </footer>


    @stack('scripts')

</body>
</html>