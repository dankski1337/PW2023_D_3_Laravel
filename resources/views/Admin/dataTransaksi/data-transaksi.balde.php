@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Riwayat Transaksi
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Riwayat Transaksi</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-20 col-sm-flex mt-2">
                    <div class="card">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Tanggal Pengambilan</th>
                                    <th scope="col">Jam Pengambilan</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Jam Pengembalian</th>
                                    <th scope="col">Mobil</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_transaksi as $transaksi)
                                    <tr>
                                        <td>{{ $transaksi['id'] }}</td>
                                        <td>{{ $transaksi['lokasi'] }}</td>
                                        <td>{{ $transaksi['tgl_pengambilan'] }}</td>
                                        <td>{{ $transaksi['jam_pengambilan'] }}</td>
                                        <td>{{ $transaksi['tgl_pengembalian'] }}</td>
                                        <td>{{ $transaksi['jam_pengembalian'] }}</td>
                                        <td>{{ $transaksi['mobil'] }}</td>
                                        <td>{{ $transaksi['total'] }}</td>
                                        <td>{{ $transaksi['status'] }}</td>
                                        <td>{{ $transaksi['deadline'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
