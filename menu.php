<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css">
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
            <div class="user-profile" id="userProfile">
                <span>User Name</span>
                <img src="/profile.jpg" alt="User Profile" class="profile-picture">
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
        <button class="login-button"><a href="login.php">Login for Admin</a></button>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search....">
            <button class="search-button">Search</button>
        </div>

        <!-- Categories -->
        <div class="categories">
            <button class="category-button active" data-category="favorite">Favorite</button>
            <button class="category-button" data-category="best-seller">Best Seller</button>
        </div>

        <!-- Carousel -->
        <div class="carousel-wrapper">
            <!-- Favorite Carousel -->
            <div class="carousel" id="favorite-carousel" data-category="favorite">
                <!-- Generate 20 Product Cards -->
            </div>

            <!-- Best Seller Carousel -->
            <div class="carousel" id="best-seller-carousel" data-category="best-seller" style="display: none;">
                <!-- Generate 14 Product Cards -->
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="pagination-button prev">&lt;</button>
            <div class="pagination-numbers"></div>
            <button class="pagination-button next">&gt;</button>
        </div>
    </main>

    <!-- Profile Dropdown -->
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

    <script src="js/menu.js"></script>
</body>
</html>