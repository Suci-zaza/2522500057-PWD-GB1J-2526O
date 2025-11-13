<?php
session_start();
$sesNIM = $_POST["txtNIM"];
$sesNamalengkap = $_POST["txtNamalengkap"];
$sesTempatlahir = $_POST["txtTempatlahir"];
$sesTanggallahir = $_POST["txtTanggallahir"];
$sesHobi = $_POST["txtHobi"];
$sesPasangan = $_POST["txtPasangan"];
$sesPekerjaan= $_POST["txtPekerjaan"];
$sesNamakakak= $_POST["txtNamakakak"];
$sesNamaadik = $_POST["txtNamaadik"];
$_SESSION["sesNIM"] = $sesNIM;
$_SESSION["sesNamalengkap"] = $sesNamalengkap;
$_SESSION["sesTempatlahir "] = $sesTempatlahir ;    
$_SESSION["sesTanggallahir"] = $sesTanggallahir;
$_SESSION["sesHobi"] = $sesHobi;
$_SESSION["sesPasangan"] = $sesPasangan;
$_SESSION["sesNamakakak"] = $sesNamakakak;
$_SESSION["sesNamaadik"] = $sesNamaadik;
$_SESSION["sesPekerjaan"] = $sesPekerjaan;
header("location: index.php");
?>

<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;
header("location: index.php");
?>