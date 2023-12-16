<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JogjaCar - Konfirmasi</title>
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
        @font-face {
            font-family: 'Inter';
            src: url("{{ asset('fonts/Inter-Regular.ttf') }}") format("truetype");
            font-weight: normal;
        }

        @font-face {
            font-family: 'Inter';
            src: url("{{ asset('fonts/Inter-SemiBold.ttf') }}") format("truetype");
            font-weight: 600;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #F8F7FC;
        }

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
</head>

<body>
    <div class="container">
        <div class="container-details">
            <h1 class="text-center fw-bold my-4">Konfirmasi Transaksi</h1>
            <div class="card py-4 px-4 mt-4">
                <table class="my-2 table table-borderless">
                    <tr>
                        <td class="text-start">Lokasi Pengambilan</td>
                        <td class="text-end">{{ $validate['lokasi_pengambilan'] }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Tanggal Pengambilan</td>
                        <td class="text-end">{{ $validate['tanggal_pengambilan'] }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Jam Pengambilan</td>
                        <td class="text-end">{{ $validate['jam_pengambilan'] }}</td>
                    <tr>
                        <td class="text-start">Tanggal Pengembalian</td>
                        <td class="text-end">{{ $validate['tanggal_pengembalian'] }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Jam Pengembalian</td>
                        <td class="text-end">{{ $validate['jam_pengembalian'] }}</td>
                    </tr>
                    <tr>
                        <td class="text-start">Mobil</td>
                        <td class="text-end">{{ $mobil['model'] }} {{ $mobil['tahun_produksi'] }} -
                            {{ $mobil['warna'] }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start"><b>Total</b></td>
                        <td class="text-end"><b>Rp{{ $validate['total_harga'] }}</b></td>
                    </tr>
                </table>
                <div class="col ms-auto col-md-flex col-sm-flex">
                    <form method="POST" action="{{ route('transaksi.create') }}">
                        @csrf
                        <input type="hidden" name="id_mobil" value="{{ $mobil['id_mobil'] }}">
                        <input type="hidden" name="lokasi_pengambilan" value="{{ $validate['lokasi_pengambilan'] }}">
                        <input type="hidden" name="tanggal_pengambilan"
                            value="{{ $validate['tanggal_pengambilan'] }}">
                        <input type="hidden" name="jam_pengambilan" value="{{ $validate['jam_pengambilan'] }}">
                        <input type="hidden" name="tanggal_pengembalian"
                            value="{{ $validate['tanggal_pengembalian'] }}">
                        <input type="hidden" name="jam_pengembalian" value="{{ $validate['jam_pengembalian'] }}">
                        <input type="hidden" name="total_harga" value="{{ $validate['total_harga'] }}">
                        <button type="submit"
                            class="btn btn-primary btn-confirm btn-block px-5 fw-semibold">Simpan</button>
                        <a href="{{ url('/') }}" type="button"
                            class="btn btn-danger btn-cancel btn-md btn-block px-5 fw-semibold">Batal</a>
                    </form>
                </div>
            </div>
        </div>
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
