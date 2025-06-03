<?php
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Password admin HARUS "niutsiikan"
if ($password === "niutsiikan") {
    // Set session admin, bisa pakai email jika mau
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_email'] = $email;
    header("Location: dashboard_admin.php");
    exit;
} else {
    header("Location: login_admin.php?error=Password+admin+salah!");
    exit;
}
?>