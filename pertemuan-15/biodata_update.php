<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('biodata_read.php');
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

$errors = [];

if ($nim === '') {
    $errors[] = 'NIM tidak boleh kosong.<br>';
}
if ($nama === '') {
    $errors[] = 'Nama wajib diisi.<br>';
} elseif (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.<br>';
}

if (!empty($tanggal) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
    $errors[] = 'Format tanggal lahir tidak valid.<br>';
}

if (!empty($errors)) {
    $_SESSION['old_bio'] = [
        'nama'     => $nama,
        'tempat'   => $tempat,
        'tanggal'  => $tanggal,
        'hobi'     => $hobi,
        'pasangan' => $pasangan,
        'pekerjaan'=> $pekerjaan,
        'ortu'     => $ortu,
        'kakak'    => $kakak,
        'adik'     => $adik,
    ];
    $_SESSION['flash_error_bio'] = implode('', $errors);
    redirect_ke('biodata_edit.php?nim=' . urlencode($nim));
}

$stmt = mysqli_prepare($conn,
    "UPDATE tbl_biodata
     SET nama = ?, tempat = ?, tanggal = ?, hobi = ?, pasangan = ?, pekerjaan = ?, ortu = ?, kakak = ?, adik = ?
     WHERE nim = ?"
);

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('biodata_edit.php?nim=' . urlencode($nim));
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssssss s",
    $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik, $nim
);
