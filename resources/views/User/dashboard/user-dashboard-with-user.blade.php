<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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

        .container {
            object-fit: cover;
        }

        .profile-pic {
            height: 24px;
        }

        .modal-header {
            background-color: #003EB7;
        }
        .nav-item a{
            color: white;
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
        .app{
            background-color: #F8F7FC;
            height: 100vh;
        }
        .navbar{
            background-color : #22668D;
        }
    </style>
</head>

<body>
    <div class="app">
        <nav class="navbar sticky-top navbar-expand-lg">
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
                    <a class="navbar-brand d-none d-lg-block d-md-none" href="{{ url('/landing-with-user') }}"><img height="30"
                            src="{{ asset('images/logo.png') }}" alt="logo"></a>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/landing-with-user') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/list-mobil-with-user') }}">Daftar Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/kontak-with-user') }}">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cara-order-with-user') }}">Cara Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/ulasan-with-user') }}">Ulasan</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="{{ url('/profile') }}">Profile Anda</a>
                        </li>
                        {{-- <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Transaksi Anda</a></li>
                            </ul>
                        </li> --}}
                        <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a href="{{ url('/landing-no-user') }}" class="nav-link text-danger fw-bold">Log Out</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-none d-md-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Selamat datang,
                                User1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                <img src="{{ asset('images/profilepic.png') }}" alt="Profile pic"
                                    class="profile-pic rounded-circle">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- sidebar profile --}}
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header mt-2">
                <h4 class="offcanvas-title" id="offcanvasScrollingLabel">Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
                <div class="container-fluid">
                    <div class="row gx-2 gy-2 mb-auto">
                        <a href="{{ url('/profile') }}" class="h5 btn btn-light">Profile Anda</a>
                        {{-- <a href="" class="h5 btn btn-light">Transaksi Anda</a> --}}
                    </div>
                    <div class="justify-content-end d-flex">
                        <a href="{{ url('/landing-no-user') }}"
                            class="btn btn-danger align-items-end d-flex position-absolute bottom-0 mb-2 fw-semibold">Log
                            Out</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- confirm logout --}}
        {{-- <div class="modal fade bd-example-modal-sm" id="confirmation" tabindex="0" role="dialog"
            aria-labelledby="confirmation" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title fs-6 text-white" id="confirmationLabel">Apakah ingin logout?</p>
                        <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url('/landing-no-user') }}" role="button" class="btn btn-danger fw-semibold" data-bs-toggle="modal"
                            data-bs-target="#confirmation">Logout</a>
                    </div>
                </div>
            </div>
        </div> --}}

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
                            <kaifuku@halodoc.com>l. Dirgantara I No.15, Kabupaten Sleman, Atma Jaya Yogyakarta, Yogyakarta</p>
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
