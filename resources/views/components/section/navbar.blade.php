<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <!-- Logo -->
        <a href="{{ url('siswa/dashboard') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ url('public') }}/admin-template/dist/img/logo-kemenag.png" alt="Logo">
            <h1 class="sitename" style="color: white;">MAN 2<br>KETAPANG</h1>
        </a>

        <!-- Navigation Menu -->
        <nav id="navmenu" class="navmenu d-flex align-items-center">
            <ul>
                <li><a href="{{ url('siswa/dashboard') }}" class="{{ request()->is('siswa/dashboard') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ url('siswa/nilai') }}" class="{{ request()->is('siswa/nilai') ? 'active' : '' }}">Nilai</a></li>
                <li><a href="{{ url('logout') }}" class="logout">Logout</a></li>
            </ul>
            <!-- Mobile Nav Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list ms-auto"></i>
        </nav>

        <!-- Dropdown Profil -->
        <ul class="btn-getstarted" style="list-style: none;">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle d-flex align-items-center" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(Auth::guard('siswa')->check())
                    <span style="color: white;">Hallo, {{ Auth::guard('siswa')->user()->nama }}</span>
                    @if (Auth::guard('siswa')->user()->foto)
                    <img src="{{ url('public') }}/{{ Auth::guard('siswa')->user()->foto }}" alt="User Image" style="width: 42px; height: 42px; padding: 8px; margin: 0;border-radius: 50%;">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" alt="User Avatar" class="img-circle" style="width: 42px; height: 42px; padding: 8px; margin: 0;">
                    @endif
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ url('siswa/profile') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>