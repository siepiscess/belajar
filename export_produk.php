<?php
require 'db_connect.php';
$search = trim($_GET['search'] ?? '');
$where = $search ? "WHERE nama LIKE '%$search%'" : "";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=produk_export.xls");
echo "ID\tNama\tHarga\tStok\tGambar\n";
$res = $conn->query("SELECT * FROM produk $where ORDER BY id DESC");
while ($row = $res->fetch_assoc()) {
    echo "{$row['id']}\t{$row['nama']}\t{$row['harga']}\t{$row['stok']}\t{$row['gambar']}\n";
}
?>