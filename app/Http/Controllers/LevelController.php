<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\UserProgress;
use App\Models\UserProgression;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    public function show(Level $level)
    {
        $user = Auth::user();
        // Check if user has progress entry, if not, create one
        $progress = UserProgression::firstOrCreate(
            ['user_id' => $user->id, 'level_id' => $level->id],
            ['current_score' => 0, 'completed' => false]
        );

        $lessons = $level->lessons;

        return view('levels.show', compact('level', 'lessons', 'progress'));
    }
}
