document.addEventListener("DOMContentLoaded", () => {
    const pemesananForm = document.getElementById("pemesananForm");

    pemesananForm.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Form Pemesanan berhasil dikirim!");
        pemesananForm.reset();
    });
});