<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Questions;
use App\Models\QuestionOptions;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * List questions by quiz
     */
    public function index(Quiz $quiz)
    {
        $questions = $quiz->questions()
            ->with('options')
            ->latest()
            ->get();

        return view('questions.index', compact('quiz', 'questions'));
    }

    /**
     * Show create form
     */
    public function create(Quiz $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    /**
     * Store new question
     */
    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|in:multiple_choice,essay,true_false',
        ]);

        // 1️⃣ create question
        $question = $quiz->questions()->create([
            'question' => $request->question,
            'type' => $request->type,
        ]);

        // 2️⃣ if multiple choice → create options
        if ($request->type === 'multiple_choice') {

            $request->validate([
                'options' => 'required|array|min:2',
                'correct_option' => 'required|integer',
            ]);

            foreach ($request->options as $index => $optionText) {

                $option = $question->options()->create([
                    'option_label' => chr(65 + $index), // A B C D
                    'option_text' => $optionText,
                ]);

                if ($request->correct_option == $index) {
                    $question->update([
                        'correct_option_id' => $option->id
                    ]);
                }
            }
        }

        return redirect()
            ->route('quiz.questions.index', $quiz)
            ->with('success', 'Soal berhasil ditambahkan');
    }

    /**
     * Show edit form
     */
    public function edit(Quiz $quiz, Questions $question)
    {
        $question->load('options');

        return view('questions.edit', compact('quiz', 'question'));
    }

    /**
     * Update question
     */
    public function update(Request $request, Quiz $quiz, Questions $question)
    {
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|in:multiple_choice,essay,true_false',
        ]);

        // update question
        $question->update([
            'question' => $request->question,
            'type' => $request->type,
        ]);

        // reset old options if type changed
        if ($request->type !== 'multiple_choice') {
            $question->options()->delete();
            $question->update(['correct_option_id' => null]);
        }

        // update options
        if ($request->type === 'multiple_choice') {

            $request->validate([
                'options' => 'required|array|min:2',
                'correct_option' => 'required|integer',
            ]);

            // delete old options
            $question->options()->delete();

            foreach ($request->options as $index => $optionText) {

                $option = $question->options()->create([
                    'option_label' => chr(65 + $index),
                    'option_text' => $optionText,
                ]);

                if ($request->correct_option == $index) {
                    $question->update([
                        'correct_option_id' => $option->id
                    ]);
                }
            }
        }

        return redirect()
            ->route('quiz.questions.index', $quiz)
            ->with('success', 'Soal berhasil diperbarui');
    }

    /**
     * Delete question
     */
    public function destroy(Quiz $quiz, Questions $question)
    {
        $question->options()->delete();
        $question->delete();

        return redirect()
            ->route('quiz.questions.index', $quiz)
            ->with('success', 'Soal berhasil dihapus');
    }
}
