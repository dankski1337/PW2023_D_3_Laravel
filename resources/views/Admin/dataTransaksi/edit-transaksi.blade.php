@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>JogjaCar - Data Transaksi</title>
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
                                    <label for="registerUser" class="form-label">User</label>
                                    <select name="registerUser" id="registerUser" class="form-select">
                                        <option value="">Pilih User</option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item['username'] }}">{{ $item['username'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="registerTglAmbil" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" id="registerTglAmbil" name="registerTglAmbil">
                                </div>
                                <div class="mb-2">
                                    <label for="registerJamAmbil" class="form-label">Jam Pegambilan</label>
                                    <input type="time" class="form-control" id="registerJamAmbil"
                                        name="registerJamAmbil">
                                </div>
                                <div class="mb-2">
                                    <label for="registerTglKembali" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" id="registerTglKembali" name="registerTglKembali">
                                </div>
                                <div class="mb-2">
                                    <label for="registerJamKembali" class="form-label">Jam Pengembalian</label>
                                    <input type="time" class="form-control" id="registerJamKembali"
                                        name="registerJamKembali">
                                </div>
                                <div class="mb-2">
                                    <label for="registerMobil" class="form-label">Mobil</label>
                                    <select name="registerMobil" id="registerMobil" class="form-select">
                                        <option value="">Pilih Mobil</option>
                                        @foreach ($mobil as $item)
                                            <option value="{{ $item['model'] }}">{{ $item['model'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="registerTotal" class="form-label">Total</label>
                                    <input type="number" class="form-control" id="registerTotal" name="registerTotal">
                                </div>
                                <div class="mb-2">
                                    <label for="registerStatus" class="form-label">Status</label>
                                    <select name="registerStatus" id="registerStatus" class="form-select">
                                        <option value="">Pilih Status</option>
                                        <option value="Sudah Dibayar">Sudah Dibayar</option>
                                        <option value="Belum Dibayar">Belum Dibayar</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="registerDeadline" class="form-label">Deadline</label>
                                    <input type="text" class="form-control" id="registerDeadline" name="registerDeadline">
                                </div>
                                <div class="col-flex ms-auto col-md-flex col-sm-flex">
                                    <a href="{{ url('/dataTransaksi') }}" type="button"
                                        class="btn btn-primary btn-confirm btn-block px-5 fw-semibold">Simpan</a>
                                    <a href="{{ url('/dataTransaksi') }}" type="button"
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
