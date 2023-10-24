@extends('User.dashboard.user-dashboard-with-user')

@section('content1')
    <head>
        <title>JogjaCar - Home</title>
    </head>

    <style>
        .container-content {
            border: 1px solid #A3A3A3;
        }
        
        .header{
            font-family: 'Poppins', sans-serif;
        }

        .tombol {
            text-align: center;
            background-color: #003EB7;
        }

        .container-image img{
            background-size: cover;
            object-fit: cover;
            width: 100%;
            height: 500px;
            padding: 0;
        }

        .container-item{    
            text-align: center;
            justify-content: center;
        }

    </style>

    <div class="container-details">
        <div class="row border" style="margin-right: 0;">
            <div class="col-lg-12" style="padding-right: 0;">
                <div class="container-image">
                    <img src="{{asset('images/rental-mobil-jambi.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row" style=" margin-bottom: 50px;">
            <div class="col-lg-12">
                <div class="container-detail text-center mx-auto my-5" style="max-width: 70%; ">
                    <p class="text" style="font-size: 40px;"><strong>Selamat Datang di JogjaCar</strong></p>
                    <p>JogjaCar adalah penyedia layanan car rental terkemuka yang berlokasi di Yogyakarta, Indonesia. Dengan komitmen untuk memberikan pengalaman perjalanan yang tak terlupakan, JogjaCar telah menjadi pilihan utama bagi pelanggan yang mencari kendaraan berkualitas dan layanan yang handal.</p>
                </div>
            </div>
        </div>
        <div class="container-item">
            <form class="form-inline">
                <div class="card mt-4">
                    <div class="row gx-2 my-3 mx-2 d-block d-md-flex d-sm-flex row-md row-sm">
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

                        <div class="col-lg-2 d-flex col-md col-sm">
                            <a href=" {{ url('/list-mobil-select') }}"
                                class="tombol btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center">
                                <h3 class="d-lg-block fw-bold">Lanjutkan</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
