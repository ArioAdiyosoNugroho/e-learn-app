<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzez = Quiz::where('guru_id', Auth::id())
        ->with('materi')
        ->latest()
        ->get();
        return view('page.quiz',compact('quizzez'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi = Materi::where('guru_id', Auth::id())->get();
        return view('quiz.create',compact('materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'materi_id'     => 'required|exists:materis,id',
            'time_limit'    => 'nullable|integer|min:1',
            'passing_score' => 'nullable|integer|min:0|max:100',
        ]);

        $data['guru_id'] = Auth::id();
        $data['is_active'] = false;

        $quiz = Quiz::create($data);

        return redirect()
            ->route('quiz.questions', $quiz)
            ->with('success', 'Quiz berhasil dibuat. Silakan tambahkan soal.');
    }

    public function edit(Quiz $quiz)
    {
        abort_if($quiz->guru_id !== Auth::id(), 403);

        $materis = Materi::where('guru_id', Auth::id())->get();

        return view('quiz.form', compact('quiz', 'materis'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        abort_if($quiz->guru_id !== Auth::id(), 403);

        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'materi_id'     => 'required|exists:materis,id',
            'time_limit'    => 'nullable|integer|min:1',
            'passing_score' => 'nullable|integer|min:0|max:100',
        ]);

        $quiz->update($data);

        return back()->with('success', 'Quiz berhasil diperbarui.');
    }

    public function toggleStatus(Quiz $quiz)
    {
        abort_if($quiz->guru_id !== Auth::id(), 403);

        if ($quiz->questions()->count() === 0) {
            return back()->with('error', 'Quiz belum memiliki soal.');
        }

        $quiz->update([
            'is_active' => ! $quiz->is_active
        ]);

        return back()->with('success', 'Status quiz diperbarui.');
    }
}
