<?php
require "db_connect.php";
$username = $_POST['username'];
$email = $_POST['email'];
$pw = $_POST['password'];
$repw = $_POST['repassword'];
if($pw!==$repw) {
  header("Location: signup.php?error=Password+tidak+sama");
  exit;
}
$pw_hash = password_hash($pw, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss",$username,$email,$pw_hash);
try {
  $stmt->execute();
  header("Location: login.php?success=Registrasi+berhasil%2C+silakan+login!");
} catch(mysqli_sql_exception $e) {
  header("Location: signup.php?error=Email+sudah+terdaftar");
}
exit;