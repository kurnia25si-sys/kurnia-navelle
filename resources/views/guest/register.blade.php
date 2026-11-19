@include('guest.partials.navbar')

<div class="container mt-5 mb-5" style="max-width:500px;">
    <h1>Daftar Akun Navelle</h1>
    <p>Buat akun untuk mulai berbelanja di Navelle.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
        </div>

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

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
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
                Konfirmasi Password
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
            Daftar
        </button>
    </form>

    <p class="mt-3">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </p>
</div>

@include('guest.partials.footer')
