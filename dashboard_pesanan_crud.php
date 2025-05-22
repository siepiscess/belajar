<?php
require "db_connect.php";
if (isset($_POST['edit'])) {
    $id = $_POST['id'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $jenis_aglonema = $_POST['jenis_aglonema'] ?? '';
    $size = $_POST['size'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    
    if ($id === '' || $nama === '' || $alamat === '' || $jenis_aglonema === '' || $size === '' || $jumlah === '') {
        die("Semua field wajib diisi!");
    }
    $stmt = $conn->prepare("UPDATE pesanan SET nama=?, alamat=?, jenis_aglonema=?, size=?, jumlah=? WHERE id=?");
    $stmt->bind_param("ssssii", $nama, $alamat, $jenis_aglonema, $size, $jumlah, $id);
    if ($stmt->execute()) {
        echo "Data pesanan berhasil diupdate!";
    } else {
        echo "Gagal update data pesanan!";
    }
    exit;
}

// Hapus pesanan (opsional)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM pesanan WHERE id='$id'");
    echo "OK";
    exit;
}
?>