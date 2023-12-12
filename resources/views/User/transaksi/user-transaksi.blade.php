@extends('User.dashboard.user-dashboard')

@section('content')
    <div class="container-details">
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