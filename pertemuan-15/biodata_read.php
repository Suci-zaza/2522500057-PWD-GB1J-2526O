<?php
session_start();  // ← INI SAJA
require 'koneksi.php';
require 'fungsi.php';


$flash_sukses_bio = $_SESSION['flash_sukses_bio'] ?? '';
$flash_error_bio  = $_SESSION['flash_error_bio']  ?? '';
unset($_SESSION['flash_sukses_bio'], $_SESSION['flash_error_bio']);

$sql = "SELECT nim, nama, tempat, tanggal, hobi, pasangan, pekerjaan, ortu, kakak, adik, dcreated_at 
        FROM tbl_biodata ORDER BY dcreated_at DESC";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Data Biodata Mahasiswa</h1>

<?php if ($flash_sukses_bio): ?>
    <div style="background:#d4edda;color:#155724;padding:10px;border-radius:5px;"><?= $flash_sukses_bio; ?></div>
<?php endif; ?>

<?php if ($flash_error_bio): ?>
    <div style="background:#f8d7da;color:#721c24;padding:10px;border-radius:5px;"><?= $flash_error_bio; ?></div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Hobi</th>
        <th>Pasangan</th>
        <th>Pekerjaan</th>
        <th>Orang Tua</th>
        <th>Kakak</th>
        <th>Adik</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; while($row=mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td>
                <a href="biodata_edit.php?nim=<?= urlencode($row['nim']); ?>">Edit</a> |
                <a href="biodata_delete.php?nim=<?= urlencode($row['nim']); ?>" 
                   onclick="return confirm('Yakin hapus biodata ini?');">Delete</a>
            </td>
            <td><?= htmlspecialchars($row['nim']); ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['tempat']) . ', ' . htmlspecialchars($row['tanggal']); ?></td>
            <td><?= htmlspecialchars($row['hobi']); ?></td>
            <td><?= htmlspecialchars($row['pasangan']); ?></td>
            <td><?= htmlspecialchars($row['pekerjaan']); ?></td>
            <td><?= htmlspecialchars($row['ortu']); ?></td>
            <td><?= htmlspecialchars($row['kakak']); ?></td>
            <td><?= htmlspecialchars($row['adik']); ?></td>
            <td><?= htmlspecialchars($row['dcreated_at']); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<a href="index.php#biodata">← Kembali ke Form</a>
</body>
</html>
