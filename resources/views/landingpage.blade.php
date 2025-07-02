<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Masjid Al-Amin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <header class="navbar">
    <div class="navbar-container">
      <div class="logo">
        <img src="/assets/masjid.png" alt="Logo Masjid" class="logo-img">
        Masjid Al-Amin
      </div>
      <div class="nav-right" id="nav-right">
        <ul class="nav-links">
          <li><a href="#home">Beranda</a></li>
          <li><a href="#kegiatan">Kegiatan</a></li>
          <li><a href="#donasi">Donasi</a></li>
          <li><a href="#tentang">About</a></li>
          <li><a href="#footer">Contact</a></li>
        </ul>
        <a href="{{ route('login') }}" class="login-btn">Logout</a>
      </div>
      <div class="hamburger" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </header>  

<section class="hero" id="home"></section>

<section class="info-container">
  <div class="info-wrapper">
    <div class="info-left">
      <img src="/assets/dkm.png" alt="Foto DKM">
      <div><strong>Dedi Supriadi</strong><br>Ketua DKM Al-Amin</div>
    </div>

    <div class="info-center">
      <div class="date">Khutbah Jum'at, 2 Mei 2025</div> <br><br>
      <div class="schedule-header">
        <span>Shubuh</span> | <span>Dzuhur</span> | <span>Ashar</span> | <span>Maghrib</span> | <span>Isya</span>
      </div>
      <div class="schedule-row">
        04:35    |    11:50    |    15:35    |    <span class="highlight">18:21</span>    |    19:01
      </div>
    </div>

    <div class="info-right">
      Jl. Raya Cilodong No.123<br>Depok, Jawa Barat
    </div>
  </div>
</section>

<section class="kegiatan" id="kegiatan">
  <h2>KEGIATAN MASJID</h2>
  <div class="kegiatan-grid">
    <div class="kegiatan-item">
      <img src="/assets/tpa.png" alt="TPA AL - Amin" />
      <h3>TPA AL - Amin</h3>
    </div>
    <div class="kegiatan-item">
      <img src="/assets/kajian.png" alt="Kajian Malam Jumat" />
      <h3>Kajian Malam Jumat</h3>
    </div>
    <div class="kegiatan-item">
      <img src="/assets/hbi.png" alt="Hari Besar Islam" />
      <h3>Hari Besar Islam</h3>
    </div>
    <div class="kegiatan-item">
      <img src="/assets/santunan.png" alt="Santunan Anak Yatim" />
      <h3>Santunan Anak Yatim</h3>
    </div>
  </div>
  <div class="read-more-wrap">
    <a href="{{ route('kegiatan.index') }}" class="read-more-btn">Read More</a>
</div>
</section>

<section class="donasi" id="donasi">
  <div class="container">
      <h2 class="judul-section">Ayo <span>Donasi</span></h2>
      <div class="donasi-grid">

          @foreach ($dataDonasi as $donasi)
              <div class="donasi-card">
                  <img src="{{ asset($donasi['gambar']) }}" alt="Donasi {{ $donasi['nama'] }}">
                  <div class="donasi-info">
                      <h3>{{ $donasi['nama'] }}</h3>
                      <small>Human.id</small>
                      <div class="progress-bar">
                          <div class="progress" style="width: {{ ($donasi['terkumpul'] / $donasi['target']) * 100 }}%;"></div>
                      </div>
                      <p class="terkumpul">Rp {{ number_format($donasi['terkumpul'], 0, ',', '.') }} dari target Rp {{ number_format($donasi['target'], 0, ',', '.') }}</p>
                      <p class="hari">{{ $donasi['sisaHari'] }} hari lagi</p>
                  </div>
              </div>
          @endforeach

      </div>

      {{-- BUTTON DONASI 1 BUAH DI BAWAH, CENTER --}}
      <div class="btn-donasi-wrap">
          <a href="{{ route('kategori.donasi') }}" class="btn-donasi">Donasi Sekarang</a>
      </div>
  </div>
</section>

<section class="about" id="tentang">
  <h2>ABOUT AL-AMIN</h2>
  <img src="/assets/hbi.png" alt="About Al-Amin">
  <div class="about-text">
    <strong>Menyambut Ramadhan 1444 H, tinggal 30 hari!</strong>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus blanditiis magnam consequatur?</p>
  </div>
</section>
<br><br><br>
<section class="widgets-container">
  <div class="widget-card">
    <div class="widget-title">Total Pemasukan</div>
    <div class="widget-value">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
  </div>
  <div class="widget-card">
    <div class="widget-title">Total Pengeluaran</div>
    <div class="widget-value">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</div>
  </div>
</section>

<footer class="footer" id="footer">
  <div class="footer-top">
    <img src="/assets/masjid.png" alt="Masjid AL-AMIN" class="footer-logo">
    <h3>Masjid AL-AMIN</h3>
    <div class="footer-socials">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 Masjid AL - Amin</p>
  </div>
</footer>

<script>
function toggleMenu() {
  document.getElementById("nav-right").classList.toggle("active");
}
</script>

</body>
</html>