<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Answers;
use App\Models\Questions;
use App\Models\Result;
use App\Models\Results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AnswerController extends Controller
{
    /**
     * Start quiz (show questions)
     */
    public function start(Quiz $quiz)
    {
        abort_if(!$quiz->is_active, 403, 'Quiz belum aktif');

        $questions = $quiz->questions()
            ->with('options')
            ->get();

        return view('quiz.start', compact('quiz', 'questions'));
    }

    /**
     * Submit quiz answers
     */
    public function submit(Request $request, Quiz $quiz)
    {
        $user = Auth::user();

        // cegah submit dua kali
        if (Results::where('quiz_id', $quiz->id)->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Quiz sudah dikerjakan');
        }

        $score = 0;
        $totalQuestions = $quiz->questions()->count();

        foreach ($request->answers as $questionId => $answerValue) {

            $question = Questions::find($questionId);
            $isCorrect = false;
            $optionId = null;

            // multiple choice / true false
            if ($question->type !== 'essay') {
                $optionId = $answerValue;
                $isCorrect = $question->correct_option_id == $optionId;

                if ($isCorrect) {
                    $score++;
                }
            }

            // simpan jawaban
            Answers::create([
                'user_id'     => $user->id,
                'question_id' => $questionId,
                'option_id'   => $optionId,
                'is_correct'  => $isCorrect,
            ]);
        }

        // hitung nilai akhir
        $finalScore = round(($score / $totalQuestions) * 100);

        // simpan result
        Results::create([
            'quiz_id'      => $quiz->id,
            'user_id'      => $user->id,
            'score'        => $finalScore,
            'completed_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('quiz.result', $quiz)
            ->with('success', 'Quiz selesai');
    }

    /**
     * Show result
     */
    public function result(Quiz $quiz)
    {
        $result = Results::where('quiz_id', $quiz->id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $passed = $quiz->passing_score
            ? $result->score >= $quiz->passing_score
            : null;

        return view('quiz.result', compact('quiz', 'result', 'passed'));
    }
}
