@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Data Kategori</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
        Tambah Kategori
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('kategori.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data kategori.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
