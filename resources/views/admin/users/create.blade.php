@extends('layouts.admin.app')

@section('title', 'Tambah User - Navelle Admin')

@section('content')

    <div class="mb-4">
        <h1 style="color: #c46786; font-weight: bold;">
            Tambah User
        </h1>

        <p>Masukkan informasi akun pengguna baru.</p>
    </div>

    @include('admin.partials.alert')

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

    <div class="form-card" style="max-width: 900px; margin: auto;">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- Nama lengkap -->
            <div class="mb-3">
                <label for="name" class="form-label">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
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
                       value="{{ old('email') }}"
                       required>

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small class="text-muted">
                    Password minimal 8 karakter.
                </small>
            </div>

            <!-- Konfirmasi password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       class="form-control"
                       required>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-pink">
                Simpan User
            </button>

            <a href="{{ route('users.index') }}"
               class="btn btn-outline-secondary">
                Kembali
            </a>

        </form>
    </div>

@endsection
