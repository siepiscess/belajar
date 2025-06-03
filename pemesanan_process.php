<?php
require "db_connect.php";

// Ambil data dari POST
$nama = trim($_POST['nama'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$produk_id = intval($_POST['produk_id'] ?? 0);
$jumlah = intval($_POST['jumlah'] ?? 0);

if ($nama === '' || $alamat === '' || $produk_id === 0 || $jumlah < 1) {
    header("Location: pemesanan.php?error=Semua field wajib diisi dengan benar!");
    exit;
}

// Cek stok produk
$stmt = $conn->prepare("SELECT nama, stok FROM produk WHERE id=?");
$stmt->bind_param("i", $produk_id);
$stmt->execute();
$stmt->bind_result($nama_produk, $stok);
$stmt->fetch();
$stmt->close();

if ($stok === null) {
    header("Location: pemesanan.php?error=Produk tidak ditemukan!");
    exit;
}
if ($jumlah > $stok) {
    header("Location: pemesanan.php?error=Stok tidak cukup!");
    exit;
}

// Ambil detail produk untuk dimasukkan ke pesanan
$stmt = $conn->prepare("SELECT nama, ukuran FROM produk WHERE id=?");
$stmt->bind_param("i", $produk_id);
$stmt->execute();
$stmt->bind_result($jenis_aglonema, $size);
$stmt->fetch();
$stmt->close();

// Insert ke tabel pesanan
$stmt = $conn->prepare("INSERT INTO pesanan (nama, alamat, jenis_aglonema, size, jumlah, produk_id) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssii", $nama, $alamat, $jenis_aglonema, $size, $jumlah, $produk_id);

if ($stmt->execute()) {
    // Kurangi stok produk
    $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE id = $produk_id");
    header("Location: pemesanan.php?success=Pesanan berhasil dikirim!");
} else {
    header("Location: pemesanan.php?error=Gagal mengirim pesanan!");
}
exit;