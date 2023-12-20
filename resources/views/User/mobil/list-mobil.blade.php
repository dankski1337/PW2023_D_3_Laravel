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
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .card-img {
            border-radius: 15px 15px 0 0;
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .card-details {
            margin-top: 15px;
        }

        .card-details table {
            width: 100%;
        }

        .card-details td {
            padding: 8px 0;
        }

        .card-details td:first-child {
            font-weight: bold;
            width: 40%;
        }

        .card-details td:last-child {
            text-align: right;
            width: 60%;
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
                <div class="col-flex mt-4">
                    <p class="text-center h5"><strong>Mobil tidak ada</strong></p>
                </div>
            @endif
            @foreach ($mobil as $item)
                @if ($item['status'] == 'Tersedia')
                    <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                        <div class="card">
                            <img src="{{ asset('storage/mobil/' . $item['gambar']) }}" alt="gambar mobil"
                                class="card-img">
                            <div class="card-body">
                                <p class="card-title">{{ $item['model'] }}</p>
                                <div class="card-details">
                                    <table>
                                        <tr>
                                            <td>Bahan Bakar</td>
                                            <td>{{ $item['bahan_bakar'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Transmisi</td>
                                            <td>{{ $item['transmisi'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Kursi</td>
                                            <td>{{ $item['jumlah_kursi'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Produksi</td>
                                            <td>{{ $item['tahun_produksi'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Warna</td>
                                            <td>{{ $item['warna'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tarif</td>
                                            <td>Rp{{ $item['tarif'] }}/hari</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{-- pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $mobil->links() }}
        </div>
    </div>
@endsection
