@extends('layouts.materi.app')
@section('content')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form id="createMaterialForm">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <div class="lg:col-span-8 space-y-6">

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden group hover:shadow-md transition-shadow duration-300">
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="flex items-center gap-3 mb-2 border-b border-slate-100 pb-4">
                                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-800">Detail Materi</h2>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Judul Materi</label>
                                <input type="text" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium" placeholder="Contoh: Pengantar Fisika Kuantum">
                                <div class="flex justify-end mt-1.5">
                                    <span class="text-xs text-slate-400 font-medium">0/100 karakter</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Deskripsi Singkat</label>
                                <textarea rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all resize-none" placeholder="Jelaskan ringkasan materi apa yang akan dipelajari..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="flex items-center gap-3 mb-2 border-b border-slate-100 pb-4">
                                <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-bold text-slate-800">Kategori & Topik</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Kategori Utama</label>
                                    <div class="relative">
                                        <select class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 appearance-none cursor-pointer">
                                            <option>Pilih Kategori...</option>
                                            <option>Matematika</option>
                                            <option>Sains</option>
                                            <option>Bahasa</option>
                                            <option>Teknologi</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Topik Spesifik</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" placeholder="Misal: Aljabar Linear">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="p-6 md:p-8">
                             <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-orange-50 text-orange-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-slate-800">Sampul Materi</h2>
                                    <p class="text-sm text-slate-500">Gambar yang menarik perhatian siswa.</p>
                                </div>
                            </div>

                            <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-slate-300 rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 hover:border-blue-400 transition-all group relative overflow-hidden">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 relative z-10">
                                    <div class="mb-3 p-3 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                    </div>
                                    <p class="mb-1 text-sm font-medium text-slate-700">Klik untuk upload atau drag & drop</p>
                                    <p class="text-xs text-slate-400">PNG, JPG (Max. 5MB)</p>
                                </div>
                                <input type="file" class="hidden" />
                            </label>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-4 space-y-6">

                    <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-6 top-24">
                        <div class="flex justify-between items-end mb-4">
                            <div>
                                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Kelengkapan</h3>
                            </div>
                            <span class="text-2xl font-bold text-blue-600">30%</span>
                        </div>

                        <div class="w-full bg-slate-100 rounded-full h-2 mb-8 overflow-hidden">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-500 ease-out" style="width: 30%"></div>
                        </div>

                        <div class="space-y-3">
                            <a href="materi-step-2.html" type="button" class="group w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <span>Lanjut ke Konten</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>

                            <button type="button" class="w-full py-3.5 px-4 bg-white border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                </svg>
                                <span>Simpan Draft</span>
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-6">
                        <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2">Pengaturan</h3>

                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-slate-700">Materi Premium</span>
                                <span class="text-xs text-slate-400">Hanya untuk member berbayar</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                             <div class="flex flex-col">
                                <span class="text-sm font-semibold text-slate-700">Komentar</span>
                                <span class="text-xs text-slate-400">Izinkan siswa berdiskusi</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>

                    <div class="bg-indigo-50/50 rounded-2xl p-5 border border-indigo-100">
                        <div class="flex items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
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
    
@endsection
