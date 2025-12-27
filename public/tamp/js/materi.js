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


tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            colors: {
                primary: '#2563eb', // Blue 600
                slate: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                }
            }
        }
    }
}



document.addEventListener('DOMContentLoaded', function () {
    // Elemen untuk toggle antara file dan video
    const fileOption = document.getElementById('fileOption');
    const videoOption = document.getElementById('videoOption');
    const fileUploadArea = document.getElementById('fileUploadArea');
    const videoUrlArea = document.getElementById('videoUrlArea');
    const fileInput = document.getElementById('fileInput');
    const dropArea = document.getElementById('dropArea');
    const filePreview = document.getElementById('filePreview');
    const removeFileBtn = document.getElementById('removeFile');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const videoUrl = document.getElementById('videoUrl');
    const videoPreview = document.getElementById('videoPreview');

    // Pilih opsi file secara default
    selectContentType(fileOption, true);

    // Event listener untuk memilih jenis konten
    fileOption.addEventListener('click', function () {
        selectContentType(fileOption, true);
        fileUploadArea.classList.remove('hidden');
        videoUrlArea.classList.add('hidden');
    });

    videoOption.addEventListener('click', function () {
        selectContentType(videoOption, false);
        fileUploadArea.classList.add('hidden');
        videoUrlArea.classList.remove('hidden');
    });

    // Fungsi untuk memilih jenis konten
    function selectContentType(selectedElement, isFile) {
        // Reset semua kartu
        document.querySelectorAll('.content-type-card').forEach(card => {
            card.classList.remove('selected');
            card.querySelector('.radio-dot').classList.add('hidden');
        });

        // Tandai yang dipilih
        selectedElement.classList.add('selected');
        selectedElement.querySelector('.radio-dot').classList.remove('hidden');

        // Update radio button
        if (isFile) {
            document.getElementById('fileType').checked = true;
        } else {
            document.getElementById('videoType').checked = true;
        }
    }

    // Drag and drop untuk upload file
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropArea.classList.add('dragover');
    }

    function unhighlight() {
        dropArea.classList.remove('dragover');
    }

    // Handle file drop
    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    // Handle file click
    dropArea.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', function () {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            const fileSizeInMB = (file.size / (1024 * 1024)).toFixed(2);

            // Update preview
            fileName.textContent = file.name;
            fileSize.textContent = `${fileSizeInMB} MB`;
            filePreview.classList.remove('hidden');

            // Tampilkan notifikasi sukses
            showNotification('File berhasil diunggah!', 'success');
        }
    }

    // Hapus file
    removeFileBtn.addEventListener('click', function () {
        filePreview.classList.add('hidden');
        fileInput.value = '';
        showNotification('File dihapus', 'info');
    });

    // Validasi URL video
    videoUrl.addEventListener('blur', function () {
        const url = this.value.trim();
        if (url && isValidUrl(url)) {
            // Simulasi validasi URL video
            videoPreview.classList.remove('hidden');
            showNotification('URL video valid', 'success');
        } else if (url) {
            showNotification('URL tidak valid', 'error');
        }
    });

    function isValidUrl(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    }

    // Fungsi untuk menampilkan notifikasi
    function showNotification(message, type) {
        // Hapus notifikasi sebelumnya jika ada
        const existingNotification = document.querySelector('.custom-notification');
        if (existingNotification) {
            existingNotification.remove();
        }

        // Warna berdasarkan tipe
        let bgColor = 'bg-blue-100';
        let textColor = 'text-blue-800';
        let borderColor = 'border-blue-200';

        if (type === 'success') {
            bgColor = 'bg-emerald-100';
            textColor = 'text-emerald-800';
            borderColor = 'border-emerald-200';
        } else if (type === 'error') {
            bgColor = 'bg-red-100';
            textColor = 'text-red-800';
            borderColor = 'border-red-200';
        } else if (type === 'info') {
            bgColor = 'bg-blue-100';
            textColor = 'text-blue-800';
            borderColor = 'border-blue-200';
        }

        // Buat elemen notifikasi
        const notification = document.createElement('div');
        notification.className = `custom-notification fixed top-24 right-6 z-50 px-4 py-3 rounded-xl border ${bgColor} ${textColor} ${borderColor} shadow-lg transition-all duration-300 transform translate-x-0`;
        notification.innerHTML = `
                    <div class="flex items-center gap-2">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                        <span class="font-medium text-sm">${message}</span>
                    </div>
                `;

        document.body.appendChild(notification);

        // Hapus notifikasi setelah 3 detik
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 300);
        }, 3000);
    }

    // Simulasi progress ring
    const progressCircle = document.querySelector('.progress-ring-circle');
    const radius = progressCircle.r.baseVal.value;
    const circumference = radius * 2 * Math.PI;
    const offset = circumference - (60 / 100) * circumference;

    progressCircle.style.strokeDasharray = `${circumference} ${circumference}`;
    progressCircle.style.strokeDashoffset = offset;
});
