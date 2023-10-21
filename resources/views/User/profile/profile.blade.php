@extends('User.dashboard.user-dashboard-with-user')

@section('content')

    <head>
        <title>
            JogjaCar - Profile
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Selamat Datang, {{ $user['username'] }}</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Nama :</h5>
                                </div>
                                <h5>{{ $user['nama'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Email :</h5>
                                </div>
                                <h5>{{ $user['email'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Username :</h5>
                                </div>
                                <h5>{{ $user['username'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>No Telp :</h5>
                                </div>
                                <h5>{{ $user['no-telp'] }}</h5>
                            </div>
                            <div class="col d-flex mt-2 my-2">
                                <div class="me-auto">
                                    <h5>Alamat :</h5>
                                </div>
                                <h5>{{ $user['alamat'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="my-4 text-center">Daftar Transaksi Anda</h5>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <th scope="row">{{ $item['id'] }}</th>
                                        <td>{{ $item['total'] }}</td>
                                        <td
                                            @if ($item['status'] == 'Belum Dibayar') class="text-danger fw-semibold"
                                        @else
                                            class="text-success fw-semibold" @endif>
                                            {{ $item['status'] }}</td>
                                        <td><a href="
                                            @if ($item['status'] == 'Belum Dibayar')
                                                {{ url('/detail-transaksi') }}
                                            @else
                                                {{ url('/detail-transaksi-dibayar') }}
                                            @endif
                                            " class="text-decoration-underline">Detail</a>
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
