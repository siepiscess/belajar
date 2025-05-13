<?php
require "db_connect.php";
// Edit pesanan
if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['edit'])) {
  $id = $_POST['id'];
  $nama_orang = $_POST['nama_orang'];
  $alamat = $_POST['alamat'];
  $nama_aglo = $_POST['nama_aglo'];
  $size = $_POST['size'];
  $ukuran = $_POST['ukuran'];
  $stmt = $conn->prepare("UPDATE pesanan SET nama_orang=?,alamat=?,nama_aglo=?,size=?,ukuran=? WHERE id=?");
  $stmt->bind_param("sssssi",$nama_orang,$alamat,$nama_aglo,$size,$ukuran,$id);
  $stmt->execute();
  echo "Pesanan berhasil diubah!";
  exit;
}
// Hapus pesanan
if(isset($_GET['hapus'])){
  $id = $_GET['hapus'];
  $conn->query("DELETE FROM pesanan WHERE id=$id");
  echo "Pesanan berhasil dihapus!";
  exit;
}