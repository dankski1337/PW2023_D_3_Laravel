@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Data User
        </title>
    </head>

    <style>
        .table-bordered {
            border-style: hidden;
        }
    </style>

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
                        <button class="btn btn-primary cariBtn" type="submit"
                            style="background-color: #003EB7">Cari</button>
                    </form>
                </div>
                <div class="col-lg-flex col-md-flex col-sm-flex mt-2 px-0">
                    <div class="card p-3">
                        @if ($data_user->isNotEmpty())
                            <div class="table-responsive overflow-x-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
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
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('edit-data-user', $user->id_user) }}"
                                                            class="btn btn-primary" style="background-color: #003EB7">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger delete-button"
                                                            data-bs-toggle="modal" data-bs-target="#confirmDeleteUser" data-index="{{ $user->id_user }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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

    {{-- modal confirm delete user --}}
    <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="confimDeleteUserTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body align-content-center">
                    <p class="text-center mb-0">
                        Apakah Anda yakin ingin manghapus user ini?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form action="{{ route('delete-data-user', $user->id_user) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id_user" id="indexUser">
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
            $('.delete-button').on('click', function() {
                var index = $(this).data('index');
                console.log('Index:', index); // Add this line for debugging
                $('#indexUser').val(index);
            });
        });
    </script>
@endsection
