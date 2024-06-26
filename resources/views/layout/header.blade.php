<div class="container-fluid sticky-top px-0">
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl">
                <div class="rounded-circle overflow-hidden">
                    <img src="{{ asset('images/logo-puskesmas.png') }}" class="img-fluid rounded-circle" width="40px"
                        height="35px" alt="">
                </div>
                <a href="index.html" class="navbar-brand mt-3">
                    <p class="text-success display-6 mb-2" style="line-height: 0;">Puskesmas</p>
                    <small class="text-body fw-normal" style="letter-spacing: 12px;">Ulak Karang</small>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-success"></span>
                </button>
                <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                    <div class="navbar-nav mx-auto border-top">
                        <a href="/" class="nav-item nav-link active">Beranda</a>
                        {{-- <a href="detail-page.html" class="nav-item nav-link">Tentang Kami</a> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang
                                Kami</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="/profil" class="dropdown-item">Profil</a>
                                <a href="/sejarah" class="dropdown-item">Sejarah</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pelayanan</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="/poliklinik" class="dropdown-item">Poliklinik</a>
                                <a href="/instalasi" class="dropdown-item">Instalasi</a>
                                <a href="/alur" class="dropdown-item">Alur</a>
                                <a href="/program" class="dropdown-item">Program</a>
                                <a href="/struktur" class="dropdown-item">Struktur</a>
                            </div>
                        </div>
                        <a href="/berita" class="nav-item nav-link">Berita</a>
                        <a href="/galeri" class="nav-item nav-link">Galeri</a>
                        <a href="/pengumuman" class="nav-item nav-link">Pengumuman</a>
                    </div>
                    <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                        <div class="d-flex">
                            <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt="">
                            <div class="d-flex align-items-center">
                                <strong id="realtime-clock" class="fs-4 text-secondary">{{ date('H:i:s') }}</strong>
                                <div class="d-flex flex-column ms-2" style="width: 150px;">
                                    <span id="realtime-day" class="text-body">{{ date('l') }}</span>
                                    <small id="realtime-date"> {{ date('d-m-Y') }}</small>
                                </div>
                            </div>
                        </div>
                        {{-- <a href="{{ route('login') }}">
                            <button
                                class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto"><i
                                    class="bi bi-person-circle"></i></button>
                        </a> --}}
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
