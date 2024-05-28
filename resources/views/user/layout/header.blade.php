<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/dashboard" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                {{-- @if (Auth()->user()->foto_profile) --}}
                {{-- <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}" class="user-image img-circle"
                    alt="User Image"> --}}
                {{-- @else --}}
                <img src="{{ asset('images/foto-profile.png') }}" class="user-image img-circle" alt="User Image">
                {{-- @endif --}}
                <span class="d-none d-md-inline">{{ Auth()->user()->name ?? '-' }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    {{-- @if (Auth()->user()->foto_profile) --}}
                    {{-- <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}" class="img-circle elevation-2"
                        alt="User Image"> --}}
                    {{-- @else --}}
                    <img src="{{ asset('images/foto-profile.png') }}" class="img-circle elevation-2" alt="User Image">
                    {{-- @endif --}}

                    {{-- <p>
                        {{ Auth()->user()->name ?? '-' }}
                        <small>Klinik - {{ Auth()->user()->level ?? '-' }}</small>
                    </p> --}}
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="/logout-action" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
