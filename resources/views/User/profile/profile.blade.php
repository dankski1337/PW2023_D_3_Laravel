@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Profile
        </title>
    </head>

    <style>
    </style>

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Profile anda, {{ auth()->user()->username }}</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="col d-flex justify-content-center">
                                @if (auth()->user()->photo == null)
                                    <img src="{{ asset('images/profilepic.png') }}" alt=""
                                        class="image-fluid rounded-circle" width="128" height="128">
                                @else
                                    <img src="{{ asset('storage/profileUser/' . auth()->user()->photo) }}"
                                        class="image-fluid rounded-circle" alt="profile pic" width="128" height="128"
                                        class="logo" style="object-fit: cover">
                                @endif
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        Nama
                                    </td>
                                    <td class="text-center">
                                        :
                                    </td>
                                    <td class="text-end">
                                        {{ auth()->user()->nama }}
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
                                        {{ auth()->user()->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Username
                                    </td>
                                    <td class="text-center">
                                        :
                                    </td>
                                    <td class="text-end">
                                        {{ auth()->user()->username }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No Telp
                                    </td>
                                    <td class="text-center">
                                        :
                                    </td>
                                    <td class="text-end">
                                        {{ auth()->user()->no_telp }}
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
                                        {{ auth()->user()->alamat }}
                                    </td>
                                </tr>
                            </table>
                            {{-- TODO: edit profile --}}
                            <div class="d-flex justify-content-end mt-3">
                                <a href="" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
