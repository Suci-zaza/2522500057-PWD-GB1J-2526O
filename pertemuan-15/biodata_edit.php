<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/* Ambil NIM dari URL: biodata_edit.php?nim=2024001
filter_input memastikan itu string valid */
$nim = filter_input(INPUT_GET, 'nim', FILTER_SANITIZE_STRING);

if (!$nim || $nim === '') {
    $_SESSION['flash_error_bio'] = 'NIM tidak valid.';
    redirect_ke('biodata_read.php');
}

/* Ambil data lama dari DB tbl_biodata */
$stmt = mysqli_prepare($conn, "SELECT nim, nama, tempat, tanggal, hobi, pasangan, pekerjaan, ortu, kakak, adik 
                               FROM tbl_biodata WHERE nim = ? LIMIT 1");
if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Query tidak benar.';
    redirect_ke('biodata_read.php');
}

mysqli_stmt_bind_param($stmt, "s", $nim);  // "s" untuk string (NIM)
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error_bio'] = 'Record tidak ditemukan.';
    redirect_ke('biodata_read.php');
}

/* Nilai awal (prefill form) dari database */
$nama     = $row['nama']     ?? '';
$tempat   = $row['tempat']   ?? '';
$tanggal  = $row['tanggal']  ?? '';
$hobi     = $row['hobi']     ?? '';
$pasangan = $row['pasangan'] ?? '';
$pekerjaan= $row['pekerjaan']?? '';
$ortu     = $row['ortu']     ?? '';
$kakak    = $row['kakak']    ?? '';
$adik     = $row['adik']     ?? '';

/* Ambil error dan nilai old input kalau ada */
$flash_error = $_SESSION['flash_error_bio'] ?? '';
$old_bio     = $_SESSION['old_bio'] ?? [];
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
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Edit Biodata Mahasiswa</h1>

<?php if (!empty($flash_error)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $flash_error; ?>
    </div>
<?php endif; ?>

<form action="biodata_update.php" method="POST">
    <input type="hidden" name="nim" value="<?= htmlspecialchars($nim); ?>">
    
    <label for="txtNmLengkap"><span>Nama Lengkap:</span>
        <input type="text" id="txtNmLengkap" name="txtNmLengkap" 
               value="<?= htmlspecialchars($nama); ?>" required>
    </label><br>

    <label for="txtT4Lhr"><span>Tempat Lahir:</span>
        <input type="text" id="txtT4Lhr" name="txtT4Lhr" 
               value="<?= htmlspecialchars($tempat); ?>">
    </label><br>

    <label for="txtTglLhr"><span>Tanggal Lahir:</span>
        <input type="date" id="txtTglLhr" name="txtTglLhr" 
               value="<?= htmlspecialchars($tanggal); ?>">
    </label><br>

    <label for="txtHobi"><span>Hobi:</span>
        <input type="text" id="txtHobi" name="txtHobi" 
               value="<?= htmlspecialchars($hobi); ?>">
    </label><br>

    <label for="txtPasangan"><span>Pasangan:</span>
        <input type="text" id="txtPasangan" name="txtPasangan" 
               value="<?= htmlspecialchars($pasangan); ?>">
    </label><br>

    <label for="txtKerja"><span>Pekerjaan:</span>
        <input type="text" id="txtKerja" name="txtKerja" 
               value="<?= htmlspecialchars($pekerjaan); ?>">
    </label><br>

    <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
        <input type="text" id="txtNmOrtu" name="txtNmOrtu" 
               value="<?= htmlspecialchars($ortu); ?>">
    </label><br>

    <label for="txtNmKakak"><span>Nama Kakak:</span>
        <input type="text" id="txtNmKakak" name="txtNmKakak" 
               value="<?= htmlspecialchars($kakak); ?>">
    </label><br>

    <label for="txtNmAdik"><span>Nama Adik:</span>
        <input type="text" id="txtNmAdik" name="txtNmAdik" 
               value="<?= htmlspecialchars($adik); ?>">
    </label><br><br>

    <button type="submit">Kirim</button>
    <a href="biodata_read.php">Batal</a>
</form>

</body>
</html>
