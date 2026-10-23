<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Navelle')</title>

    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/fontawesome.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #fff7fa;
            color: #51454a;
            font-family: Arial, sans-serif;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar kiri */
        .navelle-sidebar {
            width: 250px;
            min-width: 250px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #f3dce5;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px 24px;
            border-bottom: 1px solid #f3dce5;
            color: #bd6684;
            font-weight: bold;
            font-size: 18px;
            text-decoration: none;
        }

        .sidebar-brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .sidebar-label {
            color: #aa929c;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 26px 10px 12px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 9px;
            color: #65545c;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .sidebar-menu a:hover {
            background: #fff1f6;
            color: #bd6684;
        }

        .sidebar-menu a.active {
            background: #d985a0;
            color: #ffffff;
            font-weight: bold;
        }

        .sidebar-menu i {
            width: 18px;
            text-align: center;
        }

        .sidebar-logout {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px solid #f3dce5;
        }

        .sidebar-logout button {
            width: 100%;
            border: none;
            background: #fff1f6;
            color: #bd6684;
            padding: 12px 14px;
            border-radius: 9px;
            text-align: left;
            cursor: pointer;
        }

        .sidebar-logout button:hover {
            background: #f8d7e2;
        }

        /* Konten kanan */
        .admin-main {
            flex: 1;
            min-width: 0;
            padding: 30px;
        }

        .admin-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 1px solid #f3dce5;
        }

        .admin-topbar h2 {
            color: #51454a;
            font-size: 22px;
            font-weight: bold;
            margin: 0;
        }

        .admin-topbar span {
            color: #94858c;
            font-size: 13px;
        }

        /* Tampilan tabel dan tombol CRUD */
        .customer-card {
            background: #ffffff;
            border: 1px solid #f3dce5;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(189, 102, 132, 0.08);
            overflow: hidden;
        }

        .customer-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .customer-table thead th {
            background: #fceef3;
            color: #bd6684;
            font-weight: bold;
            padding: 16px 14px;
            border-bottom: 1px solid #f3dce5;
            white-space: nowrap;
        }

        .customer-table tbody td {
            padding: 18px 14px;
            border-bottom: 1px solid #f3dce5;
            vertical-align: middle;
        }

        .customer-table tbody tr:last-child td {
            border-bottom: none;
        }

        .customer-table tbody tr:hover {
            background: #fffafd;
        }

        .btn-navelle {
            background: #d985a0;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-navelle:hover {
            background: #bd6684;
            color: #ffffff;
            text-decoration: none;
        }

        .btn-edit {
            background: #f8d7e2;
            color: #9f4e6c;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background: #f2c3d3;
            color: #823c56;
        }

        .btn-delete {
            background: #bd6684;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
        }

        .btn-delete:hover {
            background: #a95170;
            color: #ffffff;
        }

        .btn-pink {
            background: #d97f9c;
            color: #ffffff;
            border: none;
            border-radius: 6px;
        }

        .btn-pink:hover {
            background: #bd6483;
            color: #ffffff;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .navelle-sidebar {
                width: 190px;
                min-width: 190px;
                padding: 18px 10px;
            }

            .sidebar-brand {
                font-size: 14px;
                padding-left: 4px;
            }

            .sidebar-menu a {
                padding: 11px 9px;
                gap: 7px;
                font-size: 12px;
            }

            .admin-main {
                padding: 18px 12px;
            }

            .admin-topbar h2 {
                font-size: 18px;
            }

            .customer-card .card-body {
                padding: 18px !important;
            }

            .customer-table {
                min-width: 850px;
            }
        }

        @media (max-width: 480px) {
            .admin-layout {
                display: block;
            }

            .navelle-sidebar {
                width: 100%;
                min-width: 0;
                min-height: auto;
                padding: 12px;
            }

            .sidebar-brand {
                padding-bottom: 12px;
            }

            .sidebar-label {
                margin-top: 14px;
            }

            .sidebar-menu {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .sidebar-logout {
                margin-top: 14px;
                padding-top: 12px;
            }

            .admin-main {
                padding: 18px 12px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="admin-layout">

        @include('admin.partials.navbar')

        <main class="admin-main">
            <header class="admin-topbar">
                <h2>@yield('page-heading', 'Dashboard Admin')</h2>
                <span>Admin Navelle</span>
            </header>

            @yield('content')

            @include('admin.partials.footer')
        </main>

    </div>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
