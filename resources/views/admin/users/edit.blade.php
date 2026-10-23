@extends('layouts.admin.app')

@section('title', 'Edit User - Navelle Admin')

@section('content')

    <!-- Judul halaman -->
    <div class="mb-4">
        <h1 style="color: #c46786; font-weight: bold;">
            Edit User
        </h1>

        <p>Perbarui informasi akun pengguna Navelle.</p>
    </div>

    @include('admin.partials.alert')

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

    <!-- Form edit user -->
    <div class="form-card" style="max-width: 900px; margin: auto;">

        <form action="{{ route('users.update', $user->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <!-- Nama lengkap -->
            <div class="mb-3">
                <label for="name" class="form-label">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $user->name) }}"
                       required>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $user->email) }}"
                       required>

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password baru -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    Password Baru (Opsional)
                </label>

                <input type="password"
                       name="password"
                       id="password"
                       class="form-control @error('password') is-invalid @enderror">

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti password.
                    Jika diisi, minimal 8 karakter.
                </small>
            </div>

            <!-- Konfirmasi password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password Baru
                </label>

                <input type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       class="form-control">
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-pink">
                Simpan Perubahan
            </button>

            <a href="{{ route('users.index') }}"
               class="btn btn-outline-secondary">
                Kembali
            </a>

        </form>
    </div>

@endsection
