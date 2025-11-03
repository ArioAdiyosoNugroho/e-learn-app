// CLEAN JavaScript - Only essential animations, NO navigation interference
document.addEventListener('DOMContentLoaded', function() {
    // Cache DOM elements
    const elements = {
        loadingScreen: document.getElementById('loadingScreen'),
        header: document.getElementById('main-header'),
        mobileToggle: document.getElementById('mobile-toggle'),
        mobileNav: document.getElementById('mobile-nav'),
        searchToggle: document.getElementById('search-toggle'),
        searchExpand: document.getElementById('search-expand'),
        userMenu: document.querySelector('.user-menu')
    };

    // Hide loading screen
    if (elements.loadingScreen) {
        setTimeout(() => {
            elements.loadingScreen.style.display = 'none';
        }, 1500);
    }

    // Initialize mobile menu
    if (elements.mobileToggle && elements.mobileNav) {
        elements.mobileToggle.addEventListener('click', function() {
            elements.mobileToggle.classList.toggle('active');
            elements.mobileNav.classList.toggle('active');
            document.body.style.overflow = elements.mobileNav.classList.contains('active') ? 'hidden' : '';
        });
    }

    // Initialize search toggle
    if (elements.searchToggle && elements.searchExpand) {
        elements.searchToggle.addEventListener('click', function() {
            elements.searchExpand.classList.toggle('active');
            if (elements.searchExpand.classList.contains('active')) {
                setTimeout(() => {
                    const searchInput = elements.searchExpand.querySelector('.search-input');
                    if (searchInput) searchInput.focus();
                }, 400);
            }
        });

        const searchClose = elements.searchExpand.querySelector('.search-close');
        if (searchClose) {
            searchClose.addEventListener('click', function() {
                elements.searchExpand.classList.remove('active');
            });
        }
    }

    // Initialize user dropdown
    if (elements.userMenu) {
        const userDropdown = elements.userMenu.querySelector('.user-dropdown');
        elements.userMenu.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            userDropdown.classList.remove('active');
        });
    }

    // Close mobile nav when clicking on links
    const mobileNavItems = document.querySelectorAll('.mobile-nav-item');
    mobileNavItems.forEach(item => {
        item.addEventListener('click', function() {
            if (elements.mobileToggle && elements.mobileNav) {
                elements.mobileToggle.classList.remove('active');
                elements.mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Header scroll effect
    if (elements.header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                elements.header.classList.add('scrolled');
            } else {
                elements.header.classList.remove('scrolled');
            }
        });
    }

    // Ripple effects
    const initRippleEffects = () => {
        const createRipple = (e) => {
            const button = e.currentTarget;
            const ripple = button.querySelector('.icon-ripple') || button.querySelector('.toggle-ripple');
            if (!ripple) return;

            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            Object.assign(ripple.style, {
                width: `${size}px`,
                height: `${size}px`,
                left: `${x}px`,
                top: `${y}px`,
                animation: 'none'
            });

            setTimeout(() => {
                ripple.style.animation = 'ripple 0.6s linear';
            }, 10);
        };

        document.querySelectorAll('.search-toggle, .notification-btn, .mobile-toggle').forEach(btn => {
            btn.addEventListener('click', createRipple);
        });
    };

    initRippleEffects();

    // FAQ functionality
    const faqToggles = document.querySelectorAll('.faq-toggle');
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');

            if (content && icon) {
                content.classList.toggle('active');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            }
        });
    });

    // Card hover effects
    const interactiveCards = document.querySelectorAll('.interactive-card');
    interactiveCards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const angleY = (x - centerX) / 25;
            const angleX = (centerY - y) / 25;

            this.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) translateY(-6px)`;
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(-6px)';
        });
    });
});

// GSAP Animations - ONLY if GSAP is available and needed
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Scroll reveal animations
        gsap.utils.toArray('.reveal').forEach(element => {
            gsap.fromTo(element, {
                opacity: 0,
                y: 30
            }, {
                opacity: 1,
                y: 0,
                duration: 0.6,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        // Counter animations
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            ScrollTrigger.create({
                trigger: counter,
                start: 'top 85%',
                onEnter: () => {
                    let current = 0;
                    const duration = 1500;
                    const step = target / (duration / 16);

                    const updateCounter = () => {
                        current += step;
                        if (current < target) {
                            counter.textContent = Math.floor(current).toLocaleString();
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target.toLocaleString();
                        }
                    };
                    updateCounter();
                }
            });
        });
    }
});

// Simple CSS animations
const simpleStyles = `
@keyframes ripple {
    to { transform: scale(4); opacity: 0; }
}
`;

if (!document.querySelector('#simple-styles')) {
    const styleSheet = document.createElement('style');
    styleSheet.id = 'simple-styles';
    styleSheet.textContent = simpleStyles;
    document.head.appendChild(styleSheet);
}
