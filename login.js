document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah form terkirim

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!email || !password) {
        alert("Please fill in both email and password.");
        return;
    }

    // Simulasi pengecekan apakah pengguna terdaftar
    const registeredEmails = ["example@domain.com"]; // Ganti dengan validasi backend

    if (!registeredEmails.includes(email)) {
        alert("Email is not registered. Please sign up first.");
        return;
    }

    // Jika validasi berhasil
    alert("Login successful!");
    window.location.href = "home.php"; // Redirect ke halaman utama
});