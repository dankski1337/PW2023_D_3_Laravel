@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Data Mobil
        </title>
    </head>

    <style>
        .table-bordered {
            border-style: hidden;
        }

        .gambar-mobil {
            border-radius: 10px;
            display: block;
            height: 100px;
            max-width: 100%;
            object-fit: cover;
            margin: auto;
        }
    </style>

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
                        <a href="{{ route('tambah-data-mobil') }}" class="btn btn-primary"
                            style="background-color: #003EB7">Tambah Mobil</a>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form class="d-flex" method="GET" action="{{ route('cari-data-mobil') }}">
                            <input class="form-control me-2" type="search" placeholder="Cari Mobil" name="cari"
                                aria-label="Search" style="widht: 300px">
                            <button class="btn btn-primary cariBtn" type="submit"
                                style="background-color: #003EB7">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2 px-0">
                    <div class="card p-3">
                        @if ($data_mobil->isNotEmpty())
                            <div class="table-responsive overflow-x-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">ID</th>
                                            <th scope="col">Gambar</th>
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
                                                <td><img src="{{ asset('storage/mobil/' . $mobil['gambar']) }}"
                                                        alt="" class="gambar-mobil img-fluid"></td>
                                                <td>{{ $mobil['model'] }}</td>
                                                <td>{{ $mobil['bahan_bakar'] }}</td>
                                                <td>{{ $mobil['transmisi'] }}</td>
                                                <td>{{ $mobil['jumlah_kursi'] }}</td>
                                                <td>{{ $mobil['tahun_produksi'] }}</td>
                                                <td>{{ $mobil['warna'] }}</td>
                                                <td>{{ $mobil['tarif'] }}</td>
                                                <td>{{ $mobil['status'] }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('edit-data-mobil', $mobil->id_mobil) }}"
                                                            class="btn btn-primary" style="background-color: #003EB7">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form id="updateStatusMobil" method="POST"
                                                            action="{{ route('action-edit-status-data-mobil', $mobil->id_mobil) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="id_mobil" id="indexMobil">
                                                        </form>
                                                        @if ($mobil['status'] == 'Tidak Tersedia')
                                                            <button type="button" form="updateStatusMobil"
                                                                class="btn btn-success edit-status-button"
                                                                data-index="{{ $mobil->id_mobil }}">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        @else
                                                            <button type="button" form="updateStatusMobil"
                                                                class="btn btn-warning edit-status-button"
                                                                data-index="{{ $mobil->id_mobil }}">
                                                                <i class="fa fa-times text-white"></i>
                                                            </button>
                                                        @endif
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#confirmDelete"
                                                            class="btn btn-danger delete-button"
                                                            data-index="{{ $mobil->id_mobil }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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

    {{-- confirm hapus mobil --}}
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confimDeleteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body align-content-center">
                    <p class="text-center mb-0">
                        Apakah Anda yakin ingin manghapus mobil ini?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form action="{{ route('delete-data-mobil', $mobil->id_mobil) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id_mobil" id="indexMobilHapus">
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
                $('#indexMobil').val(index);
                $('#updateStatusMobil').submit();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-button').on('click', function() {
                var index = $(this).data('index');
                console.log('Index:', index); // debug only
                $('#indexMobilHapus').val(index);
            });
        });
    </script>
@endsection
