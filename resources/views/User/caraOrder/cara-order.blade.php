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
                            <ol class="fs-5">
                                <li>
                                    Login akun agar dapat melakukan rental. Jika tidak mempunyai akun, dapat melakukan
                                    register akun terlebih dahulu.
                                </li>
                                <li>
                                    Pilih lokasi pengambilan, tanggal pengambilan, jam pengambilan, tanggal pengembalian,
                                    jam pengembalian. Setelah itu klik tombol "Lanjutkan" untuk memilih mobil
                                </li>
                                <li>
                                    Pilih mobil rental yang tersedia.
                                </li>
                                <li>
                                    Konfirmasi rental anda, jika sudah yakin klik tombol "Simpan."
                                </li>
                                <li>
                                    Lakukan pembayaran sebelum deadline yang telah ditentukan.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
