<?php
$host = 'localhost';
$user = 'ranika';
$password = 'niutsiikan'; 
$dbname = 'toko_aglonema';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>