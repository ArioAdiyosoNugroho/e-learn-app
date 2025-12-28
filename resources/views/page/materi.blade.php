@extends('layouts.user.app')
@section('title', 'Materi Pembelajaran')
@push('styles')
    <link rel="stylesheet" href="{{ asset('tamp/css/materi.css') }}">
@endpush
@push('script')
    <script src="{{ asset('tamp/js/materi.js') }}"></script>
@endpush
@section('content')
    <!-- Hero Section -->
    <section class="hero-section pt-28 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800"></div>

        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full"
                style="background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%);">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">

                <div class="text-center text-white mb-12">
                    <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight tracking-tight mb-3">
                        Jelajahi Ribuan Materi Pembelajaran
                    </h1>
                    <p class="text-xl font-light opacity-90 max-w-2xl mx-auto">
                        Temukan pelajaran, tutorial, dan sumber daya terbaik untuk menguasai setiap mata pelajaran.
                    </p>
                </div>

                <div class="max-w-2xl mx-auto mb-16">
                    <div class="search-box rounded-full p-2 flex flex-col sm:flex-row gap-2 shadow-2xl">
                        <div class="flex items-center flex-1 px-4 py-3">
                            <i class="fas fa-search text-gray-400 mr-3 text-lg"></i>
                            <input type="text" placeholder="Cari kuis, kategori, atau topik..."
                                class="flex-1 bg-transparent outline-none text-gray-700 placeholder-gray-400 text-base">
                        </div>
                        <button class="btn btn-primary rounded-full whitespace-nowrap py-3 px-6">
                            <i class="fas fa-search mr-2"></i>
                            <span>Cari Kuis</span>
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-blue-100 text-sm flex items-center justify-center gap-2">
                            <i class="fas fa-lightbulb"></i>
                            <span>Tips: Gunakan kata kunci spesifik untuk hasil yang lebih akurat</span>
                        </p>
                    </div>
                </div>

                <div class="text-center">
                    <p class="text-blue-100 text-base mb-4 font-medium">Atau Jelajahi Berdasarkan Kategori Utama:</p>
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="/kategori/matematika"
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-calculator mr-2"></i>Matematika
                        </a>
                        <a href="/kategori/fisika"
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-atom mr-2"></i>Fisika
                        </a>
                        <a href="/kategori/kimia"
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-flask mr-2"></i>Kimia
                        </a>
                        <a href="/kategori/biologi"
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-dna mr-2"></i>Biologi
                        </a>
                        <a href="/kategori/bahasa"
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-globe mr-2"></i>Bahasa & Sastra
                        </a>
                        <a href="/kategori/sejarah"
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20 hidden sm:inline-flex">
                            <i class="fas fa-book-open mr-2"></i>Sejarah
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path
                    d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                    fill="#f9fafb" />
            </svg>
        </div>
    </section>

    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Materi Pilihan</h2>
        <p class="text-gray-600">Koleksi materi terbaik untuk pembelajaran Anda</p>
    </div>
    <!-- Modern Filter Bar -->
    <section class="sticky top-[70px] z-30 py-6 px-4">
        <div class="container mx-auto px-4">
            <div class="filter-bar p-4">
                <!-- Main Filter Row -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3">
                    <!-- Left Section: Search and Main Filters -->
                    <div class="flex flex-col md:flex-row gap-3 flex-1 min-w-0">
                        <!-- Search Input -->
                        <div class="relative flex-shrink-0">
                            <input type="text" class="search-input" placeholder="Cari materi...">
                            <i
                                class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs"></i>
                        </div>

                        <!-- Main Filter Tabs -->
                        <div class="flex-1 min-w-0">
                            <div class="filter-tabs">
                                <button class="filter-tab active" data-filter="all">
                                    <i class="fas fa-th-large text-xs"></i>
                                    Semua Materi
                                </button>
                                <button class="filter-tab" data-filter="matematika">
                                    <i class="fas fa-calculator text-xs"></i>
                                    Matematika
                                </button>
                                <button class="filter-tab" data-filter="fisika">
                                    <i class="fas fa-atom text-xs"></i>
                                    Fisika
                                </button>
                                <button class="filter-tab" data-filter="kimia">
                                    <i class="fas fa-flask text-xs"></i>
                                    Kimia
                                </button>
                                <button class="filter-tab" data-filter="biologi">
                                    <i class="fas fa-dna text-xs"></i>
                                    Biologi
                                </button>
                                <button class="filter-tab" data-filter="bahasa">
                                    <i class="fas fa-language text-xs"></i>
                                    Bahasa
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Sort, View, and Expand -->
                    <div class="flex items-center gap-3">
                        <!-- Sort Options -->
                        <div class="relative">
                            <select class="select-custom">
                                <option>Terpopuler</option>
                                <option>Terbaru</option>
                                <option>Rating Tertinggi</option>
                                <option>Durasi Terpendek</option>
                            </select>
                        </div>

                        <!-- View Toggle -->
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-btn" data-view="list">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>

                        <!-- Expand Filters Button -->
                        <button
                            class="relative p-2 glass-btn rounded-lg text-gray-600 hover:text-gray-800 transition-all duration-200"
                            id="expand-filters">
                            <i class="fas fa-sliders-h text-sm"></i>
                            <span class="filter-badge">2</span>
                        </button>
                    </div>
                </div>

                <!-- Expandable Filter Section -->
                <div class="expandable-filters mt-3 pt-3 border-t border-gray-100" id="expandable-filters">
                    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-4">
                        <div class="flex flex-col md:flex-row md:items-center gap-3 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Filter
                                    Lanjutan:</span>

                                <select class="select-custom">
                                    <option>Semua Tingkat</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                </select>

                                <select class="select-custom">
                                    <option>Semua Kesulitan</option>
                                    <option>Mudah</option>
                                    <option>Menengah</option>
                                    <option>Sulit</option>
                                </select>

                                <select class="select-custom">
                                    <option>Semua Durasi</option>
                                    <option>
                                        < 30 menit</option>
                                    <option>30-60 menit</option>
                                    <option>> 60 menit</option>
                                </select>
                            </div>

                            <!-- Active Filters -->
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500">Filter aktif:</span>
                                <div class="flex flex-wrap gap-2">
                                    <div class="filter-chip fade-in">
                                        <span>Matematika</span>
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="filter-chip fade-in">
                                        <span>SMP</span>
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2">
                            <button class="btn btn-outline text-sm">
                                <i class="fas fa-redo-alt"></i>
                                Reset Filter
                            </button>
                            <button class="btn btn-primary text-sm">
                                <i class="fas fa-check"></i>
                                Terapkan Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Materials Grid -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight mb-2">
                        Perpustakaan Materi
                    </h2>
                    <p class="text-gray-500 text-lg">
                        Modul eksklusif untuk menunjang belajar Anda.
                    </p>
                </div>

                <a href="{{ route('materi.create.step1') }}"
                    class="group inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-blue-600 rounded-xl hover:bg-blue-700 hover:shadow-lg hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-600/20 w-full md:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-5 h-5 transition-transform group-hover:rotate-90">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <span>Buat Materi Baru</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div
                    class="group bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:shadow-2xl hover:shadow-gray-200/50 cursor-pointer">
                    <div class="relative w-full h-44 bg-gray-100 rounded-2xl mb-5 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?auto=format&fit=crop&q=80&w=800"
                            alt="Physics"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        <div class="absolute inset-0 bg-black/5 group-hover:bg-black/20 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-md rounded-lg text-blue-700 text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                Fisika
                            </span>
                        </div>

                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                            <button onclick="openModal('fisika')"
                                class="px-6 py-2 bg-white text-gray-900 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-book-open text-xs text-blue-600"></i>
                                <span class="text-sm">Baca Materi</span>
                            </button>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-start justify-between mb-3">
                            <h3
                                class="font-bold text-gray-900 text-lg leading-snug group-hover:text-blue-600 transition-colors">
                                Analisis Vektor Ruang 3D
                            </h3>
                            <span
                                class="flex items-center gap-1 text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full text-[10px] font-bold shrink-0">
                                PDF
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm font-light line-clamp-2 mb-6">
                            Pelajari cara menghitung resultan vektor dan komponennya menggunakan metode analitik
                            mendalam.
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-7 h-7 rounded-full bg-blue-600 flex items-center justify-center text-white text-[10px] font-bold">
                                    PD
                                </div>
                                <span class="text-xs font-semibold text-gray-700">Pak Deni</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-400 text-[11px] font-medium">
                                <span class="flex items-center gap-1"><i class="far fa-file-alt"></i> 12 Hal</span>
                                <span class="flex items-center gap-1"><i class="far fa-eye"></i> 1.2k</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="group bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:shadow-2xl hover:shadow-gray-200/50 cursor-pointer">
                    <div class="relative w-full h-44 bg-gray-100 rounded-2xl mb-5 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1530026405186-ed1f139173cf?auto=format&fit=crop&q=80&w=800"
                            alt="Biology"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        <div class="absolute inset-0 bg-black/5 group-hover:bg-black/20 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-md rounded-lg text-emerald-700 text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                Biologi
                            </span>
                        </div>

                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                class="px-6 py-2 bg-white text-gray-900 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-xs text-emerald-600"></i>
                                <span class="text-sm">Tonton Video</span>
                            </button>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-start justify-between mb-3">
                            <h3
                                class="font-bold text-gray-900 text-lg leading-snug group-hover:text-emerald-600 transition-colors">
                                Struktur Sel & Fungsinya
                            </h3>
                            <span
                                class="flex items-center gap-1 text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full text-[10px] font-bold shrink-0">
                                VIDEO
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm font-light line-clamp-2 mb-6">
                            Eksplorasi mendalam mengenai organel sel hewan dan tumbuhan dalam sistem kehidupan.
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-7 h-7 rounded-full bg-emerald-600 flex items-center justify-center text-white text-[10px] font-bold">
                                    BR
                                </div>
                                <span class="text-xs font-semibold text-gray-700">Bu Rina</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-400 text-[11px] font-medium">
                                <span class="flex items-center gap-1"><i class="far fa-clock"></i> 15 Min</span>
                                <span class="flex items-center gap-1"><i class="far fa-eye"></i> 850</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="group bg-white rounded-3xl border border-gray-100 p-4 transition-all duration-300 hover:shadow-2xl hover:shadow-gray-200/50 cursor-pointer">
                    <div class="relative w-full h-44 bg-gray-100 rounded-2xl mb-5 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1509228468518-180dd482195b?auto=format&fit=crop&q=80&w=800"
                            alt="Math"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        <div class="absolute inset-0 bg-black/5 group-hover:bg-black/20 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-md rounded-lg text-orange-700 text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                Matematika
                            </span>
                        </div>

                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                class="px-6 py-2 bg-white text-gray-900 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-sticky-note text-xs text-orange-600"></i>
                                <span class="text-sm">Buka Catatan</span>
                            </button>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-start justify-between mb-3">
                            <h3
                                class="font-bold text-gray-900 text-lg leading-snug group-hover:text-orange-600 transition-colors">
                                Logaritma Dasar & Lanjutan
                            </h3>
                            <span
                                class="flex items-center gap-1 text-orange-600 bg-orange-50 px-2.5 py-1 rounded-full text-[10px] font-bold shrink-0">
                                NOTES
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm font-light line-clamp-2 mb-6">
                            Kumpulan rumus cepat dan trik menjawab soal logaritma untuk persiapan ujian sekolah.
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-7 h-7 rounded-full bg-orange-600 flex items-center justify-center text-white text-[10px] font-bold">
                                    PB
                                </div>
                                <span class="text-xs font-semibold text-gray-700">Pak Budi</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-400 text-[11px] font-medium">
                                <span class="flex items-center gap-1"><i class="far fa-file-alt"></i> 5 Hal</span>
                                <span class="flex items-center gap-1"><i class="far fa-eye"></i> 2.4k</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-12">
                <button
                    class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-medium hover:border-blue-500 hover:text-blue-600 transition-all duration-300">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>



    <!-- modal  -->
    <div id="materialModal" class="fixed inset-0 z-[9999] hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">

        <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity opacity-0 translate-y-4 sm:translate-y-0"
            id="modalBackdrop" onclick="closeModal()"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

                <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-4xl opacity-0 scale-95"
                    id="modalPanel">

                    <button onclick="closeModal()"
                        class="absolute top-4 right-4 z-20 p-2 bg-white/50 hover:bg-white backdrop-blur-md rounded-full text-gray-500 hover:text-gray-900 transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="grid grid-cols-1 md:grid-cols-5">

                        <div class="md:col-span-2 relative h-64 md:h-auto bg-gray-100">
                            <img id="modalImage"
                                src="https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?auto=format&fit=crop&q=80&w=800"
                                alt="Cover Materi" class="absolute inset-0 w-full h-full object-cover">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent md:hidden">
                            </div>
                        </div>

                        <div class="md:col-span-3 p-8 flex flex-col h-full">

                            <div class="flex items-center gap-3 mb-4">
                                <span id="modalSubjectBadge"
                                    class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold uppercase tracking-wide">
                                    Fisika
                                </span>
                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                <span id="modalTypeBadge"
                                    class="flex items-center gap-1.5 text-gray-500 text-xs font-semibold uppercase tracking-wide">
                                    <i class="far fa-file-pdf"></i> PDF Document
                                </span>
                            </div>

                            <h2 id="modalTitle" class="text-3xl font-black text-gray-900 mb-3 leading-tight">
                                Analisis Vektor Ruang 3D
                            </h2>

                            <div class="flex items-center gap-3 mb-6 pb-6 border-b border-gray-100">
                                <div class="w-10 h-10 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold text-sm"
                                    id="modalAuthorInitials">
                                    PD
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900" id="modalAuthorName">Pak Deni</p>
                                    <p class="text-xs text-gray-500">Diupload 2 hari yang lalu</p>
                                </div>
                            </div>

                            <div class="prose prose-sm text-gray-600 mb-8 flex-grow">
                                <h4 class="font-bold text-gray-900 mb-2">Tentang Materi Ini</h4>
                                <p id="modalDescription">
                                    Pelajari cara menghitung resultan vektor dan komponennya menggunakan metode analitik
                                    mendalam. Materi ini mencakup pembahasan vektor satuan, perkalian dot product, dan
                                    cross product dalam ruang tiga dimensi. Sangat cocok untuk persiapan olimpiade
                                    fisika.
                                </p>
                            </div>

                            <div
                                class="bg-gray-50 -mx-8 -mb-8 p-6 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-gray-100">

                                <div class="flex items-center gap-6 text-sm text-gray-500 font-medium">
                                    <div class="flex items-center gap-2" title="Jumlah Halaman/Durasi">
                                        <i class="far fa-copy text-gray-400"></i>
                                        <span id="modalMeta1">12 Halaman</span>
                                    </div>
                                    <div class="flex items-center gap-2" title="Jumlah Dilihat">
                                        <i class="far fa-eye text-gray-400"></i>
                                        <span id="modalMeta2">1.2k Akses</span>
                                    </div>
                                </div>

                                <button
                                    class="w-full sm:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-transform active:scale-95 flex items-center justify-center gap-2">
                                    <span>Baca Materi Sekarang</span>
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                            <!-- Load More -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('materialModal');
        const backdrop = document.getElementById('modalBackdrop');
        const panel = document.getElementById('modalPanel');

        // Data Dummy untuk simulasi (Bisa diganti data dari database/API)
        const materials = {
            fisika: {
                title: "Analisis Vektor Ruang 3D",
                desc: "Pelajari cara menghitung resultan vektor dan komponennya menggunakan metode analitik mendalam. Mencakup pembahasan vektor satuan, dot product, dan cross product.",
                author: "Pak Deni",
                initials: "PD",
                subject: "Fisika",
                type: "PDF Document",
                meta1: "12 Halaman",
                meta2: "1.2k Akses",
                image: "https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?auto=format&fit=crop&q=80&w=800",
                colorClass: "bg-blue-50 text-blue-700",
                btnColor: "bg-blue-600 hover:bg-blue-700"
            },
            biologi: {
                title: "Struktur Sel & Fungsinya",
                desc: "Eksplorasi mendalam mengenai organel sel hewan dan tumbuhan. Video interaktif yang menjelaskan mitokondria, nukleus, dan ribosom dengan animasi 3D.",
                author: "Bu Rina",
                initials: "BR",
                subject: "Biologi",
                type: "Video Learning",
                meta1: "15 Menit",
                meta2: "850 Akses",
                image: "https://images.unsplash.com/photo-1530026405186-ed1f139173cf?auto=format&fit=crop&q=80&w=800",
                colorClass: "bg-emerald-50 text-emerald-700",
                btnColor: "bg-emerald-600 hover:bg-emerald-700"
            },
            matematika: {
                title: "Logaritma Dasar & Lanjutan",
                desc: "Kumpulan rumus cepat (Cheatsheet) untuk menaklukkan soal-soal logaritma. Dilengkapi dengan contoh soal UTBK dan pembahasan langkah demi langkah.",
                author: "Pak Budi",
                initials: "PB",
                subject: "Matematika",
                type: "Cheat Sheet",
                meta1: "5 Halaman",
                meta2: "2.4k Akses",
                image: "https://images.unsplash.com/photo-1509228468518-180dd482195b?auto=format&fit=crop&q=80&w=800",
                colorClass: "bg-orange-50 text-orange-700",
                btnColor: "bg-orange-600 hover:bg-orange-700"
            }
        };

        function openModal(key) {
            // 1. Ambil data berdasarkan key
            const data = materials[key];

            // 2. Isi konten modal secara dinamis
            document.getElementById('modalTitle').innerText = data.title;
            document.getElementById('modalDescription').innerText = data.desc;
            document.getElementById('modalAuthorName').innerText = data.author;
            document.getElementById('modalAuthorInitials').innerText = data.initials;
            document.getElementById('modalSubjectBadge').innerText = data.subject;
            document.getElementById('modalTypeBadge').innerHTML = `<i class="far fa-file"></i> ${data.type}`;
            document.getElementById('modalMeta1').innerText = data.meta1;
            document.getElementById('modalMeta2').innerText = data.meta2;
            document.getElementById('modalImage').src = data.image;

            // Update warna badge sesuai mapel
            const badge = document.getElementById('modalSubjectBadge');
            badge.className = `px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wide ${data.colorClass}`;

            // 3. Tampilkan Modal dengan Animasi
            modal.classList.remove('hidden');
            // Sedikit delay agar transisi CSS berjalan
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                panel.classList.remove('opacity-0', 'scale-95');
                panel.classList.add('opacity-100', 'scale-100');
            }, 10);
        }

        function closeModal() {
            // Animasi keluar
            backdrop.classList.add('opacity-0');
            panel.classList.remove('opacity-100', 'scale-100');
            panel.classList.add('opacity-0', 'scale-95');

            // Sembunyikan div setelah animasi selesai (300ms sesuai duration default tailwind)
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>

@endsection
