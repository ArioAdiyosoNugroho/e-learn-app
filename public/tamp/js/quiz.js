// Extended Quiz Page Functionality
document.addEventListener('DOMContentLoaded', function () {
    // Progress ring animation
    const progressCircle = document.querySelector('.progress-ring-circle');
    if (progressCircle) {
        setTimeout(() => {
            progressCircle.style.strokeDashoffset = '84.82';
        }, 500);
    }

    // Filter functionality
    const filterTabs = document.querySelectorAll('.filter-tab');
    const quizCards = document.querySelectorAll('.quiz-card');

    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs
            filterTabs.forEach(t => t.classList.remove('active'));

            // Add active class to clicked tab
            tab.classList.add('active');

            const filterValue = tab.getAttribute('data-filter');

            // Filter cards
            quizCards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // View toggle functionality
    const viewButtons = document.querySelectorAll('.view-btn');

    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            viewButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            button.classList.add('active');
        });
    });

    // Filter chips close functionality
    const filterChips = document.querySelectorAll('.filter-chip i');

    filterChips.forEach(icon => {
        icon.addEventListener('click', function () {
            this.parentElement.style.opacity = '0';
            setTimeout(() => {
                this.parentElement.remove();
            }, 200);
        });
    });

    // Expandable filters functionality
    const expandButton = document.getElementById('expand-filters');
    const expandableSection = document.getElementById('expandable-filters');

    expandButton.addEventListener('click', () => {
        expandableSection.classList.toggle('expanded');

        // Rotate icon when expanded
        const icon = expandButton.querySelector('i');
        if (expandableSection.classList.contains('expanded')) {
            icon.style.transform = 'rotate(90deg)';
            expandButton.classList.add('bg-blue-50', 'text-blue-600');
        } else {
            icon.style.transform = 'rotate(0deg)';
            expandButton.classList.remove('bg-blue-50', 'text-blue-600');
        }
    });

    // Terapkan Filter button functionality
    const applyFilterBtn = document.querySelector('.btn-primary');
    applyFilterBtn.addEventListener('click', () => {
        // Close the expanded section after applying filters
        expandableSection.classList.remove('expanded');
        const icon = expandButton.querySelector('i');
        icon.style.transform = 'rotate(0deg)';
        expandButton.classList.remove('bg-blue-50', 'text-blue-600');

        // Add a subtle animation to the button
        applyFilterBtn.style.transform = 'scale(0.95)';
        setTimeout(() => {
            applyFilterBtn.style.transform = 'scale(1)';
        }, 150);

        // Here you would implement filter application logic
        console.log('Filters applied');
    });

    // Counter animation for stats
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        let count = 0;
        const increment = target / 100;

        const updateCounter = () => {
            if (count < target) {
                count += increment;
                counter.innerText = Math.ceil(count);
                setTimeout(updateCounter, 20);
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });

    // Scroll reveal animation
    const revealElements = document.querySelectorAll('.reveal');

    const revealOnScroll = () => {
        revealElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);

    // Initial check
    revealOnScroll();
});


function accessPinQuiz() {
    const pinInput = document.getElementById('pin-input');
    const pin = pinInput.value.trim();
    const button = document.querySelector('button[onclick="accessPinQuiz()"]');

    if (pin.length !== 6) {
        // Show error effect
        pinInput.style.color = '#ef4444';
        pinInput.style.border = '2px solid #ef4444';

        // Reset after 1.5 seconds
        setTimeout(() => {
            pinInput.style.color = '';
            pinInput.style.border = '';
        }, 1500);
        return;
    }

    // Valid PIN - show loading state
    const originalHTML = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i><span>Memproses...</span>';
    button.disabled = true;

    // Simulate API call
    setTimeout(() => {
        // Success - redirect or show success
        console.log('Accessing quiz with PIN:', pin);

        // Reset button
        setTimeout(() => {
            button.innerHTML = originalHTML;
            button.disabled = false;
            pinInput.value = '';
        }, 1000);
    }, 1500);
}

// Auto-focus and Enter key support
document.addEventListener('DOMContentLoaded', function () {
    const pinInput = document.getElementById('pin-input');

    // Auto-focus
    pinInput.focus();

    // Enter key support
    pinInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            accessPinQuiz();
        }
    });

    // Visual feedback on input
    pinInput.addEventListener('input', function () {
        if (this.value.length === 6) {
            this.style.color = '#10b981';
        } else {
            this.style.color = '#1f2937';
        }
    });
});
