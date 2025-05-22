document.addEventListener("DOMContentLoaded", function () {
    // Sidebar
    const hamburgerMenu = document.getElementById("hamburgerMenu");
    const sidebar = document.getElementById("sidebar");
    const closeMenu = document.getElementById("closeMenu");
    if (hamburgerMenu) hamburgerMenu.onclick = () => sidebar.classList.add("open");
    if (closeMenu) closeMenu.onclick = () => sidebar.classList.remove("open");
    document.addEventListener("click", (e) => {
        if (sidebar && !sidebar.contains(e.target) && !hamburgerMenu.contains(e.target)) sidebar.classList.remove("open");
    });

    // Dropdown
    const userProfile = document.getElementById("userProfile");
    const dropdownMenu = document.getElementById("dropdownMenu");
    if (userProfile && dropdownMenu) {
        userProfile.onclick = (e) => {
            e.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === "flex" ? "none" : "flex";
        };
        document.addEventListener("click", (e) => {
            if (!dropdownMenu.contains(e.target) && !userProfile.contains(e.target)) {
                dropdownMenu.style.display = "none";
            }
        });
    }
    // Logout
    const logoutButton = document.getElementById("logoutButton");
    if (logoutButton) logoutButton.onclick = ()=>window.location.href="index.php";
});