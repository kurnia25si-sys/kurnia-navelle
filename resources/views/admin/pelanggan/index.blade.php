
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pelanggan - Navelle</title>

    <!-- Bootstrap untuk tata letak dan komponen tabel -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">

    <!-- Tema utama admin Navelle -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/templatemo-style.css') }}">

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/fontawesome.css') }}">

    <style>
        /* Latar belakang halaman data pelanggan */
        body {
            background-color: #fff7fa;
            color: #51454a;
        }

        /* Kotak utama daftar pelanggan */
        .customer-card {
            background-color: #ffffff;
            border: 1px solid #f3dce5;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(189, 102, 132, 0.08);
            overflow: hidden;
        }

        /* Tabel agar tetap rapi saat layar mengecil */
        .customer-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .customer-table thead th {
            background-color: #fceef3;
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
            background-color: #fffafd;
        }

        /* Tombol tambah pelanggan */
        .btn-navelle {
            background-color: #d985a0;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-navelle:hover {
            background-color: #bd6684;
            color: #ffffff;
            text-decoration: none;
        }

        /* Tombol edit */
        .btn-edit {
            background-color: #f8d7e2;
            color: #9f4e6c;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #f2c3d3;
            color: #823c56;
        }

        /* Tombol hapus */
        .btn-delete {
            background-color: #bd6684;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
        }

        .btn-delete:hover {
            background-color: #a95170;
            color: #ffffff;
        }

        /* Navbar untuk halaman admin */
        .navelle-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #f3dce5;
            padding: 16px 30px;
        }

        .navelle-brand {
            color: #bd6684;
            font-weight: bold;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navelle-brand:hover {
            color: #a95170;
            text-decoration: none;
        }

        .navelle-link {
            color: #51454a;
            text-decoration: none;
            margin-left: 20px;
        }

        .navelle-link:hover,
        .navelle-link.active {
            color: #bd6684;
            font-weight: bold;
            text-decoration: none;
        }

        /* Penyesuaian untuk layar kecil */
        @media (max-width: 768px) {
            .navelle-navbar {
                padding: 14px 16px;
            }

            .customer-card .card-body {
                padding: 18px !important;
            }

            .customer-table {
                min-width: 850px;
            }

            .navelle-link {
                margin-left: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar utama admin Navelle -->
    @include('admin.partials.navbar', ['activeMenu' => 'pelanggan'])
        <!-- Logo dan nama toko -->
        <a class="navbar-brand navelle-brand" href="{{ url('/admin') }}">
            <img src="{{ asset('assets-admin/img/logo navelle.png') }}"
                 alt="Logo Navelle"
                 width="45"
                 height="45"
                 style="object-fit: contain; margin-right: 10px;">

            <span>NAVELLE ADMIN</span>
        </a>

        <!-- Menu navigasi admin -->
        <div class="ml-auto d-flex align-items-center">
            <a href="{{ url('/admin') }}" class="navelle-link">
                Dashboard
            </a>

            <a href="{{ route('pelanggan.index') }}"
               class="navelle-link active">
                Data Pelanggan
            </a>
        </div>
    </nav>

    <!-- Konten utama halaman -->
    <main class="content">

        <div class="container-fluid px-4 py-4">

            <!-- Judul halaman -->
            <h1 style="color: #bd6684; font-weight: bold; font-size: 28px;">
                Data Pelanggan
            </h1>

            <p style="color: #81747a; margin-bottom: 25px;">
                Kelola dan periksa informasi pelanggan Navelle di sini.
            </p>

            <!-- Pesan berhasil -->
            {{-- Partial View untuk pesan notifikasi --}}
            @include('admin.partials.alert')

            <!-- Pesan kesalahan validasi -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Kotak utama daftar pelanggan -->
            <div class="card border-0 customer-card">
                <div class="card-body" style="padding: 25px;">

                    <!-- Judul tabel dan tombol tambah -->
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                        <div>
                            <h5 style="color: #51454a; font-weight: bold; margin-bottom: 5px;">
                                Daftar Pelanggan
                            </h5>

                            <small style="color: #94858c;">
                                Data pelanggan yang terdaftar di Navelle.
                            </small>
                        </div>

                        <a href="{{ route('pelanggan.create') }}"
                           class="btn-navelle mt-2">
                            + Tambah Pelanggan
                        </a>
                    </div>

                    <!-- Tabel data pelanggan -->
                    <div class="table-responsive">
                        <table class="table customer-table">

                            <!-- Judul kolom -->
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($pelanggan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $item->first_name }}
                                            {{ $item->last_name }}
                                        </td>

                                        <td>{{ $item->birthday ?? '-' }}</td>

                                        <td>{{ $item->gender ?? '-' }}</td>

                                        <td>{{ $item->email }}</td>

                                        <td>{{ $item->phone ?? '-' }}</td>

                                        <!-- Tombol edit dan hapus -->
                                        <td style="white-space: nowrap;">

                                            <!-- Mengarahkan ke formulir edit pelanggan -->
                                            <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                               class="btn btn-sm btn-edit">
                                                Edit
                                            </a>

                                            <!-- Menghapus pelanggan setelah konfirmasi -->
                                            <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-delete">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <!-- Pesan jika belum ada data pelanggan -->
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            Belum ada data pelanggan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

            <!-- Footer halaman admin -->
            @include('admin.partials.footer')

        </div>
    </main>

    <!-- Bootstrap untuk komponen halaman -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>
