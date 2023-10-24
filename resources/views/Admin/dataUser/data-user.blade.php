@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Data User
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Data User</h1>
        <div class="col d-flex">
            <div class="me-auto">
                <a href="{{ url('/inputUser') }}" class="btn btn-primary">Tambah User</a>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2">
                    <div class="card">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No.Telp</th>
                                    <th scope="col">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_user as $user)
                                    <tr>
                                        <td>{{ $user['id'] }}</td>
                                        <td>{{ $user['nama'] }}</td>
                                        <td>{{ $user['username'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['no_telp'] }}</td>
                                        <td>{{ $user['alamat'] }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <a href="{{ url('/editUser') }}" class="btn btn-primary px-2">Edit</a>
                                                </div>
                                                <div class="col text-center">
                                                    <a href="{{ url('/dataUser') }}" class="btn btn-danger px-2">Delete</a>
                                                </div>
                                            </div>
                                        </td>
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
