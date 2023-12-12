@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Kontak
        </title>
    </head>

    <style>
        body {
            background-color: #F8F7FC;
        }
    </style>

    <div class="container-detail">
        <h1 class="fw-bold my-4 text-center">Kontak JogjaCar</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            {{-- make a table --}}
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        No Telp
                                    </td>
                                    <td class="text-center">
                                        :
                                    </td>
                                    <td class="text-end">
                                        081098765432
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td class="text-center">
                                        :
                                    </td>
                                    <td class="text-end">
                                        jogjacar21@gmail.com
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td class="text-center">
                                        :
                                    </td>
                                    <td class="text-end">
                                        Jl. Monjali No.22
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
