<!DOCTYPE html>
<html lang="id">
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
      // --- Variabel PHP ---
      $nim = "2522500057";
      $nama = "Sucifitria Azhara 😎";
      $tempat = "Pangkalpinang";
      $tgl_lahir = "04 November 2005";
      $hobi = "Eksperimen pakai Python, Merakit Brick, dan Main Game 😁";
      $pasangan = "Belum ada karena jomblo 😢";
      $pekerjaan = "Digital Marketing";
      $ortu = "Bapak Rasianto dan Ibu Viska ❤️";
      $kakak = "Tidak memiliki kakak 😢";
      $adik = "Aditpa Ravelino 😄";

      // --- Tampilkan ke halaman ---
      echo "
      <p><strong>NIM:</strong> $nim</p>
      <p><strong>Nama Lengkap:</strong> $nama</p>
      <p><strong>Tempat Lahir:</strong> $tempat</p>
      <p><strong>Tanggal Lahir:</strong> $tgl_lahir</p>
      <p><strong>Hobi:</strong> $hobi</p>
      <p><strong>Pasangan:</strong> $pasangan</p>
      <p><strong>Pekerjaan:</strong> $pekerjaan</p>
      <p><strong>Nama Orang Tua:</strong> $ortu</p>
      <p><strong>Nama Kakak:</strong> $kakak</p>
      <p><strong>Nama Adik:</strong> $adik</p>
      ";
    ?>
  </section>

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

<script src="coba.js"></script>
</body>
</html>
