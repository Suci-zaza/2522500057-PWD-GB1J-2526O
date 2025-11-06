<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pelan-pelan aja guys</title>
<link rel="stylesheet" href="belajar.css">
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
    $nama = "Sucifitria Azhara 😎";
    $tempat = "Pangkalpinang";
    $tgl_lahir = "04 November 2005";
    $hobi = "Eksperimen pakai Python, Merakit Brick, dan Main Game 😁";
    $pasangan = "Belum ada ♥";
    $pekerjaan = "Digital Marketing";
    $ortu = "Bapak Rasianto dan Ibu Viska ❤️";
    $kakak = "Tidak memiliki kakak 😢";
    $adik = "Aditpa Ravelino 😄";
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
  <h2>Perhitungan Nilai Akhir, Grade, dan IPK</h2>

  <?php
  // Nama Mata Kuliah
  $namaMatkul1 = "Algoritma dan Struktur Data";
  $namaMatkul2 = "Agama";
  $namaMatkul3 = "Bahasa Inggris";
  $namaMatkul4 = "Basis Data";
  $namaMatkul5 = "Pemrograman Web Dasar";

  // SKS
  $sks1 = 3; $sks2 = 2; $sks3 = 2; $sks4 = 3; $sks5 = 3;

  // Nilai Kehadiran, Tugas, UTS, UAS
  $nilaiKehadiran1 = 90; $nilaiTugas1 = 85; $nilaiUTS1 = 80; $nilaiUAS1 = 88;
  $nilaiKehadiran2 = 92; $nilaiTugas2 = 86; $nilaiUTS2 = 83; $nilaiUAS2 = 87;
  $nilaiKehadiran3 = 88; $nilaiTugas3 = 80; $nilaiUTS3 = 78; $nilaiUAS3 = 82;
  $nilaiKehadiran4 = 85; $nilaiTugas4 = 80; $nilaiUTS4 = 75; $nilaiUAS4 = 80;
  $nilaiKehadiran5 = 89; $nilaiTugas5 = 84; $nilaiUTS5 = 82; $nilaiUAS5 = 90;

  // Rumus nilai akhir
  function hitungNilaiAkhir($hadir, $tugas, $uts, $uas) {
    return (0.1 * $hadir) + (0.3 * $tugas) + (0.3 * $uts) + (0.3 * $uas);
  }

  // Fungsi konversi nilai ke grade
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

  // Fungsi konversi grade ke angka mutu
  function getAngkaMutu($grade) {
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

  // Hitung nilai akhir dan IPK
  $nilaiAkhir = [];
  $grade = [];
  $mutu = [];
  $bobot = [];
  $totalBobot = 0;
  $totalSks = $sks1 + $sks2 + $sks3 + $sks4 + $sks5;

  for ($i = 1; $i <= 5; $i++) {
    $akhir = hitungNilaiAkhir(${"nilaiKehadiran$i"}, ${"nilaiTugas$i"}, ${"nilaiUTS$i"}, ${"nilaiUAS$i"});
    $g = getGrade($akhir);
    $am = getAngkaMutu($g);
    $b = $am * ${"sks$i"};

    $nilaiAkhir[$i] = $akhir;
    $grade[$i] = $g;
    $mutu[$i] = $am;
    $bobot[$i] = $b;

    $totalBobot += $b;
  }

  $ipk = $totalBobot / $totalSks;
  ?>

  <table border="1" cellpadding="6">
    <tr>
      <th>No</th><th>Mata Kuliah</th><th>SKS</th><th>Nilai Akhir</th><th>Grade</th><th>Angka Mutu</th><th>Bobot</th>
    </tr>
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= ${"namaMatkul$i"} ?></td>
        <td><?= ${"sks$i"} ?></td>
        <td><?= number_format($nilaiAkhir[$i], 2) ?></td>
        <td><?= $grade[$i] ?></td>
        <td><?= number_format($mutu[$i], 2) ?></td>
        <td><?= number_format($bobot[$i], 2) ?></td>
      </tr>
    <?php endfor; ?>
  </table>

  <p><strong>Total SKS:</strong> <?= $totalSks ?></p>
  <p><strong>Total Bobot:</strong> <?= number_format($totalBobot, 2) ?></p>
  <p><strong>IPK:</strong> <?= number_format($ipk, 2) ?></p>
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

<script src="script.js"></script>
</body>
</html>
