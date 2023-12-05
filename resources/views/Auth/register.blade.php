@extends('User.dashboard.user-dashboard-no-user')

@section('content')

    <head>
        <title>JogjaCar - Register</title>
    </head>

    <style>
        .logo{
            width: 50%;
        }
    </style>

    <div class="container-details">
        {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row justify-content-center">
                                <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                            </div>
                            <form class="mt-4">
                                <div class="mb-2">
                                    <label for="registerName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="registerName" name="registerName">
                                </div>
                                <div class="mb-2">
                                    <label for="registerUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="registerUsername" name="registerUsername">
                                </div>
                                <div class="mb-2">
                                    <label for="registerEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="registerEmail" name="registerEmail">
                                </div>
                                <div class="mb-2">
                                    <label for="registerNoTelp" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control" id="registerNoTelp" name="registerNoTelp">
                                </div>
                                <div class="mb-2">
                                    <label for="registerAlamat" class="form-label">Alamat</label>
                                    <input type="number" class="form-control" id="registerAlamat" name="registerAlamat">
                                </div>
                                <div class="mb-2">
                                    <label for="registerPass" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="registerPass" name="registerPass">
                                </div>
                                <div class="mb-2">
                                    <label for="konfirmasiPass" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="konfirmasiPass" name="konfirmasiPass">
                                </div>
                                <div class="row">
                                    <a href="{{ url('/login') }}" class="text-primary text-center" style="text-decoration: underline;">Sudah punya akun?</a>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <a href="{{ url('/') }}" type="submit" class="btn btn-primary px-4 fw-bold">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
