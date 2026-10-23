@include('guest.partials.navbar')

<div class="container mt-5 mb-5" style="max-width:500px;">
    <h1>Login Admin Navelle</h1>
    <p>Silakan masuk menggunakan akun yang terdaftar.</p>

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

    <form action="{{ route('login.process') }}" method="POST">
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

        <button type="submit" class="btn-navelle">
            Login
        </button>
    </form>
</div>

@include('guest.partials.footer')
