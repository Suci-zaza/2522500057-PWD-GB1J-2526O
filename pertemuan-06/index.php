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


    <p><strong>NIM:</strong> <?php echo $nim ?></p>
<p><strong>Nama Lengkap:</strong> <?php echo $nama ?></p>
<p><strong>Tempat Lahir:</strong> <?php echo $tempat ?></p>
<p><strong>Tanggal Lahir:</strong> <?php echo $tgl_lahir ?></p>
<p><strong>Hobi:</strong> <?php echo $hobi ?></p>
<p><strong>Pasangan:</strong> <?php echo $pasangan ?></p>
<p><strong>Pekerjaan:</strong> <?php echo $pekerjaan ?></p>
<p><strong>Nama Orang Tua:</strong> <?php echo $ortu ?></p>
<p><strong>Nama Kakak:</strong> <?php echo $kakak ?></p>
<p><strong>Nama Adik:</strong> <?php echo $adik ?></p>


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
