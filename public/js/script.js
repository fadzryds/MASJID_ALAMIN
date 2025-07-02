document.addEventListener("DOMContentLoaded", () => {
  // Toggle navbar
  const hamburger = document.getElementById("hamburger");
  const navMenu = document.getElementById("navMenu");
  hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("active");
  });

  // Tanggal Otomatis (dari API Lokal)
  fetch("https://worldtimeapi.org/api/timezone/Asia/Jakarta")
    .then(res => res.json())
    .then(data => {
      const tanggal = new Date(data.datetime);
      const options = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
      document.getElementById("tanggal").textContent = tanggal.toLocaleDateString("id-ID", options);
    });

  // Jadwal Sholat API (Depok)
  fetch("https://api.myquran.com/v1/sholat/jadwal/1204/2025/06")
    .then(res => res.json())
    .then(data => {
      const today = new Date().getDate();
      const tomorrow = today + 1;
      const jadwalHariIni = data.data.jadwal.find(j => parseInt(j.tanggal.split("-")[2]) === today);
      const jadwalBesok = data.data.jadwal.find(j => parseInt(j.tanggal.split("-")[2]) === tomorrow);

      document.getElementById("jadwal-hari-ini").innerHTML = 
        `${jadwalHariIni.subuh} | ${jadwalHariIni.dzuhur} | ${jadwalHariIni.ashar} | <span class="highlight">${jadwalHariIni.maghrib}</span> | ${jadwalHariIni.isya}`;

      document.getElementById("jadwal-besok").innerHTML =
        `${jadwalBesok.subuh} | ${jadwalBesok.dzuhur} | ${jadwalBesok.ashar} | <span class="highlight">${jadwalBesok.maghrib}</span> | ${jadwalBesok.isya}`;
    });
});