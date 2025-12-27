<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::with('category')->latest()->get();
        return view('page.materi', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('materi.materi-step-1', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:5120', // 5MB
            'video_url' => 'nullable|url',
            'topic' => 'nullable|string|max:255',
            'allow_comments' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        // Cek jika slug sudah ada
        while (Materi::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle file uploads
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('materi/cover', 'public');
        }

        $pdfFilePath = null;
        if ($request->hasFile('pdf_file')) {
            $pdfFilePath = $request->file('pdf_file')->store('materi/pdf', 'public');
        }

        // Buat data materi
        $materiData = [
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'guru_id' => Auth::id(),
            'cover_image' => $coverImagePath,
            'pdf_file' => $pdfFilePath,
            'video_url' => $request->video_url,
            'topic' => $request->topic,
            'allow_comments' => $request->has('allow_comments'),
            'status' => $request->status,
            'published_at' => $request->status === 'published'
                ? ($request->published_at ?? now())
                : null,
        ];

        // Simpan materi
        Materi::create($materiData);

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        $materi->load('category', 'guru');
        return view('materi.materi-step-3', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        $categories = Category::all();
        return view('page.materi.edit', compact('materi', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:5120',
            'video_url' => 'nullable|url',
            'topic' => 'nullable|string|max:255',
            'allow_comments' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        // Update slug jika title berubah
        if ($request->title !== $materi->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Materi::where('slug', $slug)->where('id', '!=', $materi->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $materi->slug = $slug;
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Hapus cover image lama jika ada
            if ($materi->cover_image) {
                Storage::disk('public')->delete($materi->cover_image);
            }
            $materi->cover_image = $request->file('cover_image')->store('materi/cover', 'public');
        }

        // Handle PDF file upload
        if ($request->hasFile('pdf_file')) {
            // Hapus PDF lama jika ada
            if ($materi->pdf_file) {
                Storage::disk('public')->delete($materi->pdf_file);
            }
            $materi->pdf_file = $request->file('pdf_file')->store('materi/pdf', 'public');
        }

        // Update fields lainnya
        $materi->title = $request->title;
        $materi->description = $request->description;
        $materi->category_id = $request->category_id;
        $materi->video_url = $request->video_url;
        $materi->topic = $request->topic;
        $materi->allow_comments = $request->has('allow_comments');
        $materi->status = $request->status;

        // Update published_at berdasarkan status
        if ($request->status === 'published' && !$materi->published_at) {
            $materi->published_at = $request->published_at ?? now();
        } elseif ($request->status === 'draft') {
            $materi->published_at = null;
        } else {
            $materi->published_at = $request->published_at;
        }

        $materi->save();

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        // Hapus file dari storage jika ada
        if ($materi->cover_image) {
            Storage::disk('public')->delete($materi->cover_image);
        }

        if ($materi->pdf_file) {
            Storage::disk('public')->delete($materi->pdf_file);
        }

        $materi->delete();

        return redirect()->route('materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }

    /**
     * Increment view count
     */
    public function incrementViews(Materi $materi)
    {
        $materi->increment('views');
        return response()->json(['views' => $materi->views]);
    }
}
