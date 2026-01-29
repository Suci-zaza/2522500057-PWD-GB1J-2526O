<?php
session_start(); 
require 'koneksi.php';
require 'fungsi.php';

$flash_sukses = $_SESSION['flash_sukses'] ?? '';
$flash_error  = $_SESSION['flash_error']  ?? '';
unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);

$sql = "SELECT id, no_anggota, nama, jabatan, tgl_jadi, skill, gaji, no_wa, batalion, bb, tb 
        FROM tbl_anggota ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Data Anggota</h1>

<?php if ($flash_sukses): ?>
    <div style="background:#d4edda;color:#155724;padding:10px;border-radius:5px;"><?= $flash_sukses; ?></div>
<?php endif; ?>

<?php if ($flash_error): ?>
    <div style="background:#f8d7da;color:#721c24;padding:10px;border-radius:5px;"><?= $flash_error; ?></div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>No Anggota</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Tgl Jadi</th>
        <th>Skill</th>
        <th>Gaji</th>
        <th>No WA</th>
        <th>Batalion</th>
        <th>BB</th>
        <th>TB</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; while($row=mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td>
                <a href="edit.php?id=<?= urlencode($row['id']); ?>">Edit</a> | 
                <a href="proses_delete.php?id=<?= urlencode($row['id']); ?>" 
                   onclick="return confirm('Yakin hapus data anggota ini?');">Delete</a>
            </td>
            <td><?= htmlspecialchars($row['no_anggota']); ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['jabatan']); ?></td>
            <td><?= htmlspecialchars($row['tgl_jadi']); ?></td>
            <td><?= htmlspecialchars($row['skill']); ?></td>
            <td><?= number_format($row['gaji'], 0, ',', '.'); ?></td>
            <td><?= htmlspecialchars($row['no_wa']); ?></td>
            <td><?= htmlspecialchars($row['batalion']); ?></td>
            <td><?= $row['bb']; ?> kg</td>
            <td><?= $row['tb']; ?> cm</td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<a href="index.php#anggota">← Kembali ke Form</a>
</body>
</html>
