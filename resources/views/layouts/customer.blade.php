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
           NAVBAR CUSTOMER
        ========================= */

        .customer-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e4eae7;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .customer-navbar-inner {
            min-height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .customer-brand {
            display: flex;
            align-items: center;
            gap: 12px;

            flex-shrink: 0;
        }

        .customer-brand-logo {
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

        .customer-brand-name {
            font-size: 19px;
            font-weight: 800;
            color: #0e1728;
        }

        .customer-brand-subtitle {
            font-size: 12px;
            color: #677287;
            margin-top: 1px;
        }

        /* =========================
           NAV MENU
        ========================= */

        .customer-nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;

            margin-left: auto;
        }

        .customer-nav-menu a {
            font-size: 14px;
            font-weight: 700;
            color: #465169;

            transition: 0.2s ease;
        }

        .customer-nav-menu a:hover {
            color: #008f6b;
        }

        .customer-nav-menu a.active {
            color: #008f6b;
        }

        /* =========================
           USER MENU
        ========================= */

        .customer-user {
            position: relative;
            flex-shrink: 0;
        }

        .customer-user-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 8px 12px;

            border: 1px solid #dce5e1;
            border-radius: 10px;

            background: #ffffff;
            color: #26324a;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
        }

        .customer-user-button:hover {
            border-color: #008f6b;
            color: #008f6b;
        }

        .customer-user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;

            background: #e4f8f1;
            color: #008f6b;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 13px;
            font-weight: 800;
        }

        .customer-user-name {
            max-width: 150px;

            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .customer-user-arrow {
            font-size: 11px;
            color: #687388;
        }

        /* =========================
           DROPDOWN
        ========================= */

        .customer-user-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;

            width: 220px;

            background: #ffffff;
            border: 1px solid #dfe7e3;
            border-radius: 14px;

            padding: 8px;

            box-shadow: 0 12px 35px rgba(20, 40, 30, 0.10);

            display: none;
        }

        .customer-user:hover .customer-user-dropdown {
            display: block;
        }

        .customer-user-info {
            padding: 12px;

            border-bottom: 1px solid #edf1ef;
            margin-bottom: 6px;
        }

        .customer-user-info strong {
            display: block;
            color: #101a2e;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .customer-user-info span {
            display: block;
            color: #788397;
            font-size: 12px;

            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .customer-user-dropdown a,
        .customer-user-dropdown button {
            width: 100%;

            display: flex;
            align-items: center;

            padding: 10px 12px;

            border: none;
            border-radius: 9px;

            background: transparent;
            color: #465169;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;
            text-align: left;
        }

        .customer-user-dropdown a:hover,
        .customer-user-dropdown button:hover {
            background: #f1f8f5;
            color: #008f6b;
        }

        /* =========================
           MAIN
        ========================= */

        main {
            min-height: calc(100vh - 176px);
        }

        /* =========================
           GENERAL BUTTON
        ========================= */

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
           FOOTER
        ========================= */

        .customer-footer {
            margin-top: 60px;

            background: #ffffff;
            border-top: 1px solid #e4eae7;
        }

        .customer-footer-inner {
            min-height: 100px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .customer-footer-brand strong {
            display: block;

            color: #101a2d;
            margin-bottom: 3px;
        }

        .customer-footer-brand span {
            color: #788397;
            font-size: 13px;
        }

        .customer-footer-copy {
            color: #788397;
            font-size: 13px;
            text-align: right;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .customer-nav-menu {
                gap: 18px;
            }

            .customer-brand-subtitle {
                display: none;
            }

            .customer-footer-inner {
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;

                padding: 20px 0;
            }

            .customer-footer-copy {
                text-align: left;
            }
        }

        @media (max-width: 700px) {
            .customer-navbar-inner {
                min-height: 68px;
                gap: 12px;
            }

            .customer-brand-name {
                font-size: 17px;
            }

            .customer-brand-logo {
                width: 40px;
                height: 40px;
            }

            .customer-nav-menu {
                gap: 14px;
            }

            .customer-nav-menu a {
                font-size: 13px;
            }

            .customer-user-button {
                padding: 6px 8px;
            }

            .customer-user-name {
                display: none;
            }
        }

        @media (max-width: 560px) {
            .container {
                width: min(100% - 24px, 1180px);
            }

            .customer-nav-menu a:first-child {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- =========================
         NAVBAR CUSTOMER
    ========================= -->

    <header class="customer-navbar">

        <div class="container customer-navbar-inner">

            <!-- BRAND -->
            <a href="{{ route('home') }}" class="customer-brand">

                <div class="customer-brand-logo">
                    SR
                </div>

                <div>
                    <div class="customer-brand-name">
                        SIRUANG
                    </div>

                    <div class="customer-brand-subtitle">
                        Sistem Informasi Peminjaman Ruang
                    </div>
                </div>

            </a>


            <!-- MENU -->
            <nav class="customer-nav-menu">

                <a
                    href="{{ route('customer.dashboard') }}"
                    class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}"
                >
                    Beranda
                </a>

                <a
                    href="{{ route('customer.history') }}"
                    class="{{ request()->routeIs('customer.history') ? 'active' : '' }}"
                >
                    Riwayat
                </a>

            </nav>


            <!-- USER -->
            <div class="customer-user">

                <button
                    type="button"
                    class="customer-user-button"
                >

                    <div class="customer-user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <span class="customer-user-name">
                        {{ auth()->user()->name }}
                    </span>

                    <span class="customer-user-arrow">
                        ▼
                    </span>

                </button>


                <!-- DROPDOWN -->
                <div class="customer-user-dropdown">

                    <div class="customer-user-info">

                        <strong>
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            {{ auth()->user()->email }}
                        </span>

                    </div>


                    <a href="{{ route('customer.profile') }}">
                        Profil Saya
                    </a>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit">
                            Keluar
                        </button>
                    </form>

                </div>

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

    <footer class="customer-footer">

        <div class="container customer-footer-inner">

            <div class="customer-footer-brand">

                <strong>
                    SIRUANG
                </strong>

                <span>
                    Sistem Informasi Peminjaman Ruang
                </span>

            </div>

            <div class="customer-footer-copy">

                © {{ date('Y') }} SIRUANG
                — Sistem Informasi Peminjaman Ruang

            </div>

        </div>

    </footer>


    @stack('scripts')

</body>
</html>