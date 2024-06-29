@php
    $berita = App\Models\Berita::take(2)->latest()->get();
    $galeri = App\Models\Galeri::take(6)->latest()->get();
@endphp
<!-- Footer Start -->
<div class="container-fluid bg-dark footer py-2 rounded-top">
    <div class="container py-4">
        <div class="row g-5">
            {{-- Profile --}}
            <div class="col-lg-6 col-xl-3">
                <div class="footer-item-1">
                    {{-- <h4 class="mb-4 text-white">Get In Touch</h4> --}}
                    <a href="#" class="d-flex flex-column flex-wrap">
                        <p class="text-success mb-0 display-6">Puskesmas</p>
                        <small class="text-light" style="letter-spacing: 11px; line-height: 0;">Ulak Karang</small>
                    </a>
                    <p class="text-secondary mt-4"><span class="text-white">Jl. Medan No.6, Ulak Karang Sel., Kec.
                            Padang Utara, Kota Padang, Sumatera Barat</span></p>
                    <a class="text-secondary line-h" href="{{ url('mailto:puskesmasulakkarang@gmail.com') }}"><span
                            class="text-white">puskesmasulakkarang@gmail.com</span>
                    </a>
                    {{-- <a class="text-secondary line-h"
                        href="https://wa.me/6281218173646?text=Halo,%20Tolong%20bantu%20saya%20ingin%20mengubah%20data%20akun%20rental%20mobil%20saya">
                        <span class="text-white">+62 812 1817 3646</span></a> --}}
                    <div class="d-flex line-h mt-2">
                        <a class="btn btn-light me-2 btn-md-square rounded-circle"
                            href="https://wa.me/6283196309831?text=Halo,%20Saya%20ingin%20bertanya%20tentang%20Website%20Puskesmas%20Ulak%20Karang"><i
                                class="fab fa-whatsapp text-dark"></i></a>
                        <a class="btn btn-light me-2 btn-md-square rounded-circle"
                            href="https://www.facebook.com/profile.php?id=100066913796750&mibextid=LQQJ4d"><i
                                class="fab fa-facebook-f text-dark"></i></a>
                        <a class="btn btn-light me-2 btn-md-square rounded-circle"
                            href="https://www.instagram.com/puskesmasulakkarang?igsh=MTJyZGgydWZ0dTlndA=="><i
                                class="fab fa-instagram text-dark"></i></a>
                        <a class="btn btn-light btn-md-square rounded-circle" href=""><i
                                class="fab fa-youtube text-dark"></i></a>
                    </div>
                </div>
            </div>
            {{-- End Profile --}}

            {{-- Berita --}}
            <div class="col-lg-6 col-xl-3">
                <div class="footer-item-2">
                    <div class="d-flex flex-column mb-4">
                        <h4 class="mb-4 text-white">Berita terbaru</h4>
                        @foreach ($berita as $berita)
                            <a href="{{ route('beritaDetail', ['slug' => $berita->slug]) }}">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle border border-2 border-white overflow-hidden my-2">
                                        <img src="{{ asset('storage/berita/' . $berita->gambar_berita) }}"
                                            class="img-zoomin img-fluid rounded-circle" alt=""
                                            style="height: 80px; width: 80px; object-fit: cover;">
                                    </div>
                                    <div class="d-flex flex-column ps-4">
                                        {{-- <p class="text-uppercase text-white mb-3">Life Style</p> --}}
                                        <a href="{{ route('beritaDetail', ['slug' => $berita->slug]) }}"
                                            class="h6 text-white">
                                            {{ $berita->nama_berita }}
                                        </a>
                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i>
                                            {{ \Carbon\Carbon::parse($berita->tanggal_berita)->format('d-m-Y') }}</small>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- End Berita --}}

            {{-- Tentang Kami --}}
            <div class="col-lg-6 col-xl-3">
                <div class="d-flex flex-column text-start footer-item-3">
                    <h4 class="mb-4 text-white">Tentang kami</h4>
                    <a class="btn-link text-white" href="/profil"><i class="fas fa-angle-right text-white me-2"></i>
                        Profil</a>
                    <a class="btn-link text-white" href="/sejarah"><i class="fas fa-angle-right text-white me-2"></i>
                        Sejarah</a>
                    <a class="btn-link text-white" href="/poliklinik"><i class="fas fa-angle-right text-white me-2"></i>
                        Poliklinik</a>
                    <a class="btn-link text-white" href="/alur"><i class="fas fa-angle-right text-white me-2"></i>
                        Alur</a>
                    <a class="btn-link text-white" href="/program"><i class="fas fa-angle-right text-white me-2"></i>
                        Program</a>
                    <a class="btn-link text-white" href="/login"><i class="fas fa-angle-right text-white me-2"></i>
                        Admin</a>
                </div>
            </div>
            {{-- End Tentang Kami --}}

            {{-- Galeri --}}
            <div class="col-lg-6 col-xl-3">
                <div class="footer-item-4">
                    <h4 class="mb-4 text-white">Galeri</h4>
                    <div class="row g-2">
                        @foreach ($galeri as $galeri)
                            <div class="col-4">
                                <div class="rounded overflow-hidden mb-2 mx-0">
                                    <img src="{{ asset('storage/galeri/' . $galeri->gambar_galeri) }}"
                                        class="img-zoomin img-fluid rounded w-100" alt=""
                                        style="height: 90px; object-fit: cover;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- End Galeri --}}
        </div>
    </div>

    <!-- Copyright Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#" class="link-hover"><i
                            class="fas fa-copyright text-light me-2"></i>
                        Puskesmas Ulak Karang</a> , All rights reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                Designed By <a class="border-bottom link-hover"
                    href="https://wa.me/6283196309831?text=Halo,%20Saya%20ingin%20bertanya%20tentang%20Website%20Puskesmas%20Ulak%20Karang">Genta
                    1102101088</a> Distributed By
                <a class="link-hover" href="https://stikeslandbouw.ac.id/">STIKES Dharma Landbouw</a>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

</div>
<!-- Footer End -->
