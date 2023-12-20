@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Data Transaksi
        </title>
    </head>

    <style>
        .table-bordered {
            border-style: hidden;
        }
    </style>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Transaksi Rental</h1>
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
                        <a href="{{ route('tambah-data-transaksi') }}" class="btn btn-primary"
                            style="background-color: #003EB7">Tambah Transaksi</a>
                    </div>
                    <div class="d-flex justify-content-end px-0">
                        <form class="d-flex" method="GET" action="{{ route('cari-data-transaksi') }}">
                            <input class="form-control me-2" type="search" placeholder="Cari Transaksi" name="cari"
                                aria-label="Search" style="widht: 300px">
                            <button class="btn btn-primary cariBtn" type="submit"
                                style="background-color: #003EB7">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2 px-0">
                    <div class="card p-3">
                        @if ($data_transaksi->isNotEmpty())
                            <div class="table-responsive overflow-x-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">ID</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Lokasi Ambil</th>
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
                                                <td
                                                    @if ($transaksi['status'] == 'Belum Dibayar') class="text-danger fw-bold"
                                                    @else
                                                        class="text-success fw-bold" @endif>
                                                    {{ $transaksi['status'] }}</td>
                                                <td>{{ $transaksi['deadline_pembayaran'] }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('edit-data-transaksi', $transaksi->id_rental_transaksi) }}"
                                                            class="btn btn-primary" style="background-color: #003EB7">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form id="updateStatusTransaksi" method="POST" action="{{ route('action-edit-status-data-transaksi', $transaksi->id_rental_transaksi) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="id_rental_transaksi" id="indexTransaksi">
                                                        </form>
                                                        @if ($transaksi['status'] == 'Belum Dibayar')
                                                            <button type="button" class="btn btn-success edit-status-button" form="updateStatusTransaksi" data-index="{{ $transaksi->id_rental_transaksi }}">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-warning text-white edit-status-button" form="updateStatusTransaksi" data-index="{{ $transaksi->id_rental_transaksi }}">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        @endif
                                                        <button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-index="{{ $transaksi->id_rental_transaksi }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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

    {{-- modal confirm delete --}}
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confimDeleteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body align-content-center">
                    <p class="text-center mb-0">
                        Apakah Anda yakin ingin manghapus transaksi ini?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form action="{{ route('delete-data-transaksi', $transaksi->id_rental_transaksi) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id_rental_transaksi" id="indexTransaksiHapus">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.edit-status-button').on('click', function() {
                var index = $(this).data('index');
                console.log('Index:', index); // debug only
                $('#indexTransaksi').val(index);
                $('#updateStatusTransaksi').submit();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-button').on('click', function() {
                var index = $(this).data('index');
                console.log('Index:', index); // debug only
                $('#indexTransaksiHapus').val(index);
            });
        });
    </script>
@endsection
