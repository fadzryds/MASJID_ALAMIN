<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kegiatan Masjid Al-Amin</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="navbar-kegiatan">
    <div class="navbar-head">
      <div class="logo">
        <img src="/assets/masjid.png" alt="Logo Masjid" class="logo-img">
        Masjid Al-Amin
      </div>
    <div class="nav-right">
    <a href="{{ route('home') }}" class="back-btn">← Back</a>
    </div>

    <div class="hamburger" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
    </div>
</header>
      
<br><br>
<section class="kegiatan-page">
  <div class="container">
    <h2 class="judul-section">KEGIATAN MASJID</h2>

    {{-- Filter Status --}}
    <div class="filter-status">
      <strong>Filter Status:</strong>
      <a href="{{ route('kegiatan.index') }}" class="{{ request('status') == null ? 'active' : '' }}">Semua</a> |
      <a href="{{ route('kegiatan.index', ['status' => 'Aktif']) }}" class="{{ request('status') == 'Aktif' ? 'active' : '' }}">Aktif</a> |
      <a href="{{ route('kegiatan.index', ['status' => 'Selesai']) }}" class="{{ request('status') == 'Selesai' ? 'active' : '' }}">Selesai</a> |
      <a href="{{ route('kegiatan.index', ['status' => 'Dibatalkan']) }}" class="{{ request('status') == 'Dibatalkan' ? 'active' : '' }}">Dibatalkan</a>
    </div>

    {{-- List Kegiatan --}}
    <div class="kegiatan-list">
      @forelse ($dataKegiatan as $kegiatan)
        <div class="kegiatan-item">
          <img src="{{ asset('assets/santunan.png') }}" alt="{{ $kegiatan->nama_kegiatan }}">
          <div class="kegiatan-detail">
            <h3>{{ $kegiatan->nama_kegiatan }}</h3>
            <p><strong>Status:</strong> {{ $kegiatan->status_kegiatan }}</p>
            <p>{{ $kegiatan->deskripsi }}</p>
            <p><small><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</small></p>
          </div>
        </div>
      @empty
        <p>Tidak ada kegiatan dengan status tersebut.</p>
      @endforelse
    </div>

  </div>
</section>

<footer class="footer">
  <div class="footer-container">
    <img src="/assets/masjid.png" alt="Logo Masjid" class="footer-logo">
    <h4>Masjid AL-AMIN</h4>
    <div class="footer-socials">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
  <div class="footer-bottom">
    © 2025 Masjid AL - Amin
  </div>
</footer>

<script>
function toggleMenu() {
  document.getElementById("nav-right").classList.toggle("active");
}
</script>

</body>
</html>