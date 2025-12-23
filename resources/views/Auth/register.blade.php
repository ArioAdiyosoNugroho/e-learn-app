<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EduQuiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        accent: '#06b6d4',
                        dark: '#1e293b',
                        light: '#f8fafc',
                    },
                    animation: {
                        'pulse-delay-2000': 'pulse 2s ease-in-out 2s infinite',
                        'pulse-delay-4000': 'pulse 2s ease-in-out 4s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'slide-in': 'slideIn 0.8s ease-out forwards',
                        'bounce-in': 'bounceIn 0.6s ease-out forwards',
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        slideIn: {
                            from: {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            to: {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        bounceIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'scale(0.8)'
                            },
                            '60%': {
                                opacity: '1',
                                transform: 'scale(1.05)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'scale(1)'
                            }
                        },
                        fadeIn: {
                            from: {
                                opacity: '0'
                            },
                            to: {
                                opacity: '1'
                            }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }

        @keyframes pulse-glow {
            from {
                box-shadow: 0 0 20px rgba(37, 99, 235, 0.5);
            }

            to {
                box-shadow: 0 0 30px rgba(37, 99, 235, 0.8);
            }
        }

        .typewriter {
            overflow: hidden;
            border-right: .15em solid #2563eb;
            white-space: nowrap;
            margin: 0 auto;
            animation:
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50%': {
                border-color: #2563eb;
            }
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn-hover {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-card:hover {
            transform: translateY(-3px);
        }

        .role-card.selected {
            border-color: #2563eb;
            background-color: rgba(37, 99, 235, 0.05);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.1);
        }

        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .step-indicator.active {
            background-color: #2563eb;
            color: white;
            box-shadow: 0 0 0 8px rgba(37, 99, 235, 0.2);
        }

        .step-indicator.completed {
            background-color: #10b981;
            color: white;
        }

        .step-indicator.inactive {
            background-color: #e5e7eb;
            color: #9ca3af;
        }

        .step-indicator .step-number {
            font-size: 14px;
        }

        .step-indicator.completed .step-number {
            display: none;
        }

        .step-indicator.completed:after {
            content: "✓";
            font-size: 16px;
        }

        .step-line {
            height: 2px;
            flex-grow: 1;
            background-color: #e5e7eb;
            transition: all 0.3s ease;
        }

        .step-line.completed {
            background-color: #10b981;
        }

        .step-line.active {
            background-color: #2563eb;
        }

        .step-content {
            display: none;
            animation: fadeIn 0.5s ease-out forwards;
        }

        .step-content.active {
            display: block;
        }

        .password-strength {
            height: 6px;
            border-radius: 3px;
            margin-top: 4px;
            overflow: hidden;
        }

        .strength-weak {
            background-color: #ef4444;
            width: 25%;
        }

        .strength-medium {
            background-color: #f59e0b;
            width: 50%;
        }

        .strength-good {
            background-color: #3b82f6;
            width: 75%;
        }

        .strength-strong {
            background-color: #10b981;
            width: 100%;
        }

        .form-step {
            min-height: 420px;
        }

        .slide-in-right {
            animation: slideInRight 0.5s ease-out forwards;
        }

        .slide-in-left {
            animation: slideInLeft 0.5s ease-out forwards;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse-delay-2000">
        </div>
        <div
            class="absolute top-40 left-1/2 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse-delay-4000">
        </div>
    </div>

    <!-- Main Container -->
    <div class="w-screen h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-2 h-full">

            <!-- Left Panel - Brand & Features -->
            <div
                class="relative hidden lg:flex flex-col justify-center items-center h-full w-full text-white bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-800 overflow-hidden">

                <div class="absolute inset-0 z-0">
                    <div
                        class="absolute -top-20 -left-20 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
                    </div>
                    <div
                        class="absolute -bottom-32 -right-32 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
                    </div>
                </div>

                <div class="relative z-10 flex flex-col items-center justify-center p-12 text-center w-full max-w-5xl">
                    <div class="w-full mb-8 transform hover:scale-105 transition-transform duration-500 ease-in-out">
                        <dotlottie-wc src="https://lottie.host/b4c12aa2-801c-429a-968b-20a41db17a85/EMe4JMplYw.lottie"
                            style="width: 100%; height: auto;" autoplay loop>
                        </dotlottie-wc>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-center space-x-3 mb-2">
                            <div
                                class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20">
                                <img src="{{ asset('tamp/asset/logo/logo.png') }}" alt="Logo"
                                    class="w-10 object-contain">
                            </div>
                            <h1 class="text-4xl font-bold tracking-tight text-white">EduQuiz</h1>
                        </div>

                        <p class="text-lg text-blue-100/80 font-light tracking-wide max-w-sm mx-auto">
                            Platform belajar interaktif masa depan.
                        </p>
                    </div>
                </div>

                <div class="absolute bottom-0 w-full h-24 bg-gradient-to-t from-indigo-900/50 to-transparent"></div>
            </div>

            <!-- Right Panel - Register Form -->
            <div
                class="relative bg-white flex items-center justify-center h-full z-10
                lg:-ml-[3rem]
                lg:rounded-l-[3rem]
                lg:shadow-[-20px_0_50px_rgba(0,0,0,0.12)]">

                <div
                    class="
                w-full
                max-w-md
                sm:max-w-lg
                lg:max-w-xl
                xl:max-w-2xl
                2xl:max-w-3xl
                px-6
                sm:px-8
                lg:px-12">

                    <!-- Progress Steps -->
                    <div class="mb-10">
                        <div class="flex items-center justify-between mb-6">
                            <!-- Step 1 -->
                            <div class="flex flex-col items-center">
                                <div class="step-indicator active" id="step-1-indicator">
                                    <span class="step-number">1</span>
                                </div>
                                <span class="text-xs font-medium mt-2 text-primary-600">Data Diri</span>
                            </div>

                            <!-- Line between step 1 and 2 -->
                            <div class="step-line flex-grow mx-2" id="step-1-2-line"></div>

                            <!-- Step 2 -->
                            <div class="flex flex-col items-center">
                                <div class="step-indicator inactive" id="step-2-indicator">
                                    <span class="step-number">2</span>
                                </div>
                                <span class="text-xs font-medium mt-2 text-gray-500">Peran</span>
                            </div>

                            <!-- Line between step 2 and 3 -->
                            <div class="step-line flex-grow mx-2" id="step-2-3-line"></div>

                            <!-- Step 3 -->
                            <div class="flex flex-col items-center">
                                <div class="step-indicator inactive" id="step-3-indicator">
                                    <span class="step-number">3</span>
                                </div>
                                <span class="text-xs font-medium mt-2 text-gray-500">Keamanan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Header -->
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gray-800 mb-3" id="step-title">Data Diri</h3>
                        <p class="text-gray-600" id="step-description">Isi informasi dasar Anda untuk memulai</p>
                    </div>

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registerForm">
                        @csrf

                        <!-- Step 1: Data Diri -->
                        <div class="step-content active form-step" id="step-1">
                            <!-- Nama Lengkap Field -->
                            <div class="space-y-2 mb-6">
                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-user-circle mr-2 text-primary-600"></i>
                                    Nama Lengkap
                                </label>
                                <div class="relative">
                                    <input type="text" name="name" required
                                        class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-200 input-focus"
                                        placeholder="Masukkan nama lengkap Anda" id="name">
                                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-check-circle text-green-500 opacity-0 transition-opacity duration-300"
                                            id="name-valid"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Nama lengkap akan ditampilkan di profil Anda</p>
                            </div>

                            <!-- Username Field -->
                            <div class="space-y-2 mb-6">
                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-at mr-2 text-primary-600"></i>
                                    Username
                                </label>
                                <div class="relative">
                                    <input type="text" name="username" required
                                        class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-200 input-focus"
                                        placeholder="Pilih username unik" id="username">
                                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-check-circle text-green-500 opacity-0 transition-opacity duration-300"
                                            id="username-valid"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Hanya huruf, angka, dan underscore (_)</p>
                            </div>

                            <!-- Email Field -->
                            <div class="space-y-2 mb-8">
                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-envelope mr-2 text-primary-600"></i>
                                    Email (Opsional)
                                </label>
                                <div class="relative">
                                    <input type="email" name="email"
                                        class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-200 input-focus"
                                        placeholder="nama@contoh.com" id="email">
                                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-check-circle text-green-500 opacity-0 transition-opacity duration-300"
                                            id="email-valid"></i>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Email diperlukan untuk pemulihan akun</p>
                            </div>

                            <!-- Navigation Buttons for Step 1 -->
                            <div class="flex justify-end pt-4">
                                <button type="button"
                                    class="py-3 px-8 text-white font-semibold rounded-xl shadow-lg btn-hover transition-all duration-300 flex items-center justify-center group relative overflow-hidden next-step"
                                    data-next="2">
                                    <span class="relative z-10 flex items-center">
                                        <span>Selanjutnya</span>
                                        <i class="fas fa-arrow-right ml-3"></i>
                                    </span>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-primary-700 to-primary-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Pilih Peran -->
                        <div class="step-content form-step" id="step-2">
                            <!-- Role Selection -->
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="role-card border-2 border-gray-200 rounded-2xl p-6 text-center transition-all duration-300 h-full flex flex-col"
                                        id="role-siswa">
                                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-graduation-cap text-2xl text-green-600"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-800 mb-2 text-lg">Siswa</h4>
                                        <p class="text-sm text-gray-600 mb-4 flex-grow">Saya ingin mengerjakan kuis, belajar, dan memantau progres belajar saya</p>
                                        <div class="mt-4">
                                            <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Pilihan Populer</span>
                                        </div>
                                        <input type="radio" name="role" value="siswa" class="hidden" checked>
                                    </div>

                                    <div class="role-card border-2 border-gray-200 rounded-2xl p-6 text-center transition-all duration-300 h-full flex flex-col"
                                        id="role-guru">
                                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-chalkboard-teacher text-2xl text-blue-600"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-800 mb-2 text-lg">Guru</h4>
                                        <p class="text-sm text-gray-600 mb-4 flex-grow">Saya ingin membuat kuis, mengelola kelas, dan memantau perkembangan siswa</p>
                                        <div class="mt-4">
                                            <span class="inline-block bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Untuk Pendidik</span>
                                        </div>
                                        <input type="radio" name="role" value="guru" class="hidden">
                                    </div>
                                </div>

                                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mt-4">
                                    <div class="flex items-start">
                                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                        <div>
                                            <p class="text-sm text-blue-800">
                                                <span class="font-medium">Perhatian:</span> Anda dapat mengubah peran nanti dengan menghubungi admin, namun beberapa fitur mungkin terbatas berdasarkan peran yang dipilih.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Buttons for Step 2 -->
                            <div class="flex justify-between pt-8">
                                <button type="button"
                                    class="py-3 px-8 text-gray-700 font-semibold rounded-xl border-2 border-gray-300 hover:border-gray-400 transition-all duration-300 flex items-center justify-center prev-step"
                                    data-prev="1">
                                    <i class="fas fa-arrow-left mr-3"></i>
                                    <span>Kembali</span>
                                </button>

                                <button type="button"
                                    class="py-3 px-8 text-white font-semibold rounded-xl shadow-lg btn-hover transition-all duration-300 flex items-center justify-center group relative overflow-hidden next-step"
                                    data-next="3">
                                    <span class="relative z-10 flex items-center">
                                        <span>Selanjutnya</span>
                                        <i class="fas fa-arrow-right ml-3"></i>
                                    </span>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-primary-700 to-primary-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Keamanan Akun -->
                        <div class="step-content form-step" id="step-3">
                            <div class="space-y-6">
                                <!-- Password Field -->
                                <div class="space-y-2 mb-6">
                                    <label class="text-sm font-medium text-gray-700 flex items-center">
                                        <i class="fas fa-lock mr-2 text-primary-600"></i>
                                        Kata Sandi
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="password" required
                                            class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-200 input-focus pr-12"
                                            placeholder="Minimal 6 karakter" id="password">
                                        <button type="button"
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                            id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <!-- Password Strength Meter -->
                                    <div class="password-strength hidden" id="password-strength">
                                        <div class="strength-weak" id="strength-bar"></div>
                                    </div>
                                    <div class="text-xs text-gray-500" id="password-hint"></div>
                                </div>

                                <!-- Password Confirmation Field -->
                                <div class="space-y-2 mb-6">
                                    <label class="text-sm font-medium text-gray-700 flex items-center">
                                        <i class="fas fa-lock mr-2 text-primary-600"></i>
                                        Konfirmasi Kata Sandi
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="password_confirmation" required
                                            class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition duration-200 input-focus pr-12"
                                            placeholder="Ulangi kata sandi" id="password-confirmation">
                                        <button type="button"
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                            id="togglePasswordConfirmation">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="text-xs text-gray-500" id="password-match"></div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="flex items-start mb-6">
                                    <input type="checkbox" id="terms" name="terms" required
                                        class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500 mt-1">
                                    <label for="terms" class="ml-3 text-sm text-gray-700">
                                        Saya setuju dengan
                                        <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Syarat & Ketentuan</a>
                                        dan
                                        <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Kebijakan Privasi</a>
                                        EduQuiz
                                    </label>
                                </div>

                                <!-- Password Tips -->
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                                    <h5 class="font-medium text-gray-800 mb-2 flex items-center">
                                        <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                                        Tips Kata Sandi yang Aman:
                                    </h5>
                                    <ul class="text-xs text-gray-600 space-y-1">
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                            <span>Gunakan minimal 8 karakter</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                            <span>Kombinasikan huruf besar dan kecil</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                            <span>Sertakan angka dan simbol</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                            <span>Hindari informasi pribadi yang mudah ditebak</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Navigation Buttons for Step 3 -->
                            <div class="flex justify-between pt-8">
                                <button type="button"
                                    class="py-3 px-8 text-gray-700 font-semibold rounded-xl border-2 border-gray-300 hover:border-gray-400 transition-all duration-300 flex items-center justify-center prev-step"
                                    data-prev="2">
                                    <i class="fas fa-arrow-left mr-3"></i>
                                    <span>Kembali</span>
                                </button>

                                <button type="submit"
                                    class="py-3 px-8 text-white font-semibold rounded-xl shadow-lg btn-hover transition-all duration-300 flex items-center justify-center group relative overflow-hidden"
                                    id="registerButton">
                                    <span class="relative z-10 flex items-center">
                                        <i class="fas fa-user-plus mr-3"></i>
                                        <span id="registerText">Buat Akun</span>
                                        <i class="fas fa-spinner fa-spin ml-3 hidden" id="loadingIcon"></i>
                                    </span>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-primary-700 to-primary-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Login Prompt -->
                    <div class="text-center mt-8 pt-6 border-t border-gray-200">
                        <p class="text-gray-600 text-sm">
                            Sudah punya akun?
                            <a href="{{ route('login') }}"
                                class="text-primary-600 font-medium hover:text-primary-700 ml-1 transition-colors">Masuk di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div id="toast"
        class="fixed top-4 -right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-2">
            <i class="fas fa-check-circle"></i>
            <span id="toast-message">Registrasi berhasil! Mengarahkan...</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const registerForm = document.getElementById('registerForm');
            const nameInput = document.getElementById('name');
            const usernameInput = document.getElementById('username');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password-confirmation');
            const togglePasswordBtn = document.getElementById('togglePassword');
            const togglePasswordConfirmBtn = document.getElementById('togglePasswordConfirmation');
            const registerButton = document.getElementById('registerButton');
            const loadingIcon = document.getElementById('loadingIcon');
            const nameValidIcon = document.getElementById('name-valid');
            const usernameValidIcon = document.getElementById('username-valid');
            const emailValidIcon = document.getElementById('email-valid');
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            const passwordStrength = document.getElementById('password-strength');
            const strengthBar = document.getElementById('strength-bar');
            const passwordHint = document.getElementById('password-hint');
            const passwordMatch = document.getElementById('password-match');
            const stepTitle = document.getElementById('step-title');
            const stepDescription = document.getElementById('step-description');

            // Step management
            let currentStep = 1;
            const totalSteps = 3;

            // Role selection
            const roleCards = document.querySelectorAll('.role-card');
            let selectedRole = 'siswa'; // Default value

            // Initialize role selection
            document.getElementById('role-siswa').classList.add('selected');

            // Toggle password visibility
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            togglePasswordConfirmBtn.addEventListener('click', function() {
                const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            // Name validation
            nameInput.addEventListener('input', function() {
                if (this.value.length >= 2) {
                    nameValidIcon.classList.add('opacity-100');
                } else {
                    nameValidIcon.classList.remove('opacity-100');
                }
            });

            // Username validation
            usernameInput.addEventListener('input', function() {
                const username = this.value;
                const usernameRegex = /^[a-zA-Z0-9_]+$/;

                if (username.length >= 3 && usernameRegex.test(username)) {
                    usernameValidIcon.classList.add('opacity-100');
                } else {
                    usernameValidIcon.classList.remove('opacity-100');
                }
            });

            // Email validation
            emailInput.addEventListener('input', function() {
                const email = this.value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email === '' || emailRegex.test(email)) {
                    emailValidIcon.classList.add('opacity-100');
                } else {
                    emailValidIcon.classList.remove('opacity-100');
                }
            });

            // Password strength checker
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                checkPasswordStrength(password);
                checkPasswordMatch();
            });

            // Password confirmation check
            passwordConfirmInput.addEventListener('input', checkPasswordMatch);

            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = passwordConfirmInput.value;

                if (confirmPassword === '') {
                    passwordMatch.textContent = '';
                    return;
                }

                if (password === confirmPassword) {
                    passwordMatch.innerHTML = '<i class="fas fa-check-circle text-green-500 mr-1"></i> Kata sandi cocok';
                    passwordMatch.classList.remove('text-red-500');
                    passwordMatch.classList.add('text-green-500');
                } else {
                    passwordMatch.innerHTML = '<i class="fas fa-times-circle text-red-500 mr-1"></i> Kata sandi tidak cocok';
                    passwordMatch.classList.remove('text-green-500');
                    passwordMatch.classList.add('text-red-500');
                }
            }

            function checkPasswordStrength(password) {
                if (password.length === 0) {
                    passwordStrength.classList.add('hidden');
                    passwordHint.textContent = '';
                    return;
                }

                passwordStrength.classList.remove('hidden');

                let strength = 0;
                let hint = '';

                // Length check
                if (password.length >= 6) strength += 1;
                if (password.length >= 8) strength += 1;

                // Complexity checks
                if (/[a-z]/.test(password)) strength += 1;
                if (/[A-Z]/.test(password)) strength += 1;
                if (/[0-9]/.test(password)) strength += 1;
                if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

                // Determine strength level
                strengthBar.className = '';

                if (strength <= 2) {
                    strengthBar.classList.add('strength-weak');
                    hint = 'Kata sandi lemah';
                } else if (strength <= 4) {
                    strengthBar.classList.add('strength-medium');
                    hint = 'Kata sandi cukup';
                } else if (strength <= 5) {
                    strengthBar.classList.add('strength-good');
                    hint = 'Kata sandi baik';
                } else {
                    strengthBar.classList.add('strength-strong');
                    hint = 'Kata sandi sangat kuat';
                }

                passwordHint.textContent = hint;
            }

            // Role selection handling
            roleCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selected class from all cards
                    roleCards.forEach(c => {
                        c.classList.remove('selected');
                        c.querySelector('input[type="radio"]').removeAttribute('checked');
                    });

                    // Add selected class to clicked card
                    this.classList.add('selected');
                    this.querySelector('input[type="radio"]').setAttribute('checked', 'checked');

                    // Update selected role
                    selectedRole = this.querySelector('input[type="radio"]').value;
                });
            });

            // Step navigation
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = parseInt(this.getAttribute('data-next'));

                    // Validate current step before proceeding
                    if (currentStep === 1 && !validateStep1()) {
                        showErrorToast('Harap lengkapi data diri dengan benar');
                        return;
                    }

                    if (currentStep === 2 && !validateStep2()) {
                        showErrorToast('Harap pilih peran Anda');
                        return;
                    }

                    goToStep(nextStep);
                });
            });

            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = parseInt(this.getAttribute('data-prev'));
                    goToStep(prevStep);
                });
            });

            function goToStep(step) {
                // Animate out current step
                const currentStepElement = document.getElementById(`step-${currentStep}`);
                currentStepElement.classList.add('slide-out-left');

                setTimeout(() => {
                    // Hide current step
                    currentStepElement.classList.remove('active');
                    currentStepElement.classList.remove('slide-out-left');

                    // Update step indicators
                    updateStepIndicators(currentStep, step);

                    // Update current step
                    currentStep = step;

                    // Show new step with animation
                    const newStepElement = document.getElementById(`step-${step}`);
                    newStepElement.classList.add('active', 'slide-in-right');

                    // Update title and description
                    updateStepContent(step);

                    // Remove animation class after animation completes
                    setTimeout(() => {
                        newStepElement.classList.remove('slide-in-right');
                    }, 500);
                }, 300);
            }

            function updateStepIndicators(oldStep, newStep) {
                // Update step indicators
                for (let i = 1; i <= totalSteps; i++) {
                    const indicator = document.getElementById(`step-${i}-indicator`);
                    const lineBefore = document.getElementById(`step-${i-1}-${i}-line`);
                    const lineAfter = document.getElementById(`step-${i}-${i+1}-line`);

                    if (i < newStep) {
                        // Steps before current are completed
                        indicator.classList.remove('active', 'inactive');
                        indicator.classList.add('completed');

                        if (lineBefore) {
                            lineBefore.classList.remove('active');
                            lineBefore.classList.add('completed');
                        }

                        if (lineAfter) {
                            lineAfter.classList.remove('active');
                            lineAfter.classList.add('completed');
                        }
                    } else if (i === newStep) {
                        // Current step is active
                        indicator.classList.remove('completed', 'inactive');
                        indicator.classList.add('active');

                        if (lineBefore) {
                            lineBefore.classList.remove('completed');
                            lineBefore.classList.add('active');
                        }

                        if (lineAfter) {
                            lineAfter.classList.remove('completed');
                            lineAfter.classList.add('active');
                        }
                    } else {
                        // Steps after current are inactive
                        indicator.classList.remove('active', 'completed');
                        indicator.classList.add('inactive');

                        if (lineBefore) {
                            lineBefore.classList.remove('active', 'completed');
                        }

                        if (lineAfter) {
                            lineAfter.classList.remove('active', 'completed');
                        }
                    }
                }
            }

            function updateStepContent(step) {
                const stepTitles = {
                    1: 'Data Diri',
                    2: 'Pilih Peran',
                    3: 'Keamanan Akun'
                };

                const stepDescriptions = {
                    1: 'Isi informasi dasar Anda untuk memulai',
                    2: 'Pilih peran yang sesuai dengan tujuan Anda',
                    3: 'Buat kata sandi yang kuat untuk akun Anda'
                };

                stepTitle.textContent = stepTitles[step];
                stepDescription.textContent = stepDescriptions[step];
            }

            function validateStep1() {
                // Validate name
                if (nameInput.value.length < 2) {
                    nameInput.focus();
                    return false;
                }

                // Validate username
                const usernameRegex = /^[a-zA-Z0-9_]+$/;
                if (usernameInput.value.length < 3 || !usernameRegex.test(usernameInput.value)) {
                    usernameInput.focus();
                    return false;
                }

                // Validate email (optional but must be valid if provided)
                if (emailInput.value.trim() !== '') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(emailInput.value)) {
                        emailInput.focus();
                        return false;
                    }
                }

                return true;
            }

            function validateStep2() {
                // Check if a role is selected
                const selectedRoleInput = document.querySelector('input[name="role"]:checked');
                return selectedRoleInput !== null;
            }

            function validateStep3() {
                // Validate password
                if (passwordInput.value.length < 6) {
                    passwordInput.focus();
                    return false;
                }

                // Validate password confirmation
                if (passwordInput.value !== passwordConfirmInput.value) {
                    passwordConfirmInput.focus();
                    return false;
                }

                // Validate terms acceptance
                const termsCheckbox = document.getElementById('terms');
                if (!termsCheckbox.checked) {
                    termsCheckbox.focus();
                    return false;
                }

                return true;
            }

            // Form submission with animation
            registerForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validate all steps
                if (!validateStep1() || !validateStep2() || !validateStep3()) {
                    showErrorToast('Harap lengkapi semua langkah dengan benar');
                    // Go to the first step with error
                    if (!validateStep1()) goToStep(1);
                    else if (!validateStep2()) goToStep(2);
                    else goToStep(3);
                    return;
                }

                // Show loading state
                registerButton.disabled = true;
                loadingIcon.classList.remove('hidden');
                document.getElementById('registerText').textContent = 'Membuat Akun...';

                // Simulate API call delay
                setTimeout(() => {
                    // Show success toast
                    toastMessage.textContent = 'Registrasi berhasil! Mengarahkan...';
                    toast.style.backgroundColor = '#10b981';
                    toast.classList.remove('translate-x-full');

                    // Submit the actual form after a delay
                    setTimeout(() => {
                        registerForm.submit();
                    }, 1500);
                }, 2000);
            });

            // Show error toast
            function showErrorToast(message) {
                toastMessage.textContent = message;
                toast.style.backgroundColor = '#ef4444';
                toast.classList.remove('translate-x-full');

                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                }, 3000);
            }

            // Add interactive effects to inputs
            const inputs = document.querySelectorAll('input:not([type="radio"])');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-primary-200');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-primary-200');
                });
            });

            // Initialize
            updateStepIndicators(0, 1);
        });
    </script>
</body>

</html>
