@extends('Admin.dashboard.admin-dashboard')

@section('content')
    <style>
        .container-details {
            align-items: center;
            justify-content: center;
            padding-top: 10%;
        }

        .container-content {
            border: 1px solid #A3A3A3;
        }

        .header {
            font-family: 'Poppins', sans-serif;
        }

        /* .tombol {
                text-align: center;
                background-color: #001A4E;
                pointer-events: none;
            } */
    </style>

    <div class="container-details">
        <h1 class="mt-4 header fw-semibold">Selamat Datang Admin</h1>
        <div class="row align-items-center mt-2">
            <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                <a href="{{ route('data-user') }}">
                    <div class="card w-100 p-2">
                        <div class="card-body">
                            <div class="text-center h5">
                                <i class="fa fa-person"></i>
                                User : <strong>{{ count($user) }}</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                <a href="{{ route('data-mobil') }}">
                    <div class="card w-100 p-2">
                        <div class="card-body">
                            <div class="text-center h5">
                                <i class="fa fa-car"></i>
                                Mobil : <strong>{{ count($mobil) }}</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-flex mt-4">
                <a href="{{ route('data-transaksi') }}">
                    <div class="card w-100 p-2">
                        <div class="card-body">
                            <div class="text-center h5">
                                <i class="fa fa-file-invoice"></i>
                                Transaksi : <strong>{{ count($transaksi) }}</strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col mt-4">
            <h3>Ulasan</h3>
            <div class="col align-items-center-mt-4">
                @foreach ($ulasan as $item)
                    <div class="row-lg-flex row-md-flex rw-sm-flex mt-4">
                        <div class="card w-100 p-2">
                            <div class="card-body">
                                <div class="col d-flex m-2">
                                    <div class="me-auto d-flex align-items-center">
                                        <img src="{{ asset('storage/profileUser/' . $item->user->photo) }}" alt=""
                                            class="image-fluid rounded-circle" width="32" height="32"
                                            style="object-fit: cover">
                                        <p class="ms-2 card-text fs-5">{{ $item->user->nama }}</p>
                                    </div>
                                    <p class="ms-2 card-text fs-6">{{ $item['tanggal'] }}</p>
                                </div>
                                <div class="col d-flex m-2">
                                    <p
                                        class="
                                @if ($item['rating'] == 'Baik') text-success
                                @elseif ($item['rating'] == 'Cukup')
                                    text-warning
                                @else
                                    text-danger @endif
                                card-text fw-bold">
                                        {{ $item['rating'] }}</p>
                                </div>
                                <div class="col d-flex m-2">
                                    <p class="card-text">{{ $item['ulasan'] }}</p>
                                    @auth
                                        @if ($item['id_user'] == Auth::user()->id_user)
                                            <button type="button" class="btn ms-auto delete-button" data-bs-toggle="modal"
                                                data-bs-target="#confirmDelete" data-index="{{ $item->id_ulasan }}"><i
                                                    class="fa fa-trash fs-5" style="color: red"></i></button>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- pagination --}}
                <div class="mt-2 d-flex justify-content-center">
                    {!! $ulasan->links() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
