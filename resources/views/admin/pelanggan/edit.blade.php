@extends('layouts.admin.app')

@section('title', 'Edit Pelanggan - Navelle')

@section('content')

    <!-- Judul halaman -->
    <div class="mb-4">
        <h1 style="color: #bd6684; font-size: 28px; font-weight: bold;">
            Edit Pelanggan
        </h1>

        <p style="color: #81747a;">
            Ubah informasi pelanggan Navelle melalui formulir berikut.
        </p>
    </div>

    <!-- Pesan kesalahan validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum berhasil diperbarui.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulir edit pelanggan -->
    <div class="form-card">

        <h5 class="mb-4" style="font-weight: bold;">
            Informasi Pelanggan
        </h5>

        <form action="{{ route('pelanggan.update', $pelanggan->pelanggan_id) }}"
        method="POST">
            @csrf
            @method('PUT')

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
                           value="{{ old('first_name', $pelanggan->first_name) }}"
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
                           value="{{ old('last_name', $pelanggan->last_name) }}"
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
                           value="{{ old('birthday', $pelanggan->birthday) }}">
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
                            {{ old('gender', $pelanggan->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ old('gender', $pelanggan->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="Other"
                            {{ old('gender', $pelanggan->gender) == 'Other' ? 'selected' : '' }}>
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
                           value="{{ old('email', $pelanggan->email) }}"
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
                           value="{{ old('phone', $pelanggan->phone) }}"
                           maxlength="20">
                </div>

            </div>

            <!-- Tombol -->
            <div class="mt-4">
                <button type="submit" class="btn btn-navelle">
                    Simpan Perubahan
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
