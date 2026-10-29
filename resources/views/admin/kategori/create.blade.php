@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">
                Nama Kategori
            </label>
            <input
                type="text"
                name="nama_kategori"
                id="nama_kategori"
                class="form-control"
                value="{{ old('nama_kategori') }}"
                maxlength="100"
                required
            >
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">
                Deskripsi
            </label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                class="form-control"
                rows="3"
            >{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
