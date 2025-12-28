document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('cover_image');
    const uploadLabel = document.getElementById('upload-label');
    const previewContainer = document.getElementById('preview-container');
    const imagePreview = document.getElementById('image-preview');
    const uploadContent = document.getElementById('upload-content');
    const removePreview = document.getElementById('remove-preview');
    const fileInfo = document.getElementById('file-info');
    const imageError = document.getElementById('image-error');

    // Maximum file size (5MB in bytes)
    const maxSize = 5 * 1024 * 1024;

    // Valid file types
    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];

    // Handle file selection
    fileInput.addEventListener('change', function (e) {
        const file = e.target.files[0];

        if (file) {
            // Validate file type
            if (!validTypes.includes(file.type)) {
                showError('Hanya file gambar yang diperbolehkan (JPEG, PNG, GIF, WebP)');
                resetPreview();
                return;
            }

            // Validate file size
            if (file.size > maxSize) {
                showError('Ukuran file terlalu besar. Maksimal 5MB');
                resetPreview();
                return;
            }

            // Clear any previous error
            hideError();

            // Create FileReader to read the file
            const reader = new FileReader();

            reader.onload = function (e) {
                // Set the image source to the uploaded file
                imagePreview.src = e.target.result;

                // Show preview and hide upload content
                previewContainer.classList.remove('hidden');
                uploadLabel.classList.add('has-preview');

                // Update file info
                const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                fileInfo.innerHTML = `
                            <span>${file.name}</span>
                            <span>${sizeInMB} MB</span>
                        `;
            };

            reader.onerror = function () {
                showError('Gagal membaca file. Silakan coba lagi.');
                resetPreview();
            };

            reader.readAsDataURL(file);
        }
    });

    // Handle remove preview button
    removePreview.addEventListener('click', function (e) {
        e.stopPropagation(); // Prevent triggering file input
        resetPreview();
    });

    // Allow drag and drop
    uploadLabel.addEventListener('dragover', function (e) {
        e.preventDefault();
        uploadLabel.classList.add('border-blue-500', 'bg-blue-50');
    });

    uploadLabel.addEventListener('dragleave', function (e) {
        e.preventDefault();
        if (!uploadLabel.classList.contains('has-preview')) {
            uploadLabel.classList.remove('border-blue-500', 'bg-blue-50');
        }
    });

    uploadLabel.addEventListener('drop', function (e) {
        e.preventDefault();
        uploadLabel.classList.remove('border-blue-500', 'bg-blue-50');

        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            const event = new Event('change', {
                bubbles: true
            });
            fileInput.dispatchEvent(event);
        }
    });

    // Helper functions
    function resetPreview() {
        fileInput.value = '';
        previewContainer.classList.add('hidden');
        uploadLabel.classList.remove('has-preview');
        hideError();
    }

    function showError(message) {
        imageError.textContent = message;
        imageError.classList.remove('hidden');
        uploadLabel.classList.add('border-red-300', 'bg-red-50');
    }

    function hideError() {
        imageError.classList.add('hidden');
        imageError.textContent = '';
        uploadLabel.classList.remove('border-red-300', 'bg-red-50');
    }

    // Character counter for title
    const titleInput = document.querySelector('input[name="title"]');
    const charCounter = document.querySelector('.text-xs.text-slate-400.font-medium');

    if (titleInput && charCounter) {
        titleInput.addEventListener('input', function () {
            const count = this.value.length;
            charCounter.textContent = `${count}/100 karakter`;

            // Change color if approaching limit
            if (count > 90) {
                charCounter.classList.remove('text-slate-400');
                charCounter.classList.add('text-orange-500');
            } else if (count > 95) {
                charCounter.classList.remove('text-slate-400', 'text-orange-500');
                charCounter.classList.add('text-red-500');
            } else {
                charCounter.classList.remove('text-orange-500', 'text-red-500');
                charCounter.classList.add('text-slate-400');
            }
        });
    }

    // Form validation before submit
    const form = document.getElementById('createMaterialForm');
    form.addEventListener('submit', function (e) {
        const title = document.querySelector('input[name="title"]').value.trim();
        const description = document.querySelector('textarea[name="description"]').value.trim();
        const category = document.querySelector('select[name="category_id"]').value;

        let isValid = true;
        let errorMessage = '';

        if (!title) {
            isValid = false;
            errorMessage = 'Judul materi harus diisi';
        } else if (title.length > 100) {
            isValid = false;
            errorMessage = 'Judul materi maksimal 100 karakter';
        } else if (!description) {
            isValid = false;
            errorMessage = 'Deskripsi materi harus diisi';
        } else if (category === 'Pilih Kategori...') {
            isValid = false;
            errorMessage = 'Silakan pilih kategori';
        }

        if (!isValid) {
            e.preventDefault();
            alert(errorMessage);
        }
    });
});
