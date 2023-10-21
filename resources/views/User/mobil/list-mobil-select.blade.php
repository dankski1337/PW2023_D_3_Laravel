@extends('User.dashboard.user-dashboard-with-user')

@section('content')

    <head>
        <title>JogjaCar - List Mobil</title>
    </head>

    <style>
        .btn-search {
            background-color: #003EB7;
            color: white;
        }

        .mobil-pic {
            width: 100%;
        }

        .btn-select {
            background-color: #003EB7;
            color: white;
        }
    </style>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Daftar Mobil yang Tersedia</h1>
        <form class="d-flex gx-4" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
            <button class="btn btn-primary btn-search px-4 fw-semibold" type="submit">Cari</button>
        </form>
        <div class="row align-items-center mt-2">
            @foreach ($mobil as $item)
                @if ($item['status'] == 'ready')
                    <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                        <div class="card w-100 py-2 px-2">
                            <div class="card-body">
                                <p class="text-center h5"><strong>{{ $item['model'] }}</strong></p>
                                <img src="{{ asset('images/mobil.png') }}" alt="" class="text-center mobil-pic">
                                <div class="col d-flex mt-2 my-2">
                                    <div class="me-auto">
                                        <p class="card-text">Bahan Bakar :</p>
                                    </div>
                                    <p class="class card-text">{{ $item['bahan-bakar'] }}</p>
                                </div>
                                <div class="col d-flex mt-2 my-2">
                                    <div class="me-auto">
                                        <p class="card-text">Transmisi :</p>
                                    </div>
                                    <p class="class card-text">{{ $item['transmisi'] }}</p>
                                </div>
                                <div class="col d-flex mt-2 my-2">
                                    <div class="me-auto">
                                        <p class="card-text">Jumlah Kursi :</p>
                                    </div>
                                    <p class="class card-text">{{ $item['jmlh-kursi'] }}</p>
                                </div>
                                <div class="col d-flex mt-2 my-2">
                                    <div class="me-auto">
                                        <p class="card-text">Tahun Produksi :</p>
                                    </div>
                                    <p class="class card-text">{{ $item['tahun'] }}</p>
                                </div>
                                <div class="col d-flex mt-2 my-2">
                                    <div class="me-auto">
                                        <p class="card-text">Warna :</p>
                                    </div>
                                    <p class="class card-text">{{ $item['warna'] }}</p>
                                </div>
                                <div class="col d-flex mt-2 my-2">
                                    <div class="me-auto">
                                        <p class="card-text">Tarif :</p>
                                    </div>
                                    <p class="class card-text">Rp{{ $item['tarif'] }}/hari</p>
                                </div>
                                <div class="col d-flex mt-2 mt-2">
                                    <a href="{{ url('/confirm-transaksi') }}" class="btn btn-primary btn-select fw-semibold w-100">Pilih Mobil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
