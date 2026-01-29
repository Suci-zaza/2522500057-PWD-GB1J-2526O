<?php
require 'koneksi.php';
require 'fungsi.php';

$nim = $_GET['nim'] ?? '';
$nim = bersihkan($nim);

if ($nim === '') {
    $_SESSION['flash_error_bio'] = 'NIM tidak valid.';
    redirect_ke('biodata_read.php');
}

// Ambil data lama
$stmt = mysqli_prepare($conn,
    "SELECT nim, nama, tempat, tanggal, hobi, pasangan, pekerjaan, ortu, kakak, adik
     FROM tbl_biodata WHERE nim = ? LIMIT 1"
);

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Query tidak benar.';
    redirect_ke('biodata_read.php');
}

mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error_bio'] = 'Record tidak ditemukan.';
    redirect_ke('biodata_read.php');
}

// Prefill
$nama     = $row['nama']     ?? '';
$tempat   = $row['tempat']   ?? '';
$tanggal  = $row['tanggal']  ?? '';
$hobi     = $row['hobi']     ?? '';
$pasangan = $row['pasangan'] ?? '';
$pekerjaan= $row['pekerjaan']?? '';
$ortu     = $row['ortu']     ?? '';
$kakak    = $row['kakak']    ?? '';
$adik     = $row['adik']     ?? '';

$flash_error = $_SESSION['flash_error_bio'] ?? '';
$old_bio     = $_SESSION['old_bio']        ?? [];
unset($_SESSION['flash_error_bio'], $_SESSION['old_bio']);

if (!empty($old_bio)) {
    $nama     = $old_bio['nama']     ?? $nama;
    $tempat   = $old_bio['tempat']   ?? $tempat;
    $tanggal  = $old_bio['tanggal']  ?? $tanggal;
    $hobi     = $old_bio['hobi']     ?? $hobi;
    $pasangan = $old_bio['pasangan'] ?? $pasangan;
    $pekerjaan= $old_bio['pekerjaan']?? $pekerjaan;
    $ortu     = $old_bio['ortu']     ?? $ortu;
    $kakak    = $old_bio['kakak']    ?? $kakak;
    $adik     = $old_bio['adik']     ?? $adik;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata Mahasiswa</title>
</head>
<body>
<h1>Edit Biodata Mahasiswa</h1>

<?php if (!empty($flash_error)): ?>
    <div class="alert-error"><?= $flash_error; ?></div>
<?php endif; ?>

<form action="biodata_update.php" method="POST">
    <label>NIM:
        <input type="text" name="txtNim" value="<?= htmlspecialchars($nim); ?>" readonly>
    </label>

    <label>Nama Lengkap:
        <input type="text" name="txtNmLengkap" value="<?= htmlspecialchars($nama); ?>" required>
    </label>

    <label>Tempat Lahir:
        <input type="text" name="txtT4Lhr" value="<?= htmlspecialchars($tempat); ?>">
    </label>

    <label>Tanggal Lahir:
        <input type="date" name="txtTglLhr" value="<?= htmlspecialchars($tanggal); ?>">
    </label>

    <label>Hobi:
        <input type="text" name="txtHobi" value="<?= htmlspecialchars($hobi); ?>">
    </label>

    <label>Pasangan:
        <input type="text" name="txtPasangan" value="<?= htmlspecialchars($pasangan); ?>">
    </label>

    <label>Pekerjaan:
        <input type="text" name="txtKerja" value="<?= htmlspecialchars($pekerjaan); ?>">
    </label>

    <label>Nama Orang Tua:
        <input type="text" name="txtNmOrtu" value="<?= htmlspecialchars($ortu); ?>">
    </label>

    <label>Nama Kakak:
        <input type="text" name="txtNmKakak" value="<?= htmlspecialchars($kakak); ?>">
    </label>

    <label>Nama Adik:
        <input type="text" name="txtNmAdik" value="<?= htmlspecialchars($adik); ?>">
    </label>

    <button type="submit">Kirim</button>
    <a href="biodata_read.php">Batal</a>
</form>
</body>
</html>
