<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgb(254, 250, 250)">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <div class="pointer" data-toggle="dropdown">
                <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
                    <span class="semi-bold" style="font-weight: 500 ;">
                        @if (Auth::guard('admin')->check())
                            Hallo, {{ Auth::guard('admin')->user()->nama }}
                            @if (Auth::guard('admin')->user()->foto)
                                <img src="{{ url('public') }}/{{ Auth::guard('admin')->user()->foto }}" alt="User Image"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @else
                                <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" alt="User Avatar"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @endif
                        @elseif(Auth::guard('siswa')->check())
                            Hallo, {{ Auth::guard('siswa')->user()->nama }}
                            @if (Auth::guard('siswa')->user()->foto)
                                <img src="{{ url('public')}}/{{ Auth::guard('siswa')->user()->foto }}" alt="User Image"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @else
                                <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" alt="User Avatar"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @endif
                        @elseif(Auth::guard('guru')->check())
                            Hallo, {{ Auth::guard('guru')->user()->nama_guru }}
                            @if (Auth::guard('guru')->user()->foto)
                                <img src="{{ url('public')}}/{{ Auth::guard('guru')->user()->foto }}" alt="User Image"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @else
                                <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" alt="User Avatar"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @endif
                        @elseif(Auth::guard('kepsek')->check())
                            Hallo, {{ Auth::guard('kepsek')->user()->nama_kepsek }}
                            @if (Auth::guard('kepsek')->user()->foto)
                                <img src="{{ url('public') }}/{{ Auth::guard('kepsek')->user()->foto }}" alt="User Image"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @else
                                <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" alt="User Avatar"
                                    style="width: 42px;height: 42px; padding: 8px; margin: 0px;" class="img-circle">
                            @endif
                        @endif
                    </span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                    <div class="">
                        <p class="dropdown-header font-weight-bold">
                            @if (Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->nama }}
                            @elseif (Auth::guard('siswa')->check())
                                {{ Auth::guard('siswa')->user()->nama }}
                            @elseif (Auth::guard('guru')->check())
                                {{ Auth::guard('guru')->user()->nama_guru }}
                            @elseif (Auth::guard('kepsek')->check())
                                {{ Auth::guard('kepsek')->user()->nama_kepsek }}
                            @endif
                        </p>
                    </div>
                </div>
                @if (Auth::guard('admin')->check())
                    <a href="{{ url('admin/profile') }}" class="dropdown-item d-block p-h-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-user"></i>
                                <span class="m-l-10">Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                @elseif (Auth::guard('siswa')->check())
                    <a href="{{ url('siswa/profile') }}" class="dropdown-item d-block p-h-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-user"></i>
                                <span class="m-l-10">Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                @elseif (Auth::guard('guru')->check())
                    <a href="{{ url('guru/profile') }}" class="dropdown-item d-block p-h-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-user"></i>
                                <span class="m-l-10">Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                @elseif (Auth::guard('kepsek')->check())
                    <a href="{{ url('kepsek/profile') }}" class="dropdown-item d-block p-h-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-user"></i>
                                <span class="m-l-10">Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                @endif
                <a href="{{ url('logout') }}" class="dropdown-item d-block p-h-15">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="m-l-10">Logout</span>
                        </div>
                        <i class="anticon font-size-10 anticon-right"></i>
                    </div>
                </a>
            </div>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> -->
    </ul>
</nav>
