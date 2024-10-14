<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show(Level $level, Lesson $lesson)
    {
        // Assuming lesson content is stored in JSON
        // You can alternatively store content directly in DB
        $content = json_decode($lesson->content, true);

        return view('lessons.show', compact('level', 'lesson', 'content'));
    }
}

