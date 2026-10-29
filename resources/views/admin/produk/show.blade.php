@extends('layouts.admin.app')

@section('title', 'Detail Produk - Navelle Admin')

@section('content')
<div class="mb-4">
    <h1 style="color:#c46786; font-weight:bold;">Detail Produk</h1>
    <p>Informasi lengkap produk yang tersedia di toko Navelle.</p>
</div>

<div class="customer-card p-4" style="max-width:900px; margin:auto;">
    <table class="table table-bordered">
        <tr>
            <th style="width:200px;">Nama Produk</th>
            <td>{{ $produk->nama_produk }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $produk->kategori_nama ?? $produk->kategori ?? '-' }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $produk->deskripsi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $produk->stok }}</td>
        </tr>
        <tr>
            <th>Nama File Gambar</th>
            <td>{{ $produk->gambar ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('produk.index') }}"
       class="btn btn-outline-secondary">
        Kembali
    </a>

    <a href="{{ route('produk.edit', $produk->id) }}"
       class="btn-edit">
        Edit Produk
    </a>
</div>
@endsection
