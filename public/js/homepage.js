// Homepage specific JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Homepage specific functionality starts here
});

// Parallax effect for floating image
window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector(".floating-image");
    if (parallax) {
        const speed = scrolled * 0.5;
        parallax.style.transform = `translateY(${speed}px)`;
    }
});

// Dataset Section - Simple Grid Display
document.addEventListener("DOMContentLoaded", function () {
    const datasetCards = document.querySelectorAll(".dataset-card");

    // Dataset card hover effects
    datasetCards.forEach((card, index) => {
        card.addEventListener("mouseenter", () => {
            card.style.transform = "translateY(-15px) scale(1.05)";
            card.style.boxShadow = "0 25px 50px rgba(0, 0, 0, 0.35)";
            card.style.transition =
                "all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)";
            card.style.zIndex = "10";
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "translateY(0) scale(1)";
            card.style.boxShadow = "0 8px 25px rgba(0, 0, 0, 0.15)";
            card.style.transition =
                "all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)";
            card.style.zIndex = "1";
        });

        card.addEventListener("click", () => {
            // Add smooth click animation
            card.style.transform = "translateY(-8px) scale(0.95)";
            card.style.transition =
                "all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94)";
            setTimeout(() => {
                card.style.transform = "translateY(-15px) scale(1.05)";
                card.style.transition =
                    "all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)";
            }, 150);

            // Here you can add functionality to open dataset details
            console.log(`Dataset card ${index + 1} clicked`);
        });
    });

    // Update dataset count in hero stats
    function updateDatasetCount() {
        const totalDatasets = datasetCards.length;
        const datasetCountElement = document.querySelector(
            ".hero-stats .stat-item h3"
        );
        if (datasetCountElement) {
            datasetCountElement.textContent = totalDatasets + "+";
        }
    }

    // Initialize
    updateDatasetCount();
});
