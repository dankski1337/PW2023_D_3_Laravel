@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>JogjaCar - List Mobil</title>
    </head>

    <style>
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
    </style>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Daftar Mobil yang Tersedia</h1>
        <form class="d-flex gx-4" method="GET" action="{{ route('cari-mobil') }}">
            <input class="form-control me-2" placeholder="Cari" name="cari" aria-label="Search">
            <button class="btn btn-primary btn-search px-4 fw-semibold" type="submit">Cari</button>
        </form>
        <div class="row align-items-center mt-4">
            @if ($mobil->isEmpty())
                <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                    <p class="text-center h5"><strong>Tidak ada mobil yang tersedia</strong></p>
                </div>
            @endif
            @foreach ($mobil as $item)
                @if ($item['status'] == 'Tersedia')
                    <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                        <div class="card w-100 py-2 px-2">
                            <div class="card-body">
                                <p class="text-center h5"><strong>{{ $item['model'] }}</strong></p>
                                <img src="{{ asset('images/mobil/' . $item['gambar']) }}" alt="gambar mobil"
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
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
