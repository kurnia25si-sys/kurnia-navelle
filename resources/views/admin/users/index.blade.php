
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - Navelle Admin</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">
    <style>
        body {
            background: #fff6f9;
            color: #55434a;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #f5dce5;
        }
        .navbar a {
            color: #bd6483;
            text-decoration: none;
            margin-left: 20px;
        }
        .container-main {
            padding: 30px;
        }
        h1 {
            color: #c46786;
            font-weight: bold;
        }
        .card {
            border: none;
            border-radius: 15px;
            padding: 25px;
        }
        .btn-pink {
            background: #d97f9c;
            color: white;
            border: none;
        }
        .btn-pink:hover {
            background: #bd6483;
            color: white;
        }
        .table thead {
            background: #fcecf2;
            color: #bd6483;
        }
    </style>
</head>
<body>

@include('admin.partials.navbar', ['activeMenu' => 'users'])

<div class="container-main">
    <h1>Data User</h1>
    <p>Kelola akun pengguna Navelle di sini.</p>

    @include('admin.partials.alert')

    <div class="card shadow-sm mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Daftar User</h4>
                <p>Data akun yang terdaftar di Navelle.</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-pink">
                + Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
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
                                   class="btn btn-sm btn-pink">Edit</a>

                                <form action="{{ route('users.destroy', $user->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
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
</div>

@include('admin.partials.footer')
© 2026 Navelle Admin
</footer>

</body>
</html>
