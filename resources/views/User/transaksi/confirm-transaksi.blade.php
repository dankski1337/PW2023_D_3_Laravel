@extends('User.dashboard.user-dashboard-with-user')

@section('content')

    <head>
        <title>JogjaCar - Konfirmasi</title>
    </head>

    <style>
        .container-details {
            /* align-items: center;
                justify-content: center; */
        }

        h1 {
            font-family: 'Poppins', sans-serif;
        }

        .btn-confirm .btn-cancel {
            width: 40px !important;
        }

        .btn-confirm {
            text-align: center;
            background-color: #003EB7;
            color: white;
        }

    </style>

    <div class="container-details">
        <h1 class="text-center fw-bold my-4">Konfirmasi Transaksi</h1>
        <div class="card py-4 px-4 mt-4">
            <div class="col d-flex">
                <p class="me-auto">
                    Id
                </p>
                <p>{{ $transaksi['id'] }}</p>
            </div>
            <div class="col d-flex">
                <p class="me-auto">
                    Tanggal Pengambilan
                </p>
                <p>{{ $transaksi['tgl-pengambilan'] }}</p>
            </div>
            <div class="col d-flex">
                <p class="me-auto">
                    Jam Pengambilan
                </p>
                <p>{{ $transaksi['jam-pengambilan'] }}</p>
            </div>
            <div class="col d-flex">
                <p class="me-auto">
                    Tanggal Pengembalian
                </p>
                <p>{{ $transaksi['tgl-pengembalian'] }}</p>
            </div>
            <div class="col d-flex">
                <p class="me-auto">
                    Jam Pengembalian
                </p>
                <p>{{ $transaksi['jam-pengembalian'] }}</p>
            </div>
            <div class="col d-flex">
                <p class="me-auto">
                    Mobil
                </p>
                <p>{{ $transaksi['mobil'] }}</p>
            </div>
            <hr>
            <div class="col d-flex">
                <p class="me-auto fw-bold">
                    <strong>
                        Total
                    </strong>
                </p>
                <p class="fw-bold"><strong>{{ $transaksi['total'] }}</strong></p>
            </div>
            <div class="col ms-auto col-md-flex col-sm-flex">
                <a href="{{ url('/detail-transaksi') }}" type="button" class="btn btn-primary btn-confirm btn-block px-5 fw-semibold">Simpan</a>
                <a href="{{ url('/landing-with-user') }}" type="button" class="btn btn-danger btn-cancel btn-md btn-block px-5 fw-semibold">Batal</a>
            </div>
        </div>
    </div>
@endsection
