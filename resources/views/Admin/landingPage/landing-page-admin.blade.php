@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <style>
        .container-details{
            align-items: center;
            justify-content: center;
            padding-top: 10%;
        }

        .container-content {
            border: 1px solid #A3A3A3;
        }
        
        .header{
            font-family: 'Poppins', sans-serif;
        }

        /* .tombol {
            text-align: center;
            background-color: #001A4E;
            pointer-events: none;
        } */
    </style>

    <div class="container-details">
        <h1 class="mt-4 header fw-semibold">Selamat Datang Admin1</h1>
        <div class="row align-items-center mt-2">
            <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                <a href="{{ url('/dataUser') }}">
                    <div class="card w-100 p-2 bg-success">
                        <div class="card-body">
                            <div class="text-center h5 text-white">
                                User : <strong>{{ count($user) }}</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                <a href="{{ url('/dataMobil') }}">
                    <div class="card w-100 p-2 bg-warning">
                        <div class="card-body">
                            <div class="text-center h5 text-white">
                                Mobil : <strong>{{ count($mobil) }}</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                <a href="{{ url('/dataTransaksi') }}">
                    <div class="card w-100 p-2 bg-danger">
                        <div class="card-body">
                            <div class="text-center h5 text-white">
                                Transaksi : <strong>{{ count($transaksi) }}</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
