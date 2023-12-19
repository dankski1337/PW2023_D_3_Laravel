@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Data User
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Data User</h1>
        {{-- <div class="col d-flex">
            <div class="me-auto">
                <a href="{{ url('/inputUser') }}" class="btn btn-primary">Tambah User</a>
            </div>
        </div> --}}
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
                <div class="d-flex justify-content-end mb-3 px-0">
                    <form class="d-flex" method="GET" action="{{ route('cari-data-user') }}">
                        <input class="form-control me-2" type="search" placeholder="Cari User" name="cari"
                            aria-label="Search" style="widht: 300px">
                        <button class="btn btn-primary cariBtn" type="submit">Cari</button>
                    </form>
                </div>
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2 px-0">
                    <div class="card p-3">
                        @if ($data_user->isNotEmpty())
                        <div class="table-responsive overflow-x-auto">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No.Telp</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_user as $user)
                                        <tr>
                                            <td>{{ $user['id_user'] }}</td>
                                            <td>{{ $user['nama'] }}</td>
                                            <td>{{ $user['username'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['no_telp'] }}</td>
                                            <td>{{ $user['alamat'] }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <a href="{{ url('/editUser') }}"
                                                            class="btn btn-primary px-2">Edit</a>
                                                    </div>
                                                    <div class="col text-center">
                                                        <a href="{{ url('/dataUser') }}"
                                                            class="btn btn-danger px-2">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            @if ($data_user->count() >= 10)
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $data_user->links() }}
                                    </div>
                            @endif
                        @endif
                        @if ($data_user->isEmpty())
                            <h5 class="my-4 text-center">
                                Tidak ada data User
                            </h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
