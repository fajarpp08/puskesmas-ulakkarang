<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Puskesmas Ulak Karang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=PT+Serif:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-galeri/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-galeri/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-galeri/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-galeri/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-galeri/css/style.css') }}" rel="stylesheet">
</head>

<body>


    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                {{-- <p class="fs-4 text-uppercase text-primary">Our Gallery</p> --}}
                <h1 class="display-5 mb-4">Galeri Puskesmas Ulak Karang</h1>
            </div>
            <div class="tab-class text-center">
                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @foreach ($galeri as $galeri)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="gallery-img">
                                        <img class="img-fluid rounded w-100"
                                            src="{{ asset('storage/galeri/' . $galeri->gambar_galeri) }}"
                                            alt="" style="height: 300px; object-fit: cover;">
                                        <div class="gallery-overlay p-4">
                                            <h4 class="text-dark">{{ $galeri->nama_galeri }}</h4>
                                        </div>
                                        <div class="search-icon">
                                            <a href="{{ asset('storage/galeri/' . $galeri->gambar_galeri) }}" data-lightbox="Gallery-1"
                                                class="my-auto"><i
                                                    class="fas fa-search-plus btn-primary btn-primary-outline-0 rounded-circle p-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-galeri/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets-galeri/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-galeri/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-galeri/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-galeri/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets-galeri/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets-galeri/js/main.js') }}"></script>
</body>

</html>
