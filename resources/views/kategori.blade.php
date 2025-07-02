<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori Donasi</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="background-kategori">
  <div class="box-kategori">
    <h1>Kategori Donasi</h1>

    <form action="{{ route('kategori.pilih') }}" method="POST">
      @csrf
        <a href="{{ route('donasi.transfer.form') }}" class="kategori-btn">Transfer</a>
        <a href="{{ route('donasi.tunai.form') }}" class="kategori-btn">Uang Tunai</a>
        <a href="{{ route('donasi.barang.form') }}" class="kategori-btn">Barang</a>
    </form>
  </div>
</div>

</body>
</html>