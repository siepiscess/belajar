<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Admin - Aglonema Store</title>
  <link rel="stylesheet" href="css/universal.css">
</head>
<body>
<div class="container-trans" style="max-width:410px;">
  <h2 class="center" style="margin-bottom:18px;">Login Admin</h2>
  <?php if(isset($_GET['error'])): ?>
    <div class="msg-error"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif ?>
  <form method="post" action="login_admin_process.php">
    <label>Email Admin</label>
    <input type="email" name="email" required />
    <label>Password</label>
    <input type="password" name="password" required />
    <button class="btn-grad" type="submit" style="width:100%;">Login Admin</button>
    <button type="button" onclick="window.location='login.php'" class="btn-grad" style="margin-top:12px;background:linear-gradient(90deg,#eee,#aaa);color:#222;">Back to User Login</button>
  </form>
</div>
</body>
</html>