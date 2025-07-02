<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="notifikasi-container">
        <div class="notifikasi-box">
            <img src="{{ asset('assets/notifikasi.png') }}" alt="Notifikasi" class="icon-notif">
            <h2>Terimakasih Sudah Berdonasi</h2>
            <p>
                Satu kebaikan Anda, insyaAllah menjadi cahaya di dunia dan akhirat. <br>
                Terima kasih, semoga berkah selalu menyertai.
            </p>
            <a href="{{ route('home') }}" class="btn-kembali-notif">Kembali Ke Beranda</a>
        </div>
    </div>
</body>
</html>