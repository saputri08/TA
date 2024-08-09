<aside class="main-sidebar sidebar-dark-light elevation-4" style="background-color: rgb(71, 117, 77)">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ url('public') }}/admin-template/dist/img/kemenag.png" alt="Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">MAN 2 KETAPANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">LIST MENU</li>
                @if (Auth::guard('admin')->check())
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-tachometer-alt text-sm text-blue-500"></i>
                        <p class="text uppercase">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/kelas') }}"
                        class="nav-link {{ request()->is('admin/kelas') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-home text-sm text-green-500"></i>
                        <p class="text uppercase">Data Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/guru') }}"
                        class="nav-link {{ request()->is('admin/guru') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-user text-sm text-green-500"></i>
                        <p class="text uppercase">Data Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/kepsek') }}"
                        class="nav-link {{ request()->is('admin/kepsek') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-user text-sm text-green-500"></i>
                        <p class="text uppercase">Data Kepsek</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/siswa') }}"
                        class="nav-link {{ request()->is('admin/siswa') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-users text-sm text-green-500"></i>
                        <p class="text uppercase">Data Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/mapel') }}"
                        class="nav-link {{ request()->is('admin/mapel') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-book text-sm text-green-500"></i>
                        <p class="text uppercase">Data Mapel</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/tahun-ajar') }}"
                        class="nav-link {{ request()->is('admin/tahun-ajar') ? 'active' : '' }}"">
                            <i class=" nav-icon far fa-calendar-alt text-sm text-green-500"></i>
                        <p class="text uppercase">Data Tahun Ajar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/anggota') }}"
                        class="nav-link {{ request()->is('admin/anggota') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-house-user text-sm text-green-500"></i>
                        <p class="text uppercase"> Data Peserta Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/nilai') }}"
                        class="nav-link {{ request()->is('admin/nilai') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-clipboard-list text-sm text-green-500"></i>
                        <p class="text uppercase">Data Nilai</p>
                    </a>
                </li>
                @elseif (Auth::guard('siswa')->check())
                <li class="nav-item">
                    <a href="{{ url('siswa/dashboard') }}"
                        class="nav-link {{ request()->is('siswa/dashboard') ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-tachometer-alt text-sm text-blue-500"></i>
                        <p class="text uppercase">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('siswa/nilai') }}"
                        class="nav-link {{ request()->is('siswa/nilai') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-clipboard-list text-sm text-green-500"></i>
                        <p class="text uppercase">Data Nilai</p>
                    </a>
                </li>
                @elseif (Auth::guard('guru')->check())
                <li class="nav-item">
                    <a href="{{ url('guru/dashboard') }}"
                        class="nav-link {{ request()->is('guru/dashboard') ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-tachometer-alt text-sm text-blue-500"></i>
                        <p class="text uppercase">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('guru/anggota') }}"
                        class="nav-link {{ request()->is('guru/anggota') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-house-user text-sm text-green-500"></i>
                        <p class="text uppercase"> Data Peserta Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('guru/nilai') }}"
                        class="nav-link {{ request()->is('guru/nilai') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-clipboard-list text-sm text-green-500"></i>
                        <p class="text uppercase">Data Nilai</p>
                    </a>
                </li>
                @elseif (Auth::guard('kepsek')->check())
                <li class="nav-item">
                    <a href="{{ url('kepsek/dashboard') }}"
                        class="nav-link {{ request()->is('kepsek/dashboard') ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-tachometer-alt text-sm text-blue-500"></i>
                        <p class="text uppercase">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kepsek/anggota') }}"
                        class="nav-link {{ request()->is('kepsek/anggota') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-clipboard-list text-sm text-green-500"></i>
                        <p class="text uppercase">Data Peserta Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kepsek/nilai') }}"
                        class="nav-link {{ request()->is('kepsek/nilai') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-house-user text-sm text-green-500"></i>
                        <p class="text uppercase"> Data Nilai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kepsek/pengumuman') }}"
                        class="nav-link {{ request()->is('kepsek/pengumuman') ? 'active' : '' }}"">
                            <i class=" nav-icon fas fa-file-audio text-sm text-green-500"></i>
                        <p class="text uppercase"> Data Pengumuman</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /sidebar -->
</aside>