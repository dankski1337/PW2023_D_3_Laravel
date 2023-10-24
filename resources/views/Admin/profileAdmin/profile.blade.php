@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <!-- <head>
        <title>
            JogjaCar - Profile
        </title>
    </head> -->

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Selamat Datang, {{ $admin['username'] }}</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Nama :</h5>
                                </div>
                                <h5>{{ $admin['nama'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Email :</h5>
                                </div>
                                <h5>{{ $admin['email'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Username :</h5>
                                </div>
                                <h5>{{ $admin['username'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Alamat :</h5>
                                </div>
                                <h5>{{ $admin['alamat'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>No Telp :</h5>
                                </div>
                                <h5>{{ $admin['no-telp'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Password :</h5>
                                </div>
                                <h5>{{ $admin['password'] }}</h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
