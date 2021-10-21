<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('public/assets/images/logo/logo1.png')}}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item @yield('dashboard') ">
                            <a href="{{ route('home')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item  has-sub @yield('main')">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Produk</span>
                            </a>
                            <ul class="submenu @yield('main')">
                                <li class="submenu-item @yield('mn_idx')">
                                    <a href="{{ route('menu.index')}}">Semua Menu</a>
                                </li>
                                <li class="submenu-item @yield('mn_crt')">
                                    <a href="{{ route('menu.create')}}">Tambah Menu</a>
                                </li>
                                <!-- <li class="submenu-item @yield('ctg_idx')">
                                    <a href="#">Semua Kategori</a>
                                </li>
                                <li class="submenu-item @yield('ctg_crt')">
                                    <a href="#">Tambah Kategori</a>
                                </li> -->
                            </ul>
                        </li>

                        <li class="sidebar-item @yield('lprn')">
                            <a href="{{ route('pemasukkan')}}" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Laporan Pemasukan</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub @yield('mainz')">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>List Admin</span>
                            </a>
                            <ul class="submenu @yield('mainz')">
                                <li class="submenu-item @yield('adm_idx')">
                                    <a href="{{ route('user.index')}}">Semua Admin</a>
                                </li>
                                <li class="submenu-item @yield('adm_crt')">
                                    <a href="{{ route('user.create')}}">Tambah Admin</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
