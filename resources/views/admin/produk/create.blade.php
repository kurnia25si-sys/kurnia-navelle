@extends('layouts.admin.app')

@section('title', 'Tambah Produk - Navelle Admin')

@section('content')
<div class="mb-4">
    <h1 style="color:#c46786; font-weight:bold;">Tambah Produk</h1>
    <p>Masukkan informasi produk baru ke toko Navelle.</p>
</div>

@include('admin.partials.alert')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Data produk belum berhasil disimpan.</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="customer-card p-4" style="max-width:900px; margin:auto;">
    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control"
                   value="{{ old('nama_produk') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control"
                   value="{{ old('kategori') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control"
                   value="{{ old('harga', 0) }}" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control"
                   value="{{ old('stok', 0) }}" min="0" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Nama File Gambar (opsional)</label>
            <input type="text" name="gambar" class="form-control"
                   value="{{ old('gambar') }}">
        </div>

        <button type="submit" class="btn-navelle">
            Simpan Produk
        </button>

        <a href="{{ route('produk.index') }}"
           class="btn btn-outline-secondary ml-2">
            Kembali
        </a>
    </form>
</div>
@endsection
