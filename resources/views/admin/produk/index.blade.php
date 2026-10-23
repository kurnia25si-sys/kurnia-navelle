@extends('layouts.admin.app')

@section('title', 'Data Produk - Navelle Admin')

@section('content')
<div class="mb-4">
    <h1 style="color:#c46786; font-weight:bold;">Data Produk Navelle</h1>
    <p>Kelola data produk yang tersedia di toko Navelle.</p>
</div>

@include('admin.partials.alert')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 style="color:#51454a;">Daftar Produk</h5>
    <a href="{{ route('produk.create') }}" class="btn-navelle">
        + Tambah Produk
    </a>
</div>

<div class="customer-card">
    <div class="table-responsive">
        <table class="customer-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($produk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->kategori ?? '-' }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->stok }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('produk.edit', $item->id) }}"
                               class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('produk.destroy', $item->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
