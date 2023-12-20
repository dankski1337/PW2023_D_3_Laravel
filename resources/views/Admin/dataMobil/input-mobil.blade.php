@extends('Admin.dashboard.admin-dashboard')

@section('content')
    <head>
        <title>JogjaCar - Tambah Data Mobil</title>
    </head>

    <style>
    </style>

    <div class="container-details">
        {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
        <div class="container my-4">
            <div class="row justify-content-center">
                <h1 class="text-center"><strong>Tambah Mobil</strong></h1>
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    {{-- <div class="row mb-3">
                        <a href="{{ route('data-mobil') }}" class=""><i class="fa fa-arrow-left"></i> Kembali ke Data Mobil</a>
                    </div> --}}
                    <div class="card">
                        <div class="card-body p-5">
                            <form class="mt-1" method="POST" action="{{ route('action-tambah-data-mobil') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model">
                                    @error('model')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                        name="gambar" accept="image/jpeg, image/png, image/jpg">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="bahan_bakar" class="form-label">Bahan Bakar</label>
                                    <input type="text" class="form-control @error('bahan_bakar') is-invalid @enderror" id="bahan_bakar" name="bahan_bakar">
                                    @error('bahan_bakar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="transmisi" class="form-label">Transmisi</label>
                                    {{-- <input type="text" class="form-control @error('transmisi') is-invalid @enderror" id="transmisi" name="transmisi"> --}}
                                    <select class="form-select form-control @error('transmisi') is-invalid @enderror" id="transmisi" name="transmisi">
                                        <option value="" selected disabled hidden>Pilih Transmisi</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
                                    </select>
                                    @error('transmisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                                    <input type="number" class="form-control @error('jumlah_kursi') is-invalid @enderror" id="jumlah_kursi" name="jumlah_kursi">
                                    @error('jumlah_kursi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="tahun_produksi" class="form-label">Tahun Produksi</label>
                                    <input type="number" class="form-control @error('tahun_produksi') is-invalid @enderror" id="tahun_produksi" name="tahun_produksi">
                                    @error('tahun_produksi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="warna" class="form-label">Warna</label>
                                    <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna">
                                    @error('warna')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="tarif" class="form-label">Tarif</label>
                                    <input type="number" class="form-control @error('tarif') is-invalid @enderror" id="tarif" name="tarif">
                                    @error('tarif')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-flex ms-auto col-md-flex col-sm-flex text-end mt-4">
                                    <button type="submit"
                                        class="btn btn-primary btn-confirm btn-block px-5 fw-semibold" style="background-color: #003EB7">Simpan</button>
                                    <a href="{{ route('data-mobil') }}" type="button"
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
