<?php
require 'koneksi.php';
require 'fungsi.php';

session_start();  // ← WAJIB
$_SESSION['flash_error_bio'] = $_SESSION['flash_error_bio'] ?? '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}


$nim      = bersihkan($_POST['txtNim']       ?? '');
$nama     = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat   = bersihkan($_POST['txtT4Lhr']     ?? '');
$tanggal  = bersihkan($_POST['txtTglLhr']    ?? '');
$hobi     = bersihkan($_POST['txtHobi']      ?? '');
$pasangan = bersihkan($_POST['txtPasangan']  ?? '');
$pekerjaan= bersihkan($_POST['txtKerja']     ?? '');
$ortu     = bersihkan($_POST['txtNmOrtu']    ?? '');
$kakak    = bersihkan($_POST['txtNmKakak']   ?? '');
$adik     = bersihkan($_POST['txtNmAdik']    ?? '');

// Validasi
$errors = [];
if ($nim === '') {
    $errors[] = 'NIM wajib diisi.<br>';
}
if ($nama === '') {
    $errors[] = 'Nama wajib diisi.<br>';
} elseif (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.<br>';
}

if (!empty($errors)) {
    $_SESSION['old_bio'] = [
        'nim' => $nim, 'nama' => $nama, 'tempat' => $tempat,
        'tanggal' => $tanggal, 'hobi' => $hobi, 'pasangan' => $pasangan,
        'pekerjaan' => $pekerjaan, 'ortu' => $ortu,
        'kakak' => $kakak, 'adik' => $adik
    ];
    $_SESSION['flash_error_bio'] = implode('', $errors);
    redirect_ke('index.php#biodata');
}

// INSERT
$sql = "INSERT INTO tbl_biodata (nim, nama, tempat, tanggal, hobi, pasangan, pekerjaan, ortu, kakak, adik) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_bio']);
    $_SESSION['flash_sukses_bio'] = 'Biodata berhasil disimpan.';
} else {
    $_SESSION['flash_error_bio'] = 'Gagal menyimpan biodata.';
}
mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');
?>
