// Dataset Detail Page Animations and Interactions

class DatasetDetailAnimations {
    constructor() {
        this.init();
    }

    init() {
        this.setupScrollAnimations();
        this.setupCounterAnimations();
        this.setupParticleEffects();
        this.setupInteractiveElements();
        this.setupLoadingAnimations();
        this.setupHoverEffects();
        this.setupProgressBars();
    }

    // Scroll-triggered animations
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    
                    // Trigger counter animation if element has counter
                    const counter = entry.target.querySelector('.counter');
                    if (counter) {
                        this.animateCounter(counter);
                    }
                }
            });
        }, observerOptions);

        // Observe all elements with scroll-reveal class
        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });
    }

    // Animate counters
    animateCounter(element) {
        const target = parseInt(element.textContent.replace(/[^0-9]/g, ''));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            // Format number with commas
            const formatted = Math.floor(current).toLocaleString();
            element.textContent = element.textContent.replace(/[0-9,]+/, formatted);
        }, 16);
    }

    // Create floating particles
    setupParticleEffects() {
        const heroSection = document.querySelector('.hero-section');
        if (!heroSection) return;

        const colors = ['#3b82f6', '#8b5cf6', '#ec4899', '#10b981', '#f59e0b'];
        
        for (let i = 0; i < 15; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.cssText = `
                width: ${Math.random() * 8 + 4}px;
                height: ${Math.random() * 8 + 4}px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                animation-duration: ${Math.random() * 10 + 8}s;
                animation-delay: ${Math.random() * 5}s;
            `;
            heroSection.appendChild(particle);
        }
    }

    // Setup interactive elements
    setupInteractiveElements() {
        // Download buttons with ripple effect
        document.querySelectorAll('.download-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.createRipple(e, btn);
                this.showDownloadProgress(btn);
            });
        });

        // Statistics cards hover effects
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                this.animateStatCard(card);
            });
        });

        // Like button animation
        const likeBtn = document.querySelector('.like-btn');
        if (likeBtn) {
            likeBtn.addEventListener('click', () => {
                this.animateLike(likeBtn);
            });
        }
    }

    // Create ripple effect
    createRipple(event, element) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        `;

        element.style.position = 'relative';
        element.style.overflow = 'hidden';
        element.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }

    // Show download progress
    showDownloadProgress(button) {
        const originalText = button.innerHTML;
        const progressBar = document.createElement('div');
        
        progressBar.style.cssText = `
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: #10b981;
            width: 0%;
            transition: width 2s ease;
        `;

        button.style.position = 'relative';
        button.appendChild(progressBar);
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Downloading...';

        // Simulate download progress
        setTimeout(() => {
            progressBar.style.width = '100%';
        }, 100);

        setTimeout(() => {
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Downloaded!';
            button.classList.add('bg-green-500');
        }, 2000);

        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-500');
            progressBar.remove();
        }, 3000);
    }

    // Animate statistics card
    animateStatCard(card) {
        const icon = card.querySelector('svg');
        const number = card.querySelector('.stat-number');
        
        if (icon) {
            icon.style.transform = 'scale(1.2) rotate(10deg)';
            setTimeout(() => {
                icon.style.transform = 'scale(1) rotate(0deg)';
            }, 300);
        }

        if (number) {
            number.style.transform = 'scale(1.1)';
            setTimeout(() => {
                number.style.transform = 'scale(1)';
            }, 300);
        }
    }

    // Animate like button
    animateLike(button) {
        const heart = button.querySelector('svg');
        const count = button.querySelector('.like-count');
        
        // Heart animation
        heart.style.transform = 'scale(1.3)';
        heart.style.color = '#ef4444';
        
        // Create floating hearts
        for (let i = 0; i < 5; i++) {
            const floatingHeart = document.createElement('div');
            floatingHeart.innerHTML = '❤️';
            floatingHeart.style.cssText = `
                position: absolute;
                left: ${Math.random() * 40 - 20}px;
                top: -20px;
                font-size: 12px;
                animation: float-up 1s ease-out forwards;
                pointer-events: none;
                z-index: 1000;
            `;
            button.style.position = 'relative';
            button.appendChild(floatingHeart);
            
            setTimeout(() => floatingHeart.remove(), 1000);
        }

        // Increment counter
        if (count) {
            const currentCount = parseInt(count.textContent);
            count.textContent = currentCount + 1;
        }

        setTimeout(() => {
            heart.style.transform = 'scale(1)';
        }, 300);
    }

    // Setup loading animations
    setupLoadingAnimations() {
        // Stagger animation for cards
        document.querySelectorAll('.stagger-item').forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
        });

        // Progressive image loading
        document.querySelectorAll('img[data-src]').forEach(img => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('fade-in');
                        observer.unobserve(img);
                    }
                });
            });
            observer.observe(img);
        });
    }

    // Setup hover effects
    setupHoverEffects() {
        // 3D tilt effect for cards
        document.querySelectorAll('.tilt-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            });
        });

        // Magnetic effect for buttons
        document.querySelectorAll('.magnetic-btn').forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                btn.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px)`;
            });

            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translate(0px, 0px)';
            });
        });
    }

    // Setup progress bars
    setupProgressBars() {
        document.querySelectorAll('.progress-bar').forEach(bar => {
            const progress = bar.dataset.progress || 0;
            const fill = bar.querySelector('.progress-fill');
            
            if (fill) {
                setTimeout(() => {
                    fill.style.width = `${progress}%`;
                }, 500);
            }
        });
    }

    // Utility function to add CSS animation keyframes
    addAnimationKeyframes() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            @keyframes float-up {
                0% {
                    transform: translateY(0) scale(1);
                    opacity: 1;
                }
                100% {
                    transform: translateY(-50px) scale(0.5);
                    opacity: 0;
                }
            }
            
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(style);
    }
}

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const animations = new DatasetDetailAnimations();
    animations.addAnimationKeyframes();
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = DatasetDetailAnimations;
}