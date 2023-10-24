<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    {{-- favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-favicon.png') }}">

    <style>
        body {
            background-color: #F8F7FC;
        }

        a {
            text-decoration: none;
            color: black;
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
        .app{
            background-color: white;
            height: 100vh;
        }
        .navbar{
            background-color : #22668D;
        }
        .nav-item a{
            color: white;
        }
    </style>
</head>

<body>
    <div class="app">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid px-3">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <span class="navbar-brand d-lg-none d-md-block d-sm-block fw-bold">
                    <img height="30" src="{{ asset('images/logo.png') }}" alt="logo">
                </span>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <a class="navbar-brand d-none d-lg-block d-md-none" href="#"><img height="30" src="{{ asset('images/logo.png') }}" alt="logo"></a>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Daftar Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cara Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
        @yield('content1')

        <footer>
            <div class="container-footer mt-5">
                <div class="display-footer bg-white">
                    <div class="row pt-5 pb-5" style="max-width: 100%;">
                        <div class="col-lg-6" style="padding-left: 100px;">
                            <h5><strong>About Us</strong></h5>
                            <p>Selamat datang di JogjaCar, penyedia layanan rental kendaraan yang Anda percayai untuk memenuhi kebutuhan perjalanan Anda di Yogyakarta. JogjaCar merupakan perusahaan rental kendaraan yang berdedikasi dalam memberikan pengalaman berkendara yang aman, nyaman, dan terpercaya bagi pelanggan kami. Dengan armada kendaraan yang terawat baik dan beragam pilihan mulai dari mobil keluarga hingga kendaraan mewah, kami berkomitmen untuk menyediakan layanan berkualitas tinggi dan kepuasan pelanggan yang prima. Dengan JogjaCar, Anda dapat menjelajahi pesona Yogyakarta dengan percaya diri dan kenyamanan, menjadikan setiap perjalanan Anda sebagai pengalaman yang berkesan dan menyenangkan.</p>
                        </div>
                        <div class="col-lg 6" style="padding-left: 100px;">
                            <p><strong>Layanan Pengaduan Konsumen</strong></p>
                            <p><strong>PT JogjaTrans</strong></p>
                            <kaifuku@halodoc.com>Jl. Dirgantara I No.15, Kabupaten Sleman, Atma Jaya Yogyakarta, Yogyakarta</p>
                        </div>
                    </div>
                </div>
                <div class="container-footer-bottom" style="background-color:#22668D">
                    <div class="text-light text-center py-2 container pt-3">
                        <p>&copy; 2023 Jogja Car</p>
                        <p>Kelompok 3 Pemrograman Web D</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
