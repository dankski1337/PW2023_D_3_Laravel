@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>JogjaCar - Data User</title>
    </head>

    <style>
    </style>

    <div class="container-details">
        {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
        <div class="container my-4">
            <div class="row justify-content-center">
                <h1 class="text-center"><strong>Edit User</strong></h1>
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    {{-- <div class="row mb-3">
                        <a href="{{ route('data-user') }}" class=""><i class="fa fa-arrow-left"></i> Kembali ke Data User</a>
                    </div> --}}
                    <div class="card">
                        <div class="card-body p-5"> 
                            <form class="mt-1" method="POST" action="{{ route('action-edit-data-user', $user->id_user) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $user['nama'] }}" id="nama" name="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ $user['username']}}" id="username"
                                        name="username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user['email']}}" id="email" name="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror" value="{{ $user['no_telp']}}" id="no_telp" name="no_telp">
                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ $user['alamat']}}" id="alamat" name="alamat">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-flex ms-auto col-md-flex col-sm-flex mt-4 text-end">
                                    <button type="submit"
                                        class="btn btn-primary btn-confirm btn-block px-5 fw-semibold" style="background-color: #003EB7">Simpan</button>
                                    <a href="{{ route('data-user') }}" type="button"
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
