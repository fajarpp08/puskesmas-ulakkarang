<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('images/logo-puskesmas.png') }}" alt="AdminLTE Logo" class="brand-image img-circle mt-3">
        <span class="brand-text font-weight-bold text-white">Puskesmas</span> <br>
        <span class="brand-text font-weight-bold text-white">Ulak Karang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboardadmin" class="nav-link @yield('menuDashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-poli" class="nav-link @yield('menuDataPoli')">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Poliklinik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-struktur" class="nav-link @yield('menuDataStruktur')">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Struktur</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-fasilitas" class="nav-link @yield('menuDataFasilitas')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Fasilitas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-instalasi" class="nav-link @yield('menuDataInstalasi')">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>Instalasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-pengumuman" class="nav-link @yield('menuDataPengumuman')">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-alur" class="nav-link @yield('menuDataAlur')">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Alur</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-program" class="nav-link @yield('menuDataProgram')">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Program</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-berita" class="nav-link @yield('menuDataBerita')">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-galeri" class="nav-link @yield('menuDataGaleri')">
                        <i class="nav-icon far fa-image"></i>
                        <p>Galeri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-user" class="nav-link @yield('menuDataUser')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
