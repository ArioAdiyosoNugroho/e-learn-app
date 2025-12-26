document.addEventListener('DOMContentLoaded', function () {
    const colorPicker = document.getElementById('colorPicker');
    const colorInput = document.getElementById('colorInput');
    const colorPreviewBox = document.getElementById('colorPreviewBox');
    const colorPreview = document.getElementById('colorPreview');
    const textPreview = document.getElementById('textPreview');
    const currentColorCode = document.getElementById('currentColorCode');

    // Fungsi untuk update semua preview warna
    function updateColorDisplay(color) {
        // Pastikan warna dimulai dengan #
        if (!color.startsWith('#')) {
            color = '#' + color;
        }

        // Update semua elemen dengan warna baru
        colorPreviewBox.style.backgroundColor = color;
        colorPreview.style.backgroundColor = color;
        textPreview.style.backgroundColor = color;

        // Update text preview dengan warna kontras yang tepat
        const isLightColor = isColorLight(color);
        textPreview.style.color = isLightColor ? '#000000' : '#ffffff';

        // Update input dan teks kode warna
        colorInput.value = color;
        currentColorCode.textContent = color;
        colorPicker.value = color;
    }

    // Fungsi untuk mengecek apakah warna termasuk light color
    function isColorLight(hexColor) {
        // Konversi hex ke RGB
        const r = parseInt(hexColor.slice(1, 3), 16);
        const g = parseInt(hexColor.slice(3, 5), 16);
        const b = parseInt(hexColor.slice(5, 7), 16);

        // Hitung brightness (rumus sederhana)
        const brightness = (r * 299 + g * 587 + b * 114) / 1000;

        return brightness > 128;
    }

    // Event listener untuk color picker
    colorPicker.addEventListener('input', function () {
        updateColorDisplay(this.value);
    });

    // Event listener untuk input teks
    colorInput.addEventListener('input', function () {
        const color = this.value;

        // Validasi format hex sederhana
        const hexRegex = /^#?([0-9A-F]{3}){1,2}$/i;
        if (hexRegex.test(color)) {
            updateColorDisplay(color);
        }
    });

    // Event listener untuk enter di input
    colorInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const color = this.value;

            // Validasi format hex sederhana
            const hexRegex = /^#?([0-9A-F]{3}){1,2}$/i;
            if (hexRegex.test(color)) {
                updateColorDisplay(color);
            } else {
                // Reset ke warna sebelumnya jika tidak valid
                this.value = colorPicker.value;
            }
        }
    });

    // Event listener untuk klik pada preview box
    colorPreviewBox.addEventListener('click', function () {
        colorPicker.click();
    });

    // Inisialisasi dengan warna default
    updateColorDisplay('#1d4ed8');
});


function prepareDelete(url) {
    const form = document.getElementById('deleteForm');
    form.setAttribute('action', url);
}


function initEditColorPicker() {
    const colorPicker = document.getElementById('editColorPicker');
    const colorInput = document.getElementById('editColorInput');
    const colorPreviewBox = document.getElementById('editColorPreviewBox');
    const colorPreview = document.getElementById('editColorPreview');
    const textPreview = document.getElementById('editTextPreview');
    const currentColorCode = document.getElementById('editCurrentColorCode');

    if (!colorPicker || !colorInput) return;

    // Fungsi untuk update semua preview warna
    function updateColorDisplay(color) {
        // Pastikan warna dimulai dengan #
        if (!color.startsWith('#')) {
            color = '#' + color;
        }

        // Update semua elemen dengan warna baru
        colorPreviewBox.style.backgroundColor = color;
        colorPreview.style.backgroundColor = color;
        textPreview.style.backgroundColor = color;

        // Update text preview dengan warna kontras yang tepat
        const isLightColor = isColorLight(color);
        textPreview.style.color = isLightColor ? '#000000' : '#ffffff';

        // Update input dan teks kode warna
        colorInput.value = color;
        currentColorCode.textContent = color;
        colorPicker.value = color;
    }

    // Fungsi untuk mengecek apakah warna termasuk light color
    function isColorLight(hexColor) {
        // Konversi hex ke RGB
        const r = parseInt(hexColor.slice(1, 3), 16);
        const g = parseInt(hexColor.slice(3, 5), 16);
        const b = parseInt(hexColor.slice(5, 7), 16);

        // Hitung brightness (rumus sederhana)
        const brightness = (r * 299 + g * 587 + b * 114) / 1000;

        return brightness > 128;
    }

    // Event listener untuk color picker
    colorPicker.addEventListener('input', function () {
        updateColorDisplay(this.value);
    });

    // Event listener untuk input teks
    colorInput.addEventListener('input', function () {
        const color = this.value;

        // Validasi format hex sederhana
        const hexRegex = /^#?([0-9A-F]{3}){1,2}$/i;
        if (hexRegex.test(color)) {
            updateColorDisplay(color);
        }
    });

    // Event listener untuk enter di input
    colorInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const color = this.value;

            // Validasi format hex sederhana
            const hexRegex = /^#?([0-9A-F]{3}){1,2}$/i;
            if (hexRegex.test(color)) {
                updateColorDisplay(color);
            } else {
                // Reset ke warna sebelumnya jika tidak valid
                this.value = colorPicker.value;
            }
        }
    });

    // Event listener untuk klik pada preview box
    colorPreviewBox.addEventListener('click', function () {
        colorPicker.click();
    });
}

// Panggil fungsi inisialisasi saat modal edit dibuka
document.addEventListener('DOMContentLoaded', function () {
    const modalEdit = document.getElementById('modal-edit');
    if (modalEdit) {
        modalEdit.addEventListener('shown.bs.modal', function () {
            initEditColorPicker();
        });
    }
});

// Fungsi untuk prepare edit
function prepareEdit(url, name, color) {
    const form = document.getElementById('editForm');
    const inputName = document.getElementById('editName');
    const colorPicker = document.getElementById('editColorPicker');
    const colorInput = document.getElementById('editColorInput');
    const colorPreviewBox = document.getElementById('editColorPreviewBox');
    const colorPreview = document.getElementById('editColorPreview');
    const textPreview = document.getElementById('editTextPreview');
    const currentColorCode = document.getElementById('editCurrentColorCode');

    form.setAttribute('action', url);
    inputName.value = name;

    // Set nilai warna
    colorPicker.value = color;
    colorInput.value = color;

    // Update preview
    colorPreviewBox.style.backgroundColor = color;
    colorPreview.style.backgroundColor = color;
    textPreview.style.backgroundColor = color;
    currentColorCode.textContent = color;

    // Update text preview dengan warna kontras yang tepat
    const isLightColor = isColorLight(color);
    textPreview.style.color = isLightColor ? '#000000' : '#ffffff';

    // Fungsi untuk mengecek apakah warna termasuk light color
    function isColorLight(hexColor) {
        const r = parseInt(hexColor.slice(1, 3), 16);
        const g = parseInt(hexColor.slice(3, 5), 16);
        const b = parseInt(hexColor.slice(5, 7), 16);
        const brightness = (r * 299 + g * 587 + b * 114) / 1000;
        return brightness > 128;
    }

    // Inisialisasi event listeners untuk modal edit
    initEditColorPicker();
}

function prepareDelete(url) {
    const form = document.getElementById('deleteForm');
    form.setAttribute('action', url);
}
