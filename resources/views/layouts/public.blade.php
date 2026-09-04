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

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* =========================
           NAVBAR PUBLIC
        ========================= */

        .public-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e4eae7;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .public-navbar-inner {
            min-height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        /* =========================
           BRAND
        ========================= */

        .public-brand {
            display: flex;
            align-items: center;
            gap: 12px;

            flex-shrink: 0;
        }

        .public-brand-logo {
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

        .public-brand-name {
            font-size: 19px;
            font-weight: 800;

            color: #0e1728;
        }

        .public-brand-subtitle {
            font-size: 12px;
            color: #677287;

            margin-top: 1px;
        }

        /* =========================
           NAV MENU
        ========================= */

        .public-nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;

            margin-left: auto;
        }

        .public-nav-menu a {
            font-size: 14px;
            font-weight: 700;

            color: #465169;

            transition: 0.2s ease;
        }

        .public-nav-menu a:hover {
            color: #008f6b;
        }

        .public-nav-menu a.active {
            color: #008f6b;
        }

        /* =========================
           NAV ACTION
        ========================= */

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;

            flex-shrink: 0;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 42px;

            padding: 10px 18px;

            border-radius: 10px;

            border: 1px solid transparent;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: #008f6b;
            color: #ffffff;
            border-color: #008f6b;
        }

        .btn-primary:hover {
            background: #007c5d;
            border-color: #007c5d;
        }

        .btn-outline {
            background: #ffffff;
            color: #008f6b;
            border-color: #b9d8cc;
        }

        .btn-outline:hover {
            background: #eff9f5;
            border-color: #008f6b;
        }

        /* =========================
           CONTENT
        ========================= */

        main {
            min-height: calc(100vh - 150px);
        }

        /* =========================
           FOOTER
        ========================= */

        .public-footer {
            margin-top: 60px;

            background: #ffffff;
            border-top: 1px solid #e4eae7;
        }

        .public-footer-inner {
            min-height: 100px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .public-footer-brand {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .public-footer-brand strong {
            font-size: 15px;
            color: #0e1728;
        }

        .public-footer-brand span {
            font-size: 12px;
            color: #677287;
        }

        .public-footer-copy {
            font-size: 12px;
            color: #7a8495;
            text-align: right;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .public-navbar-inner {
                gap: 18px;
            }

            .public-nav-menu {
                gap: 18px;
            }

            .public-nav-menu a {
                font-size: 13px;
            }

            .btn {
                padding: 9px 15px;
            }
        }

        @media (max-width: 720px) {

            .public-navbar-inner {
                min-height: 70px;
                gap: 14px;
            }

            .public-brand-subtitle {
                display: none;
            }

            .public-nav-menu {
                gap: 14px;
            }

            .public-nav-menu a {
                font-size: 12px;
            }

            .nav-actions {
                display: none;
            }

            .public-footer-inner {
                padding: 25px 0;
                flex-direction: column;
                align-items: flex-start;
            }

            .public-footer-copy {
                text-align: left;
            }
        }

        @media (max-width: 560px) {

            .container {
                width: min(100% - 24px, 1180px);
            }

            .public-navbar-inner {
                min-height: 64px;
            }

            .public-brand-logo {
                width: 40px;
                height: 40px;
            }

            .public-brand-name {
                font-size: 17px;
            }

            .public-nav-menu {
                gap: 12px;
            }

            .public-nav-menu a {
                font-size: 12px;
            }

            .public-nav-menu a:nth-child(3) {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- =========================
         NAVBAR PUBLIC
    ========================= -->

    <header class="public-navbar">

        <div class="container public-navbar-inner">

            <!-- BRAND -->

            <a href="{{ route('home') }}" class="public-brand">

                <div class="public-brand-logo">
                    SR
                </div>

                <div>

                    <div class="public-brand-name">
                        SIRUANG
                    </div>

                    <div class="public-brand-subtitle">
                        Sistem Informasi Peminjaman Ruang
                    </div>

                </div>

            </a>


            <!-- MENU -->

            <nav class="public-nav-menu">

                <a
                    href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'active' : '' }}"
                >
                    Beranda
                </a>

                <a
                    href="{{ route('rooms.index') }}"
                    class="{{ request()->routeIs('rooms.*') ? 'active' : '' }}"
                >
                    Ruangan
                </a>

                <a
                    href="{{ route('calendar') }}"
                    class="{{ request()->routeIs('calendar') ? 'active' : '' }}"
                >
                    Ketersediaan
                </a>

            </nav>


            <!-- ACTION -->

            <div class="nav-actions">

                <a
                    href="{{ route('login') }}"
                    class="btn btn-primary"
                >
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

    <footer class="public-footer">

        <div class="container public-footer-inner">

            <div class="public-footer-brand">

                <strong>
                    SIRUANG
                </strong>

                <span>
                    Sistem Informasi Peminjaman Ruang
                </span>

            </div>


            <div class="public-footer-copy">

                © {{ date('Y') }} SIRUANG
                — Sistem Informasi Peminjaman Ruang

            </div>

        </div>

    </footer>


    @stack('scripts')

</body>
</html>