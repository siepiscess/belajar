<?php
require "db_connect.php";
$email = $_POST['email'];
$new = $_POST['newPassword'];
$hash = password_hash($new, PASSWORD_DEFAULT);
$stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
$stmt->bind_param("ss",$hash,$email);
$stmt->execute();
if($stmt->affected_rows>0){
  header("Location: reset_password.php?success=1");
} else {
  header("Location: reset_password.php?error=Email+tidak+terdaftar");
}
exit;