<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>
<body>
    <header class="header">
        <h1>DASHBOARD ADMIN</h1>
        <button class="logout-button" onclick="window.location.href='home.php'">Logout</button>
    </header>
    <div class="category-buttons">
        <button id="produkStokTab" class="tab-button active">Produk Stok</button>
        <button id="pemesananTab" class="tab-button">Pemesanan</button>
    </div>
    <div class="content">
        <!-- Tabel Produk -->
        <div id="produkStokContent" class="table-container">
            <h2>Tabel Produk</h2>
            <div class="search-add">
                <input type="text" placeholder="Search..." id="produkSearch">
                <button class="add-button">+ Tambah</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>+Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="produkTableBody">
                    <!-- Data akan diisi dengan JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Tabel Pemesanan -->
        <div id="pemesananContent" class="table-container hidden">
            <h2>Tabel Transaksi/Pesanan</h2>
            <div class="search-add">
                <input type="text" placeholder="Search..." id="pemesananSearch">
                <button class="add-button">+ Tambah</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Orang</th>
                        <th>Alamat</th>
                        <th>Nama Aglo</th>
                        <th>Size</th>
                        <th>Ukuran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="pemesananTableBody">
                    <!-- Data akan diisi dengan JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/admin_dashboard.js"></script>
</body>
</html>