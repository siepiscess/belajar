<?php
// Koneksi ke database
$conn = new mysqli("localhost", "ranika", "niutsiikan", "toko_aglonema");

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form registrasi
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash password sebelum disimpan ke database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Simpan data ke database
$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

if ($stmt->execute()) {
    echo "<script>alert('Registration successful! Please login.'); window.location.href='login.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>