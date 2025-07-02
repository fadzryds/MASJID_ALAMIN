<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donasi Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="background-donasi">
    <form action="{{ route('donasi.barang.submit') }}" method="POST" enctype="multipart/form-data" class="donasi-box">
      @csrf

      <h2>Donasi Barang</h2>
    
    <label for="id_jamaah"></label>
        <select name="id_jamaah" class="select2" required>
        <option value="">-- Nama Jamaah --</option>
        @foreach ($jamaahList as $jamaah)
            <option value="{{ $jamaah->id_jamaah }}">{{ $jamaah->nama_lengkap }}</option>
        @endforeach
        </select>
        <br><br>
        <label for="id_pengurus"></label>
        <select name="id_pengurus" class="select2" required>
        <option value="">-- Nama Pengurus Yang Menerima --</option>
        @foreach ($pengurusList as $pengurus)
            <option value="{{ $pengurus->id_pengurus }}">{{ $pengurus->nama_lengkap }}</option>
        @endforeach
        </select>

        <br><br>
      <input type="number" name="jumlah_barang" placeholder="Jumlah Barang" required>
      <input name="deskripsi_barang" placeholder="Deskripsi Barang" required>
      <input type="date" name="tanggal_donasi" required>

      <label>Bukti Penyerahan</label>
      <input type="file" name="bukti_transaksi" required>

      <textarea name="keterangan" placeholder="Keterangan Tambahan (Opsional)"></textarea>

      <button type="submit" class="btn-donasi">Donasi!</button>

      @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
      @endif
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.select2').select2({
          width: '100%'
        });
      });
</script>
</body>
</html>
