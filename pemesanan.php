<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="css/pemesanan.css">
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

    <!-- Pemesanan Form -->
    <main class="main-content">
        <div class="form-container">
            <h1>Form Pemesanan</h1>
            <form id="pemesananForm">
                <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" required>
                <input type="text" name="alamat_pemesan" placeholder="Alamat Pemesan" required>
                <input type="text" name="nama_aglonema" placeholder="Nama Aglonema" required>
                <input type="number" name="jumlah" placeholder="Jumlah" min="1" required>
                <fieldset class="size-options">
                    <legend>Ukuran</legend>
                    <label><input type="checkbox" name="size" value="Small"> Small</label>
                    <label><input type="checkbox" name="size" value="Medium"> Medium</label>
                    <label><input type="checkbox" name="size" value="Jumbo"> Jumbo</label>
                </fieldset>
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

    <script src="js/pemesanan.js"></script>
</body>
</html>