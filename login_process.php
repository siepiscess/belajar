<?php
session_start();
require "db_connect.php";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email=? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($user_id, $username, $user_email, $pw_hash);

if ($stmt->fetch()) {
    if (password_verify($password, $pw_hash)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user_email;
        header("Location: home.php");
    } else {
        header("Location: login.php?error=Password salah");
    }
} else {
    header("Location: login.php?error=Email tidak ditemukan");
}
$stmt->close();
exit;