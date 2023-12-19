@extends('Admin.dashboard.admin-dashboard')

@section('content')

    <!-- <head>
        <title>
            JogjaCar - Profile
        </title>
    </head> -->

    <div class="container-details">
        <h1 class="fw-bold my-4 text-center">Profile anda, {{ auth()->user()->username }}</h1>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            @if (session('success'))
                                <div class="alert alert-success mt-4 text-center" id="alerts">
                                    <b>Yeay!</b> {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger mt-4 text-center" id="alerts">
                                    <b>Oopsie!</b> {{ session('error') }}
                                </div>
                            @endif
                            <div class="col d-flex justify-content-center">
                                <div class="image-container">

                                    @if (auth()->user()->photo == null)
                                        <img src="{{ asset('images/profilepic.png') }}" alt=""
                                            class="image-fluid rounded-circle" width="128" height="128">
                                    @else
                                        <img src="{{ asset('storage/profileUser/' . auth()->user()->photo) }}"
                                            class="image-fluid rounded-circle" alt="profile pic" width="128"
                                            height="128" class="logo" style="object-fit: cover">
                                    @endif
                                    <div class="tooltip rounded-circle d-flex flex-column align-items-center justify-content-center"
                                        id="profilePhoto">
                                        <span class="fa fa-image"></span>
                                        <p class="mb-0">Ganti Foto</p>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('profile.updatePhoto', Auth::user()->id_user) }}"
                                    enctype="multipart/form-data" style="display:none;">
                                    @csrf
                                    <input type="file" id="photo" name="photo" style="display: none"
                                        onchange="updateProfilePhoto({{ Auth::user()->id_user }})" accept="image/*">
                                </form>
                            </div>
                            <table class="table table-borderless mt-2">
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
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#passModal" style="background-color: #003EB7">Edit Password</button>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#dataModal" style="background-color: #003EB7">Edit Data Diri</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
