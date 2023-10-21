@extends('User.dashboard.user-dashboard-no-user')

@section('content')

    <head>
        <title>JogjaCar - Log In</title>
    </head>

    <style>
        .logo {
            width: 50%;
        }
    </style>

    <div class="container-details">
        {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-flex col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row justify-content-center">
                                <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                            </div>
                            <form class="mt-4">
                                <div class="mb-4">
                                    <label for="loginUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="loginUsername" name="loginUsername">
                                </div>
                                <div class="mb-4">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                                </div>
                                <div class="row">
                                    <a href="{{ url('/register') }}" class="text-primary text-center"
                                        style="text-decoration: underline;">Belum punya akun?</a>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <a href=""type="submit" class="btn btn-primary px-4 fw-bold">Log In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
