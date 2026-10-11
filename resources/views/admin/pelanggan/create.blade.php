
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pelanggan - Navelle</title>

    <!-- Bootstrap untuk tata letak formulir -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">

    <!-- Tema pink-putih admin Navelle -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/templatemo-style.css') }}">

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/fontawesome.css') }}">

    <style>
        /* Latar belakang halaman tambah pelanggan */
        body {
            background-color: #fff7fa;
            color: #51454a;
        }

        /* Kotak utama formulir */
        .form-card {
            background-color: #ffffff;
            border: 1px solid #f3dce5;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(189, 102, 132, 0.08);
            padding: 28px;
        }

        /* Label pada setiap input */
        .form-label {
            color: #51454a;
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* Input dan pilihan jenis kelamin */
        .form-control {
            border: 1px solid #f0d7e1;
            border-radius: 8px;
            min-height: 44px;
        }

        .form-control:focus {
            border-color: #d985a0;
            box-shadow: 0 0 0 0.2rem rgba(217, 133, 160, 0.15);
        }

        /* Tombol simpan */
        .btn-navelle {
            background-color: #d985a0;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .btn-navelle:hover {
            background-color: #bd6684;
            color: #ffffff;
        }

        /* Tampilan halaman pada layar kecil */
        @media (max-width: 576px) {
            .form-card {
                padding: 18px;
            }

            .navbar-nav-menu {
                margin-top: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar utama admin Navelle -->
    <nav class="navbar navbar-expand-lg navbar-light"
         style="background-color: #ffffff; border-bottom: 1px solid #f3dce5; padding: 16px 30px;">

        <!-- Logo dan nama toko -->
        <a class="navbar-brand d-flex align-items-center"
           href="{{ url('/admin') }}"
           style="color: #bd6684; font-weight: bold;">

            <img src="{{ asset('assets-admin/img/logo navelle.png') }}"
                 alt="Logo Navelle"
                 width="45"
                 height="45"
                 style="object-fit: contain; margin-right: 10px;">

            <span>NAVELLE ADMIN</span>
        </a>

        <!-- Menu navigasi -->
        <div class="ml-auto d-flex align-items-center navbar-nav-menu"
             style="gap: 20px;">

            <a href="{{ url('/admin') }}"
               style="color: #51454a; text-decoration: none;">
                Dashboard
            </a>

            <a href="{{ route('pelanggan.index') }}"
               style="color: #bd6684; font-weight: bold; text-decoration: none;">
                Data Pelanggan
            </a>
        </div>
    </nav>

    <!-- Konten utama halaman -->
    <main class="container-fluid px-4 py-4">

        <!-- Judul dan keterangan halaman -->
        <div class="mb-4">
            <h1 style="color: #bd6684; font-size: 28px; font-weight: bold;">
                Tambah Pelanggan
            </h1>

            <p style="color: #81747a;">
                Isi formulir berikut untuk menambahkan pelanggan baru Navelle.
            </p>
        </div>

        <!-- Pesan berhasil menyimpan data -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan kesalahan validasi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Data belum berhasil disimpan.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Kotak formulir pelanggan -->
        <div class="form-card">

            <h5 class="mb-4" style="font-weight: bold;">
                Informasi Pelanggan
            </h5>

            <!-- Form mengirim data ke proses penyimpanan pelanggan -->
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="row">

                    <!-- Nama depan -->
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">
                            Nama Depan *
                        </label>

                        <input type="text"
                               id="first_name"
                               name="first_name"
                               class="form-control"
                               value="{{ old('first_name') }}"
                               maxlength="100"
                               required>
                    </div>

                    <!-- Nama belakang -->
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">
                            Nama Belakang *
                        </label>

                        <input type="text"
                               id="last_name"
                               name="last_name"
                               class="form-control"
                               value="{{ old('last_name') }}"
                               maxlength="100"
                               required>
                    </div>

                    <!-- Tanggal lahir -->
                    <div class="col-md-6 mb-3">
                        <label for="birthday" class="form-label">
                            Tanggal Lahir
                        </label>

                        <input type="date"
                               id="birthday"
                               name="birthday"
                               class="form-control"
                               value="{{ old('birthday') }}">
                    </div>

                    <!-- Jenis kelamin -->
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">
                            Jenis Kelamin
                        </label>

                        <select id="gender"
                                name="gender"
                                class="form-control">
                            <option value="">
                                -- Pilih Jenis Kelamin --
                            </option>

                            <option value="Male"
                                {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female"
                                {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Other"
                                {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>
                    </div>

                    <!-- Email pelanggan -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">
                            Email *
                        </label>

                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               required>
                    </div>

                    <!-- Nomor telepon -->
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">
                            Nomor Telepon
                        </label>

                        <input type="text"
                               id="phone"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone') }}"
                               maxlength="20">
                    </div>

                </div>

                <!-- Tombol untuk menyimpan atau membatalkan -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-navelle">
                        Simpan Pelanggan
                    </button>

                    <a href="{{ route('pelanggan.index') }}"
                       class="btn btn-outline-secondary ml-2"
                       style="border-radius: 8px; padding: 10px 20px;">
                        Batal
                    </a>
                </div>

            </form>
        </div>

        <!-- Footer halaman admin -->
        <footer class="text-center mt-5 py-3"
                style="color: #94858c;">
            &copy; {{ date('Y') }} Navelle Admin
        </footer>

    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>
