@extends('layouts.admin.app')

@section('title', 'Edit Produk - Navelle Admin')

@section('content')
<div class="mb-4">
    <h1 style="color:#c46786; font-weight:bold;">Edit Produk</h1>
    <p>Perbarui informasi produk yang tersedia di toko Navelle.</p>
</div>

@include('admin.partials.alert')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Data produk belum berhasil diperbarui.</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="customer-card p-4" style="max-width:900px; margin:auto;">
    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input
                type="text"
                name="nama_produk"
                id="nama_produk"
                class="form-control"
                value="{{ old('nama_produk', $produk->nama_produk) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>

                @foreach ($kategori as $item)
                    <option
                        value="{{ $item->id }}"
                        {{ old('kategori_id', $produk->kategori_id) == $item->id ? 'selected' : '' }}
                    >
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                class="form-control"
                rows="3"
            >{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input
                type="number"
                name="harga"
                id="harga"
                class="form-control"
                value="{{ old('harga', $produk->harga) }}"
                min="0"
                required
            >
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input
                type="number"
                name="stok"
                id="stok"
                class="form-control"
                value="{{ old('stok', $produk->stok) }}"
                min="0"
                required
            >
        </div>

        <div class="mb-4">
            <label for="gambar" class="form-label">Nama File Gambar</label>
            <input
                type="text"
                name="gambar"
                id="gambar"
                class="form-control"
                value="{{ old('gambar', $produk->gambar) }}"
            >
        </div>

        <button type="submit" class="btn-navelle">
            Simpan Perubahan
        </button>

        <a href="{{ route('produk.index') }}"
           class="btn btn-outline-secondary ml-2">
            Kembali
        </a>
    </form>
</div>
@endsection
