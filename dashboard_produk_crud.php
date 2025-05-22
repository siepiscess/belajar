<?php
require "db_connect.php";

// Tambah produk
if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($_POST['edit'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $kategori = $_POST['kategori'];
  $ukuran = isset($_POST['ukuran']) ? $_POST['ukuran'] : '';
  $gambar = "";

  if (isset($_FILES['gambar']) && $_FILES['gambar']['tmp_name']){
    if (!is_dir('assets')) mkdir('assets');
    $namafile = uniqid()."_".preg_replace('/[^A-Za-z0-9.\-_]/','',$_FILES['gambar']['name']);
    $gambar = "assets/".$namafile;
    if (!move_uploaded_file($_FILES['gambar']['tmp_name'],$gambar)) {
      http_response_code(500);
      die("Upload gambar gagal! Pastikan folder assets/ ADA dan dapat ditulis.");
    }
  }

  $stmt = $conn->prepare("INSERT INTO produk (nama,harga,stok,ukuran,gambar,kategori) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("siisss",$nama,$harga,$stok,$ukuran,$gambar,$kategori);
  if($stmt->execute()){
    echo "Produk berhasil ditambah!";
  } else {
    http_response_code(500);
    echo "Gagal tambah produk: ".$conn->error;
  }
  exit;
}

// Edit produk
if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['edit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $kategori = $_POST['kategori'];
  $ukuran = isset($_POST['ukuran']) ? $_POST['ukuran'] : '';
  if(isset($_FILES['gambar']) && $_FILES['gambar']['tmp_name']){
    if(!is_dir('assets')) mkdir('assets');
    $namafile = uniqid()."_".preg_replace('/[^A-Za-z0-9.\-_]/','',$_FILES['gambar']['name']);
    $gambar = "assets/".$namafile;
    if(!move_uploaded_file($_FILES['gambar']['tmp_name'],$gambar)){
      http_response_code(500);
      die("Upload gambar gagal! Pastikan folder assets/ ADA dan dapat ditulis!");
    }
    $stmt = $conn->prepare("UPDATE produk SET nama=?,harga=?,stok=?,ukuran=?,gambar=?,kategori=? WHERE id=?");
    $stmt->bind_param("siisssi",$nama,$harga,$stok,$ukuran,$gambar,$kategori,$id);
  } else {
    $stmt = $conn->prepare("UPDATE produk SET nama=?,harga=?,stok=?,ukuran=?,kategori=? WHERE id=?");
    $stmt->bind_param("siissi",$nama,$harga,$stok,$ukuran,$kategori,$id);
  }
  if($stmt->execute()){
    echo "Produk berhasil diubah!";
  } else {
    http_response_code(500);
    echo "Gagal ubah produk: ".$conn->error;
  }
  exit;
}

// Hapus produk
if(isset($_GET['hapus'])){
  $id = intval($_GET['hapus']);
  $conn->query("DELETE FROM produk WHERE id=$id");
  echo "Produk berhasil dihapus!";
  exit;
}
?>