
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Navelle Admin</title>
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
            max-width: 900px;
            margin: auto;
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
        .form-control:focus {
            border-color: #d97f9c;
            box-shadow: 0 0 0 0.2rem #fce4ed;
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
    </style>
</head>
<body>

@include('admin.partials.navbar', ['activeMenu' => 'users'])

<div class="container-main">
    <h1>Edit User</h1>
    <p>Perbarui informasi akun pengguna Navelle.</p>

    @include('admin.partials.alert')

    <div class="card shadow-sm mt-4">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    Password Baru (Opsional)
                </label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti password.
                    Jika diisi, minimal 8 karakter.
                </small>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password Baru
                </label>
                <input type="password" name="password_confirmation"
                       id="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-pink">Simpan Perubahan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

@include('admin.partials.footer')
© 2026 Navelle Admin
</footer>

</body>
</html>
