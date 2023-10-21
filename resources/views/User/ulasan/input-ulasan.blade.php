@extends('User.dashboard.user-dashboard-with-user')

@section('content')

    <head>
        <title>
            JogjaCar - Ulasan
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Input Ulasan</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <form>
                                <div class="form-group mb-2">
                                    <label for="inputRating">Rating</label>
                                    <select name="" id="inputRating" class="form-select">
                                        <option value="">Pilih Rating</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Baik">Cukup</option>
                                        <option value="Baik">Kurang</option>
                                    </select>
                                </div>
                                <div class="form-group my-2">
                                    <label for="inputUlasan">Ulasan</label>
                                    <textarea rows="4" class="form-control" id="inputUlasan" placeholder="Masukkan Ulasan Anda"></textarea>
                                </div>
                                <div class="col d-flex mt-3">
                                    <a href="{{ url('/ulasan-with-user') }}" type="submit" class="btn btn-primary px-4 fw-bold w-100">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
