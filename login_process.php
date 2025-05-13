<?php
require "db_connect.php";
$email = $_POST['email'];
$pw = $_POST['password'];
$res = $conn->query("SELECT * FROM users WHERE email='$email'");
if($user = $res->fetch_assoc()){
  if(password_verify($pw, $user['password'])){
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    header("Location: home.php");
    exit;
  }
}
header("Location: login.php?error=Email+atau+password+salah");
exit;