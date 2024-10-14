<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes (Handled by Breeze)

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard after login
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Levels
    Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
    Route::get('/levels/{level}', [LevelController::class, 'show'])->name('levels.show');

    // Lessons
    Route::get('/levels/{level}/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');

    // Quizzes
    Route::get('/levels/{level}/quizzes/{lesson}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::post('/levels/{level}/quizzes/{lesson}', [QuizController::class, 'submit'])->name('quizzes.submit');

    // Tests
    Route::get('/levels/{level}/test', [TestController::class, 'show'])->name('tests.show');
    Route::post('/levels/{level}/test', [TestController::class, 'submit'])->name('tests.submit');

    // User Progression
    Route::get('/progress', [HomeController::class, 'progress'])->name('progress');
});


require __DIR__.'/auth.php';
