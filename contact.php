<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="navbar">
            <div class="hamburger-menu" id="hamburgerMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="user-profile">
                <span>User Name</span>
                <img src="/profile.jpg" alt="User Profile" class="profile-picture">
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="close-menu" id="closeMenu">&times;</div>
        <ul>
            <li class="nav-item"><a href="menu.php">Menu</a></li>
            <li class="nav-item"><a href="pemesanan.php">Pemesanan</a></li>
            <li class="nav-item"><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <!-- Contact Form -->
    <main class="main-content">
        <div class="form-container">
            <h1>Contact</h1>
            <form id="contactForm">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <textarea name="message" placeholder="Ketik pesan..." rows="5" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

    <script src="js/contact.js"></script>
</body>
</html>