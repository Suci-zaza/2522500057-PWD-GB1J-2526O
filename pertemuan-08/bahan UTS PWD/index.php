  <?php
  session_start();

  $sesnama = "";
  if (isset($_SESSION["sesnama"])):
    $sesnama = $_SESSION["sesnama"];
  endif;

  $sesemail = "";
  if (isset($_SESSION["sesemail"])):
    $sesemail = $_SESSION["sesemail"];
  endif;

  $sespesan = "";
  if (isset($_SESSION["sespesan"])):
    $sespesan = $_SESSION["sespesan"];
  endif;
  ?>




<?php
  session_start();
$sesNIM =  $_SESSION["sesNIM"];
$sesNamalengkap = $_SESSION["sesNamalengkap"];
$sesTempatlahir = $_SESSION["sesTempatlahir "];    
 $sesTanggallahir =$_SESSION["sesTanggallahir"] ;
$sesHobi = $_SESSION["sesHobi"] ;
$sesPasangan = $_SESSION["sesPasangan"] ;
$sesNamakakak = $_SESSION["sesNamakakak"] ;
$sesNamaadik = $_SESSION["sesNamaadik"];
$sesPekerjaan = $_SESSION["sesPekerjaan"];
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <header>
      <h1>Ini Header</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
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
        <?php
        echo "halo dunia!<br>";
        echo "nama saya suci";
        ?>
        <p>Ini contoh paragraf HTML.</p>
      </section>

      <section id="contact">
        <h2>Bisa isi biodata anda</h2>
    <form action="terima.php" method="POST">

          <label for="sesNIM"><span>NIM :</span> <br>
            <input type="text" id="sesNIM" name="sesNIM" placeholder="Masukkan NIM" required autocomplete="NIM">
          </label>

          <label for="sesNamalengkap"><span>Nama Lengkap :</span><br>
            <input type="text" id="sesNamalengkap" name="sesNamalengkap" placeholder="Masukkan Nama lengkap" required autocomplete="Nama lengkap">
          </label>

          <label for="sesTempatlahir"><span>Tempat Lahir :</span><br>
            <input type="text" id="sesTempatlahir" name="sesTempatlahir" placeholder="Masukkan Tempat lahir" required autocomplete="Tempat lahir">
          </label>

          <label for="sesTanggallahir"><span>Tanggal Lahir :</span><br>
            <input type="text" id="sesTanggallahir" name="txtTanggallahir" placeholder="Masukkan Tanggal lahir" required autocomplete="Tanggal lahir">
          </label>

          <label for="sesHobi"><span>Hobi :</span>
            <input type="text" id="sesHobi" name="sesHobi" placeholder="Masukkan Hobi" required autocomplete="Hobi">
          </label>

          <label for="sesPasangan"><span>Pasangan :</span>
            <input type="text" id="sesPasangan" name="sesPasangan" placeholder="Masukkan Pasangan" required autocomplete="Pasangan">
          </label>

          <label for="sesPekerjaan "><span>Pekerjaan :</span>
            <input type="text" id="sesPekerjaan " name="sesPekerjaan " placeholder="Masukkan Pekerjaan " required autocomplete="Pekerjaan ">
          </label>

          <label for="sesNamaorangtua"><span>Nama Orang Tua :</span>
            <input type="text" id="sesNamaorangtua" name="sesNamaorangtua" placeholder="Masukkan Nama orang tua" required autocomplete="Nama orang tua">
          </label>

          <label for="sesNamakakak"><span>Nama Kakak :</span>
            <input type="text" id="sesNamakakak" name="sesNamakakak" placeholder="Masukkan Nama kakak" required autocomplete="Nama kakak">
          </label>

          <label for="sesNamaadik"><span>Nama Adik :</span> 
            <input type="text" id="sesNamaadik" name="sesNamaadik" placeholder="Masukkan Nama adik" required autocomplete="Nama adik">
          </label>

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </form>
  </section>  
  </input>
      </section>
      <section id="about">
        <h2>Tentang Saya</h2>
      
      
          <br><hr>
          <p><strong>NIM :</strong> <?php echo $sesNIM ?></p>
          <p><strong>Nama Lengkap :</strong> <?php echo $sesNamalengkap ?></p>
          <p><strong>Tanggal lahir :</strong> <?php echo $sesTanggallahir  ?></p>
          <p><strong>Hobi :</strong> <?php echo $sesHobi ?></p>
          <p><strong>Pasangan :</strong> <?php echo $sesPasangan ?></p>
          <p><strong>Pekerjaan:</strong> <?php echo $sesPekerjaan ?></p>
          <p><strong>Nama kakak:</strong> <?php echo $sesNamakakak ?></p>
          <p><strong>Nama adik :</strong> <?php echo $sesNamaadik ?></p>
      
        </p>
      </section>

      <section id="contact">
        <h2>Kontak Kami</h2>
        <form action="proses.php" method="POST">

          <label for="txtNama"><span>Nama:</span>
            <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
          </label>

          <label for="txtEmail"><span>Email:</span>
            <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
          </label>

          <label for="txtPesan"><span>Pesan Anda:</span>
            <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
            <small id="charCount">0/200 karakter</small>
          </label>


          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </form>

        <?php if (!empty($sesnama)): ?>
          <br><hr>
          <h2>Yang menghubungi kami</h2>
          <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
          <p><strong>Email :</strong> <?php echo $sesemail ?></p>
          <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
        <?php endif; ?>



      </section>
    </main>

    <footer>
      <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
    </footer>

    <script src="script.js"></script>
  </body>

  </html>