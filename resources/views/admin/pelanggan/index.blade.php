@extends('layouts.admin.app')

@section('title', 'Data Pelanggan - Navelle')

@section('content')

    <h1 style="color: #bd6684; font-weight: bold; font-size: 28px;">
        Data Pelanggan
    </h1>

    <p style="color: #81747a; margin-bottom: 25px;">
        Kelola dan periksa informasi pelanggan Navelle di sini.
    </p>

    @include('admin.partials.alert')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 customer-card">
        <div class="card-body" style="padding: 25px;">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <div>
                    <h5 style="color: #51454a; font-weight: bold; margin-bottom: 5px;">
                        Daftar Pelanggan
                    </h5>
                    <small style="color: #94858c;">
                        Data pelanggan yang terdaftar di Navelle.
                    </small>
                </div>

                <a href="{{ route('pelanggan.create') }}" class="btn-navelle mt-2">
                    + Tambah Pelanggan
                </a>
            </div>

            <div class="table-responsive">
                <table class="table customer-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pelanggan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                <td>{{ $item->birthday ?? '-' }}</td>
                                <td>{{ $item->gender ?? '-' }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone ?? '-' }}</td>
                                <td style="white-space: nowrap;">
                                    <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                       class="btn btn-sm btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    Belum ada data pelanggan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
