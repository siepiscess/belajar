<?php
session_start();

// Koneksi ke database
$conn = new mysqli("localhost", "ranika", "niutsiikan", "toko_aglonema");

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah pengguna ada di database berdasarkan email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        // Simpan data pengguna ke session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['first_name'] . " " . $row['last_name'];

        // Login berhasil
        header("Location: home.php");
        exit();
    } else {
        // Password salah
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='index.php';</script>";
    }
} else {
    // Email tidak ditemukan
    echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='index.php';</script>";
}

$stmt->close();
$conn->close();
?>