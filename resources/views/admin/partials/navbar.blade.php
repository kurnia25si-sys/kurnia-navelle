
<nav class="navbar navbar-expand-lg navbar-light navelle-navbar">
    <a class="navbar-brand navelle-brand" href="{{ url('/admin') }}">
        <img src="{{ asset('assets-admin/img/logo navelle.png') }}"
             alt="Logo Navelle"
             width="45"
             height="45"
             style="object-fit: contain; margin-right: 10px;">
        <span>NAVELLE ADMIN</span>
    </a>

    <div class="ml-auto d-flex align-items-center">
        <a href="{{ url('/admin') }}"
           class="navelle-link {{ ($activeMenu ?? '') === 'dashboard' ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="navelle-link {{ ($activeMenu ?? '') === 'pelanggan' ? 'active' : '' }}">
            Data Pelanggan
        </a>

        <a href="{{ route('users.index') }}"
           class="navelle-link {{ ($activeMenu ?? '') === 'users' ? 'active' : '' }}">
            Data User
        </a>
    </div>
</nav>
