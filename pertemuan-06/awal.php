<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas Variabel PHP - Tentang Saya</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f6fa;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    section#about {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 20px 30px;
    }

    h2 {
      text-align: left;
      color: #003366;
      border-bottom: 2px solid #003366;
      padding-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    td {
      padding: 8px 10px;
      vertical-align: top;
    }

    td:first-child {
      font-weight: bold;
      color: #003366;
      width: 30%;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<section id="about">
  <h2>Tentang Saya</h2>
  <?php
    // ==== Variabel Data Diri ====
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

  <table>
    <tr><td>NIM:</td><td><?= $nim ?></td></tr>
    <tr><td>Nama Lengkap:</td><td><?= $nama ?></td></tr>
    <tr><td>Tempat Lahir:</td><td><?= $tempat ?></td></tr>
    <tr><td>Tanggal Lahir:</td><td><?= $tgl_lahir ?></td></tr>
    <tr><td>Hobi:</td><td><?= $hobi ?></td></tr>
    <tr><td>Pasangan:</td><td><?= $pasangan ?></td></tr>
    <tr><td>Pekerjaan:</td><td><?= $pekerjaan ?></td></tr>
    <tr><td>Nama Orang Tua:</td><td><?= $ortu ?></td></tr>
    <tr><td>Nama Kakak:</td><td><?= $kakak ?></td></tr>
    <tr><td>Nama Adik:</td><td><?= $adik ?></td></tr>
  </table>
</section>

</body>
</html>
