document.addEventListener("DOMContentLoaded", () => {
    const produkStokTab = document.getElementById("produkStokTab");
    const pemesananTab = document.getElementById("pemesananTab");
    const produkStokContent = document.getElementById("produkStokContent");
    const pemesananContent = document.getElementById("pemesananContent");

    // Toggle tabs
    produkStokTab.addEventListener("click", () => {
        produkStokContent.classList.remove("hidden");
        pemesananContent.classList.add("hidden");
        produkStokTab.classList.add("active");
        pemesananTab.classList.remove("active");
    });

    pemesananTab.addEventListener("click", () => {
        pemesananContent.classList.remove("hidden");
        produkStokContent.classList.add("hidden");
        pemesananTab.classList.add("active");
        produkStokTab.classList.remove("active");
    });

    // Example data for Produk and Pemesanan
    const produkData = [
        { id: 1, nama: "Aglo Red", harga: 50000, stok: 10, image: "image1.jpg" },
        { id: 2, nama: "Aglo Green", harga: 45000, stok: 5, image: "image2.jpg" }
    ];

    const pemesananData = [
        { id: 1, namaOrang: "John", alamat: "Jl. Mawar", namaAglo: "Aglo Red", size: "Medium", ukuran: "M" },
        { id: 2, namaOrang: "Doe", alamat: "Jl. Melati", namaAglo: "Aglo Green", size: "Small", ukuran: "S" }
    ];

    const produkTableBody = document.getElementById("produkTableBody");
    const pemesananTableBody = document.getElementById("pemesananTableBody");

    // Populate Produk Table
    produkData.forEach((item) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.nama}</td>
            <td>${item.harga}</td>
            <td>${item.stok}</td>
            <td>${item.image}</td>
            <td>
                <button class="edit-button">Edit</button>
                <button class="delete-button">Hapus</button>
            </td>
        `;
        produkTableBody.appendChild(row);
    });

    // Populate Pemesanan Table
    pemesananData.forEach((item) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.namaOrang}</td>
            <td>${item.alamat}</td>
            <td>${item.namaAglo}</td>
            <td>${item.size}</td>
            <td>${item.ukuran}</td>
            <td>
                <button class="edit-button">Edit</button>
                <button class="delete-button">Hapus</button>
            </td>
        `;
        pemesananTableBody.appendChild(row);
    });
});