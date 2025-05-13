<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background">
        <!-- Header -->
        <header>
            <div class="navbar">
                <!-- Hamburger Menu -->
                <div class="hamburger-menu" id="hamburgerMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <!-- User Profile -->
                <div class="user-profile" id="userProfile">
                    <span>User Name</span>
                    <img src="/profile.jpg" alt="User Profile" class="profile-picture">
                </div>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu" id="dropdownMenu">
                    <img src="/profile.jpg" alt="Profile Picture">
                    <div class="profile-name">John Doe</div>
                    <ul>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="edit_profile.php">Edit Profile</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="help_support.php">Help & Support</a></li>
                    </ul>
                    <button class="logout-button" id="logoutButton">Log out</button>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="close-menu" id="closeMenu">&times;</div>
            <ul>
                <li class="nav-item"><a href="home.php">Home</a></li>
                <li class="nav-item has-submenu" id="allNav">
                    <div id="allToggle">All ▼</div>
                    <ul class="submenu" id="submenu">
                        <li class="submenu-item"><a href="menu.php">Menu</a></li>
                        <li class="submenu-item"><a href="pemesanan.php">Pemesanan</a></li>
                        <li class="submenu-item"><a href="contact.php">Contact</a></li>
                    </ul>
                </li>
            </ul>
            <button class="login-button"><a href="login.php">Login for admin</a></button>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="text-section">
                <h1>Welcome to AGLAONETORY</h1>
                <h2>Your Trusted Aglonema Store</h2>
                <p>
                    Discover the beauty of Aglonema plants with us. We offer the finest selection of 
                    Aglonema plants to make your home greener and more beautiful.
                </p>
            </div>
            <div class="image-section">
                <img src="aglo1.png" alt="Aglonema Plant">
            </div>
        </div>
    </div>

    <script src="js/home.js"></script>
</body>
</html>