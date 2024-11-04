<!DOCTYPE html>
<html>

<head>
    <title>Account Verification</title>
</head>

<body>
    <div class="card text-center">
        <div class="card-header">
            <h1>{{ $mailData['title'] }}</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Registration Verification</h5>
            <p class="card-text">Hallo, Shane!</p>
            <p class="card-text">Terima kasih telah mendaftar di Tea Jam Cafe. Untuk melanjutkan proses registrasi,
                silahkan verifikasi email dengan mengklik tautan di bawah ini.</p>

            <button class="btn btn-primary"><a href="{{ $mailData['verif_link'] }}" class="btn btn-primary">Verify
                    Email</a></button>
        </div>
        <br>
        <div class="card-footer text-body-secondary">
            Jika anda tidak melakukan registrasi ini, abaikan saja email ini.
            <br>
            Terima kasih,
            <br>
            Tea Jam Cafe
        </div>
    </div>
</body>

</html>
