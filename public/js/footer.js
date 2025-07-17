// Footer JavaScript - Menangani fungsionalitas footer
document.addEventListener("DOMContentLoaded", function () {
    // Footer link interactions
    const footerLinks = document.querySelectorAll(".footer-link");

    footerLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            // Add smooth hover effect
            this.style.transform = "translateX(5px)";
            this.style.transition = "transform 0.2s ease";

            setTimeout(() => {
                this.style.transform = "translateX(0)";
            }, 200);
        });

        // Hover effects
        link.addEventListener("mouseenter", function () {
            this.style.transform = "translateX(3px)";
            this.style.transition = "transform 0.2s ease";
        });

        link.addEventListener("mouseleave", function () {
            this.style.transform = "translateX(0)";
        });
    });

    // Partner logo hover effects
    const partnerLogos = document.querySelectorAll(".partner-logo");

    partnerLogos.forEach((logo) => {
        logo.addEventListener("mouseenter", function () {
            this.style.transform = "scale(1.1)";
            this.style.transition = "transform 0.3s ease";
            this.style.filter = "brightness(1.2)";
        });

        logo.addEventListener("mouseleave", function () {
            this.style.transform = "scale(1)";
            this.style.filter = "brightness(1)";
        });
    });

    // Footer logo animation
    const footerLogo = document.querySelector(".footer-logo-img");

    if (footerLogo) {
        footerLogo.addEventListener("mouseenter", function () {
            this.style.transform = "scale(1.05) rotate(2deg)";
            this.style.transition = "transform 0.3s ease";
        });

        footerLogo.addEventListener("mouseleave", function () {
            this.style.transform = "scale(1) rotate(0deg)";
        });
    }

    // Smooth scroll to top functionality (jika ada button back to top)
    const backToTopBtn = document.querySelector(".back-to-top");

    if (backToTopBtn) {
        backToTopBtn.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });

        // Show/hide back to top button based on scroll position
        window.addEventListener("scroll", function () {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.opacity = "1";
                backToTopBtn.style.visibility = "visible";
            } else {
                backToTopBtn.style.opacity = "0";
                backToTopBtn.style.visibility = "hidden";
            }
        });
    }

    // Footer section animations on scroll
    const footerSections = document.querySelectorAll(".footer-section");

    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const footerObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                entry.target.style.transition =
                    "opacity 0.6s ease, transform 0.6s ease";
            }
        });
    }, observerOptions);

    footerSections.forEach((section) => {
        section.style.opacity = "0";
        section.style.transform = "translateY(20px)";
        footerObserver.observe(section);
    });

    // Contact info click to copy functionality
    const contactEmail = document.querySelector(".contact-email");
    const contactPhone = document.querySelector(".contact-phone");

    if (contactEmail) {
        contactEmail.addEventListener("click", function () {
            const email = this.textContent.trim();
            navigator.clipboard
                .writeText(email)
                .then(() => {
                    // Show temporary feedback
                    const originalText = this.textContent;
                    this.textContent = "Email disalin!";
                    this.style.color = "#10b981";

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.color = "";
                    }, 2000);
                })
                .catch(() => {
                    console.log("Gagal menyalin email");
                });
        });
    }

    if (contactPhone) {
        contactPhone.addEventListener("click", function () {
            const phone = this.textContent.trim();
            navigator.clipboard
                .writeText(phone)
                .then(() => {
                    // Show temporary feedback
                    const originalText = this.textContent;
                    this.textContent = "Nomor disalin!";
                    this.style.color = "#10b981";

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.color = "";
                    }, 2000);
                })
                .catch(() => {
                    console.log("Gagal menyalin nomor telepon");
                });
        });
    }
});

// Footer responsive behavior
window.addEventListener("resize", function () {
    const footerContainer = document.querySelector(".footer-container");

    if (footerContainer) {
        // Adjust footer layout based on screen size
        if (window.innerWidth <= 768) {
            footerContainer.style.gridTemplateColumns = "1fr";
        } else if (window.innerWidth <= 1024) {
            footerContainer.style.gridTemplateColumns = "repeat(2, 1fr)";
        } else {
            footerContainer.style.gridTemplateColumns = "repeat(4, 1fr)";
        }
    }
});
