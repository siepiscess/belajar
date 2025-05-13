<?php
require 'db_connect.php';
$search = trim($_GET['search'] ?? '');
$where = $search ? "WHERE nama_orang LIKE '%$search%' OR nama_aglo LIKE '%$search%'" : "";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pesanan_export.xls");
echo "ID\tNama Orang\tAlamat\tNama Aglo\tSize\tUkuran\n";
$res = $conn->query("SELECT * FROM pesanan $where ORDER BY id DESC");
while ($row = $res->fetch_assoc()) {
    echo "{$row['id']}\t{$row['nama_orang']}\t{$row['alamat']}\t{$row['nama_aglo']}\t{$row['size']}\t{$row['ukuran']}\n";
}
?>