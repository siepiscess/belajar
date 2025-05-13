<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin_login.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h1>Log in Admin</h1>
            <form id="adminLoginForm">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p class="back-text"><a href="home.php">Back</a></p>
        </div>
    </div>

    <script src="js/admin_login.js"></script>
</body>
</html>