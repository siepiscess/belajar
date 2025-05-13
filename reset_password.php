<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/reset_password.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <!-- Gambar di atas judul -->
            <img src="/aglo000.jpg" alt="Reset Placeholder" class="reset-image">
            
            <!-- Form Reset Password -->
            <h1>Reset Password</h1>
            <form method="POST" action="reset_password_process.php">
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                <input type="password" name="newPassword" id="newPassword" placeholder="Enter your new password" required>
                <button type="submit" class="btn">Send Reset Link</button>
            </form>
            <p>
                <a href="index.php" class="back-to-login">Back to Login</a>
            </p>
        </div>
    </div>
</body>
</html>