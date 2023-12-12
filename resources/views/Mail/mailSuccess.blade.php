<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>JogjaCar - Verifikasi Akun</title>
    <style>
        body{
            /* darker blue */
            background-color: #003EB7;
        }
        .container{
            height: 100vh;
        }
        
        .fa-check-circle{
            font-size: 80px;
            /* dark green */
            color: #09ae09;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 100vh">
            <div class="col-lg-6 col-md-flex col-sm-flex mt-2">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row justify-content-center">
                            {{-- <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo" style="width: 70%;"> --}}
                            <span class="fa fa-check-circle text-center"></span>
                        </div>
                        <p class="my-3">
                            <strong>Verifikasi akun anda berhasil!</strong>
                        </p>
                        <p class="mb-0">
                            Anda dapat menutup tab ini dan kembali ke website JogjaCar.
                        </p>
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