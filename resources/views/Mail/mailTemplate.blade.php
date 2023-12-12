<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email JogjaCar</title>
</head>
<body>
    <p>
        Terima kasih <b>{{ $details['username'] }}</b>, karena telah mendaftar di JogjaCar.
    </p>
    <p>
        Silahkan klik link berikut untuk verifikasi akun anda, agar dapat menggunakan layanan JogjaCar.
    </p>

    <center>
        <p>
            <strong>{{ $details['url'] }}</strong>
        </p>
    </center>
</body>
</html>