@extends('User.dashboard.user-dashboard')

@section('content')

    <head>
        <title>
            JogjaCar - Profile
        </title>
    </head>

    <style>
        body {
            background-color: #F8F7FC;
        }

        .tooltip {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
            width: 128px;
            height: 128px;
            z-index: 0;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container:hover .tooltip {
            cursor: pointer;
            opacity: 1;
        }
    </style>

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

    {{-- modal ganti pass --}}
    <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="passModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="passModalTitle">Edit Password</h5>
                </div>
                <div class="modal-body col-auto">
                    <form method="POST" action="{{ route('profile.updatePassword', Auth::user()->id_user) }}">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                id="old_password" name="old_password" required>
                            @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="new_password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                id="confirm_password" name="confirm_new_password" required>
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #003EB7">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit data --}}
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="dataModalTitle">Edit Data Diri</h5>
                </div>
                <div class="modal-body col-auto">
                    <form method="POST" action="{{ route('profile.updateDataUser', Auth::user()->id_user) }}">
                        @csrf
                        <div class="form-group  mt-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ Auth::user()->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group  mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group  mt-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ Auth::user()->username }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group  mt-2">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                id="no_telp" name="no_telp" value="{{ Auth::user()->no_telp }}">
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group  mt-2 mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" name="alamat" value="{{ Auth::user()->alamat }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #003EB7">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script alert auto dissmiss --}}
    <script>
        setTimeout(function() {
            var alert = document.getElementById('alerts');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = 0;

                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 3500);
    </script>

    {{-- Script update photo --}}
    <script>
        document.getElementById('profilePhoto').addEventListener('click', function() {
            document.getElementById('photo').click();
        })

        function updateProfilePhoto(userId) {
            document.getElementById('photo').formAction = '/profile/updatePhoto/' + userId;
            document.getElementById('photo').form.submit();
        }
    </script>
@endsection
