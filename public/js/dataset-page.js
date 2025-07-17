// Dataset Page JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // View toggle functionality
    const viewButtons = document.querySelectorAll(".view-btn");
    const datasetList = document.querySelector(".dataset-list");

    viewButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            viewButtons.forEach((btn) => btn.classList.remove("active"));
            // Add active class to clicked button
            this.classList.add("active");

            // Get view type
            const viewType = this.getAttribute("data-view");

            // Toggle view
            if (viewType === "grid") {
                datasetList.classList.add("grid-view");
            } else {
                datasetList.classList.remove("grid-view");
            }
        });
    });

    // Download button functionality
    const downloadButtons = document.querySelectorAll(".download-btn-action");
    downloadButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Add loading state
            const originalContent = this.innerHTML;
            this.innerHTML = `
                <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            `;

            // Simulate download
            setTimeout(() => {
                this.innerHTML = originalContent;
                showNotification("Dataset berhasil diunduh!", "success");
            }, 2000);
        });
    });

    // View button functionality
    const viewBtnActions = document.querySelectorAll(".view-btn-action");
    viewBtnActions.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            showNotification(
                "Fitur preview dataset akan segera tersedia!",
                "info"
            );
        });
    });

    // Download all button functionality
    const downloadAllBtn = document.querySelector(".download-all-btn");
    if (downloadAllBtn) {
        downloadAllBtn.addEventListener("click", function (e) {
            e.preventDefault();

            // Add loading state
            const originalContent = this.innerHTML;
            this.innerHTML = `
                <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Mengunduh...
            `;

            // Simulate download
            setTimeout(() => {
                this.innerHTML = originalContent;
                showNotification("Semua dataset berhasil diunduh!", "success");
            }, 3000);
        });
    }

    // Search functionality enhancement
    const searchInput = document.querySelector(".search-input");
    if (searchInput) {
        let searchTimeout;

        searchInput.addEventListener("input", function () {
            clearTimeout(searchTimeout);

            // Add loading indicator
            this.style.backgroundImage =
                "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'/%3E%3C/svg%3E\")";
            this.style.backgroundRepeat = "no-repeat";
            this.style.backgroundPosition = "right 12px center";
            this.style.backgroundSize = "16px";
            this.style.paddingRight = "40px";

            searchTimeout = setTimeout(() => {
                // Remove loading indicator
                this.style.backgroundImage = "";
                this.style.paddingRight = "1rem";
            }, 500);
        });
    }

    // Filter change animations
    const filterSelects = document.querySelectorAll(".filter-select");
    filterSelects.forEach((select) => {
        select.addEventListener("change", function () {
            // Add subtle animation to indicate filter change
            this.style.transform = "scale(0.98)";
            setTimeout(() => {
                this.style.transform = "scale(1)";
            }, 100);
        });
    });

    // Dataset item hover effects
    const datasetItems = document.querySelectorAll(".dataset-item");
    datasetItems.forEach((item) => {
        item.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-2px)";
        });

        item.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
        });
    });

    // Smooth scroll for any anchor links
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
});

// Notification function
function showNotification(message, type = "info") {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll(".notification");
    existingNotifications.forEach((notification) => notification.remove());

    // Create notification element
    const notification = document.createElement("div");
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <div class="notification-icon">
                ${getNotificationIcon(type)}
            </div>
            <span class="notification-message">${message}</span>
            <button class="notification-close">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    `;

    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-left: 4px solid ${getNotificationColor(type)};
        max-width: 400px;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;

    const content = notification.querySelector(".notification-content");
    content.style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
    `;

    const icon = notification.querySelector(".notification-icon");
    icon.style.cssText = `
        color: ${getNotificationColor(type)};
        flex-shrink: 0;
    `;

    const message_el = notification.querySelector(".notification-message");
    message_el.style.cssText = `
        flex: 1;
        font-size: 0.875rem;
        color: #374151;
    `;

    const closeBtn = notification.querySelector(".notification-close");
    closeBtn.style.cssText = `
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 0.25rem;
        transition: all 0.2s;
    `;

    // Add to document
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.style.transform = "translateX(0)";
    }, 100);

    // Close button functionality
    closeBtn.addEventListener("click", () => {
        closeNotification(notification);
    });

    closeBtn.addEventListener("mouseenter", () => {
        closeBtn.style.background = "#f3f4f6";
        closeBtn.style.color = "#374151";
    });

    closeBtn.addEventListener("mouseleave", () => {
        closeBtn.style.background = "none";
        closeBtn.style.color = "#9ca3af";
    });

    // Auto close after 5 seconds
    setTimeout(() => {
        closeNotification(notification);
    }, 5000);
}

function closeNotification(notification) {
    notification.style.transform = "translateX(100%)";
    setTimeout(() => {
        if (notification.parentNode) {
            notification.parentNode.removeChild(notification);
        }
    }, 300);
}

function getNotificationIcon(type) {
    switch (type) {
        case "success":
            return `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>`;
        case "error":
            return `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>`;
        case "warning":
            return `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>`;
        default:
            return `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>`;
    }
}

function getNotificationColor(type) {
    switch (type) {
        case "success":
            return "#10b981";
        case "error":
            return "#ef4444";
        case "warning":
            return "#f59e0b";
        default:
            return "#3b82f6";
    }
}

// Add CSS for animations
const style = document.createElement("style");
style.textContent = `
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    
    .grid-view .dataset-list .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 1rem;
    }
    
    .grid-view .dataset-item {
        margin-bottom: 0;
        height: fit-content;
    }
    
    @media (max-width: 768px) {
        .grid-view .dataset-list .container {
            grid-template-columns: 1fr;
        }
    }
`;
document.head.appendChild(style);
