@extends('layout.main')

@section('content')
    <!-- Profile and News -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <img src="{{ asset('images/puskesmas-profil.jpg') }}" class="img-fluid rounded w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap"
                            style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white link-hover">Puskesmas Ulak Karang
                            </a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a class="display-4 text-dark mb-0">Selamat datang di <br>Puskesmas Ulak
                            Karang</a>
                    </div>
                    <p class="my-0">Pada tahun 1976 karna seiring dengan perkembangan jumlah penduduk serta kunjungan dan
                        kebutuhan kesehatan masyarakat, Puskesmas Ulak Karang padang terus meningkatkan staf serta
                        programnya dan pada tahun 1980 staf serta program pada Puskesmas Ulak Karang sudah dinyatakan
                        sesuai, sekarang Puskesmas Ulak Karang bisa di nyatakan menjadi salah satu puskesmas dengan
                        fasilitas dan pelayanan yang cukup lengkap pada awal tahun 1980-an.
                    </p>
                    <p class="my-0">Puskesmas Ulak Karang yang awalnya berada di Jl. Medan No.6, Ulak Karang Sel., Kec.
                        Padang Utara,
                        Kota Padang, Sumatera Barat, sekarang telah beralih lokasi di Jl. Beringin 1B Kelurahan Lolong
                        Belanti, Kecamatan Padang Utara yang di resmikan oleh Walikota Padang Bapak Hendri Septa pada hari
                        Rabu tanggal 28 Desember 2022.
                    </p>
                    <div>
                        <a href="/profil" class="link-hover">
                            <small><i class="fa fa-eye"> Baca lebih lengkap...</i></small>
                        </a>
                    </div>
                    <div class="bg-light p-4 rounded mt-4">
                        <div class="news-2">
                            <h3 class="mb-4">Sejarah Puskesmas</h3>
                        </div>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('images/sejarah-puskesmas.jpg') }}"
                                        class="img-fluid rounded img-zoomin w-100" alt=""
                                        style="height: 200px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="/sejarah" class="h3 link-hover">Sejarah didirikan Pusat Kesehatan Masyarakat
                                        (Puskesmas)</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> Bacaan 5 menit</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> Dilihat 5.5k</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BERITA  --}}
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <div class="row g-4">
                            {{-- @foreach ($beritaTerbaru as $beritaTerbaru) --}}
                            <div class="col-12">
                                <div class="rounded overflow-hidden">
                                    <img src="{{ asset('storage/berita/' . $beritaTerbaru->gambar_berita) }}"
                                        class="img-fluid rounded img-zoomin w-100" alt=""
                                        style="height: 200px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('beritaDetail', ['slug' => $beritaTerbaru->slug]) }}"
                                        class="h4 mb-2 link-hover">{{ $beritaTerbaru->nama_berita }}</a>
                                    <p class="fs-5 mb-0"><i class="fa fa-calendar">
                                            {{ \Carbon\Carbon::parse($beritaTerbaru->tanggal_berita)->format('d-m-Y') }}
                                        </i> </p>
                                    <p class="fs-5 mb-0"><i class="fa fa-clock"> Bacaan
                                            {{ $beritaTerbaru->lama_berita }} menit</i></p>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                            @foreach ($beritaShow->sortByDesc('tanggal_berita') as $berita)
                                {{-- @foreach ($beritaShow as $beritaShow) --}}
                                <div class="col-12">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-5">
                                            <div class="overflow-hidden rounded">
                                                <img src="{{ asset('storage/berita/' . $berita->gambar_berita) }}"
                                                    class="img-zoomin img-fluid rounded w-100" alt=""
                                                    style="height: 100px; object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="features-content d-flex flex-column">
                                                <a href="{{ route('beritaDetail', ['slug' => $berita->slug]) }}"
                                                    class="h6 link-hover">{{ $berita->nama_berita }}</a>
                                                <small><i class="fa fa-clock">
                                                        {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d-m-Y') }}</i>
                                                </small>
                                                <small><i class="fa fa-eye"> Bacaan {{ $berita->lama_berita }}
                                                        menit</i></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-end">
                                <a href="/berita" class="text-dark link-hover"><i class="fa fa-arrow-right"></i> Lihat lebih
                                    banyak</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END BERITA --}}

            </div>
        </div>
    </div>
    <!-- End Profile and News -->

    <!-- Fasilitas -->
    <div class="container-fluid latest-news py-2">
        <div class="container py-5">
            <div class="text-center">
                <h2 class="display-5 mb-4">Fasilitas</h2>
            </div>
            <div class="latest-news-carousel owl-carousel">
                @foreach ($fasilitasis as $fasilitas)
                    <div class="latest-news-item">
                        <div class="bg-light rounded">
                            <div class="rounded-top overflow-hidden">
                                <img src="{{ asset('storage/fasilitas/' . $fasilitas->gambar_fasilitas) }}"
                                    class="img-zoomin img-fluid rounded-top w-100" alt=""
                                    style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="d-flex flex-column p-4">
                                <a class="h4 link-hover">{{ $fasilitas->nama_fasilitas }}</a>
                                <div class="d-flex justify-content-between">
                                    <a href="#"
                                        class="small text-body link-hover">{{ $fasilitas->deskripsi_fasilitas }}</a>
                                    {{-- <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Fasilitas -->

    <!-- Pengumuman -->
    <div class="container-fluid latest-news py-2">
        <div class="container py-5">
            <div class="text-center">
                <h2 class="display-5 mb-4">Pengumuman</h2>
            </div>
            <div class="latest-news-carousel owl-carousel">
                @foreach ($pengumumans as $pengumuman)
                    <div class="latest-news-item">
                        <div class="bg-light rounded">
                            <div class="rounded-top overflow-hidden">
                                <img src="{{ asset('storage/pengumuman/' . $pengumuman->gambar_pengumuman) }}"
                                    class="img-zoomin img-fluid rounded-top w-100" alt=""
                                    style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="d-flex flex-column p-4">
                                <a href="{{ route('pengumumanDetail', ['slug' => $pengumuman->slug]) }}"
                                    class="h4 link-hover">{{ $pengumuman->nama_pengumuman }}</a>
                                <div class="d-flex justify-content-between">
                                    {{-- <a href="#"
                                        class="small text-body link-hover">{{ $pengumuman->deskripsi_pengumuman }}</a> --}}
                                    {{-- {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d-m-Y') }} --}}
                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($pengumuman->tanggal_pengumuman)->format('d-m-Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Pengumuman -->

    <!-- Alur -->
    <div class="container-fluid populer-news py-5">
        <div class="container py-2">
            <div class="tab-class mb-2">
                {{-- <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mb-4">
                    <h1 class="display-5 mb-4">Alur </h1>
                </div> --}}
                <div class="text-center">
                    <h2 class="display-5 mb-4">Alur</h2>
                </div>
                <div class="tab-content mb-4">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($alurs as $alur)
                            <div class="position-relative rounded overflow-hidden">
                                <img src="{{ asset('storage/alur/' . $alur->gambar_alur) }}"
                                    class="img-fluid rounded w-100" alt="">
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">{{ $alur->nama_alur }}</a>
                            </div>
                            <p class="my-4">{{ $alur->deskripsi_alur }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Alur -->

    <!-- Gallery -->
    @include('galeri')
    <!-- End Gallery -->

    <!-- Maps -->
    <div class="container-fluid pt-2 pb-5">
        <div class="container py-2">
            <div class="row g-4 align-items-center">
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="rounded-top w-100" style="height: 450px; margin-bottom: -6px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3035526309764!2d100.35076137448084!3d-0.9203889353346588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8cb73a5e5e1%3A0xfe9682a59e3909e3!2sPuskesmas%20Ulak%20Karang!5e0!3m2!1sid!2sid!4v1717178784598!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class=" text-center p-4 rounded-bottom bg-success">
                        <h4 class="text-white fw-bold">Lokasi</h4>
                        <h3 class="text-white fw-bold">Puskesmas Ulak Karang</h3>
                        {{-- <div class="d-flex align-items-center justify-content-center">
                            <a href="#" class="btn btn-light btn-light-outline-0 btn-square rounded-circle me-3"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#"
                                class="btn btn-light btn-light-outline-0 btn-square rounded-circle me-3"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-light btn-light-outline-0 btn-square rounded-circle me-3"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-light btn-light-outline-0 btn-square rounded-circle"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Maps -->

    {{-- Footer --}}
    {{-- Back to top --}}

    {{-- readmore function --}}
@endsection
