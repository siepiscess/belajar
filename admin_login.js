document.getElementById("adminLoginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Check if the password matches the predefined admin password
    if (password === "niutsiikan") {
        alert("Login successful!");
        window.location.href = "admin_dashboard.php"; // Redirect to admin dashboard
    } else {
        alert("Incorrect password. Please try again.");
    }
});