<!DOCTYPE html>
{{-- <html lang="en"> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>JogjaCar - Pilih Mobil</title>

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

        .btn-search {
            background-color: #003EB7;
            color: white;
        }

        .mobil-pic {
            border-radius: 10px;
            display: block;
            height: 200px;
            max-width: 100%;
            object-fit: cover;
            margin: auto;
        }

        .btn-select {
            background-color: #003EB7;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-details">
            <h1 class="fw-bold my-4 text-center">Daftar Mobil yang Dapat Anda Pilih</h1>
            <a href="{{ url('/') }}" style="color: black; text-decoration: none;">
                <i class="fa fa-arrow-left"></i>
                Kembali ke Home
            </a>
            {{-- <form class="d-flex gx-4" role="search" method="POST" action="{{ route('transaksi.cari-mobil-select') }}">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
            <input type="hidden" name="data" value="{{ json_encode($validate) }}">
            <button class="btn btn-primary btn-search px-4 fw-semibold" name="cari" type="submit">Cari</button>
        </form> --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row align-items-center mt-2">
                @if ($mobil->isEmpty())
                    <div class="col-flex mt-4">
                        <p class="text-center h5"><strong>Mobil tidak ada</strong></p>
                    </div>
                @endif
                @foreach ($mobil as $item)
                    @if ($item['status'] == 'Tersedia')
                        <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                            <div class="card w-100 py-2 px-2">
                                <div class="card-body">
                                    <p class="text-center h5"><strong>{{ $item['model'] }}</strong></p>
                                    <img src="{{ asset('storage/mobil/' . $item['gambar']) }}" alt="gambar mobil"
                                        class="text-center mobil-pic">
                                    <table class="my-2 table table-borderless">
                                        <tr class="mb-0">
                                            <td>Bahan Bakar</td>
                                            <td class="text-start">:</td>
                                            <td class="text-end">{{ $item['bahan_bakar'] }}</td>
                                        </tr>
                                        <tr class="my-0">
                                            <td>Transmisi</td>
                                            <td class="text-start">:</td>
                                            <td class="text-end">{{ $item['transmisi'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Kursi</td>
                                            <td class="text-start">:</td>
                                            <td class="text-end">{{ $item['jumlah_kursi'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Produksi</td>
                                            <td class="text-start">:</td>
                                            <td class="text-end">{{ $item['tahun_produksi'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Warna</td>
                                            <td class="text-start">:</td>
                                            <td class="text-end">{{ $item['warna'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tarif</td>
                                            <td class="text-start">:</td>
                                            <td class="text-end">Rp{{ $item['tarif'] }}/hari</td>
                                        </tr>
                                    </table>
                                    <form method="POST" action="{{ route('transaksi.confirm') }}">
                                        @csrf
                                        <input type="hidden" name="id_mobil" value="{{ $item['id_mobil'] }}">
                                        <input type="hidden" name="lokasi_pengambilan"
                                            value="{{ $validate['lokasi_pengambilan'] }}">
                                        <input type="hidden" name="tanggal_pengambilan"
                                            value="{{ $validate['tanggal_pengambilan'] }}">
                                        <input type="hidden" name="jam_pengambilan"
                                            value="{{ $validate['jam_pengambilan'] }}">
                                        <input type="hidden" name="tanggal_pengembalian"
                                            value="{{ $validate['tanggal_pengembalian'] }}">
                                        <input type="hidden" name="jam_pengembalian"
                                            value="{{ $validate['jam_pengembalian'] }}">
                                        <div class="col d-flex mt-2 mt-2">
                                            <button type="submit"
                                                class="btn btn-primary btn-select fw-semibold w-100">Pilih
                                                Mobil</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            {{-- pagination --}}
            <div class="mt-2 d-flex justify-content-center">
                {!! $mobil->links() !!}
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
