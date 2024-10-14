<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Test;
use App\Models\UserProgress;
use App\Models\UserProgression;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function show(Level $level)
    {
        $test = Test::where('level_id', $level->id)->first();
        if (!$test) {
            // Create test from level's lessons questions if not exists
            $questions = [];
            foreach ($level->lessons as $lesson) {
                foreach ($lesson->questions as $question) {
                    $questions[] = $question->id;
                }
            }
            $test = Test::create([
                'level_id' => $level->id,
                'questions' => $questions,
            ]);
        }

        // Fetch questions
        $questions = $level->lessons()->with('questions')->get()->pluck('questions')->flatten()->random(20); // Adjust number as needed

        return view('tests.show', compact('level', 'questions'));
    }

    public function submit(Request $request, Level $level)
    {
        $user = Auth::user();
        $test = Test::where('level_id', $level->id)->first();
        if (!$test) {
            return back()->with('error', 'Test not found.');
        }

        $questions = $level->lessons()->with('questions')->get()->pluck('questions')->flatten();
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

        if ($score >= count($questions) * 0.8) { // Example passing criteria
            $progress->completed = true;
        }
        $progress->current_score = $score;
        $progress->save();

        return redirect()->route('levels.show', $level->id)->with('success', 'Test submitted! Your score: ' . $score);
    }
}
