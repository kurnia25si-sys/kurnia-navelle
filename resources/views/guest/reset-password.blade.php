@include('guest.partials.navbar')

<div class="container mt-5 mb-5" style="max-width:500px;">
    <h1>Reset Password</h1>
    <p>Silakan masukkan password baru untuk akun Navelle.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                Konfirmasi Password Baru
            </label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                required
            >
        </div>

        <button type="submit" class="btn-navelle">
            Simpan Password Baru
        </button>
    </form>

    <p class="mt-3">
        <a href="{{ route('login') }}">Kembali ke Login</a>
    </p>
</div>

@include('guest.partials.footer')
