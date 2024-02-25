<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #013220">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-tachometer-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DASHBOARD</div>
    </a>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Buat Postingan
    </div>
    <li class="nav-item {{ request()->segment(2) == 'kategori' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-th-list"></i>
            <span>Kategori</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'postingan' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('postingan.index') }}">
            <i class="far fa-newspaper"></i>
            <span>Postingan</span></a>
    </li>
    <div class="sidebar-heading">
        Menu Other
    </div>
    <li class="nav-item {{ request()->segment(2) == 'qrcode' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('qrcode.index') }}">
            <i class="fas fa-qrcode"></i>
            <span>QRCODE</span></a>
    </li>
    <hr class="sidebar-divider">
    @if (Auth::user()->role == 'admin')
        <div class="sidebar-heading">
            Menu Master
        </div>
        <li class="nav-item {{ request()->segment(2) == 'pengguna' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pengguna.index') }}">
                <i class="fas fa-users"></i>
                <span>Pengguna</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
