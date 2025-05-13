<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background">
        <div class="container">
            <div class="left-section">
                <h1>Sign Up</h1>
                <form id="signupForm">
                    <div class="form-row">
                        <input type="text" id="firstName" name="firstName" placeholder="First Name">
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name">
                    </div>
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <input type="password" id="rePassword" name="rePassword" placeholder="Re-enter Password">
                    <button type="submit" id="signupButton">Sign Up</button>
                </form>
                <p class="signin-text">OR<br>Already have an account? <a href="index.php">Sign In</a></p>
            </div>
            
        </div>
    </div>
</body>
</html>