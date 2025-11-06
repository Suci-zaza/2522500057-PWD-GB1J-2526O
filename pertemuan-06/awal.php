<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pelan-pelan aja guys</title>
<link rel="stylesheet" href="hahah.css">
</head>
<body>
<header>
  <h1>Ini Header</h1>
  <button class="menu-toggle" id="menutoggle" aria-label="Toggle navigation">&#9776;</button>
  <nav>
    <ul>
      <li><a href="#home">Beranda</a></li>
      <li><a href="#about">Tentang</a></li>
      <li><a href="#contact">Kontak</a></li>
    </ul>
  </nav>
</header>

<main>
  <section id="home">
    <h2>Selamat Datang</h2>
    <p>Ini contoh paragraf HTML.</p>
    <?php
      echo "<p>Ini paragraf yang dihasilkan oleh PHP.</p>";
    ?>
  </section>

  <section id="about">
  <h2>Tentang Saya</h2>

  <?php
    $nim = "2522500057";
    $nama = "Sucifitria Azhara  &#128525;";
    $tempat = "Pangkalpinang  &hearts;";
    $tgl_lahir = "04 November 2005";
    $hobi = "Eksperimen pakai Python, Merakit Brick, dan Main Game &#128516;";
    $pasangan = "Belum ada &#128546; ";
    $pekerjaan = "Digital Marketing";
    $ortu = "Bapak Rasianto dan Ibu Viska &hearts; ";
    $kakak = "Tidak memiliki kakak &#128546;";
    $adik = "Aditpa Ravelino &#128512;";
  ?>

  <table class="bio-table">
    <tr><th>NIM :</th><td><?= $nim ?></td></tr>
    <tr><th>Nama Lengkap :</th><td><?= $nama ?></td></tr>
    <tr><th>Tempat Lahir :</th><td><?= $tempat ?></td></tr>
    <tr><th>Tanggal Lahir :</th><td><?= $tgl_lahir ?></td></tr>
    <tr><th>Hobi :</th><td><?= $hobi ?></td></tr>
    <tr><th>Pasangan :</th><td><?= $pasangan ?></td></tr>
    <tr><th>Pekerjaan :</th><td><?= $pekerjaan ?></td></tr>
    <tr><th>Nama Orang Tua :</th><td><?= $ortu ?></td></tr>
    <tr><th>Nama Kakak :</th><td><?= $kakak ?></td></tr>
    <tr><th>Nama Adik :</th><td><?= $adik ?></td></tr>
  </table>
</section>
<section id="ipk">
  <h2>Nilai Saya</h2>

  <?php

  $namaMatkul1 = "Algoritma dan Struktur Data";
  $namaMatkul2 = "Agama";
  $namaMatkul3 = "Bahasa Inggris";
  $namaMatkul4 = "Basis Data";
  $namaMatkul5 = "Pemrograman Web Dasar";

  $sks1 = 4; $sks2 = 2; $sks3 = 2; $sks4 = 3; $sks5 = 3;


  $nilaiHadir1 = 90; $nilaiTugas1 = 85; $nilaiUTS1 = 73; $nilaiUAS1 = 84;
  $nilaiHadir2 = 20; $nilaiTugas2 = 50; $nilaiUTS2 = 60; $nilaiUAS2 = 50;
  $nilaiHadir3 = 88; $nilaiTugas3 = 75; $nilaiUTS3 = 80; $nilaiUAS3 = 85;
  $nilaiHadir4 = 80; $nilaiTugas4 = 75; $nilaiUTS4 = 70; $nilaiUAS4 = 78;
  $nilaiHadir5 = 69; $nilaiTugas5 = 90; $nilaiUTS5 = 100; $nilaiUAS5 = 100;

  function hitungNilaiAkhir($hadir, $tugas, $uts, $uas) {
    return (0.1 * $hadir) + (0.3 * $tugas) + (0.3 * $uts) + (0.3 * $uas);
  }

  function getGrade($nilai) {
    if ($nilai >= 91) return "A";
    elseif ($nilai >= 86) return "A-";
    elseif ($nilai >= 81) return "B+";
    elseif ($nilai >= 76) return "B";
    elseif ($nilai >= 71) return "B-";
    elseif ($nilai >= 66) return "C+";
    elseif ($nilai >= 61) return "C";
    elseif ($nilai >= 56) return "D";
    else return "E";
  }


  function getMutu($grade) {
    switch ($grade) {
      case "A": return 4.00;
      case "A-": return 3.70;
      case "B+": return 3.30;
      case "B": return 3.00;
      case "B-": return 2.70;
      case "C+": return 2.30;
      case "C": return 2.00;
      case "D": return 1.00;
      default: return 0.00;
    }
  }

  function getStatus($grade) {
    return ($grade == "D" || $grade == "E") ? "Gagal" : "Lulus";
  }


  $totalBobot = 0;
  $totalSks = $sks1 + $sks2 + $sks3 + $sks4 + $sks5;

  for ($i = 1; $i <= 5; $i++) {
    ${"nilaiAkhir$i"} = hitungNilaiAkhir(${"nilaiHadir$i"}, ${"nilaiTugas$i"}, ${"nilaiUTS$i"}, ${"nilaiUAS$i"});
    ${"grade$i"} = getGrade(${"nilaiAkhir$i"});
    ${"mutu$i"} = getMutu(${"grade$i"});
    ${"bobot$i"} = ${"mutu$i"} * ${"sks$i"};
    ${"status$i"} = getStatus(${"grade$i"});
    $totalBobot += ${"bobot$i"};
  }

  $ipk = $totalBobot / $totalSks;


  for ($i = 1; $i <= 5; $i++) {
    echo "<h3>Nama Mata Kuliah ke-$i : ${'namaMatkul'.$i}</h3>";
    echo "SKS : ${'sks'.$i}<br>";
    echo "Kehadiran : ${'nilaiHadir'.$i}<br>";
    echo "Tugas : ${'nilaiTugas'.$i}<br>";
    echo "UTS : ${'nilaiUTS'.$i}<br>";
    echo "UAS : ${'nilaiUAS'.$i}<br>";
    echo "Nilai Akhir : " . number_format(${"nilaiAkhir$i"}, 2) . "<br>";
    echo "Grade : ${'grade'.$i}<br>";
    echo "Angka Mutu : ${'mutu'.$i}<br>";
    echo "Bobot : " . number_format(${"bobot$i"}, 2) . "<br>";
    echo "Status : ${'status'.$i}<hr>";
  }

  echo "<p><b>Total Bobot = " . number_format($totalBobot, 2) . "</b></p>";
  echo "<p><b>Total SKS = $totalSks</b></p>";
  echo "<p><b>IPK = " . number_format($ipk, 2) . "</b></p>";
  ?>
</section>



</main>
 <section id="contact">
    <h2>Kontak Kami</h2>
    <form>
      <label for="txtNama"><span>Nama:</span>
        <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
      </label>
      <label for="txtEmail"><span>Email:</span>
        <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
      </label>
      <label for="txtPesan"><span>Pesan Anda:</span>
        <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
      </label>
      <button type="submit">Kirim</button>
      <button type="reset">Batal</button>
    </form>
  </section>
</main>

<footer>
  <p>&copy; 2025 Suci Fitria Azhara [2522500057]</p>
</footer>

<script >document.querySelector("form").addEventListener("submit", function (e) {
const nama = document.getElementById("txtNama").value.trim();
const email = document.getElementById("txtEmail").value.trim();
const pesan = document.getElementById("txtPesan").value.trim();
if (nama === "" || email === "" || pesan === "") {
alert("Semua kolom wajib diisi!");
e.preventDefault();
} else {
alert("Terima kasih, " + nama + "! Pesan Anda telah dikirim.");
}
});</script>
</body>
</html>
