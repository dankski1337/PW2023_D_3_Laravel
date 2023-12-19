@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Data Mobil
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Data Mobil</h1>
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
                        <a href="" class="btn btn-primary">Tambah Mobil</a>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form class="d-flex" method="GET" action="{{ route('cari-data-mobil') }}">
                            <input class="form-control me-2" type="search" placeholder="Cari Mobil" name="cari"
                                aria-label="Search" style="widht: 300px">
                            <button class="btn btn-primary cariBtn" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2 px-0">
                    <div class="card p-3">
                        @if ($data_mobil->isNotEmpty())
                            <div class="table-responsive overflow-x-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">Bahan Bakar</th>
                                            <th scope="col">Transmisi</th>
                                            <th scope="col">Jumlah Kursi</th>
                                            <th scope="col">Tahun Produksi</th>
                                            <th scope="col">Warna</th>
                                            <th scope="col">Tarif</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_mobil as $mobil)
                                            <tr>
                                                <td>{{ $mobil['id_mobil'] }}</td>
                                                <td>{{ $mobil['model'] }}</td>
                                                <td>{{ $mobil['bahan_bakar'] }}</td>
                                                <td>{{ $mobil['transmisi'] }}</td>
                                                <td>{{ $mobil['jumlah_kursi'] }}</td>
                                                <td>{{ $mobil['tahun_produksi'] }}</td>
                                                <td>{{ $mobil['warna'] }}</td>
                                                <td>{{ $mobil['tarif'] }}</td>
                                                <td>{{ $mobil['status'] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col text-center">
                                                            <a href="{{ url('/editMobil') }}"
                                                                class="btn btn-primary px-2">Edit</a>
                                                        </div>
                                                        <div class="col text-center">
                                                            <a href="{{ url('/dataMobil') }}"
                                                                class="btn btn-danger px-2">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($data_mobil->count() >= 10)
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $data_mobil->links() }}
                                </div>
                            @endif
                        @endif
                        @if ($data_mobil->isEmpty())
                            <h5 class="my-4 text-center">
                                Tidak ada data mobil
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
