<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <!-- Gambar di sisi kiri -->
            <div class="right-section">
                <img src="/aglo0.jpg" alt="Login Placeholder">
            </div>

            <!-- Form Login di sisi kanan -->
            <div class="left-section">
                <h1>Login</h1>
                <form id="loginForm" method="POST" action="login_process.php">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <a href="reset_password.php" class="forgot-password">Forgot password?</a>
                    <button type="submit" id="loginButton">Login</button>
                </form>
                <p class="signin-text">
                    Don't have an account? <a href="signup.php" class="register-link">Register here</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>