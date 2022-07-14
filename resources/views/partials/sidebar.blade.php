<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-5" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <p>Perpustakaan App</p>
        </div>
    </a>

    <!-- Divider -->
    @auth('admin')
    <hr class="sidebar-divider my-0">
    
    <li class=" nav-item">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.rak-buku') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Rak Buku</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.list-buku') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Buku</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.peminjaman') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Peminjaman</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pengembalian') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengembalian</span></a>
    </li>

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.anggota') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Anggota</span></a>
    </li>
    @endauth

    @auth('user')
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    
    
        @if(auth()->user()->is_verified == 1)
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.buku.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Buku</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.denda.index')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Denda</span></a>
            </li>
        @endif
    @endauth

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none ">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>