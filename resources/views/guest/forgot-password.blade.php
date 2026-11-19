@include('guest.partials.navbar')

<div class="container mt-5 mb-5" style="max-width:500px;">
    <h1>Lupa Password?</h1>
    <p>Masukkan email akun Navelle untuk mendapatkan link reset password.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                required
            >
        </div>

        <button type="submit" class="btn-navelle">
            Kirim Link Reset Password
        </button>
    </form>

    <p class="mt-3">
        <a href="{{ route('login') }}">Kembali ke Login</a>
    </p>
</div>

@include('guest.partials.footer')
