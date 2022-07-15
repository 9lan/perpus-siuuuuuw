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
    
    @if(auth()->user()->foto)
        <li class="nav-item px-3 d-none d-md-block">
            <img src="{{ env('APP_URL') . ':8000/storage/' . auth()->user()->foto }}" class="img-thumbnail profile rounded-circle" alt="{{ 'Foto ' . auth()->user()->name }}">
            <p class="text-center text-white mt-2">{{auth()->user()->name}}</p>
        </li>
    @else
        <li class="nav-item px-3 d-none d-md-block">
            <img src="https://cdn0-production-images-kly.akamaized.net/10pYJTQfy8oxHSgSGmvpgDCAGic=/1200x1200/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2832638/original/037807400_1560947825-20190619-Anya-Geraldine-1.jpg" class="img-thumbnail profile rounded-circle" alt="">
        </li>
    @endif

        @if(auth()->user()->is_verified == 1)

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.buku.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Buku</span></a>
            </li>

            <hr class="sidebar-divider my-0">
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.peminjaman.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Peminjaman</span></a>
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