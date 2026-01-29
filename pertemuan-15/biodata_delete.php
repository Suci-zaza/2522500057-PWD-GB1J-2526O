<?php
require 'koneksi.php';
require 'fungsi.php';

$nim = $_GET['nim'] ?? '';
$nim = bersihkan($nim);

if ($nim === '') {
    $_SESSION['flash_error_bio'] = 'NIM tidak valid.';
    redirect_ke('biodata_read.php');
}

$stmt = mysqli_prepare($conn,
    "DELETE FROM tbl_biodata WHERE nim = ?"
);

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('biodata_read.php');
}

mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses_bio'] = 'Biodata berhasil dihapus.';
} else {
    $_SESSION['flash_error_bio'] = 'Biodata gagal dihapus.';
}

mysqli_stmt_close($stmt);
redirect_ke('biodata_read.php');
