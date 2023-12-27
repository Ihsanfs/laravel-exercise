<?php

namespace App\Http\Controllers;

use App\Models\pertanyaan;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        // Ambil 5 pertanyaan secara acak dari database
        $questions = pertanyaan::inRandomOrder()->limit(5)->get();

        return view('quiz.index', compact('questions'));
    }

    public function submit(Request $request)
    {
        // Validasi jawaban dari form
        $request->validate([
            'answer.*' => 'required|in:A,B,C,D,E',
        ]);

        $score = 0;

        foreach ($request->answer as $questionId => $selectedAnswer) {
            $question = pertanyaan::find($questionId);
            $correctAnswer = $question->answers->where('is_correct', true)->first();

            if ($selectedAnswer === $correctAnswer->answer_text) {
                $score++;
            }
        }

        return redirect()->route('quiz.result', ['score' => $score]);
    }

    public function result($score)
    {
        return view('quiz.result', compact('score'));
    }

    public function create()
{
    return view('quiz.create');
}

public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'question_text' => 'required',
    ]);

    // Simpan pertanyaan ke database
    $question = new pertanyaan;
    $question->question_text = $request->input('question_text');
    $question->save();

    return redirect()->route('quiz.index');
}

}
