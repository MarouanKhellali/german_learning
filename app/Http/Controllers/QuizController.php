<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Question;

use App\Models\UserProgression;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show(Level $level, Lesson $lesson)
    {
        $questions = $lesson->questions()->inRandomOrder()->take(10)->get(); // Adjust number as needed

        return view('quizzes.show', compact('level', 'lesson', 'questions'));
    }

    public function submit(Request $request, Level $level, Lesson $lesson)
    {
        $user = Auth::user();
        $questions = $lesson->questions;
        $score = 0;

        foreach ($questions as $question) {
            $userAnswer = $request->input('question_' . $question->id);
            if ($userAnswer == $question->correct_option) {
                $score += 1;
            }
        }

        // Update user progression
        $progress = UserProgression::firstOrCreate(
            ['user_id' => $user->id, 'level_id' => $level->id],
            ['current_score' => 0, 'completed' => false]
        );

        $progress->current_score += $score;
        // Assuming passing requires all questions correct
        if ($progress->current_score >= $questions->count()) {
            $progress->completed = true;
        }
        $progress->save();

        return redirect()->route('levels.show', $level->id)->with('success', 'Quiz submitted! Your score: ' . $score);
    }
}

