@extends('User.dashboard.user-dashboard')

@section('content1')

    <head>
        <title>JogjaCar - Home</title>
    </head>

    <style>
        .container-details {
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .container-content {
            border: 1px solid #A3A3A3;
            background-size: cover;
            background-position: center;
        }

        .header {
            font-family: 'Poppins', sans-serif;
        }

        .tombol {
            text-align: center;

            @if (Auth::check())
                background-color: #003EB7;
            @else
                background-color: #001A4E;
                pointer-events: none;
            @endif
        }

        .container-image img {
            position: fixed;
            /* top: 0; */
            left: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            overflow: hidden;
            z-index: 0;
        }

        .container-item {
            text-align: center;
            justify-content: center;
        }

        .container-detail p {
            color: #ffffff;
            text-shadow: 1px 1px 4px #000000a3;
        }
    </style>

    <div class="container-details">
        <div class="row border" style="margin-right: 0;">
            <div class="col-lg-12" style="padding-right: 0;">
                <div class="container-image">
                    <img src="{{ asset('images/bg-rental.jpg') }}"alt="">
                </div>
            </div>
        </div>
        <div class="row" style=" margin-bottom: 50px;">
            <div class="col-lg-12">
                <div class="container-detail text-center mx-auto my-5"
                    style="max-width: 70%; position: relative; z-index: 2;">
                    <p class="text" style="font-size: 40px;"><strong>Selamat Datang di JogjaCar</strong></p>
                    <p>JogjaCar adalah penyedia layanan car rental terkemuka yang berlokasi di Yogyakarta, Indonesia. Dengan
                        komitmen untuk memberikan pengalaman perjalanan yang tak terlupakan, JogjaCar telah menjadi pilihan
                        utama bagi pelanggan yang mencari kendaraan berkualitas dan layanan yang handal.</p>
                </div>
            </div>
        </div>
        <form class="form-inline">
            <div class="card mt-4">
                <div class="row gx-2 my-2 mx-2 d-block d-md-flex d-sm-flex row-md row-sm">
                    <div class="col">
                        <div class="container-content bg-white rounded py-2 px-2 my-2">
                            <label for="lokasiPengambilan" class="form-label">Lokasi Pengambilan</label>
                            <input type="text" class="form-control" id="lokasiPengambilan" placeholder="">
                        </div>
                    </div>

                    <div class="col-lg col-md-flex">
                        <div class="container-content rounded bg-white py-2 px-2 my-2">
                            <div class="row">
                                <div class="col" style="border-right: 1px solid #A3A3A3">
                                    <label for="tanggalPengambilan" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" id="tanggalPengambilan" placeholder="">
                                </div>
                                <div class="col">
                                    <label for="jamPengambilan" class="form-label">Jam Pengambilan</label>
                                    <input type="time" class="form-control" id="jamPengamblan" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg col-md-flex">
                        <div class="container-content rounded bg-white py-2 px-2 my-2">
                            <div class="row">
                                <div class="col" style="border-right: 1px solid #A3A3A3">
                                    <label for="tanggalPengembalian" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" id="tanggalPengembalian" placeholder="">
                                </div>
                                <div class="col">
                                    <label for="jamPengembalian" class="form-label">Jam Pengembalian</label>
                                    <input type="time" class="form-control" id="jamPengembalian" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div class="col-lg-2 d-flex col-md col-sm">
                            <a href=" {{ url('/list-mobil-select') }}"
                                class="tombol btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center">
                                <h3 class="d-lg-block fw-bold">Lanjutkan</h3>
                            </a>
                        </div>
                    @endauth
                    @guest
                        <div class="col-lg-2 d-flex col-md col-sm">
                            <button class="tombol btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center">
                                <h5 class="d-lg-block fw-bold opacity-50">Log In untuk Melanjutkan</h5>
                            </button>
                        </div>
                    @endguest
                </div>
            </div>
        </form>
    </div>
@endsection
