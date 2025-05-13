document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const hamburgerMenu = document.getElementById("hamburgerMenu");
    const closeMenu = document.getElementById("closeMenu");
    const sidebar = document.getElementById("sidebar");
    const userProfile = document.getElementById("userProfile");
    const dropdownMenu = document.getElementById("dropdownMenu");
    const allToggle = document.getElementById("allToggle");
    const submenu = document.getElementById("submenu");
    const paginationNumbers = document.querySelector(".pagination-numbers");
    const prevButton = document.querySelector(".pagination-button.prev");
    const nextButton = document.querySelector(".pagination-button.next");
    const categoryButtons = document.querySelectorAll(".category-button");
    const carousels = document.querySelectorAll(".carousel");
    const itemsPerPage = 8; // 4x2 grid
    let currentPage = 1;
    let currentCategory = "favorite";
    let imageList = [
        "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1465101178521-c1a9136a3c8b?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1465156799763-2c087c332922?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1519985176271-adb1088fa94c?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=400&q=80"
    ];

    // Sidebar Functionality
    hamburgerMenu.addEventListener("click", () => {
        sidebar.style.left = "0";
    });

    closeMenu.addEventListener("click", () => {
        sidebar.style.left = "-300px";
    });

    // Hamburger icon in sidebar (non-functional, just for design)
    // (already included in the sidebar html)

    // Submenu Functionality
    allToggle.addEventListener("click", () => {
        submenu.classList.toggle("show");
    });

    // Profile Dropdown Functionality (fixed on scroll)
    userProfile.addEventListener("click", (e) => {
        e.stopPropagation();
        if (dropdownMenu.style.display === "flex") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "flex";
        }
    });

    // Close sidebar or dropdown on outside click
    document.addEventListener("click", (event) => {
        if (!dropdownMenu.contains(event.target) && !userProfile.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
        if (!sidebar.contains(event.target) && !hamburgerMenu.contains(event.target)) {
            sidebar.style.left = "-300px";
        }
    });

    // Keep dropdown fixed on scroll
    window.addEventListener("scroll", () => {
        if (dropdownMenu.style.display === "flex") {
            dropdownMenu.style.position = "fixed";
            dropdownMenu.style.top = "90px";
        }
    });

    // Carousel Data
    const data = {
        favorite: 20, // Total items for Favorite category
        bestSeller: 14
    };

    // Helper: Get image for product (cycle through imageList)
    function getProductImage(idx) {
        return imageList[idx % imageList.length];
    }

    // Generate Product Cards Dynamically
    function generateProductCards(category, count) {
        const carousel = document.getElementById(`${category}-carousel`);
        carousel.innerHTML = "";
        for (let i = 1; i <= count; i++) {
            const card = document.createElement("div");
            card.classList.add("product-card");
            card.innerHTML = `
                <div class="product-image" style="background-image:url('${getProductImage(i-1)}')"></div>
                <div class="product-info-container">
                    <span class="product-name">Aglaonema ${category === 'favorite' ? 'Favorite' : 'Best Seller'} ${i}</span>
                    <span class="product-price">Rp ${(i * 23000).toLocaleString()}</span>
                    <button class="view-button" data-img="${getProductImage(i-1)}">View</button>
                </div>
            `;
            carousel.appendChild(card);
        }
    }

    // Initialize Carousels
    generateProductCards("favorite", data.favorite);
    generateProductCards("best-seller", data.bestSeller);

    // Handle Category Switching
    categoryButtons.forEach((button) => {
        button.addEventListener("click", () => {
            categoryButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");
            carousels.forEach((carousel) => {
                carousel.style.display = "none";
            });
            currentCategory = button.dataset.category;
            document.getElementById(`${currentCategory}-carousel`).style.display = "grid";
            currentPage = 1;
            updatePagination(currentCategory);
        });
    });

    // Pagination and Carousel Display
    function updatePagination(category) {
        const itemCount = data[category];
        const totalPages = Math.ceil(itemCount / itemsPerPage);

        // Clear Pagination Numbers
        paginationNumbers.innerHTML = "";

        // Generate Pagination Numbers
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement("button");
            pageButton.classList.add("pagination-number");
            pageButton.textContent = i;
            if (i === currentPage) {
                pageButton.classList.add("active");
            }
            pageButton.addEventListener("click", () => {
                currentPage = i;
                updatePagination(category);
            });
            paginationNumbers.appendChild(pageButton);
        }

        // Show/hide carousel items for current page
        const carousel = document.getElementById(`${category}-carousel`);
        const items = carousel.querySelectorAll(".product-card");
        items.forEach((item, index) => {
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            if (index >= start && index < end) {
                item.style.display = "flex";
            } else {
                item.style.display = "none";
            }
        });

        // Enable/Disable Prev and Next
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
    }

    // Previous/Next Button
    prevButton.addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            updatePagination(currentCategory);
        }
    });
    nextButton.addEventListener("click", () => {
        const totalPages = Math.ceil(data[currentCategory] / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination(currentCategory);
        }
    });

    // Initial setup
    document.getElementById("favorite-carousel").style.display = "grid";
    document.getElementById("best-seller-carousel").style.display = "none";
    updatePagination("favorite");

    // View Button Functionality: Show image in popup
    document.body.addEventListener("click", function(e) {
        if (e.target.classList.contains("view-button")) {
            const imgSrc = e.target.getAttribute("data-img");
            const popup = document.createElement("div");
            popup.style.position = "fixed";
            popup.style.top = 0;
            popup.style.left = 0;
            popup.style.width = "100vw";
            popup.style.height = "100vh";
            popup.style.background = "rgba(0,0,0,0.77)";
            popup.style.zIndex = 2000;
            popup.style.display = "flex";
            popup.style.alignItems = "center";
            popup.style.justifyContent = "center";
            popup.innerHTML = `
                <div style="position:relative;max-width:90vw;max-height:90vh;">
                    <img src="${imgSrc}" style="max-width:80vw;max-height:70vh;border-radius:16px;box-shadow:0 8px 32px rgba(0,0,0,0.7);" alt="Product Image">
                    <span style="position:absolute;top:-16px;right:-16px;font-size:2.5rem;color:#fff;cursor:pointer;font-weight:bold;z-index:2100;">&times;</span>
                </div>
            `;
            document.body.appendChild(popup);
            popup.querySelector("span").onclick = () => popup.remove();
            popup.onclick = (ev) => {
                if (ev.target === popup) popup.remove();
            };
        }
    });

    // Make sure dropdown is always fixed even on scroll (already set with CSS position: fixed)
});