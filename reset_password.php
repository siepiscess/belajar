<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reset Password - Aglonema Store</title>
  <link rel="stylesheet" href="css/universal.css">
</head>
<body>
<div class="container-trans" style="max-width:410px;">
  <h2 class="center">Reset Password</h2>
  <?php if(isset($_GET['success'])): ?>
    <div class="msg-success">Password berhasil direset! Silakan <a href='login.php' class='form-link'>Login</a></div>
  <?php endif ?>
  <form method="post" action="reset_password_process.php">
    <label>Email</label>
    <input type="email" name="email" required />
    <label>Password Baru</label>
    <input type="password" name="newPassword" required />
    <button class="btn-grad" type="submit">Reset Password</button>
  </form>
 
</div>
</body>
</html>