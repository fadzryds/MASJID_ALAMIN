<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donasi Uang Transfer</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="background-donasi">
    <form action="{{ route('donasi.transfer.submit') }}" method="POST" enctype="multipart/form-data" class="donasi-box">
      @csrf

      <h2>Donasi Uang Transfer</h2>

      <div class="info-rekening">
        <strong>Informasi Rekening Tujuan</strong>
        <p>Bank: BCA</p>
        <p>No. Rekening: 01234567891011</p>
        <p>Atas Nama: Masjid Al-Amin</p>
        <small><i>Harap transfer terlebih dahulu sebelum mengisi form</i></small>
    </div>
    <br>
    
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
      <input type="number" name="nominal" placeholder="Nominal Transfer" required>
      <input type="date" name="tanggal_donasi" required>

      <label>Bukti Transfer</label>
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
