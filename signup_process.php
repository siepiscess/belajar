<?php
session_start();
require "db_connect.php";
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$pw = $_POST['password'] ?? '';
$repw = $_POST['repassword'] ?? '';
if($pw!==$repw) {
    header("Location: signup.php?error=Password tidak sama");
    exit;
}
$stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows > 0){
    header("Location: signup.php?error=Email sudah terdaftar");
    exit;
}
$pw_hash = password_hash($pw, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss",$username,$email,$pw_hash);
if($stmt->execute()) {
    $user_id = $stmt->insert_id;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header("Location: login.php?success=Registrasi berhasil, selamat datang!");
} else {
    header("Location: signup.php?error=Registrasi gagal");
}
exit;