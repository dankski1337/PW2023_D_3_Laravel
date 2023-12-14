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
        @font-face{
            font-family: 'Inter';
            src: url("{{ asset('fonts/Inter-Regular.ttf') }}") format("truetype");
            font-weight: normal;
        }

        @font-face{
            font-family: 'Inter';
            src: url("{{ asset('fonts/Inter-SemiBold.ttf') }}") format("truetype");
            font-weight: 600;
        }

        body {
            background-color: #F8F7FC;
        }

        a {
            text-decoration: none;
            color: black;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        .app {
            /* background-color: #F8F7FC; */
            /* height: 100vh; */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            position: relative;
            z-index: 1;
        }

        .profile-pic {
            height: 24px;
            width: 24px;
        }

        .content-wrapper {
            min-height: 100vh;
        }

        .footer {
            margin-top: auto;
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
                    <a class="navbar-brand d-none d-lg-block d-md-none" href="{{ url('/') }}"><img height="30"
                            src="{{ asset('images/logo.png') }}" alt="logo"></a>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('list-mobil') }}">Daftar Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/kontak') }}">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/cara-order') }}">Cara Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ulasan') }}">Ulasan</a>
                        </li>
                        @auth
                            <li class="nav-item d-lg-none">
                                <a class="nav-link" href="{{ url('/profile') }}">Profile Anda</a>
                            </li>
                            <li class="nav-item d-lg-none d-md-block d-sm-block">
                                <a href="{{ route('logout') }}" class="nav-link text-danger fw-bold">Log Out</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item d-md-none d-sm-block">
                                <a href="{{ url('/login') }}" class="nav-link fw-semibold btn btn-primary">Log In</a>
                            </li>
                            <li class="nav-item d-md-none d-sm-block">
                                <a href="{{ url('/register') }}" class="nav-link fw-semibold">Register</a>
                            </li>
                        @endguest
                    </ul>
                    <hr>
                    @auth
                        <ul class="navbar-nav d-none d-md-none d-lg-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                    Selamat datang,
                                    {{ auth()->user()->username }}
                                    @if (Auth::user()->photo == null)
                                        <img src="{{ asset('images/profilepic.png') }}" alt="Profile pic"
                                            class="profile-pic rounded-circle" style="margin-left: 5px">
                                    @else
                                        <img src="{{ asset('storage/profileUser/' . auth()->user()->photo) }}"
                                            alt="Profile pic" class="profile-pic rounded-circle" style="margin-left: 5px; object-fit: cover;">
                                    @endif

                                </a>
                            </li>
                        </ul>
                    @endauth
                    @guest
                        <ul class="navbar-nav d-none d-md-flex">
                            <li class="nav-item">
                                <a href="{{ url('/login') }}" class="nav-link fw-semibold">Log In</a>
                            </li>
                            <span class="nav-link d-none d-lg-block">-</span>
                            <li class="nav-item">
                            <li class="nav-item">
                                <a href="{{ url('/register') }}" class="nav-link fw-semibold">Register</a>
                            </li>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>


        @auth
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
                            <a href="" class="h5 btn btn-light">Transaksi Anda</a>
                        </div>
                        <div class="justify-content-end d-flex">
                            <button type="button"
                                class="btn btn-danger align-items-end d-flex position-absolute bottom-0 mb-2 fw-semibold" data-bs-target="#confirmLogout" data-bs-toggle="modal">Log
                                Out</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal confirm keluar --}}
            <div class="modal fade" id="confirmLogout" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body align-content-center">
                            <p>
                                Apakah Anda yakin ingin keluar?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        <div class="content-wrapper">
            <div class="container">
                @yield('content')
            </div>
            @yield('content1')
        </div>

        <footer>
            <div class="container-footer mt-5">
                <div class="display-footer bg-white">
                    <div class="row pt-5 pb-5" style="max-width: 100%;">
                        <div class="col-lg-6" style="padding-left: 100px;">
                            <h5><strong>About Us</strong></h5>
                            <p>
                                Selamat datang di JogjaCar, penyedia layanan rental kendaraan yang Anda percayai untuk
                                memenuhi kebutuhan perjalanan Anda di Yogyakarta. JogjaCar merupakan perusahaan rental
                                kendaraan yang berdedikasi dalam memberikan pengalaman berkendara yang aman, nyaman, dan
                                terpercaya bagi pelanggan kami. Dengan armada kendaraan yang terawat baik dan beragam
                                pilihan mulai dari mobil keluarga hingga kendaraan mewah, kami berkomitmen untuk
                                menyediakan layanan berkualitas tinggi dan kepuasan pelanggan yang prima. Dengan
                                JogjaCar, Anda dapat menjelajahi pesona Yogyakarta dengan percaya diri dan kenyamanan,
                                menjadikan setiap perjalanan Anda sebagai pengalaman yang berkesan dan menyenangkan.
                            </p>
                        </div>
                        <div class="col-lg 6" style="padding-left: 100px;">
                            <p><strong>Layanan Pengaduan Konsumen</strong></p>
                            <p><strong>PT JogjaTrans</strong></p>
                            <kaifuku@halodoc.com>l. Dirgantara I No.15, Kabupaten Sleman, Atma Jaya Yogyakarta,
                                Yogyakarta</p>
                        </div>
                    </div>
                </div>
                <div class="container-footer-bottom" style="background-color:#003EB7;">
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
