<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registrasi - Aglonema Store</title>
  <link rel="stylesheet" href="css/universal.css">
</head>
<body>
<div class="container-trans" style="max-width:440px;">
  <h2 class="center">Registrasi</h2>
  <?php if(isset($_GET['error'])): ?>
    <div class="msg-error"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif ?>
  <form method="post" action="signup_process.php">
    <label>Username</label>
    <input type="text" name="username" required />
    <label>Email</label>
    <input type="email" name="email" required />
    <label>Password</label>
    <input type="password" name="password" required />
    <label>Ulangi Password</label>
    <input type="password" name="repassword" required />
    <button class="btn-grad" type="submit">Registrasi</button>
  </form>
  <div class="center">
    <a class="form-link" href="login.php">Sudah punya akun? Login</a>
  </div>
</div>
</body>
</html>