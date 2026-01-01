@extends('layouts.materi.app')
@section('content')
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Utility untuk menyembunyikan scrollbar pada iframe jika perlu */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form id="publishForm" action="{{ route('materi.publish', $materi->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <div class="lg:col-span-8 space-y-6">

                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-blue-600 mt-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <div>
                            <h4 class="text-sm font-semibold text-blue-800">Mode Pratinjau</h4>
                            <p class="text-sm text-blue-600/80 mt-1">Ini adalah tampilan materi Anda yang akan dilihat
                                oleh siswa. Pastikan video/file dapat dimuat dengan benar.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">

                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-800">Preview Materi</h2>
                            </div>
                            @if ($materi->video_url)
                                <span
                                    class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold border border-slate-200">
                                    Video
                                </span>
                            @elseif ($materi->pdf_file)
                                <span
                                    class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold border border-slate-200">
                                    File PDF
                                </span>
                            @endif
                        </div>

                        <div class="p-6 md:p-8 space-y-8">

                            <div class="relative w-full rounded-2xl overflow-hidden bg-slate-900 shadow-lg group">
                                @if($materi->video_url)
                                    <div class="w-full">
                                        <div class="aspect-video w-full overflow-hidden rounded-xl border">
                                            <iframe
                                                src="{{ embedVideo($materi->video_url) }}"
                                                class="w-full h-full"
                                                frameborder="0"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                @endif

                                @if($materi->pdf_file)
                                    <div class="w-full space-y-2">

                                        {{-- Preview PDF --}}
                                        <div class="aspect-[3/4] w-full overflow-hidden rounded-xl border">
                                            <iframe
                                                src="{{ asset('storage/'.$materi->pdf_file) }}"
                                                class="w-full h-full"
                                                loading="lazy">
                                            </iframe>
                                        </div>

                                        {{-- Open in new tab --}}
                                        <div class="bg-white p-2">
                                            <a href="{{ asset('storage/'.$materi->pdf_file) }}"
                                                target="_blank"
                                                class="inline-flex items-center gap-2 px-3 py-1.5
                                                text-sm font-medium text-slate-700
                                                rounded-md
                                                hover:text-slate-900 hover:bg-slate-100
                                                transition">
                                                Buka PDF di tab baru
                                            </a>
                                        </div>
                                    </div>
                                @endif


                            </div>

                            <div class="space-y-4 border-t border-slate-100 pt-6">
                                <div>
                                    <div class="flex gap-2 mb-3">
                                        @php
                                            $style = categoryBadgeStyle($materi->category->color ?? null);
                                        @endphp

                                        <span
                                            class="inline-flex items-center rounded-md px-2 py-1 text-xs font-semibold uppercase"
                                            style="
                                                    background-color: {{ $style['background'] }};
                                                    color: {{ $style['text'] }};">
                                            {{ $materi->category->name ?? 'Tanpa Kategori' }}
                                        </span>
                                    </div>
                                    <h1 class="text-2xl md:text-3xl font-bold text-slate-900 leading-tight">
                                        {{ $materi->title }}</h1>
                                </div>

                                <div class="flex items-center gap-4 text-sm text-slate-500 border-b border-slate-100 pb-4">

                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Preview Mode</span>
                                    </div>
                                </div>

                                <div class="prose prose-slate text-slate-600 text-sm leading-relaxed max-w-none">
                                    <p>{!! nl2br(e($materi->description)) !!}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="lg:col-span-4 space-y-6">

                    <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-6 top-24">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="flex-1 h-2 rounded-full transition-all duration-500
                                {{ Route::is('materi.preview') ? 'bg-emerald-500' : 'bg-blue-600' }}">
                            </div>

                            <div class="flex-1 h-2 rounded-full transition-all duration-500
                                {{ Route::is('materi.preview') ? 'bg-emerald-500' : (Route::is('materi.create.step2') ? 'bg-blue-600' : 'bg-slate-200') }}">
                            </div>

                            <div class="flex-1 h-2 rounded-full transition-all duration-500
                                {{ Route::is('materi.preview') ? 'bg-emerald-500 shadow-sm shadow-emerald-200' : 'bg-slate-200' }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <a href="{{ route('materi.create.step2', $materi->id) }}"
                                class="flex items-center justify-center gap-2 py-3.5 px-4 bg-white border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                </svg>
                                <span>Kembali</span>
                            </a>
                            <input type="hidden" name="status" value="published">
                            <button type="submit" name="action" value="published"
                                class="flex items-center justify-center gap-2 py-3.5 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg shadow-green-500/30 transition-all transform hover:-translate-y-0.5">
                                <span>Publish</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </button>
                        </div>


                        <!-- Tombol Simpan Draft -->
                        <div
                            class="w-full py-3 px-4 bg-yellow-50 border border-yellow-200
           text-yellow-800 rounded-xl flex items-center gap-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>
                                Materi ini masih <strong>tersimpan sebagai draft</strong>
                            </span>
                        </div>

                    </div>

                    <div class="bg-indigo-50/50 rounded-2xl p-5 border border-indigo-100">
                        <div class="flex items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-indigo-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <span class="font-semibold text-indigo-900 text-sm">Cek Terakhir</span>
                        </div>
                        <ul class="space-y-2 text-xs font-medium text-indigo-800/80">
                            <li class="flex gap-2">
                                <span class="text-indigo-400">✓</span>
                                Pastikan video tidak privat.
                            </li>
                            <li class="flex gap-2">
                                <span class="text-indigo-400">✓</span>
                                Cek penulisan judul dan deskripsi.
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </form>
    </main>
@endsection
