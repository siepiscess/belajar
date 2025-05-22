<?php
require "db_connect.php";

$nama = trim($_POST['nama'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$jenis_aglonema = trim($_POST['jenis_aglonema'] ?? '');
$size = trim($_POST['size'] ?? '');
$jumlah = trim($_POST['jumlah'] ?? '');

if (
    $nama === '' ||
    $alamat === '' ||
    $jenis_aglonema === '' ||
    $size === '' ||
    $jumlah === '' ||
    !is_numeric($jumlah) || intval($jumlah) < 1
) {
    echo "<script>alert('Semua field wajib diisi dengan benar!');window.history.back();</script>";
    exit;
}

$jumlah = intval($jumlah);

$stmt = $conn->prepare("INSERT INTO pesanan (nama, alamat, jenis_aglonema, size, jumlah) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $nama, $alamat, $jenis_aglonema, $size, $jumlah);

if ($stmt->execute()) {
    echo "<script>alert('Pesanan berhasil dikirim!');window.location='menu.php';</script>";
} else {
    echo "<script>alert('Gagal mengirim pesanan!');window.history.back();</script>";
}
?>