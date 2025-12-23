        // Extended Materials Page Functionality
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
            const materialCards = document.querySelectorAll('.material-card');

            filterTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs
                    filterTabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    tab.classList.add('active');

                    const filterValue = tab.getAttribute('data-filter');

                    // Filter cards
                    materialCards.forEach(card => {
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
        });
