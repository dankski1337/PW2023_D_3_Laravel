<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JogjaCar - Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    {{-- favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-favicon.png') }}">
    <style>
        body {
            background-image: url("images/bg-auth.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            backdrop-filter: saturate(100%) hue-rotate(10deg) brightness(90%) contrast(100%);
            height: 100%;
            overflow-x: hidden;
            height: 100%;
        }

        .container-details {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 100%;
        }

        .logo {
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="container-details">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row justify-content-center">
                                <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                            </div>

                            @if (session('message'))
                                <div class="alert alert-success mt-4">
                                    <b>Yeay!</b> {{ session('message') }}
                                </div>
                            @endif
                            <form class="mt-4" method="POST" action={{ route('actionRegister') }}>
                                @csrf
                                <div class="mb-2">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username') }}" required>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <a href="{{ url('/login') }}" class="text-primary text-center"
                                        style="text-decoration: underline;">Sudah punya akun?</a>
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <button type="submit" class="btn btn-primary px-4 fw-bold"
                                        style="background-color: #003EB7">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center my-2">
                        <a href="{{ url('/') }}" class="text-white shadow"
                            style="text-decoration: underline;">Kembali ke Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
