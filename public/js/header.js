// Header JavaScript - Menangani hamburger menu dan navigasi
document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-menu a");
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    // Hamburger menu toggle
    if (hamburger && navMenu) {
        hamburger.addEventListener("click", function () {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        });

        // Close menu when clicking on nav links
        navLinks.forEach((link) => {
            link.addEventListener("click", function () {
                hamburger.classList.remove("active");
                navMenu.classList.remove("active");
            });
        });

        // Close menu when clicking outside
        document.addEventListener("click", function (e) {
            if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
                hamburger.classList.remove("active");
                navMenu.classList.remove("active");
            }
        });

        // Close menu on window resize
        window.addEventListener("resize", function () {
            if (window.innerWidth > 768) {
                hamburger.classList.remove("active");
                navMenu.classList.remove("active");
            }
        });
    }

    // Active menu handling
    navLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            // Hapus kelas active dari semua link
            navLinks.forEach((navLink) => {
                navLink.classList.remove("active");
            });

            // Tambahkan kelas active ke link yang diklik
            this.classList.add("active");
        });
    });

    // Menangani search functionality (jika ada di header)
    const searchInput = document.querySelector(".search-input");
    const searchBtn = document.querySelector(".search-btn");

    if (searchInput && searchBtn) {
        // Handle search button click
        searchBtn.addEventListener("click", function (e) {
            e.preventDefault();
            performSearch();
        });

        // Handle Enter key press in search input
        searchInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                performSearch();
            }
        });

        // Search function
        function performSearch() {
            const query = searchInput.value.trim();
            if (query) {
                // Simulasi pencarian - bisa diganti dengan implementasi sebenarnya
                console.log("Mencari:", query);
                // Di sini bisa ditambahkan logika untuk redirect ke halaman hasil pencarian
                // window.location.href = `/search?q=${encodeURIComponent(query)}`;
            } else {
                searchInput.focus();
            }
        }

        // Add search suggestions (placeholder)
        searchInput.addEventListener("input", function () {
            const query = this.value.toLowerCase();
            // Di sini bisa ditambahkan logika untuk menampilkan suggestions
            // Contoh suggestions yang bisa ditambahkan:
            // - Dataset Pendidikan
            // - Dataset Kesehatan
            // - Dataset Infrastruktur
            // - Dataset Ekonomi
        });
    }
});

// Smooth scrolling untuk anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});
