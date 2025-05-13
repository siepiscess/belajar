document.getElementById("signupForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah form terkirim

    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const rePassword = document.getElementById("rePassword").value.trim();

    if (!firstName || !lastName || !email || !password || !rePassword) {
        alert("Please fill in all the fields!");
        return;
    }

    if (password !== rePassword) {
        alert("Passwords do not match!");
        return;
    }

    alert("Sign up successful!");
    window.location.href = "login.php"; // Redirect ke halaman login
});