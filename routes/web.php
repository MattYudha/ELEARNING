<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Student Routes
Route::get('/', [\App\Http\Controllers\Student\CourseController::class, 'index'])->name('home');
Route::get('/courses/{course:slug}', [\App\Http\Controllers\Student\CourseController::class, 'show'])->name('courses.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/courses/{course}/enroll', [\App\Http\Controllers\Student\CourseController::class, 'enroll'])->name('courses.enroll');
    
    Route::get('/courses/{course}/lessons/{lesson:slug}', [\App\Http\Controllers\Student\LessonController::class, 'show'])->name('lessons.show');
    Route::post('/courses/{course}/lessons/{lesson}/complete', [\App\Http\Controllers\Student\LessonController::class, 'complete'])->name('lessons.complete');

    Route::get('/courses/{course}/quizzes/{quiz}', [\App\Http\Controllers\Student\QuizController::class, 'show'])->name('student.quizzes.show');
    Route::post('/courses/{course}/quizzes/{quiz}/submit', [\App\Http\Controllers\Student\QuizController::class, 'submit'])->name('student.quizzes.submit');

    Route::get('/dashboard', function () {
        return view('dashboard'); // Student dashboard
    })->name('dashboard');
});

// Admin Routes
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);
    Route::resource('courses.modules', \App\Http\Controllers\Admin\ModuleController::class)->except(['index', 'show']);
    
    // Modules show (to list lessons) and Lesson management
    Route::get('modules/{module}', [\App\Http\Controllers\Admin\LessonController::class, 'show'])->name('modules.show');
    Route::resource('modules.lessons', \App\Http\Controllers\Admin\LessonController::class)->except(['index', 'show']);
    Route::resource('modules.quizzes', \App\Http\Controllers\Admin\QuizController::class)->except(['index']);
    
    // Quiz Show (to list questions)
    Route::get('quizzes/{quiz}', [\App\Http\Controllers\Admin\QuizController::class, 'show'])->name('quizzes.show');
    Route::resource('quizzes.questions', \App\Http\Controllers\Admin\QuestionController::class)->except(['index', 'show']);

    Route::get('/enrollments', [\App\Http\Controllers\Admin\EnrollmentController::class, 'index'])->name('enrollments.index');
});
