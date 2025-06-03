document.addEventListener("DOMContentLoaded", function () {
    const hamburgerMenu = document.getElementById("hamburgerMenu");
    const closeMenu = document.getElementById("closeMenu");
    const sidebar = document.getElementById("sidebar");
    const allToggle = document.getElementById("allToggle");
    const submenu = document.getElementById("submenu");
    const userProfile = document.getElementById("userProfile");
    const dropdownMenu = document.getElementById("dropdownMenu");
    const logoutButton = document.getElementById("logoutButton");

    // Fungsi untuk menutup sidebar jika klik di luar container
    document.addEventListener("click", (event) => {
        if (!sidebar.contains(event.target) && !hamburgerMenu.contains(event.target)) {
            sidebar.style.left = "-300px";
            closeMenu.style.display = "none";
        }
    });

    // Fungsi untuk menutup dropdown jika klik di luar container
    document.addEventListener("click", (event) => {
        if (!dropdownMenu.contains(event.target) && !userProfile.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });

    // Toggle Sidebar
    hamburgerMenu.addEventListener("click", () => {
        sidebar.style.left = "0";
        closeMenu.style.display = "block";
    });

    closeMenu.addEventListener("click", () => {
        sidebar.style.left = "-300px";
        closeMenu.style.display = "none";
    });

    // Toggle Submenu (All)
    allToggle.addEventListener("click", () => {
        const isVisible = submenu.classList.contains("show");
        if (isVisible) {
            submenu.classList.remove("show"); // Sembunyikan submenu
        } else {
            submenu.classList.add("show"); // Tampilkan submenu
        }
    });

    // Toggle Dropdown Menu
    userProfile.addEventListener("click", () => {
        dropdownMenu.style.display = dropdownMenu.style.display === "flex" ? "none" : "flex";
    });

    // Logout Functionality
    logoutButton.addEventListener("click", () => {
        window.location.href = "index.php"; // Redirect to login page
    });

    // Navigasi di Sidebar
    document.getElementById("homeNav").addEventListener("click", () => {
        window.location.href = "home.php";
    });

    document.querySelectorAll(".submenu-item").forEach((item, index) => {
        const pages = ["menu.php", "pemesanan.php", "contact.php"];
        item.addEventListener("click", () => {
            window.location.href = pages[index];
        });
    });

    document.querySelector(".login-button").addEventListener("click", () => {
        window.location.href = "login.php";
    });
});

