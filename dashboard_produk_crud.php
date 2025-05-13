<?php
require "db_connect.php";
// Tambah produk
if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($_POST['edit'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $kategori = $_POST['kategori'];
  $gambar = "";
  if(isset($_FILES['gambar']) && $_FILES['gambar']['tmp_name']){
    $namafile = uniqid().basename($_FILES['gambar']['name']);
    $gambar = "assets/".$namafile;
    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
  }
  $stmt = $conn->prepare("INSERT INTO produk (nama,harga,stok,gambar,kategori) VALUES (?,?,?,?,?)");
  $stmt->bind_param("siiss", $nama,$harga,$stok,$gambar,$kategori);
  $stmt->execute();
  echo "Produk berhasil ditambah!";
  exit;
}
// Edit produk
if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['edit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $kategori = $_POST['kategori'];
  if(isset($_FILES['gambar']) && $_FILES['gambar']['tmp_name']){
    $namafile = uniqid().basename($_FILES['gambar']['name']);
    $gambar = "assets/".$namafile;
    move_uploaded_file($_FILES['gambar']['tmp_name'],$gambar);
    $stmt = $conn->prepare("UPDATE produk SET nama=?,harga=?,stok=?,gambar=?,kategori=? WHERE id=?");
    $stmt->bind_param("siissi",$nama,$harga,$stok,$gambar,$kategori,$id);
  } else {
    $stmt = $conn->prepare("UPDATE produk SET nama=?,harga=?,stok=?,kategori=? WHERE id=?");
    $stmt->bind_param("siisi",$nama,$harga,$stok,$kategori,$id);
  }
  $stmt->execute();
  echo "Produk berhasil diubah!";
  exit;
}
// Hapus produk
if(isset($_GET['hapus'])){
  $id = $_GET['hapus'];
  $conn->query("DELETE FROM produk WHERE id=$id");
  echo "Produk berhasil dihapus!";
  exit;
}