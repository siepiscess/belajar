document.getElementById("resetForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah form terkirim

    const email = document.getElementById("email").value.trim();
    const newPassword = document.getElementById("newPassword").value.trim();

    if (!email || !newPassword) {
        alert("Please fill in all the fields!");
        return;
    }

    // Simulasi penggantian password
    alert("Password successfully reset!");
    window.location.href = "login.php"; // Redirect ke halaman login
});