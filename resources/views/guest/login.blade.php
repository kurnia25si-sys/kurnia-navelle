@include('guest.partials.navbar')

<h1>Login</h1>

@if (session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <label>Username</label><br>
    <input type="text" name="username" required>
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Login</button>
</form>

@include('guest.partials.footer')
