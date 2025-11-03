<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz | Platform Belajar Interaktif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #dbeafe;
            --accent: #06b6d4;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .floating {
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -10px); }
            100% { transform: translate(0, 0px); }
        }

        .pulse-ring {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.9); opacity: 1; }
            70% { transform: scale(1.2); opacity: 0; }
            100% { transform: scale(0.9); opacity: 0; }
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--primary);
            transition: width 0.2s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid white;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary);
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(37, 99, 235, 0.3), transparent);
        }

        .stats-card {
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            border: 1px solid rgba(37, 99, 235, 0.1);
        }

        .testimonial-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-light), white);
            box-shadow: 0 8px 16px rgba(37, 99, 235, 0.1);
        }

        .subject-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .teacher-card {
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .teacher-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .teacher-image {
            transition: transform 0.4s ease;
        }

        .teacher-card:hover .teacher-image {
            transform: scale(1.05);
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(8px, 12px) rotate(90deg); }
            50% { transform: translate(0, 24px) rotate(180deg); }
            75% { transform: translate(-8px, 12px) rotate(270deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }

        .typewriter {
            overflow: hidden;
            border-right: .15em solid var(--primary);
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 2.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--primary); }
        }

        .morphing-dots {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .morphing-dots span {
            display: block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--primary);
            margin: 0 5px;
            animation: morphing 1.2s infinite;
        }

        .morphing-dots span:nth-child(2) {
            animation-delay: 0.15s;
        }

        .morphing-dots span:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes morphing {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.3);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .interactive-card {
            position: relative;
            overflow: hidden;
        }

        .interactive-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .interactive-card:hover::before {
            opacity: 1;
        }

        .glow-effect {
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.3);
            transition: box-shadow 0.25s ease;
        }

        .glow-effect:hover {
            box-shadow: 0 0 25px rgba(37, 99, 235, 0.5);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 50px;
            border: 2px solid rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            display: flex;
            justify-content: center;
        }

        .scroll-indicator::before {
            content: '';
            position: absolute;
            top: 8px;
            width: 4px;
            height: 10px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 2px;
            animation: scroll 1.5s infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(20px);
                opacity: 0;
            }
        }

        .counter {
            font-variant-numeric: tabular-nums;
        }

        .reveal {
            opacity: 0;
            transform: translateY(20px);
        }

        .stagger-item {
            opacity: 0;
            transform: translateY(15px);
        }

        .quiz-card {
            position: relative;
            overflow: hidden;
        }

        .quiz-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .quiz-card:hover::after {
            opacity: 1;
        }

        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float-particle 12s infinite linear;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .toggle-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .toggle-content.active {
            max-height: 500px;
        }

        .flip-card {
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.5s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 16px;
        }

        .flip-card-back {
            transform: rotateY(180deg);
        }

        .achievement-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
            border: 1px solid rgba(37, 99, 235, 0.1);
        }

        .achievement-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .blog-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
        }

        .blog-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .pricing-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
            border: 1px solid rgba(37, 99, 235, 0.1);
            position: relative;
            overflow: hidden;
        }

        .pricing-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .pricing-card.popular::before {
            content: 'Paling Populer';
            position: absolute;
            top: 20px;
            right: -30px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            padding: 6px 40px;
            font-size: 0.75rem;
            font-weight: 600;
            transform: rotate(45deg);
        }

        /* Smooth scrolling for the whole page */
        html {
            scroll-behavior: smooth;
        }

        /* Optimized animations for performance */
        .performance-optimized {
            will-change: transform, opacity;
        }
    </style>
</head>
<body class="bg-gray-50 antialiased">
    <!-- Loading Screen -->
    <div id="loadingScreen" class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center">
        <div class="flex items-center space-x-3 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center shadow-lg">
                <i class="fas fa-graduation-cap text-white text-xl"></i>
            </div>
            <span class="text-2xl font-bold gradient-text">EduQuiz</span>
        </div>
        <div class="morphing-dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <p class="mt-6 text-gray-600">Memuat pengalaman belajar terbaik...</p>
    </div>

    <!-- Header -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-200">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center shadow-lg">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <span class="text-2xl font-bold gradient-text">EduQuiz</span>
            </div>

            <nav class="hidden lg:flex space-x-10">
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-600 transition-colors">Beranda</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-600 transition-colors">Materi</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-600 transition-colors">Kuiz</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-600 transition-colors">Guru</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-600 transition-colors">Blog</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-600 transition-colors">Tentang</a>
            </nav>

            <div class="flex items-center space-x-4">
                <button class="p-2 text-gray-600 hover:text-blue-600 transition-colors rounded-full hover:bg-blue-50">
                    <i class="fas fa-search text-lg"></i>
                </button>
                <button class="p-2 text-gray-600 hover:text-blue-600 transition-colors rounded-full hover:bg-blue-50 relative">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="relative">
                    <button class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 text-white flex items-center justify-center shadow-md">
                        <i class="fas fa-user"></i>
                    </button>
                </div>
                <button class="lg:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 md:py-20 relative overflow-hidden">
        <div id="particles-container" class="particles-container"></div>
        <div class="floating-shape w-64 h-64 -top-20 -left-20 opacity-30"></div>
        <div class="floating-shape w-96 h-96 -bottom-40 -right-40 opacity-20"></div>
        <div class="floating-shape w-80 h-80 top-1/2 left-1/3 opacity-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-start"> <!-- Changed from items-center to items-start -->
                <div class="lg:w-1/2 mb-12 lg:mb-0 lg:pr-8"> <!-- Added lg:pr-8 for spacing -->
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mb-6 reveal performance-optimized">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                        <span class="text-sm font-medium">Platform Belajar No. 1 di Indonesia</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight reveal performance-optimized">
                        Tingkatkan Prestasi Belajar dengan
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200 typewriter">EduQuiz</span>
                    </h1>
                    <p class="text-xl mb-8 text-blue-100 max-w-2xl reveal performance-optimized">Platform belajar interaktif dengan kuiz dan materi yang disusun oleh guru profesional untuk meningkatkan pemahaman Anda secara efektif dan menyenangkan.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 reveal performance-optimized">
                        <button class="btn-primary text-white font-semibold py-4 px-8 rounded-xl flex items-center justify-center glow-effect">
                            <span>Mulai Belajar Sekarang</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        <button class="btn-secondary text-white font-semibold py-4 px-8 rounded-xl flex items-center justify-center">
                            <i class="fas fa-play-circle mr-2"></i>
                            <span>Lihat Demo</span>
                        </button>
                    </div>

                    <div class="flex flex-wrap gap-6 mt-12">
                        <div class="flex items-center reveal performance-optimized">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold counter" data-target="50000">0</p>
                                <p class="text-blue-200 text-sm">Siswa Aktif</p>
                            </div>
                        </div>
                        <div class="flex items-center reveal performance-optimized">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-book-open text-white"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold counter" data-target="500">0</p>
                                <p class="text-blue-200 text-sm">Materi Belajar</p>
                            </div>
                        </div>
                        <div class="flex items-center reveal performance-optimized">
                            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-chalkboard-teacher text-white"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold counter" data-target="100">0</p>
                                <p class="text-blue-200 text-sm">Guru Profesional</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Card aligned with left content -->
                <div class="lg:w-1/2 flex lg:justify-start lg:items-start"> <!-- Changed to start alignment -->
                    <div class="relative w-full max-w-lg reveal performance-optimized lg:mt-0"> <!-- Added max-w-lg and mt-0 -->
                        <div class="absolute -top-6 -left-6 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-72 h-72 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse animation-delay-2000"></div>

                        <div class="relative glass-effect rounded-3xl p-8 shadow-2xl border border-white/20 floating interactive-card">
                            <div class="flex justify-between items-center mb-8">
                                <h3 class="text-2xl font-bold">Matematika Kelas 10</h3>
                                <span class="bg-white/20 text-white text-sm font-semibold px-4 py-2 rounded-full">Baru</span>
                            </div>
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5">
                                    <i class="fas fa-calculator text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold">Trigonometri Dasar</h4>
                                    <p class="text-blue-200">Oleh: Bu Sari, M.Pd</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-blue-200">Progress Belajar</span>
                                    <span class="text-white font-semibold">65%</span>
                                </div>
                                <div class="w-full bg-white/20 rounded-full h-2">
                                    <div class="bg-white h-2 rounded-full progress-bar" style="width: 0%" data-target="65"></div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <i class="fas fa-users text-blue-200 mr-2"></i>
                                    <span class="text-sm">1.2k Siswa</span>
                                </div>
                                <button class="bg-white text-blue-700 text-sm font-semibold py-3 px-6 rounded-xl hover:bg-blue-50 transition-colors flex items-center glow-effect">
                                    <span>Lanjutkan</span>
                                    <i class="fas fa-chevron-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator"></div>
    </section>

    <!-- Fitur Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Mengapa Memilih <span class="gradient-text">EduQuiz</span>?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg reveal performance-optimized">Platform kami dirancang khusus oleh ahli pendidikan untuk memberikan pengalaman belajar yang efektif, menyenangkan, dan terpersonalisasi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl card-hover border border-blue-100 interactive-card reveal stagger-item performance-optimized">
                    <div class="feature-icon mb-6 mx-auto">
                        <i class="fas fa-chalkboard-teacher text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Guru Berpengalaman</h3>
                    <p class="text-gray-600 text-center">Materi disusun oleh guru-guru profesional dengan pengalaman mengajar bertahun-tahun dan sertifikasi pendidikan.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl card-hover border border-blue-100 interactive-card reveal stagger-item performance-optimized">
                    <div class="feature-icon mb-6 mx-auto">
                        <i class="fas fa-puzzle-piece text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Kuiz Interaktif</h3>
                    <p class="text-gray-600 text-center">Tingkatkan pemahaman dengan berbagai jenis kuiz interaktif yang menarik, menantang, dan sesuai kurikulum.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl card-hover border border-blue-100 interactive-card reveal stagger-item performance-optimized">
                    <div class="feature-icon mb-6 mx-auto">
                        <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Analitik Mendalam</h3>
                    <p class="text-gray-600 text-center">Pantau perkembangan belajar dengan sistem analitik yang detail dan rekomendasi pembelajaran yang personal.</p>
                </div>

                <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl card-hover border border-blue-100 interactive-card reveal stagger-item performance-optimized">
                    <div class="feature-icon mb-6 mx-auto">
                        <i class="fas fa-mobile-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Akses Fleksibel</h3>
                    <p class="text-gray-600 text-center">Belajar kapan saja, di mana saja dengan platform yang responsif dan kompatibel di berbagai perangkat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <div class="section-divider"></div>

    <!-- Materi Populer Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12">
                <div class="mb-6 lg:mb-0">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Materi <span class="gradient-text">Populer</span></h2>
                    <p class="text-gray-600 max-w-xl reveal performance-optimized">Jelajahi koleksi materi pembelajaran terpopuler yang dirancang untuk meningkatkan pemahaman Anda.</p>
                </div>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-500 transition-colors flex items-center bg-white px-6 py-3 rounded-xl shadow-sm hover:shadow-md reveal performance-optimized">
                    Lihat Semua Materi <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Materi Card 1 -->
                <div class="flip-card h-full">
                    <div class="flip-card-inner h-full">
                        <div class="flip-card-front bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full reveal performance-optimized">
                            <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-700 relative overflow-hidden">
                                <div class="subject-badge bg-white/20 text-white backdrop-blur-sm">Matematika</div>
                                <div class="absolute bottom-4 right-4">
                                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm pulse-ring">
                                        <i class="fas fa-play text-white"></i>
                                    </div>
                                </div>
                                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Aljabar Linear</h3>
                                <p class="text-gray-600 mb-4">Materi lengkap tentang matriks, vektor, dan sistem persamaan linear dengan pendekatan visual yang mudah dipahami.</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-blue-600 text-sm"></i>
                                        </div>
                                        <span class="text-sm text-gray-600">Bu Sari, M.Pd</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="far fa-clock mr-1"></i>
                                        <span>45 mnt</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flip-card-back bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-2xl shadow-lg p-6 flex flex-col justify-center items-center h-full">
                            <h3 class="text-xl font-semibold mb-4 text-center">Aljabar Linear</h3>
                            <p class="text-blue-100 text-center mb-6">Mulai belajar materi ini sekarang dan kuasai konsep aljabar linear dengan mudah!</p>
                            <div class="flex space-x-4">
                                <button class="bg-white text-blue-700 font-semibold py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors">
                                    Mulai Belajar
                                </button>
                                <button class="bg-transparent border border-white text-white font-semibold py-2 px-4 rounded-lg hover:bg-white/10 transition-colors">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Materi Card 2 -->
                <div class="flip-card h-full">
                    <div class="flip-card-inner h-full">
                        <div class="flip-card-front bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full reveal performance-optimized">
                            <div class="h-48 bg-gradient-to-r from-green-500 to-green-700 relative overflow-hidden">
                                <div class="subject-badge bg-white/20 text-white backdrop-blur-sm">Biologi</div>
                                <div class="absolute bottom-4 right-4">
                                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                        <i class="fas fa-play text-white"></i>
                                    </div>
                                </div>
                                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Sistem Pencernaan Manusia</h3>
                                <p class="text-gray-600 mb-4">Pelajari organ-organ pencernaan dan proses metabolisme makanan dengan animasi interaktif dan diagram detail.</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-green-600 text-sm"></i>
                                        </div>
                                        <span class="text-sm text-gray-600">Pak Budi, S.Pd</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="far fa-clock mr-1"></i>
                                        <span>60 mnt</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flip-card-back bg-gradient-to-br from-green-600 to-green-800 text-white rounded-2xl shadow-lg p-6 flex flex-col justify-center items-center h-full">
                            <h3 class="text-xl font-semibold mb-4 text-center">Sistem Pencernaan</h3>
                            <p class="text-green-100 text-center mb-6">Jelajahi sistem pencernaan manusia dengan visualisasi 3D dan penjelasan mendalam!</p>
                            <div class="flex space-x-4">
                                <button class="bg-white text-green-700 font-semibold py-2 px-4 rounded-lg hover:bg-green-50 transition-colors">
                                    Mulai Belajar
                                </button>
                                <button class="bg-transparent border border-white text-white font-semibold py-2 px-4 rounded-lg hover:bg-white/10 transition-colors">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Materi Card 3 -->
                <div class="flip-card h-full">
                    <div class="flip-card-inner h-full">
                        <div class="flip-card-front bg-white rounded-2xl shadow-lg overflow-hidden card-hover h-full reveal performance-optimized">
                            <div class="h-48 bg-gradient-to-r from-purple-500 to-purple-700 relative overflow-hidden">
                                <div class="subject-badge bg-white/20 text-white backdrop-blur-sm">Fisika</div>
                                <div class="absolute bottom-4 right-4">
                                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                        <i class="fas fa-play text-white"></i>
                                    </div>
                                </div>
                                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">Hukum Newton & Gerak</h3>
                                <p class="text-gray-600 mb-4">Pahami tiga hukum gerak Newton dengan simulasi interaktif dan contoh aplikasi dalam kehidupan sehari-hari.</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-purple-600 text-sm"></i>
                                        </div>
                                        <span class="text-sm text-gray-600">Bu Rina, M.Pd</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="far fa-clock mr-1"></i>
                                        <span>50 mnt</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flip-card-back bg-gradient-to-br from-purple-600 to-purple-800 text-white rounded-2xl shadow-lg p-6 flex flex-col justify-center items-center h-full">
                            <h3 class="text-xl font-semibold mb-4 text-center">Hukum Newton</h3>
                            <p class="text-purple-100 text-center mb-6">Pelajari hukum gerak Newton dengan simulasi interaktif yang menarik!</p>
                            <div class="flex space-x-4">
                                <button class="bg-white text-purple-700 font-semibold py-2 px-4 rounded-lg hover:bg-purple-50 transition-colors">
                                    Mulai Belajar
                                </button>
                                <button class="bg-transparent border border-white text-white font-semibold py-2 px-4 rounded-lg hover:bg-white/10 transition-colors">
                                    Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center reveal performance-optimized">
                    <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="50000">0</div>
                    <div class="text-blue-200">Siswa Aktif</div>
                </div>
                <div class="text-center reveal performance-optimized">
                    <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="500">0</div>
                    <div class="text-blue-200">Materi Belajar</div>
                </div>
                <div class="text-center reveal performance-optimized">
                    <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="95">0</div>
                    <div class="text-blue-200">Tingkat Kepuasan</div>
                </div>
                <div class="text-center reveal performance-optimized">
                    <div class="text-4xl md:text-5xl font-bold mb-2 counter" data-target="100">0</div>
                    <div class="text-blue-200">Guru Profesional</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Quiz Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12">
                <div class="mb-6 lg:mb-0">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Kuiz <span class="gradient-text">Interaktif</span></h2>
                    <p class="text-gray-600 max-w-xl reveal performance-optimized">Uji pemahaman Anda dengan berbagai jenis kuiz interaktif yang menarik dan menantang.</p>
                </div>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-500 transition-colors flex items-center bg-white px-6 py-3 rounded-xl shadow-sm hover:shadow-md reveal performance-optimized">
                    Lihat Semua Kuiz <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Kuiz Card 1 -->
                <div class="stats-card rounded-2xl p-6 card-hover quiz-card reveal stagger-item performance-optimized">
                    <div class="flex justify-between items-start mb-5">
                        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-calculator text-blue-600 text-xl"></i>
                        </div>
                        <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">10 Soal</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Kuiz Matematika: Trigonometri</h3>
                    <p class="text-gray-600 text-sm mb-5">Uji pemahaman Anda tentang konsep dasar trigonometri dengan soal bervariasi.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-user mr-1"></i>
                            <span>1.5k</span>
                        </div>
                        <button class="bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center glow-effect">
                            <span>Mulai</span>
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Kuiz Card 2 -->
                <div class="stats-card rounded-2xl p-6 card-hover quiz-card reveal stagger-item performance-optimized">
                    <div class="flex justify-between items-start mb-5">
                        <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-leaf text-green-600 text-xl"></i>
                        </div>
                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">15 Soal</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Kuiz Biologi: Ekosistem</h3>
                    <p class="text-gray-600 text-sm mb-5">Tantang diri Anda dengan soal-soal tentang ekosistem dan rantai makanan.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-user mr-1"></i>
                            <span>2.1k</span>
                        </div>
                        <button class="bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center glow-effect">
                            <span>Mulai</span>
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Kuiz Card 3 -->
                <div class="stats-card rounded-2xl p-6 card-hover quiz-card reveal stagger-item performance-optimized">
                    <div class="flex justify-between items-start mb-5">
                        <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-atom text-purple-600 text-xl"></i>
                        </div>
                        <span class="bg-purple-100 text-purple-700 text-xs font-semibold px-3 py-1 rounded-full">12 Soal</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Kuiz Fisika: Gerak Lurus</h3>
                    <p class="text-gray-600 text-sm mb-5">Uji kemampuan Anda dalam memahami konsep gerak lurus beraturan dan berubah beraturan.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-user mr-1"></i>
                            <span>1.8k</span>
                        </div>
                        <button class="bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center glow-effect">
                            <span>Mulai</span>
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Kuiz Card 4 -->
                <div class="stats-card rounded-2xl p-6 card-hover quiz-card reveal stagger-item performance-optimized">
                    <div class="flex justify-between items-start mb-5">
                        <div class="w-14 h-14 bg-yellow-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-book text-yellow-600 text-xl"></i>
                        </div>
                        <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full">8 Soal</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Kuiz Bahasa: Ejaan</h3>
                    <p class="text-gray-600 text-sm mb-5">Perbaiki pemahaman Anda tentang ejaan yang disempurnakan (EYD) dengan kuiz ini.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="far fa-user mr-1"></i>
                            <span>1.2k</span>
                        </div>
                        <button class="bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center glow-effect">
                            <span>Mulai</span>
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievement Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Pencapaian <span class="gradient-text">Siswa</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg reveal performance-optimized">Lihat bagaimana EduQuiz membantu siswa mencapai prestasi luar biasa dalam pembelajaran mereka.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="achievement-card reveal stagger-item performance-optimized">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-trophy text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Juara Olimpiade Matematika</h3>
                            <p class="text-gray-600">Tingkat Nasional 2023</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Berkat latihan soal di EduQuiz, saya berhasil meraih medali emas dalam Olimpiade Matematika Nasional."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-200 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Ahmad Rizki</p>
                            <p class="text-xs text-gray-600">Siswa Kelas 12</p>
                        </div>
                    </div>
                </div>

                <div class="achievement-card reveal stagger-item performance-optimized">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mr-4">
                            <i class="fas fa-medal text-green-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Nilai UN Tertinggi</h3>
                            <p class="text-gray-600">Sekolah Menengah 2023</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Materi persiapan UN di EduQuiz sangat membantu saya meraih nilai tertinggi di sekolah."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-green-200 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Sari Dewi</p>
                            <p class="text-xs text-gray-600">Siswa Kelas 9</p>
                        </div>
                    </div>
                </div>

                <div class="achievement-card reveal stagger-item performance-optimized">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                            <i class="fas fa-star text-purple-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Beasiswa Prestasi</h3>
                            <p class="text-gray-600">Universitas Terkemuka</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Persiapan ujian masuk perguruan tinggi dengan EduQuiz membantu saya meraih beasiswa penuh."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-200 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Budi Santoso</p>
                            <p class="text-xs text-gray-600">Mahasiswa Baru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12">
                <div class="mb-6 lg:mb-0">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Artikel <span class="gradient-text">Edukasi</span></h2>
                    <p class="text-gray-600 max-w-xl reveal performance-optimized">Tips, trik, dan informasi terbaru seputar pendidikan dan metode belajar efektif.</p>
                </div>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-500 transition-colors flex items-center bg-white px-6 py-3 rounded-xl shadow-sm hover:shadow-md reveal performance-optimized">
                    Lihat Semua Artikel <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="blog-card reveal stagger-item performance-optimized">
                    <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-700"></div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium mr-3">Belajar Efektif</span>
                            <span>15 Maret 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">5 Metode Belajar Efektif untuk Ujian</h3>
                        <p class="text-gray-600 mb-4">Temukan strategi belajar yang terbukti efektif meningkatkan pemahaman dan nilai ujian Anda.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-500 transition-colors flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="blog-card reveal stagger-item performance-optimized">
                    <div class="h-48 bg-gradient-to-r from-green-500 to-green-700"></div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium mr-3">Tips & Trik</span>
                            <span>10 Maret 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Cara Mengatasi Rasa Malas Belajar</h3>
                        <p class="text-gray-600 mb-4">Pelajari teknik-teknik praktis untuk mengatasi procrastination dan meningkatkan motivasi belajar.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-500 transition-colors flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="blog-card reveal stagger-item performance-optimized">
                    <div class="h-48 bg-gradient-to-r from-purple-500 to-purple-700"></div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded-full text-xs font-medium mr-3">Teknologi Pendidikan</span>
                            <span>5 Maret 2023</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Manfaat Gamifikasi dalam Pembelajaran</h3>
                        <p class="text-gray-600 mb-4">Bagaimana elemen game dapat membuat proses belajar lebih menyenangkan dan efektif.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-500 transition-colors flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Paket <span class="gradient-text">Langganan</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg reveal performance-optimized">Pilih paket yang sesuai dengan kebutuhan belajar Anda. Mulai dari gratis hingga akses penuh.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="pricing-card reveal performance-optimized">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Gratis</h3>
                        <div class="flex items-baseline justify-center mb-4">
                            <span class="text-4xl font-bold text-gray-800">Rp 0</span>
                            <span class="text-gray-600 ml-2">/selamanya</span>
                        </div>
                        <p class="text-gray-600">Cocok untuk mencoba fitur dasar EduQuiz</p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Akses 10 materi dasar</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">5 kuiz interaktif per bulan</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Laporan belajar sederhana</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-times mr-3"></i>
                            <span>Materi premium</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-times mr-3"></i>
                            <span>Analitik mendalam</span>
                        </li>
                    </ul>
                    <button class="w-full bg-gray-200 text-gray-800 font-semibold py-3 rounded-lg hover:bg-gray-300 transition-colors">
                        Mulai Gratis
                    </button>
                </div>

                <div class="pricing-card popular reveal performance-optimized">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Premium</h3>
                        <div class="flex items-baseline justify-center mb-4">
                            <span class="text-4xl font-bold text-gray-800">Rp 99.000</span>
                            <span class="text-gray-600 ml-2">/bulan</span>
                        </div>
                        <p class="text-gray-600">Pilihan terbaik untuk belajar serius</p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Akses semua materi</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Kuiz tanpa batas</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Analitik belajar mendalam</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Konsultasi dengan guru</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Sertifikat penyelesaian</span>
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Pilih Premium
                    </button>
                </div>

                <div class="pricing-card reveal performance-optimized">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Keluarga</h3>
                        <div class="flex items-baseline justify-center mb-4">
                            <span class="text-4xl font-bold text-gray-800">Rp 249.000</span>
                            <span class="text-gray-600 ml-2">/bulan</span>
                        </div>
                        <p class="text-gray-600">Untuk 3 akun, hemat hingga 40%</p>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Semua fitur Premium</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">3 akun terpisah</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Laporan terpisah per anak</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Kontrol orang tua</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Prioritas dukungan</span>
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Pilih Keluarga
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive FAQ Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal performance-optimized">Pertanyaan <span class="gradient-text">Umum</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg reveal performance-optimized">Temukan jawaban untuk pertanyaan yang sering diajukan tentang platform EduQuiz.</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6 reveal performance-optimized">
                    <button class="faq-toggle w-full text-left p-6 flex justify-between items-center hover:bg-blue-50 transition-colors">
                        <h3 class="text-lg font-semibold text-gray-800">Bagaimana cara mendaftar di EduQuiz?</h3>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                    </button>
                    <div class="toggle-content">
                        <div class="p-6 pt-0 text-gray-600">
                            <p>Pendaftaran di EduQuiz sangat mudah. Klik tombol "Daftar Sekarang" di bagian atas halaman, isi formulir pendaftaran dengan data diri Anda, verifikasi email Anda, dan Anda siap untuk mulai belajar!</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6 reveal performance-optimized">
                    <button class="faq-toggle w-full text-left p-6 flex justify-between items-center hover:bg-blue-50 transition-colors">
                        <h3 class="text-lg font-semibold text-gray-800">Apakah EduQuiz gratis?</h3>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                    </button>
                    <div class="toggle-content">
                        <div class="p-6 pt-0 text-gray-600">
                            <p>EduQuiz menawarkan baik konten gratis maupun premium. Anda dapat mengakses banyak materi dan kuiz dasar secara gratis. Untuk akses penuh ke semua fitur dan konten eksklusif, tersedia paket berlangganan dengan harga terjangkau.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6 reveal performance-optimized">
                    <button class="faq-toggle w-full text-left p-6 flex justify-between items-center hover:bg-blue-50 transition-colors">
                        <h3 class="text-lg font-semibold text-gray-800">Bagaimana sistem penilaian kuiz di EduQuiz?</h3>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                    </button>
                    <div class="toggle-content">
                        <div class="p-6 pt-0 text-gray-600">
                            <p>Setiap kuiz di EduQuiz memiliki sistem penilaian yang transparan. Anda akan mendapatkan skor berdasarkan jawaban benar, dan sistem akan memberikan analisis mendalam tentang kekuatan dan area yang perlu ditingkatkan dalam pemahaman Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg text-white relative overflow-hidden">
        <div class="floating-shape w-80 h-80 -top-20 -left-20 opacity-20"></div>
        <div class="floating-shape w-96 h-96 -bottom-40 -right-40 opacity-10"></div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 reveal performance-optimized">Siap Meningkatkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-cyan-200">Prestasi Belajar</span> Anda?</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto text-blue-100 reveal performance-optimized">Bergabunglah dengan ribuan siswa lainnya dan rasakan pengalaman belajar yang berbeda dengan EduQuiz.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 reveal performance-optimized">
                <button class="btn-primary text-white font-semibold py-4 px-10 rounded-xl text-lg flex items-center justify-center mx-auto sm:mx-0 glow-effect">
                    <span>Daftar Sekarang</span>
                    <i class="fas fa-arrow-right ml-3"></i>
                </button>
                <button class="btn-secondary text-white font-semibold py-4 px-10 rounded-xl text-lg flex items-center justify-center mx-auto sm:mx-0">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    <span>Jadwalkan Demo</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">EduQuiz</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">Platform belajar interaktif dengan kuiz dan materi dari guru profesional untuk meningkatkan prestasi belajar siswa.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-600 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-pink-600 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-700 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Materi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kuiz</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Guru</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Kategori</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Matematika</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Fisika</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kimia</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Biologi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Bahasa Indonesia</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt mr-4 text-blue-500"></i>
                            <span>Jl. Pendidikan No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-phone-alt mr-4 text-blue-500"></i>
                            <span>+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-envelope mr-4 text-blue-500"></i>
                            <span>info@eduguiz.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2023 EduQuiz. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>

        // GSAP Animations
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loading screen
            setTimeout(() => {
                document.getElementById('loadingScreen').style.display = 'none';
            }, 1500);

            // Initialize GSAP animations
            gsap.registerPlugin(ScrollTrigger);

            // Optimized scroll animations with faster timing
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
                        end: 'bottom 15%',
                        toggleActions: 'play none none reverse',
                        markers: false // Set to true for debugging
                    }
                });
            });

            // Faster stagger animation for cards
            gsap.utils.toArray('.stagger-item').forEach((element, i) => {
                gsap.fromTo(element, {
                    opacity: 0,
                    y: 20
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    delay: i * 0.08,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 90%',
                        toggleActions: 'play none none reverse'
                    }
                });
            });

            // Faster counter animation
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 1500; // Reduced from 2000
                const step = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += step;
                    if (current < target) {
                        counter.textContent = Math.floor(current).toLocaleString();
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target.toLocaleString();
                    }
                };

                ScrollTrigger.create({
                    trigger: counter,
                    start: 'top 85%',
                    onEnter: () => updateCounter()
                });
            });

            // Faster progress bar animation
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const target = +bar.getAttribute('data-target');

                ScrollTrigger.create({
                    trigger: bar,
                    start: 'top 85%',
                    onEnter: () => {
                        gsap.to(bar, {
                            width: `${target}%`,
                            duration: 1,
                            ease: 'power2.out'
                        });
                    }
                });
            });

            // Create particles
            function createParticles() {
                const container = document.getElementById('particles-container');
                const particleCount = 25; // Reduced for performance

                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');

                    const size = Math.random() * 4 + 2;
                    const posX = Math.random() * 100;
                    const duration = Math.random() * 8 + 8;
                    const delay = Math.random() * 3;

                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}%`;
                    particle.style.animationDuration = `${duration}s`;
                    particle.style.animationDelay = `${delay}s`;

                    container.appendChild(particle);
                }
            }

            createParticles();

            // FAQ toggle functionality
            const faqToggles = document.querySelectorAll('.faq-toggle');
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    content.classList.toggle('active');
                    icon.classList.toggle('fa-chevron-down');
                    icon.classList.toggle('fa-chevron-up');
                });
            });

            // Header scroll effect
            window.addEventListener('scroll', function() {
                const header = document.querySelector('header');
                if (window.scrollY > 50) {
                    header.classList.add('shadow-lg');
                } else {
                    header.classList.remove('shadow-lg');
                }
            });

            // Optimized interactive card effects
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

            // Performance optimization - reduce animations when user prefers reduced motion
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                gsap.globalTimeline.timeScale(0.5);
            }
        });
    </script>
</body>
</html>
