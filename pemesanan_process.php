<?php
require "db_connect.php";
$nama = $_POST['nama_orang'];
$alamat = $_POST['alamat'];
$nama_aglo = $_POST['nama_aglo'];
$size = $_POST['size'];
$ukuran = $_POST['ukuran'];
$stmt = $conn->prepare("INSERT INTO pesanan (nama_orang, alamat, nama_aglo, size, ukuran) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss", $nama, $alamat, $nama_aglo, $size, $ukuran);
if($stmt->execute()) {
  header("Location: pemesanan.php?success=Pesanan+berhasil+dikirim%21");
  exit;
} else {
  die("Gagal simpan pesanan");
}