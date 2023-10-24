@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>JogjaCar - Data User</title>
    </head>

    <style>
    </style>

    <div class="container-details">
        {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <form class="mt-1">
                                <div class="mb-2">
                                    <label for="registerName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $user['nama'] }}" id="registerName" name="registerName">
                                </div>
                                <div class="mb-2">
                                    <label for="registerUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" value="{{ $user['username']}}" id="registerUsername"
                                        name="registerUsername">
                                </div>
                                <div class="mb-2">
                                    <label for="registerEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $user['email']}}" id="registerEmail" name="registerEmail">
                                </div>
                                <div class="mb-2">
                                    <label for="registerNoTelp" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control" value="{{ $user['no-telp']}}" id="registerNoTelp" name="registerNoTelp">
                                </div>
                                <div class="mb-2">
                                    <label for="registerAlamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $user['alamat']}}" id="registerAlamat" name="registerAlamat">
                                </div>
                                <div class="mb-2">
                                    <label for="registerPass" class="form-label">Password</label>
                                    <input type="password" class="form-control" value="{{ $user['password']}}" id="registerPass" name="registerPass">
                                </div>
                                <div class="mb-2">
                                    <label for="konfirmasiPass" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" value="{{ $user['password']}}" id="konfirmasiPass" name="konfirmasiPass">
                                </div>
                                <div class="col-flex ms-auto col-md-flex col-sm-flex">
                                    <a href="{{ url('/dataUser') }}" type="button"
                                        class="btn btn-primary btn-confirm btn-block px-5 fw-semibold">Simpan</a>
                                    <a href="{{ url('/dataUser') }}" type="button"
                                        class="btn btn-danger btn-cancel btn-md btn-block px-5 fw-semibold">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
