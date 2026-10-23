@extends('layouts.admin.app')

@section('title', 'Data User - Navelle Admin')

@section('content')

    <!-- Judul halaman -->
    <h1 style="color: #c46786; font-weight: bold;">
        Data User
    </h1>

    <p>Kelola akun pengguna Navelle di sini.</p>

    <!-- Pesan berhasil atau gagal -->
    @include('admin.partials.alert')

    <!-- Daftar user -->
    <div class="card shadow-sm mt-4"
         style="border: none; border-radius: 15px; padding: 25px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Daftar User</h4>
                <p>Data akun yang terdaftar di Navelle.</p>
            </div>

            <a href="{{ route('users.create') }}"
               class="btn btn-pink">
                + Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead style="background: #fcecf2; color: #bd6483;">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-sm btn-pink">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Belum ada data user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
