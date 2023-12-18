@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Riwayat Transaksi
        </title>
    </head>

    <style>
        body {
            background-color: #F8F7FC;
        }

        .table tbody a {
            text-decoration: none;
        }

        .cariBtn {
            background-color: #003EB7;
        }
    </style>

    <div class="container-details">
        <h1 class="text-center fw-bold my-4">Riwayat Transaksi Anda</h1>
        <div class="card mx-4 p-4 mt-4">
            <div class="d-flex justify-content-end mb-3">
                <form class="d-flex" method="GET" action="{{ route('transaksi.cari') }}">
                    <input class="form-control me-2" type="search" placeholder="Cari Transaksi" name="cari"
                        aria-label="Search" style="widht: 300px">
                    <button class="btn btn-primary cariBtn" type="submit">Cari</button>
                </form>
            </div>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Mobil</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <th scope="row">{{ $item['id_rental_transaksi'] }}</th>
                            <td>{{ $item->mobil->model }} {{ $item->mobil->tahun_produksi }} -
                                {{ $item->mobil->tahun_produksi }}</td>
                            <td class="fw-bold">Rp{{ $item['total_harga'] }}</td>
                            <td>
                                @if ($item['status'] == 'Belum Dibayar')
                                    <p class="text-danger fw-semibold my-0">{{ $item['status'] }}</p>
                                @else
                                    <p class="text-success fw-semibold my-0">{{ $item['status'] }}</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('transaksi.detail', $item['id_rental_transaksi']) }}"
                                    style="text-decoration: underline;">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
