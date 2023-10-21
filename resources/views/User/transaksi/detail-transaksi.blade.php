@extends('User.dashboard.user-dashboard-with-user')

@section('content')

    <head>
        <title>JogjaCar - Detail Transaksi</title>
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
        <h1 class="text-center fw-bold my-4">Detail Transaksi</h1>
        <div class="card mx-4 py-4 px-4 mt-4">
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
            <div class="col d-flex">
                <p class="me-auto">
                    Status
                </p>
                @if ($transaksi['status'] == 'Belum Dibayar')
                    <p class="text-danger"><strong>{{ $transaksi['status'] }}</strong></p>
                @else
                    <p class="text-success"><strong>{{ $transaksi['status'] }}</strong></p>
                @endif
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
            @if ($transaksi['status'] == 'Belum Dibayar')
                <div class="col">
                    <p><Strong>Bayar sebelum : {{ $transaksi['deadline'] }}</Strong></p>
                    <p><em>Pembayaran terlambat dapat dikenakan denda</em></p>
                </div>
            @endif
        </div>
    </div>
@endsection
