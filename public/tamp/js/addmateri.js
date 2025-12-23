// Main Application Controller untuk Halaman Buat Materi
class MaterialCreator {
    constructor() {
        this.currentStep = 1;
        this.totalSteps = 4;
        this.formData = {
            basicInfo: {},
            content: {},
            settings: {},
            publication: {}
        };
        this.autoSaveInterval = null;
        this.hasUnsavedChanges = false;

        this.init();
    }

    init() {
        // Hide loading screen
        setTimeout(() => {
            document.getElementById('loadingScreen').classList.add('hidden');
        }, 1500);

        // Setup event listeners
        this.setupFormListeners();
        this.setupAutoSave();
        this.loadDraft();

        // Initialize character counters
        this.initCharCounters();

        // Setup file upload
        this.setupFileUpload();

        // Setup tags
        this.setupTags();

        // Warn before leaving page
        window.addEventListener('beforeunload', this.warnBeforeUnload.bind(this));

        console.log('Material Creator initialized');
    }

    setupFormListeners() {
        // Form validation on input
        const form = document.getElementById('createMaterialForm');
        if (form) {
            form.addEventListener('input', () => {
                this.hasUnsavedChanges = true;
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.nextStep();
            });
        }

        // Radio button selection
        document.querySelectorAll('.type-option, .difficulty-option').forEach(option => {
            option.addEventListener('click', (e) => {
                const input = option.querySelector('input');
                if (input) {
                    input.checked = true;
                    this.hasUnsavedChanges = true;

                    // Update UI
                    option.parentNode.querySelectorAll('.type-option, .difficulty-option').forEach(opt => {
                        opt.querySelector('.type-content, .difficulty-content').classList.remove('selected');
                    });
                    option.querySelector('.type-content, .difficulty-content').classList.add('selected');
                }
            });
        });
    }

    initCharCounters() {
        const titleInput = document.getElementById('title');
        const descInput = document.getElementById('description');
        const titleCount = document.getElementById('titleCount');
        const descCount = document.getElementById('descCount');

        if (titleInput && titleCount) {
            titleInput.addEventListener('input', () => {
                const length = titleInput.value.length;
                titleCount.textContent = length;
                titleCount.classList.toggle('text-red-600', length > 100);
                this.hasUnsavedChanges = true;
            });
        }

        if (descInput && descCount) {
            descInput.addEventListener('input', () => {
                const length = descInput.value.length;
                descCount.textContent = length;
                descCount.classList.toggle('text-red-600', length > 500);
                this.hasUnsavedChanges = true;
            });
        }
    }

    setupFileUpload() {
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('thumbnail');
        const uploadPreview = document.getElementById('uploadPreview');
        const previewImage = document.getElementById('previewImage');
        const removeImage = document.getElementById('removeImage');

        if (!uploadArea || !fileInput) return;

        // Click to upload
        uploadArea.addEventListener('click', (e) => {
            if (!e.target.closest('.upload-remove') && !e.target.closest('.upload-button')) {
                fileInput.click();
            }
        });

        // Drag and drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, this.preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.add('drag-over');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.remove('drag-over');
            }, false);
        });

        // Handle file selection
        uploadArea.addEventListener('drop', this.handleDrop.bind(this), false);
        fileInput.addEventListener('change', this.handleFileSelect.bind(this), false);

        // Remove image
        if (removeImage) {
            removeImage.addEventListener('click', (e) => {
                e.stopPropagation();
                this.clearImagePreview();
            });
        }
    }

    preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        this.handleFileSelect({ target: { files: files } });
    }

    handleFileSelect(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                this.showError('File terlalu besar. Maksimal 2MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                const uploadArea = document.getElementById('uploadArea');
                const uploadPreview = document.getElementById('uploadPreview');
                const previewImage = document.getElementById('previewImage');

                previewImage.src = e.target.result;
                uploadPreview.classList.remove('hidden');
                uploadArea.querySelector('.upload-content').classList.add('hidden');
                this.hasUnsavedChanges = true;
            };
            reader.readAsDataURL(file);
        }
    }

    clearImagePreview() {
        const uploadArea = document.getElementById('uploadArea');
        const uploadPreview = document.getElementById('uploadPreview');
        const fileInput = document.getElementById('thumbnail');

        uploadPreview.classList.add('hidden');
        uploadArea.querySelector('.upload-content').classList.remove('hidden');
        fileInput.value = '';
        this.hasUnsavedChanges = true;
    }

    setupTags() {
        const tagsInput = document.getElementById('tagsInput');
        const tagsContainer = document.getElementById('tagsContainer');
        let tags = [];

        if (!tagsInput || !tagsContainer) return;

        tagsInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                const tag = tagsInput.value.trim().replace(',', '');
                if (tag && !tags.includes(tag) && tags.length < 10) {
                    this.addTag(tag, tags, tagsContainer);
                    tagsInput.value = '';
                    this.hasUnsavedChanges = true;
                }
            }
        });

        // Load tags from draft
        const savedTags = localStorage.getItem('materialTags');
        if (savedTags) {
            JSON.parse(savedTags).forEach(tag => {
                this.addTag(tag, tags, tagsContainer);
            });
        }
    }

    addTag(tag, tagsArray, container) {
        tagsArray.push(tag);

        const tagElement = document.createElement('div');
        tagElement.className = 'tag animate-fade-in';
        tagElement.innerHTML = `
            <span>${tag}</span>
            <span class="tag-remove" data-tag="${tag}">
                <i class="fas fa-times"></i>
            </span>
        `;

        container.appendChild(tagElement);

        // Add remove functionality
        const removeBtn = tagElement.querySelector('.tag-remove');
        removeBtn.addEventListener('click', () => {
            const tagToRemove = removeBtn.getAttribute('data-tag');
            tagsArray = tagsArray.filter(t => t !== tagToRemove);
            tagElement.remove();
            this.hasUnsavedChanges = true;

            // Save tags
            localStorage.setItem('materialTags', JSON.stringify(tagsArray));
        });
    }

    setupAutoSave() {
        // Auto-save every 30 seconds
        this.autoSaveInterval = setInterval(() => {
            if (this.hasUnsavedChanges) {
                this.saveDraft();
            }
        }, 30000);
    }

    saveDraft() {
        try {
            const formData = this.collectFormData();
            localStorage.setItem('materialDraft', JSON.stringify(formData));
            this.hasUnsavedChanges = false;
            this.showSuccess('Draft berhasil disimpan');
            return true;
        } catch (error) {
            console.error('Error saving draft:', error);
            this.showError('Gagal menyimpan draft');
            return false;
        }
    }

    loadDraft() {
        try {
            const saved = localStorage.getItem('materialDraft');
            if (saved) {
                const data = JSON.parse(saved);
                this.populateForm(data);
                this.showInfo('Draft berhasil dimuat');
            }
        } catch (error) {
            console.error('Error loading draft:', error);
        }
    }

    collectFormData() {
        const form = document.getElementById('createMaterialForm');
        if (!form) return {};

        const formData = new FormData(form);
        const data = {};

        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }

        // Collect tags
        const tags = Array.from(document.querySelectorAll('.tag span:first-child'))
            .map(span => span.textContent);
        data.tags = tags;

        // Get selected values
        data.materialType = form.querySelector('input[name="materialType"]:checked')?.value;
        data.difficulty = form.querySelector('input[name="difficulty"]:checked')?.value;

        return data;
    }

    populateForm(data) {
        // Populate text inputs
        Object.keys(data).forEach(key => {
            const element = document.querySelector(`[name="${key}"]`);
            if (element && data[key]) {
                if (element.type === 'radio') {
                    const radio = document.querySelector(`[name="${key}"][value="${data[key]}"]`);
                    if (radio) radio.checked = true;
                } else {
                    element.value = data[key];
                }
            }
        });

        // Update character counters
        const titleInput = document.getElementById('title');
        const descInput = document.getElementById('description');
        const titleCount = document.getElementById('titleCount');
        const descCount = document.getElementById('descCount');

        if (titleInput && titleCount) {
            titleCount.textContent = titleInput.value.length;
        }
        if (descInput && descCount) {
            descCount.textContent = descInput.value.length;
        }
    }

    validateForm() {
        const requiredFields = [
            { id: 'title', message: 'Judul materi wajib diisi' },
            { id: 'category', message: 'Kategori wajib dipilih' },
            { id: 'description', message: 'Deskripsi wajib diisi' }
        ];

        let isValid = true;
        let errorMessages = [];

        requiredFields.forEach(field => {
            const element = document.getElementById(field.id);
            if (!element || !element.value.trim()) {
                isValid = false;
                errorMessages.push(field.message);
                element.classList.add('border-red-500');

                // Remove error class after 3 seconds
                setTimeout(() => {
                    element.classList.remove('border-red-500');
                }, 3000);
            }
        });

        // Check material type
        const materialType = document.querySelector('input[name="materialType"]:checked');
        if (!materialType) {
            isValid = false;
            errorMessages.push('Jenis materi wajib dipilih');
        }

        if (!isValid) {
            this.showError(errorMessages.join('<br>'));
        }

        return isValid;
    }

    nextStep() {
        if (!this.validateForm()) {
            return;
        }

        // Save current step data
        this.formData.basicInfo = this.collectFormData();

        // Update progress
        this.currentStep++;
        this.updateProgress();

        // In a real app, you would navigate to the next step
        // For now, show success and simulate navigation
        this.showSuccess('Langkah 1 berhasil disimpan');

        // Simulate loading next step
        setTimeout(() => {
            // This would typically redirect to step 2
            // window.location.href = `/create-material/step-2?draft=${encodeURIComponent(JSON.stringify(this.formData))}`;
            this.showInfo('Mengarahkan ke langkah berikutnya...');
        }, 1500);
    }

    updateProgress() {
        const progressPercentage = (this.currentStep / this.totalSteps) * 100;
        const progressBar = document.getElementById('progressBar');
        if (progressBar) {
            progressBar.style.width = `${progressPercentage}%`;
        }

        // Update step indicators
        document.querySelectorAll('.step-item').forEach((step, index) => {
            if (index + 1 < this.currentStep) {
                step.classList.add('completed');
            } else if (index + 1 === this.currentStep) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });
    }

    previewMaterial() {
        if (!this.validateForm()) {
            return;
        }

        // Save form data
        const formData = this.collectFormData();

        // Store preview data
        sessionStorage.setItem('materialPreview', JSON.stringify(formData));

        // Open preview in new tab
        window.open('preview-material.html', '_blank');

        this.showSuccess('Preview berhasil dibuat');
    }

    resetForm() {
        if (confirm('Apakah Anda yakin ingin mengosongkan semua field? Perubahan yang belum disimpan akan hilang.')) {
            const form = document.getElementById('createMaterialForm');
            if (form) {
                form.reset();
                this.clearImagePreview();

                // Clear tags
                const tagsContainer = document.getElementById('tagsContainer');
                if (tagsContainer) {
                    tagsContainer.innerHTML = '';
                }

                // Reset counters
                const titleCount = document.getElementById('titleCount');
                const descCount = document.getElementById('descCount');
                if (titleCount) titleCount.textContent = '0';
                if (descCount) descCount.textContent = '0';

                this.hasUnsavedChanges = false;
                localStorage.removeItem('materialDraft');
                localStorage.removeItem('materialTags');

                this.showSuccess('Form berhasil direset');
            }
        }
    }

    showExitConfirm() {
        if (this.hasUnsavedChanges) {
            const modal = document.getElementById('exitModal');
            const modalContent = document.getElementById('modalContent');

            modal.classList.remove('hidden');
            modal.classList.add('show');

            setTimeout(() => {
                modalContent.classList.remove('opacity-0', 'scale-95');
                modalContent.classList.add('opacity-100', 'scale-100');
            }, 10);
        } else {
            this.confirmExit();
        }
    }

    hideExitModal() {
        const modal = document.getElementById('exitModal');
        const modalContent = document.getElementById('modalContent');

        modalContent.classList.remove('opacity-100', 'scale-100');
        modalContent.classList.add('opacity-0', 'scale-95');

        setTimeout(() => {
            modal.classList.remove('show');
            modal.classList.add('hidden');
        }, 300);
    }

    confirmExit() {
        this.hasUnsavedChanges = false;
        window.history.back();
    }

    warnBeforeUnload(e) {
        if (this.hasUnsavedChanges) {
            e.preventDefault();
            e.returnValue = 'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman?';
            return e.returnValue;
        }
    }

    // Notification System
    showSuccess(message) {
        this.showNotification('success', message);
    }

    showError(message) {
        this.showNotification('error', message);
    }

    showInfo(message) {
        this.showNotification('info', message);
    }

    showNotification(type, message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg text-white animate-slide-in ${
            type === 'success' ? 'bg-green-500' :
            type === 'error' ? 'bg-red-500' :
            'bg-blue-500'
        }`;

        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${
                    type === 'success' ? 'check-circle' :
                    type === 'error' ? 'exclamation-circle' :
                    'info-circle'
                } mr-3"></i>
                <div class="flex-1">${message}</div>
                <button class="ml-4 text-white/80 hover:text-white" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        document.body.appendChild(notification);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.classList.remove('animate-slide-in');
                notification.classList.add('opacity-0', 'translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }
        }, 5000);
    }

    // Cleanup
    destroy() {
        if (this.autoSaveInterval) {
            clearInterval(this.autoSaveInterval);
        }
        window.removeEventListener('beforeunload', this.warnBeforeUnload);
    }
}

// Initialize when DOM is loaded
let materialCreator;

document.addEventListener('DOMContentLoaded', () => {
    materialCreator = new MaterialCreator();
});

// Global functions for HTML onclick handlers
function saveDraft() {
    if (materialCreator) {
        materialCreator.saveDraft();
    }
}

function previewMaterial() {
    if (materialCreator) {
        materialCreator.previewMaterial();
    }
}

function nextStep() {
    if (materialCreator) {
        materialCreator.nextStep();
    }
}

function resetForm() {
    if (materialCreator) {
        materialCreator.resetForm();
    }
}

function showExitConfirm() {
    if (materialCreator) {
        materialCreator.showExitConfirm();
    }
}

function hideExitModal() {
    if (materialCreator) {
        materialCreator.hideExitModal();
    }
}

function confirmExit() {
    if (materialCreator) {
        materialCreator.confirmExit();
    }
}

// Make available globally for HTML onclick
window.saveDraft = saveDraft;
window.previewMaterial = previewMaterial;
window.nextStep = nextStep;
window.resetForm = resetForm;
window.showExitConfirm = showExitConfirm;
window.hideExitModal = hideExitModal;
window.confirmExit = confirmExit;
