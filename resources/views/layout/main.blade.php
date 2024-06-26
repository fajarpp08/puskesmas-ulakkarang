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
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo-puskesmas.ico') }}">


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-user/css/style.css') }}" rel="stylesheet">
</head>

<body onload="startClock()">
    <!-- Navbar -->
    @include('layout.header')
    <!-- End Navbar -->

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-success" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Main content -->
    @yield('content')
    <!-- End Main content -->


    {{-- footer --}}
    @include('layout.footer')
    {{-- end footer --}}

    <!-- Back to Top -->
    <a href="#" class="btn btn-success border-2 border-white rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets-user/js/main.js') }}"></script>
    <!-- Javascript Realtime Date, Time & Days -->
    <script>
        // JavaScript untuk memperbarui jam
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var formattedTime = hours + ':' + minutes + ':' + seconds;
            document.getElementById('realtime-clock').innerText = formattedTime;
        }

        // JavaScript untuk memperbarui tanggal
        function updateDate() {
            var now = new Date();
            var day = now.getDate().toString().padStart(2, '0');
            var month = (now.getMonth() + 1).toString().padStart(2, '0');
            var year = now.getFullYear();
            var formattedDate = day + '-' + month + '-' + year;
            document.getElementById('realtime-date').innerText = formattedDate;
        }

        // JavaScript untuk memperbarui hari
        function updateDay() {
            var now = new Date();
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var dayName = days[now.getDay()];
            document.getElementById('realtime-day').innerText = dayName;
        }

        // Memperbarui jam, tanggal, dan hari setiap detik
        function startClock() {
            updateClock();
            updateDate();
            updateDay();
            setInterval(updateClock, 1000);
            setInterval(updateDate, 1000);
            setInterval(updateDay, 1000);
        }
    </script>
</body>

</html>
