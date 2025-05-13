document.addEventListener("DOMContentLoaded", () => {
    const contactForm = document.getElementById("contactForm");

    contactForm.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Pesan Anda telah dikirim!");
        contactForm.reset();
    });
});