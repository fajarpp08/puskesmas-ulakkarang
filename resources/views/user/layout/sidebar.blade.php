<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('images/logo-puskesmas.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
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
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- @if (Auth()->user()->level == 'Admin') --}}
                <li class="nav-item">
                    <a href="#" class="nav-link @yield('menuDataDokter')">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Data Poli
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- <a href="{{ route('data-dokter.index') }}"
                                    class="nav-link @yield('menuDokter')">
                                    <i class="far fa-circle nav-icon text-danger"></i>
                                    <p>Data Dokter</p>
                                </a> --}}
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('data-hari.index') }}" class="nav-link @yield('menuDataHari')">
                                    <i class="far fa-circle nav-icon text-warning"></i>
                                    <p>Data Hari</p>
                                </a> --}}
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('data-obat.index') }}" class="nav-link @yield('menuDataObat')">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Data Obat</p>
                        </a> --}}
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('user.index') }}" class="nav-link @yield('menuUserRegistrasi')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>User Registrasi</p>
                        </a> --}}
                </li>
                {{-- @elseif(Auth()->user()->level == 'Dokter') --}}
                {{-- @elseif(Auth()->user()->level == 'Pasien') --}}
                <li class="nav-item">
                    {{-- <a href="{{ route('rekamedis.index') }}" class="nav-link @yield('menuRekamedisPasien')">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>Data Rekamedis</p>
                        </a> --}}
                </li>
                {{-- @endif --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
