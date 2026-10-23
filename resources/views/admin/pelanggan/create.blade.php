@extends('layouts.admin.app')

@section('title', 'Tambah Pelanggan - Navelle')

@section('content')

    <!-- Judul halaman -->
    <div class="mb-4">
        <h1 style="color: #bd6684; font-size: 28px; font-weight: bold;">
            Tambah Pelanggan
        </h1>

        <p style="color: #81747a;">
            Isi formulir berikut untuk menambahkan pelanggan baru Navelle.
        </p>
    </div>

    <!-- Pesan berhasil -->
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

    <!-- Formulir pelanggan -->
    <div class="form-card">

        <h5 class="mb-4" style="font-weight: bold;">
            Informasi Pelanggan
        </h5>

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
                        <option value="">-- Pilih Jenis Kelamin --</option>

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

                <!-- Email -->
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

            <!-- Tombol -->
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

@endsection
