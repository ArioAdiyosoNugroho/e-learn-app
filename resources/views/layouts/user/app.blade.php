<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('tamp/asset/logo/logo.png') }}" rel="shortcut icon">
    <title>EduQuiz | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
    <link rel="stylesheet" href="{{ asset('tamp/css/main.css') }}">
    @stack('styles')
</head>

<body class="bg-gray-50 antialiased">
    <div id="loadingScreen" class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center">
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_usmfx6bp.json" background="transparent"
            speed="1" style="width:400px; height:300px;" loop autoplay>
        </lottie-player>
        <p class="mt-5 text-gray-600 text-lg animate-bounce">Memuat pengalaman belajar terbaik...</p>
    </div>

    <!-- Header -->
    <x-header></x-header>

    <!-- Main Content -->
    @yield('content')
    {{-- End Main Content --}}

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">EduQuiz</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">Platform belajar interaktif dengan kuiz dan materi dari guru
                        profesional untuk meningkatkan prestasi belajar siswa.</p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-600 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-pink-600 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-700 transition-colors">
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
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Bahasa Indonesia</a>
                        </li>
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


    <script src="{{ asset('tamp/js/main.js') }}"></script>
    @stack('script')
</body>

</html>

