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
        $materi = Materi::with('category')
        ->where('status', 'published')
        ->latest()
        ->paginate(12)
        ->get();

        return view('page.materi', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createStep1()
    {
        $categories = Category::all();

        return view('materi.create.step1', compact('categories'));
    }

    public function createStep2($id)
    {
        $materi = Materi::findOrFail($id);

        return view('materi.create.step2', compact('materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'topic' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'allow_comments' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $validated['cover_image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']).'-'.uniqid();
        $validated['guru_id'] = Auth::id();
        $validated['status'] = 'draft';

        $materi = Materi::create($validated);

        return redirect()->route('materi.create.step2', $materi->id);
    }

    public function storeStep2(Request $request, Materi $materi)
    {
        abort_if($materi->guru_id !== Auth::id(), 403, 'Unauthorized action.');

        $validated = $request->validate([
            'pdf_file' => 'nullable|mimes:pdf|max:5120',
            'video_url' => 'nullable|url',
        ]);

        if ($request->hasFile('pdf_file')) {
            $validated['pdf_file'] = $request->file('pdf_file')->store('materi-pdf', 'public');
        }
        $materi->update($validated);

        if ($request->action === 'back') {
            return redirect()->route('materi.edit.step1', $materi);
        }

        return redirect()->route('materi.preview', $materi);
    }

    public function preview(Request $request, Materi $materi)
    {
        abort_if($materi->guru_id !== Auth::id(), 403, 'Unauthorized action.');

        return view('materi.create.preview', compact('materi'));
    }

    public function publish(Request $request, Materi $materi)
    {
        abort_if($materi->guru_id !== Auth::id(), 403, 'Unauthorized action.');

        $validated = $request->validate([
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $materi->update([
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published' ? ($validated['published_at'] ?? now()) : null,
        ]);

        return redirect()->route('materi', $materi->slug)
            ->with('success', 'Materi berhasil dipublikasikan');
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

        return redirect()->route('materi')
            ->with('success', 'Materi berhasil dihapus.');
    }

    public function editStep1(Materi $materi)
    {
        abort_if($materi->guru_id !== Auth::id(), 403, 'Unauthorized action.');
        $categories = Category::all();

        return view('materi.edit.step1', compact('categories', 'materi'));
    }

    public function updateStep1(Request $request, Materi $materi)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'topic' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'allow_comments' => 'nullable|boolean',
        ]);
        if ($request->hasFile('cover_image')) {
            if ($materi->cover_image) {
                Storage::disk('public')->delete($materi->cover_image);
            }

            $path = $request->file('cover_image')->store('covers', 'public');
            $validated['cover_image'] = $path;
        } elseif ($request->has('remove_cover_image')) {
            if ($materi->cover_image) {
                Storage::delete($materi->cover_image);
            }
            $validated['cover_image'] = null;
        } elseif (! $request->hasFile('cover_image') && ! $request->has('remove_cover_image')) {
            unset($validated['cover_image']);
        }

        $materi->update($validated);

        return redirect()->route('materi.create.step2', $materi->id);
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
