@extends('layouts.materi.app')

@section('content')
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc; /* Slate 50 */
    }
    .video-container iframe {
        border-radius: 1rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    /* Custom scrollbar untuk kenyamanan pembaca */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <div class="lg:col-span-8 space-y-8">

            <nav class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                <a href="#" class="hover:text-blue-600 transition">Kursus Saya</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-slate-900 font-medium truncate">{{ $materi->title }}</span>
            </nav>

            <section class="bg-white rounded-3xl shadow-sm border border-slate-200/60 overflow-hidden">
                @if($materi->video_url)
                    <div class="p-2">
                        <div class="aspect-video w-full video-container overflow-hidden rounded-2xl bg-black">
                            <iframe
                                src="{{ embedVideo($materi->video_url) }}"
                                class="w-full h-full"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endif

              @if($materi->pdf_file)
                    <div class="p-2">
                        <div class="w-full h-[600px] md:h-[850px] rounded-2xl border border-slate-100 overflow-hidden bg-slate-50 shadow-inner">
                            <iframe
                                src="{{ asset('storage/'.$materi->pdf_file) }}#toolbar=0"
                                class="w-full h-full"
                                loading="lazy">
                            </iframe>
                        </div>

                        <div class="p-4 flex justify-between items-center bg-slate-50 mt-2 rounded-xl border border-slate-200">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">Modul Belajar.pdf</p>
                                    <p class="text-xs text-slate-500 italic">Scroll ke bawah di dalam kotak untuk membaca lebih lanjut</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/'.$materi->pdf_file) }}" target="_blank"
                               class="px-4 py-2 text-sm font-bold text-blue-600 bg-white border border-blue-100 shadow-sm hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-300">
                                Buka Layar Penuh
                            </a>
                        </div>
                    </div>
                @endif
            </section>

            <section class="space-y-6">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        @php $style = categoryBadgeStyle($materi->category->color ?? null); @endphp
                        <span class="px-3 py-1 text-[10px] font-bold tracking-wider uppercase rounded-full"
                              style="background-color: {{ $style['background'] }}; color: {{ $style['text'] }};">
                            {{ $materi->category->name ?? 'Materi' }}
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        {{ $materi->title }}
                    </h1>
                </div>

                <div class="prose prose-slate max-w-none">
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Tentang Materi Ini</h3>
                    <div class="text-slate-600 leading-relaxed text-lg">
                        {!! nl2br(e($materi->description)) !!}
                    </div>
                </div>
            </section>
        </div>

        <div class="lg:col-span-4 space-y-6">

            <div class="sticky top-10 space-y-6">

                <div class="bg-white rounded-3xl shadow-sm border border-slate-200/60 p-6">
                    <h4 class="text-sm font-bold text-slate-900 mb-4 uppercase tracking-widest">Progress Belajar</h4>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-500 font-medium">Status</span>
                            <span class="px-2 py-1 bg-amber-50 text-amber-600 rounded-md text-xs font-bold uppercase">Sedang Dipelajari</span>
                        </div>

                        <button class="w-full py-4 px-6 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 transition-all flex items-center justify-center gap-2 group">
                            <span>Selesai Belajar</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="bg-indigo-900 rounded-3xl p-6 text-white overflow-hidden relative">
                    <div class="relative z-10 text-sm opacity-80 mb-2 font-medium">Instruktur</div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div class="w-12 h-12 rounded-full bg-indigo-500 border-2 border-indigo-400 flex items-center justify-center font-bold text-lg">
                            {{ substr($materi->user->name ?? 'A', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-lg leading-tight">{{ $materi->user->name ?? 'Administrator' }}</p>
                            <p class="text-xs text-indigo-300">Expert Mentor</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-indigo-800 rounded-full blur-2xl opacity-50"></div>
                </div>

                <div class="bg-slate-100/50 rounded-2xl p-5 border border-dashed border-slate-300">
                    <p class="text-xs text-slate-500 text-center italic">
                        "Punya pertanyaan mengenai materi di atas? Silahkan hubungi instruktur melalui kolom diskusi atau grup komunitas."
                    </p>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
