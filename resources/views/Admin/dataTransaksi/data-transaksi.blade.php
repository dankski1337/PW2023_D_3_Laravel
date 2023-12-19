@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Riwayat Transaksi
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Riwayat Transaksi</h1>
        @if (session('success'))
            <div class="alert alert-success mt-4 text-center" id="alerts">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-4 text-center" id="alerts">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col d-flex justify-content-between mb-3 px-0">
                    <div class="me-auto">
                        <a href="" class="btn btn-primary">Tambah Transaksi</a>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form class="d-flex" method="GET" action="{{ route('cari-data-transaksi') }}">
                            <input class="form-control me-2" type="search" placeholder="Cari Transaksi" name="cari"
                                aria-label="Search" style="widht: 300px">
                            <button class="btn btn-primary cariBtn" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2 px-0">
                    <div class="card p-3">
                        @if ($data_transaksi->isNotEmpty())
                            <div class="table-responsive overflow-x-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Tanggal Ambil</th>
                                            <th scope="col">Jam Ambil</th>
                                            <th scope="col">Tanggal Kembali</th>
                                            <th scope="col">Jam Kembali</th>
                                            <th scope="col">Mobil</th>
                                            <th scope="col">Denda</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_transaksi as $transaksi)
                                            <tr>
                                                <td>{{ $transaksi['id_rental_transaksi'] }}</td>
                                                <td>{{ $transaksi->user->nama }}</td>
                                                <td>{{ $transaksi['lokasi_pengambilan'] }}</td>
                                                <td>{{ $transaksi['tanggal_pengambilan'] }}</td>
                                                <td>{{ $transaksi['jam_pengambilan'] }}</td>
                                                <td>{{ $transaksi['tanggal_pengembalian'] }}</td>
                                                <td>{{ $transaksi['jam_pengembalian'] }}</td>
                                                <td>{{ $transaksi->mobil->model }} - {{ $transaksi->mobil->warna }}</td>
                                                <td>Rp{{ $transaksi['denda'] }}</td>
                                                <td>Rp{{ $transaksi['total_harga'] }}</td>
                                                <td>{{ $transaksi['status'] }}</td>
                                                <td>{{ $transaksi['deadline_pembayaran'] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col text-center">
                                                            <a href="{{ url('/editTransaksi') }}"
                                                                class="btn btn-primary px-2">Edit</a>
                                                        </div>
                                                        <div class="col text-center">
                                                            <a href="{{ url('/dataTransaksi') }}"
                                                                class="btn btn-danger px-2">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($data_transaksi->count() >= 10)
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $data_transaksi->links() }}
                                </div>
                            @endif
                        @endif
                        @if ($data_transaksi->isEmpty())
                            <h5 class="my-4 text-center">
                                Tidak ada data Transaksi Rental
                            </h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('alerts');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;

                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 3500);
    </script>
@endsection
