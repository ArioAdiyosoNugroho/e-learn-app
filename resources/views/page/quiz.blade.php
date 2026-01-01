@extends('layouts.user.app')
@section('title', 'Quiz')
@push('styles')
    <link rel="stylesheet" href="{{ asset('tamp/css/quiz.css') }}">
@endpush
@push('script')
    <script src="{{ asset('tamp/js/quiz.js') }}"></script>
@endpush
@section('content')
    <!-- Hero Section - Versi Rapih & Profesional -->
    <section class="hero-section pt-28 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800"></div>

        <!-- Background pattern yang lebih subtle -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full"
                style="background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%);">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">

                <!-- PIN Access Section yang lebih sederhana -->
                <div class="max-w-xl mx-auto mb-12">
                    <div class="bg-white rounded-2xl shadow-2xl p-6">
                        <div class="text-center mb-4">
                            <div
                                class="inline-flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full mb-3">
                                <i class="fas fa-key text-blue-600 text-lg"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">Akses Quiz dengan PIN</h3>
                            <p class="text-gray-600 text-sm mt-1">Masukkan kode yang diberikan oleh guru/pengajar</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center bg-gray-50 rounded-xl px-4 py-3 border border-gray-200">
                                <i class="fas fa-lock text-gray-400 mr-3"></i>
                                <input type="text" maxlength="6" placeholder="Masukkan 6-digit PIN"
                                    class="flex-1 bg-transparent outline-none text-gray-800 placeholder-gray-400 text-lg tracking-widest text-center font-medium"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="pin-input">
                            </div>

                            <button
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg"
                                onclick="accessPinQuiz()">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Masuk ke Quiz
                            </button>
                        </div>
                    </div>

                    <!-- Info text sederhana -->
                    <div class="text-center mt-4">
                        <p class="text-blue-100 text-sm flex items-center justify-center gap-2">
                            <i class="fas fa-info-circle"></i>
                            <span>Gunakan PIN yang valid untuk mengakses quiz privat</span>
                        </p>
                    </div>
                </div>

                <!-- Kategori Populer - versi lebih sederhana -->
                <div class="text-center">
                    <p class="text-blue-100 text-sm mb-4 font-medium">Jelajahi Kategori Populer</p>
                    <div class="flex flex-wrap justify-center gap-3">
                        <button
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-calculator mr-2"></i>Matematika
                        </button>
                        <button
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-atom mr-2"></i>Fisika
                        </button>
                        <button
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-flask mr-2"></i>Kimia
                        </button>
                        <button
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-dna mr-2"></i>Biologi
                        </button>
                        <button
                            class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium hover:bg-white/20 transition-all duration-300 border border-white/20">
                            <i class="fas fa-globe mr-2"></i>Bahasa
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Curved Bottom yang lebih smooth -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path
                    d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                    fill="#f9fafb" />
            </svg>
        </div>
    </section>

    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Quiz Pilihan</h2>
        <p class="text-gray-600">Koleksi quiz terbaik untuk pembelajaran Anda</p>
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
                            <input type="text" class="search-input" placeholder="Cari kuis...">
                            <i
                                class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs"></i>
                        </div>

                        <!-- Main Filter Tabs -->
                        <div class="flex-1 min-w-0">
                            <div class="filter-tabs">
                                <button class="filter-tab active" data-filter="all">
                                    <i class="fas fa-th-large text-xs"></i>
                                    Semua Kuis
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
                                <option>Tingkat Kesulitan</option>
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
                                    <option>Semua Status</option>
                                    <option>Belum Dimulai</option>
                                    <option>Dalam Proses</option>
                                    <option>Selesai</option>
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

    <!-- Quiz Grid -->
    <section class="py-12">
        <div class="container px-4">
            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div
                    class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100 transition-all duration-300 hover:shadow-lg group cursor-pointer relative overflow-hidden">
                    <div class="relative w-full h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032777176?auto=format&fit=crop&q=80&w=800"
                            alt="English Grammar"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-sm rounded-lg text-red-700 text-xs font-semibold shadow-sm">
                                Bahasa Inggris
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 z-20">
                            <span class="px-2 py-1 bg-yellow-500 text-white rounded-lg text-xs font-medium shadow-sm">
                                Sedang
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <button
                            onclick="openModal('english')"
                                class="px-6 py-2 bg-white text-red-600 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-sm"></i>
                                <span>Mulai</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start justify-between mb-2">
                        <h3
                            class="font-bold text-gray-800 text-lg flex-1 pr-2 group-hover:text-red-600 transition-colors">
                            Tenses: Present & Past</h3>
                        <span
                            class="flex items-center gap-1 text-blue-600 bg-blue-50 px-2 py-1 rounded-full text-xs font-medium shrink-0">
                            <i class="fas fa-check-circle text-xs"></i>
                            Selesai
                        </span>
                    </div>
                    <div
                        class="flex items-center flex-wrap gap-y-2 gap-x-3 text-xs text-gray-500 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1.5 pr-3 border-r border-gray-200">
                            <div class="w-5 h-5 rounded-full bg-red-100 flex items-center justify-center">
                                <span class="text-red-600 font-bold text-[10px]">AD</span>
                            </div>
                            <span class="font-medium text-gray-700">Miss Ani</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><i class="far fa-question-circle"></i> 15 Soal</span>
                            <span class="flex items-center gap-1"><i class="far fa-clock"></i> 20 Menit</span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100 transition-all duration-300 hover:shadow-lg group cursor-pointer relative overflow-hidden">
                    <div class="relative w-full h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1582719478252-656de3a6c251?auto=format&fit=crop&q=80&w=800"
                            alt="Physics Motion"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-sm rounded-lg text-purple-700 text-xs font-semibold shadow-sm">
                                Fisika
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 z-20">
                            <span class="px-2 py-1 bg-red-600 text-white rounded-lg text-xs font-medium shadow-sm">
                                Sulit
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                class="px-6 py-2 bg-white text-purple-600 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-sm"></i>
                                <span>Mulai</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start justify-between mb-2">
                        <h3
                            class="font-bold text-gray-800 text-lg flex-1 pr-2 group-hover:text-purple-600 transition-colors">
                            Konsep Gerak Parabola</h3>
                        <span
                            class="flex items-center gap-1 text-gray-600 bg-gray-50 px-2 py-1 rounded-full text-xs font-medium shrink-0">
                            <i class="far fa-circle text-xs"></i>
                            Belum Mulai
                        </span>
                    </div>
                    <div
                        class="flex items-center flex-wrap gap-y-2 gap-x-3 text-xs text-gray-500 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1.5 pr-3 border-r border-gray-200">
                            <div class="w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center">
                                <span class="text-purple-600 font-bold text-[10px]">DS</span>
                            </div>
                            <span class="font-medium text-gray-700">Pak Deni</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><i class="far fa-question-circle"></i> 8 Soal</span>
                            <span class="flex items-center gap-1"><i class="far fa-clock"></i> 30 Menit</span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100 transition-all duration-300 hover:shadow-lg group cursor-pointer relative overflow-hidden">
                    <div class="relative w-full h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1532159182049-74d6f83b6329?auto=format&fit=crop&q=80&w=800"
                            alt="Chemistry Laboratory"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-sm rounded-lg text-green-700 text-xs font-semibold shadow-sm">
                                Kimia
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 z-20">
                            <span class="px-2 py-1 bg-yellow-500 text-white rounded-lg text-xs font-medium shadow-sm">
                                Sedang
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                class="px-6 py-2 bg-white text-green-600 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-sm"></i>
                                <span>Lanjutkan</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start justify-between mb-2">
                        <h3
                            class="font-bold text-gray-800 text-lg flex-1 pr-2 group-hover:text-green-600 transition-colors">
                            Dasar Stoikiometri</h3>
                        <span
                            class="flex items-center gap-1 text-orange-600 bg-orange-50 px-2 py-1 rounded-full text-xs font-medium shrink-0">
                            <i class="fas fa-spinner fa-spin text-xs"></i>
                            Sedang Dikerjakan
                        </span>
                    </div>
                    <div
                        class="flex items-center flex-wrap gap-y-2 gap-x-3 text-xs text-gray-500 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1.5 pr-3 border-r border-gray-200">
                            <div class="w-5 h-5 rounded-full bg-green-100 flex items-center justify-center">
                                <span class="text-green-600 font-bold text-[10px]">IW</span>
                            </div>
                            <span class="font-medium text-gray-700">Bu Ida</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><i class="far fa-question-circle"></i> 12 Soal</span>
                            <span class="flex items-center gap-1"><i class="far fa-clock"></i> 25 Menit</span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100 transition-all duration-300 hover:shadow-lg group cursor-pointer relative overflow-hidden">
                    <div class="relative w-full h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1543128639-4cb7e6ee7c57?auto=format&fit=crop&q=80&w=800"
                            alt="Books and Reading"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-sm rounded-lg text-red-700 text-xs font-semibold shadow-sm">
                                Bahasa Inggris
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 z-20">
                            <span class="px-2 py-1 bg-green-500 text-white rounded-lg text-xs font-medium shadow-sm">
                                Mudah
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                class="px-6 py-2 bg-white text-red-600 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-sm"></i>
                                <span>Mulai</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start justify-between mb-2">
                        <h3
                            class="font-bold text-gray-800 text-lg flex-1 pr-2 group-hover:text-red-600 transition-colors">
                            Reading Comprehension 1</h3>
                        <span
                            class="flex items-center gap-1 text-blue-600 bg-blue-50 px-2 py-1 rounded-full text-xs font-medium shrink-0">
                            <i class="fas fa-check-circle text-xs"></i>
                            Selesai
                        </span>
                    </div>
                    <div
                        class="flex items-center flex-wrap gap-y-2 gap-x-3 text-xs text-gray-500 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1.5 pr-3 border-r border-gray-200">
                            <div class="w-5 h-5 rounded-full bg-red-100 flex items-center justify-center">
                                <span class="text-red-600 font-bold text-[10px]">AD</span>
                            </div>
                            <span class="font-medium text-gray-700">Miss Ani</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><i class="far fa-question-circle"></i> 10 Soal</span>
                            <span class="flex items-center gap-1"><i class="far fa-clock"></i> 15 Menit</span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100 transition-all duration-300 hover:shadow-lg group cursor-pointer relative overflow-hidden">
                    <div class="relative w-full h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?auto=format&fit=crop&q=80&w=800"
                            alt="Mathematics Calculus"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-sm rounded-lg text-blue-700 text-xs font-semibold shadow-sm">
                                Matematika
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 z-20">
                            <span class="px-2 py-1 bg-red-600 text-white rounded-lg text-xs font-medium shadow-sm">
                                Sulit
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                onclick="openModal('physics')"
                                class="px-6 py-2 bg-white text-blue-600 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-sm"></i>
                                <span>Mulai</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start justify-between mb-2">
                        <h3
                            class="font-bold text-gray-800 text-lg flex-1 pr-2 group-hover:text-blue-600 transition-colors">
                            Aplikasi Integral Tentu</h3>
                        <span
                            class="flex items-center gap-1 text-gray-600 bg-gray-50 px-2 py-1 rounded-full text-xs font-medium shrink-0">
                            <i class="far fa-circle text-xs"></i>
                            Belum Mulai
                        </span>
                    </div>
                    <div
                        class="flex items-center flex-wrap gap-y-2 gap-x-3 text-xs text-gray-500 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1.5 pr-3 border-r border-gray-200">
                            <div class="w-5 h-5 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 font-bold text-[10px]">BS</span>
                            </div>
                            <span class="font-medium text-gray-700">Pak Budi</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><i class="far fa-question-circle"></i> 5 Soal</span>
                            <span class="flex items-center gap-1"><i class="far fa-clock"></i> 35 Menit</span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100 transition-all duration-300 hover:shadow-lg group cursor-pointer relative overflow-hidden">
                    <div class="relative w-full h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden shadow-inner">
                        <img src="https://images.unsplash.com/photo-1542810634-71277d912853?auto=format&fit=crop&q=80&w=800"
                            alt="Human Anatomy Diagram"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 z-10">
                        </div>
                        <div class="absolute top-3 left-3 z-20">
                            <span
                                class="px-3 py-1.5 bg-white/95 backdrop-blur-sm rounded-lg text-pink-700 text-xs font-semibold shadow-sm">
                                Biologi
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 z-20">
                            <span class="px-2 py-1 bg-green-500 text-white rounded-lg text-xs font-medium shadow-sm">
                                Mudah
                            </span>
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center z-30 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <button
                                class="px-6 py-2 bg-white text-pink-600 font-bold rounded-full shadow-xl hover:scale-105 transition-transform flex items-center gap-2">
                                <i class="fas fa-play text-sm"></i>
                                <span>Mulai</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start justify-between mb-2">
                        <h3
                            class="font-bold text-gray-800 text-lg flex-1 pr-2 group-hover:text-pink-600 transition-colors">
                            Anatomi Sistem Pencernaan</h3>
                        <span
                            class="flex items-center gap-1 text-blue-600 bg-blue-50 px-2 py-1 rounded-full text-xs font-medium shrink-0">
                            <i class="fas fa-check-circle text-xs"></i>
                            Selesai
                        </span>
                    </div>
                    <div
                        class="flex items-center flex-wrap gap-y-2 gap-x-3 text-xs text-gray-500 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1.5 pr-3 border-r border-gray-200">
                            <div class="w-5 h-5 rounded-full bg-pink-100 flex items-center justify-center">
                                <span class="text-pink-600 font-bold text-[10px]">RA</span>
                            </div>
                            <span class="font-medium text-gray-700">Bu Rina</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><i class="far fa-question-circle"></i> 15 Soal</span>
                            <span class="flex items-center gap-1"><i class="far fa-clock"></i> 10 Menit</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More -->
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
    <div id="quizModal" class="fixed inset-0 z-[9999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop">
        </div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-4xl opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    id="modalPanel">

                    <button onclick="closeModal()"
                        class="absolute top-4 right-4 z-20 p-2 bg-white/50 hover:bg-white rounded-full text-gray-500 hover:text-gray-900 transition-all backdrop-blur-sm">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="grid grid-cols-1 md:grid-cols-5 h-full">

                        <div class="md:col-span-2 relative h-56 md:h-auto bg-gray-200">
                            <img id="m-image" src="" alt="Quiz Cover"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent md:bg-gradient-to-r">
                            </div>

                            <div class="absolute bottom-4 left-4 flex flex-wrap gap-2 md:hidden">
                                <span id="m-subject-mobile"
                                    class="px-3 py-1 bg-white/90 backdrop-blur text-xs font-bold rounded-lg shadow-sm">
                                    Subject
                                </span>
                            </div>
                        </div>

                        <div class="md:col-span-3 p-6 md:p-8 flex flex-col justify-between h-full">

                            <div>
                                <div class="hidden md:flex items-center justify-between mb-4">
                                    <span id="m-subject"
                                        class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-lg uppercase tracking-wider">
                                        Matematika
                                    </span>
                                    <span id="m-difficulty"
                                        class="flex items-center gap-1 text-xs font-semibold text-yellow-600 bg-yellow-50 px-2 py-1 rounded">
                                        <i class="fas fa-layer-group"></i> Sedang
                                    </span>
                                </div>

                                <h2 id="m-title"
                                    class="text-2xl md:text-3xl font-black text-gray-900 mb-2 leading-tight">
                                    Judul Quiz Disini
                                </h2>

                                <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                        <span class="text-xs font-bold text-gray-500" id="m-author-initial">AD</span>
                                    </div>
                                    <div class="text-xs">
                                        <p class="font-bold text-gray-900" id="m-author">Nama Pengajar</p>
                                        <p class="text-gray-500">Dibuat 2 hari lalu</p>
                                    </div>
                                </div>

                                <h4 class="text-sm font-bold text-gray-900 mb-2">Deskripsi</h4>
                                <p id="m-desc" class="text-sm text-gray-600 leading-relaxed mb-6 line-clamp-3">
                                    Deskripsi singkat mengenai quiz ini akan muncul di sini. Penjelasan materi apa saja
                                    yang akan dibahas dan tujuan pembelajaran.
                                </p>

                                <div class="grid grid-cols-3 gap-4 mb-6">
                                    <div
                                        class="p-3 bg-gray-50 rounded-xl border border-gray-100 text-center hover:bg-blue-50 transition-colors">
                                        <i class="far fa-question-circle text-blue-500 mb-1 text-lg"></i>
                                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wide">Soal</p>
                                        <p class="text-sm font-bold text-gray-800" id="m-questions">15</p>
                                    </div>
                                    <div
                                        class="p-3 bg-gray-50 rounded-xl border border-gray-100 text-center hover:bg-blue-50 transition-colors">
                                        <i class="far fa-clock text-blue-500 mb-1 text-lg"></i>
                                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wide">Durasi
                                        </p>
                                        <p class="text-sm font-bold text-gray-800" id="m-time">20 mnt</p>
                                    </div>
                                    <div
                                        class="p-3 bg-gray-50 rounded-xl border border-gray-100 text-center hover:bg-blue-50 transition-colors">
                                        <i class="fas fa-users text-blue-500 mb-1 text-lg"></i>
                                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wide">Peserta
                                        </p>
                                        <p class="text-sm font-bold text-gray-800">1.2k</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-100">
                                <button onclick="closeModal()"
                                    class="flex-1 px-5 py-3 rounded-xl border border-gray-200 text-gray-600 font-bold text-sm hover:bg-gray-50 hover:text-gray-900 transition-all">
                                    Nanti Saja
                                </button>
                                <button
                                    class="flex-[2] px-5 py-3 rounded-xl bg-blue-600 text-white font-bold text-sm shadow-lg shadow-blue-200 hover:bg-blue-700 hover:shadow-blue-300 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                                    <i class="fas fa-play"></i> Mulai Kerjakan
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Referensi Elemen DOM
        const modal = document.getElementById('quizModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalPanel = document.getElementById('modalPanel');

        // Data Dummy (Nanti bisa diambil dari database/API)
        // Kunci objek disesuaikan dengan ID unik quiz
        const quizData = {
            'english': {
                title: 'Tenses: Present & Past',
                desc: 'Uji pemahamanmu tentang penggunaan Simple Present Tense dan Past Tense dalam percakapan sehari-hari. Quiz ini mencakup grammar dan vocabulary context.',
                subject: 'Bahasa Inggris',
                difficulty: 'Sedang',
                author: 'Miss Ani',
                initial: 'AD',
                questions: '15 Soal',
                time: '20 Menit',
                image: 'https://images.unsplash.com/photo-1588072432836-e10032777176?auto=format&fit=crop&q=80&w=800'
            },
            'physics': {
                title: 'Konsep Gerak Parabola',
                desc: 'Analisis mendalam mengenai gerak peluru, vektor kecepatan, dan posisi benda. Persiapkan kalkulator untuk menghitung rumus fisika dasar.',
                subject: 'Fisika',
                difficulty: 'Sulit',
                author: 'Pak Deni',
                initial: 'PD',
                questions: '8 Soal',
                time: '30 Menit',
                image: 'https://images.unsplash.com/photo-1582719478252-656de3a6c251?auto=format&fit=crop&q=80&w=800'
            }
            // Tambahkan data lain di sini...
        };

        function openModal(id) {
            const data = quizData[id];
            if (!data) return; // Safety check

            // 1. Populate Data
            document.getElementById('m-title').innerText = data.title;
            document.getElementById('m-desc').innerText = data.desc;
            document.getElementById('m-subject').innerText = data.subject;
            document.getElementById('m-subject-mobile').innerText = data.subject;
            document.getElementById('m-author').innerText = data.author;
            document.getElementById('m-author-initial').innerText = data.initial;
            document.getElementById('m-questions').innerText = data.questions;
            document.getElementById('m-time').innerText = data.time;
            document.getElementById('m-image').src = data.image;

            // 2. Show Modal Wrapper
            modal.classList.remove('hidden');

            // 3. Animation In (Sedikit delay agar transisi CSS berjalan)
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalPanel.classList.remove('opacity-0', 'translate-y-4', 'sm:scale-95');
                modalPanel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
            }, 10);
        }

        function closeModal() {
            // 1. Animation Out
            modalBackdrop.classList.add('opacity-0');
            modalPanel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
            modalPanel.classList.add('opacity-0', 'translate-y-4', 'sm:scale-95');

            // 2. Hide Wrapper after animation finishes (300ms match transition duration)
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal ketika klik di luar panel (backdrop)
        modalBackdrop.addEventListener('click', closeModal);
    </script>

    <!-- end modal  -->
@endsection
