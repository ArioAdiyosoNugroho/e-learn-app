<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('tamp/asset/logo/logo.png') }}" rel="shortcut icon">
    <title>EduQuiz | Buat Materi Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('tamp/css/addmateri.css') }}">
    <script src="{{ asset('tamp/js/addmateri.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('tamp/css/materi.css') }}">
    <script src="{{ asset('tamp/js/materi.js') }}"></script>
    @stack('styles')
    @stack('scripts')
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-blue-100 selection:text-blue-700">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-4">
                    <a href="{{ route('materi') }}" class="group p-2 rounded-full hover:bg-slate-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-500 group-hover:text-slate-800 transition-colors">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-base font-bold text-slate-900 leading-none">Buat Materi</h1>
                        <p class="text-xs text-slate-500 mt-1 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                            Tersimpan otomatis
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('materi') }}" class="text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 px-4 py-2 rounded-lg transition-colors">Batal</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</body>
</html>
