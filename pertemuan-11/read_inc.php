<?php
require 'koneksi.php';

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
    return;
}

if (mysqli_num_rows($q) == 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
    return;
}
$no = 1; 
?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Created At</th>
    </tr>



<?php while ($row = mysqli_fetch_assoc($q)) : ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['cid']; ?></td>
    <td><?= htmlspecialchars($row['cnama']); ?></td>
    <td><?= htmlspecialchars($row['cemail']); ?></td>
    <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
    <td><?= $row['dcreated_at']; ?></td>
</tr>
<?php endwhile; ?>


</table>
