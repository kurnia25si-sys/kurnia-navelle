<aside class="navelle-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <img src="{{ asset('assets-admin/img/logo navelle.png') }}"
             alt="Logo Navelle">
        <span>NAVELLE ADMIN</span>
    </a>

    <div class="sidebar-label">MENU UTAMA</div>

    <nav class="sidebar-menu">
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Data Pelanggan</span>
        </a>

        <a href="{{ route('users.index') }}"
           class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <span>Data Pengguna</span>
        </a>

        <a href="{{ route('produk.index') }}"
           class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">
            <i class="fas fa-box"></i>
            <span>Data Produk</span>
        </a>
    </nav>

    <div class="sidebar-logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i>
                &nbsp; Logout
            </button>
        </form>
    </div>
</aside>
