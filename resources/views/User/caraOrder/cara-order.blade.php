@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Cara Order
        </title>
    </head>

    <style>
        body {
            background-color: #F8F7FC;
        }
    </style>

    <div class="container-detail">
        <h2 class="fw-bold my-4 text-center">
            Cara Order Rental Mobil di JogjaCar
        </h2>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="col mt-2 my-2">
                                <h5>1. Login akun agar dapat melakukan rental. Jika tidak mempunyai akun, dapat melakukan
                                    register akun terlebih dahulu.</h5>
                            </div>
                            <div class="col mt-2 my-2">
                                <h5>2. Pilih lokasi pengambilan, tanggal pengambilan, jam pengambilan, tanggal pengembalian, jam pengembalian.</h5>
                            </div>
                            <div class="col mt-2 my-2">
                                <h5>3. Pilih mobil rental yang tersedia.</h5>
                            </div>
                            <div class="col mt-2 my-2">
                                <h5>4. Konfirmasi rental anda, jika sudah yakin klik tombol "Simpan."</h5>
                            </div>
                            <div class="col mt-2 my-2">
                                <h5>5. Lakukan pembayaran sebelum deadline yang telah ditentukan.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
