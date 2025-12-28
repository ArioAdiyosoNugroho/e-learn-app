@extends('layouts.materi.app')
@section('content')
    @push('styles')
    @endpush


    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form action="{{ route('materi.store.step2', $materi->id) }}" id="uploadContentForm" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Konten Utama -->
                <div class="lg:col-span-8 space-y-6">
                    <!-- Pilih Jenis Konten -->
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden group hover:shadow-md transition-shadow duration-300">
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="flex items-center gap-3 mb-2 border-b border-slate-100 pb-4">
                                <div class="p-2 bg-emerald-50 text-emerald-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-800">Pilih Jenis Konten</h2>
                            </div>

                            <p class="text-sm text-slate-600 mb-6">Pilih format konten yang akan Anda tambahkan ke
                                materi ini. Anda dapat mengunggah file (PDF, PPT, DOC) atau menambahkan video melalui
                                URL.</p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Opsi File -->
                                <div class="content-type-card rounded-xl p-5 cursor-pointer" id="fileOption">
                                    <div class="flex items-start gap-4">
                                        <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-slate-800">Unggah File</h3>
                                            <p class="text-sm text-slate-500 mt-1">Unggah materi dalam bentuk file (PDF,
                                                PPT, DOC, dll). File akan dikonversi ke PDF di backend.</p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <span
                                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                                    <i class="fas fa-file-pdf text-red-500"></i> PDF
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                                    <i class="fas fa-file-powerpoint text-orange-500"></i> PPT
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                                    <i class="fas fa-file-word text-blue-500"></i> DOC
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex justify-end">
                                        <div class="flex items-center">
                                            <div class="relative">
                                                <input type="radio" name="contentType" id="fileType" class="sr-only"
                                                    checked>
                                                <div
                                                    class="w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center">
                                                    <div class="w-3 h-3 rounded-full bg-blue-600 hidden radio-dot">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Opsi Video -->
                                <div class="content-type-card rounded-xl p-5 cursor-pointer" id="videoOption">
                                    <div class="flex items-start gap-4">
                                        <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"
                                                    d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-slate-800">Video URL</h3>
                                            <p class="text-sm text-slate-500 mt-1">Tambahkan video dari platform seperti
                                                YouTube, Vimeo, atau video yang sudah dihosting.</p>
                                            <div class="flex items-center gap-2 mt-3">
                                                <span
                                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                                    <i class="fab fa-youtube text-red-600"></i> YouTube
                                                </span>
                                                <span
                                                    class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                                    <i class="fab fa-vimeo text-blue-500"></i> Vimeo
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex justify-end">
                                        <div class="flex items-center">
                                            <div class="relative">
                                                <input type="radio" name="contentType" id="videoType" class="sr-only">
                                                <div
                                                    class="w-6 h-6 rounded-full border-2 border-slate-300 flex items-center justify-center">
                                                    <div class="w-3 h-3 rounded-full bg-blue-600 hidden radio-dot">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Area Upload File (Default tampil) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden transition-all duration-300"
                        id="fileUploadArea">
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="flex items-center gap-3 mb-2 border-b border-slate-100 pb-4">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-800">Unggah File Materi</h2>
                                    <p class="text-sm text-slate-500">File akan dikonversi ke format PDF secara otomatis
                                        di backend.</p>
                                </div>
                            </div>

                            <div class="file-upload-area flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-slate-300 rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 hover:border-blue-400 transition-all relative overflow-hidden"
                                id="dropArea">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 relative z-10">
                                    <div
                                        class="mb-3 p-3 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </div>
                                    <p class="mb-1 text-sm font-medium text-slate-700">Klik untuk upload atau drag &
                                        drop</p>
                                    <p class="text-xs text-slate-400">PDF, PPT, DOC, TXT (Max. 10MB)</p>
                                    <p class="text-xs text-blue-500 font-medium mt-2">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Rekomendasi: Upload file PDF untuk hasil terbaik
                                    </p>
                                </div>
                                <input type="file" id="fileInput" class="hidden"
                                    accept=".pdf,.ppt,.pptx,.doc,.docx,.txt" />
                            </div>

                            <!-- Preview File yang diupload -->
                            <div id="filePreview" class="hidden">
                                <h3 class="text-sm font-medium text-slate-700 mb-3">File Terpilih</h3>
                                <div
                                    class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <i class="fas fa-file-pdf text-blue-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-slate-800" id="fileName">materi-aljabar.pdf</h4>
                                            <p class="text-xs text-slate-500" id="fileSize">2.4 MB</p>
                                        </div>
                                    </div>
                                    <button type="button" id="removeFile"
                                        class="text-red-500 hover:text-red-700 p-2 rounded-full hover:bg-red-50">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Area Input Video URL (Awalnya tersembunyi) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden transition-all duration-300 hidden"
                        id="videoUrlArea">
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="flex items-center gap-3 mb-2 border-b border-slate-100 pb-4">
                                <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round"
                                            d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-800">URL Video</h2>
                                    <p class="text-sm text-slate-500">Tambahkan URL video dari platform yang didukung.
                                    </p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">URL Video</label>
                                <div class="flex items-center gap-2">
                                    <input type="url" name="video_url" id="videoUrl"
                                        value="{{ old('video_url', $materi->video_url) }}"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"
                                        placeholder="https://www.youtube.com/watch?v=...">

                                    <button type="button"
                                        class="px-4 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition-colors whitespace-nowrap">
                                        <i class="fas fa-link mr-2"></i>Review
                                    </button>
                                </div>
                                <p class="text-xs text-slate-500 mt-2">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Didukung: YouTube, Vimeo, video MP4 langsung
                                </p>
                            </div>

                            <!-- Preview Video -->
                            <div id="videoPreview" class="hidden">
                                <h3 class="text-sm font-medium text-slate-700 mb-3">Preview Video</h3>
                                <div class="bg-slate-900 rounded-xl overflow-hidden shadow-inner">
                                    <div class="aspect-video flex items-center justify-center text-white"
                                        id="videoPreviewContainer">
                                        <div class="text-center p-4">
                                            <i class="fas fa-play-circle text-5xl mb-3 opacity-80"></i>
                                            <p class="text-sm">Video akan tampil di sini setelah URL divalidasi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4 space-y-6">

                    <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-6 top-24">

                        <div class="w-full bg-slate-100 rounded-full h-2 mb-8 overflow-hidden">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-500 ease-out"
                                style="width: 30%"></div>
                        </div>

                        <div class="space-y-3">

                            <!-- Baris Atas -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Tombol Kembali -->
                                <button type="submit" name="action" value="back"
                                    class="group w-full py-3.5 px-4 bg-white border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor"
                                        class="w-4 h-4 group-hover:-translate-x-1 transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                    </svg>
                                    <span>Kembali</span>
                                </button>

                                <!-- Tombol Lanjut -->
                                <button type="submit" name="action" value="next"
                                    class="group w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <span>Lanjut</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor"
                                        class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Tombol Simpan Draft -->
                            <button type="button"
                                class="w-full py-3.5 px-4 bg-white border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                </svg>
                                <span>Simpan Draft</span>
                            </button>

                        </div>

                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-6">
                        <h3
                            class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2">
                            Pengaturan</h3>

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-slate-700">Materi Premium</span>
                                <span class="text-xs text-slate-400">Hanya untuk member berbayar</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-slate-700">Komentar</span>
                                <span class="text-xs text-slate-400">Izinkan siswa berdiskusi</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" checked>
                                <div
                                    class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="bg-indigo-50/50 rounded-2xl p-5 border border-indigo-100">
                        <div class="flex items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>
                            <span class="font-semibold text-indigo-900 text-sm">Tips Efektif</span>
                        </div>
                        <ul class="space-y-2 text-xs font-medium text-indigo-800/80">
                            <li class="flex gap-2">
                                <span class="text-indigo-400">•</span>
                                Gunakan judul yang memancing rasa ingin tahu.
                            </li>
                            <li class="flex gap-2">
                                <span class="text-indigo-400">•</span>
                                Rasio gambar 16:9 paling optimal.
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </form>
    </main>
    @push('scripts')
    @endpush
@endsection
