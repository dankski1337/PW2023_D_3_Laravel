@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <head>
        <title>JogjaCar - Data Transaksi</title>
    </head>

    <style>
    </style>

    <div class="container-details">
        {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
        <div class="container my-4">
            <div class="row justify-content-center">
                <h1 class="text-center"><strong>Edit Transaksi</strong></h1>
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <form class="mt-1" method="POST" action="{{ route('action-edit-data-transaksi', $transaksi->id_rental_transaksi) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <label for="lokasi_pengambilan" class="form-label">Lokasi Pengambilan</label>
                                    <input type="text"
                                        class="form-control @error('lokasi_pengambilan') is-invalid @enderror"
                                        id="lokasi_pengambilan" name="lokasi_pengambilan" value="{{ $transaksi['lokasi_pengambilan'] }}">
                                    @error('lokasi_pengambilan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="tanggal_pengambilan" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_pengambilan') is-invalid @enderror"
                                        id="tanggal_pengambilan" name="tanggal_pengambilan" value="{{ $transaksi['tanggal_pengambilan'] }}">
                                    @error('tanggal_pengambilan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="jam_pengambilan" class="form-label">Jam Pegambilan</label>
                                    <input type="time"
                                        class="form-control @error('jam_pengambilan') is-invalid @enderror"
                                        id="jam_pengambilan" name="jam_pengambilan" value="{{ $transaksi['jam_pengambilan'] }}">
                                    @error('jam_pengambilan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                                        id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ $transaksi['tanggal_pengembalian'] }}">
                                    @error('tanggal_pengembalian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="jam_pengembalian" class="form-label">Jam Pengembalian</label>
                                    <input type="time"
                                        class="form-control @error('jam_pengembalian') is-invalid @enderror"
                                        id="jam_pengembalian" name="jam_pengembalian" value="{{ $transaksi['jam_pengembalian'] }}">
                                    @error('jam_pengembalian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="id_mobil" class="form-label">Mobil</label>
                                    <select name="id_mobil" id="id_mobil"
                                        class="form-select @error('id_mobil') is-invalid @enderror">
                                        <option value="" disabled hidden>Pilih Mobil</option>
                                        @foreach ($mobil as $item)
                                            <option 
                                            @if ($transaksi['id_mobil'] == $item['id_mobil'])
                                                selected
                                            @endif
                                            value="{{ $item['id_mobil'] }}">{{ $item['model'] }}
                                                {{ $item['tahun_produksi'] }} - {{ $item['warna'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_mobil')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="denda" class="form-label">Denda</label>
                                    <input type="number"
                                        class="form-control @error('denda') is-invalid @enderror"
                                        id="denda" name="denda" value="{{ $transaksi['denda'] }}">
                                    @error('denda')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-flex ms-auto col-md-flex col-sm-flex text-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-confirm btn-block px-5 fw-semibold"
                                        style="background-color: #003EB7">Simpan</button>
                                    <a href="{{ route('data-transaksi') }}" type="button"
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
