@extends('User.dashboard.user-dashboard-no-user')

@section('content')

    <head>
        <title>
            JogjaCar - Ulasan
        </title>
    </head>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">
            Ulasan
        </h1>
        <div class="col align-items-center-mt-4">
            @foreach ($ulasan as $item)
                <div class="row-lg-flex row-md-flex rw-sm-flex mt-4">
                    <div class="card w-100 p-2">
                        <div class="card-body">
                            <div class="col d-flex m-2">
                                <div class="me-auto">
                                    <p class="card-text">{{ $item['nama'] }}</p>
                                </div>
                                <p class="class card-text">{{ $item['tgl'] }}</p>
                            </div>
                            <div class="col d-flex m-2">
                                <p
                                    class="
                                @if ($item['rating'] == 'Baik') text-success
                                @elseif ($item['rating'] == 'Cukup')
                                    text-warning
                                @else
                                    text-danger @endif
                                card-text">
                                    {{ $item['rating'] }}</p>
                            </div>
                            <div class="col d-flex m-2">
                                <p class="card-text">{{ $item['ulasan'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
