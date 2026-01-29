<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

// 1. Ambil dan bersihkan input
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

// 2. Validasi sederhana
$errors = [];

if ($nim === '') {
    $errors[] = 'NIM wajib diisi.<br>';
}

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.<br>';
} elseif (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.<br>';
}

if (!empty($tanggal) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
    $errors[] = 'Format tanggal lahir tidak valid (YYYY-MM-DD).<br>';
}

// 3. Kalau ada error → simpan old + pesan, redirect (PRG)
if (!empty($errors)) {
    $_SESSION['old_bio'] = [
        'nim'      => $nim,
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
    redirect_ke('index.php#biodata');
}

// 4. INSERT ke tbl_biodata (prepared statement)
$sql  = "INSERT INTO tbl_biodata 
         (nim, nama, tempat, tanggal, hobi, pasangan, pekerjaan, ortu, kakak, adik)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $nim, $nama, $tempat, $tanggal, $hobi,
    $pasangan, $pekerjaan, $ortu, $kakak, $adik
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_bio']);
    $_SESSION['flash_sukses_bio'] = 'Biodata berhasil disimpan.';
    redirect_ke('index.php#biodata');
} else {
    $_SESSION['old_bio'] = [
        'nim'      => $nim,
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
    $_SESSION['flash_error_bio'] = 'Biodata gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);
