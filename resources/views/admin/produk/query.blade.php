@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <h2>Hasil Query Builder Produk</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($produk as $item)
                    <tr>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->kategori ?? '-' }}</td>
                        <td>
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada produk yang sesuai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
