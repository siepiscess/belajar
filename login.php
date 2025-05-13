<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - Aglonema Store</title>
  <link rel="stylesheet" href="css/universal.css">
</head>
<body>
<div class="container-trans" style="display:flex;flex-direction:row;align-items:center;max-width:760px;">
  <div class="img-side">
    <img src="assets/aglo2.jpg" alt="Aglonema Login"/>
  </div>
  <div style="flex:1;min-width:260px;">
    <h2 class="center" style="margin-bottom:20px;">Login</h2>
    <?php if(isset($_GET['error'])): ?>
      <div class="msg-error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif ?>
    <form method="post" action="login_process.php">
      <label>Email</label>
      <input type="email" name="email" required />
      <label>Password</label>
      <input type="password" name="password" required />
      <button class="btn-grad" type="submit">Login</button>
    </form>
    <div class="center" style="margin:16px 0 0 0;">
      <a class="form-link" href="reset_password.php">Forgot password?</a> |
      <a class="form-link" href="signup.php">Registrasi</a>
    </div>
  </div>
</div>
</body>
</html>