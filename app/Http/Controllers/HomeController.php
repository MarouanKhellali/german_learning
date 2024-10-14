<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\UserProgress;
use App\Models\UserProgression;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Show the welcome page
    public function index()
    {
        return view('welcome');
    }

    // Show the dashboard after login
   
  public function dashboard()
    {
        // Fetch all levels
        $levels = Level::all();

        // Fetch the user's progress (optional for your project)
        $user = Auth::user();
        $progress = UserProgression::where('user_id', $user->id)->get();

        // Pass levels and progress (if any) to the dashboard view
        return view('dashboard', compact('levels', 'progress'));
    }
    

    // Show the user's progress for each level
    public function progress()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Fetch user's progression across all levels and eager load the associated level
        $progress = UserProgression::with('level')->where('user_id', $user->id)->get();

        // Return a view that shows user progress in detail
        return view('progress', compact('progress'));
    }
}
