<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('biodata_read.php');
}

// Ambil NIM Baru (dari input text) dan NIM Lama (dari input hidden)
$nim_baru = bersihkan($_POST['txtNim']  ?? ''); 
$nim_lama = bersihkan($_POST['old_nim'] ?? ''); // <-- Tambahkan ini

// ... (variabel lain tetap sama)
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

if ($nim_baru === '') {
    $errors[] = 'NIM tidak boleh kosong.<br>';
}
// (opsional) validasi format NIM di sini
 

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.<br>';
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
     SET nim = ?, nama = ?, tempat = ?, tanggal = ?, hobi = ?, pasangan = ?, pekerjaan = ?, ortu = ?, kakak = ?, adik = ?
     WHERE nim = ?" // <-- WHERE menggunakan NIM lama
);

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('biodata_edit.php?nim=' . urlencode($nim));
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssssssss", // Tambahkan satu "s" (total jadi 11 "s")
    $nim_baru,     // <-- Masukkan NIM Baru paling depan (untuk SET nim=?)
    $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik, 
    $nim_lama      // <-- Gunakan NIM Lama paling belakang (untuk WHERE nim=?)
);
if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_bio']);
    $_SESSION['flash_sukses_bio'] = 'Biodata berhasil diperbarui.';
    redirect_ke('biodata_read.php');
} else {
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
    $_SESSION['flash_error_bio'] = 'Biodata gagal diperbarui.';
    redirect_ke('biodata_edit.php?nim=' . urlencode($nim));
}

mysqli_stmt_close($stmt);
