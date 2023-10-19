<?php

use App\Models\Standard\Standard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Chapter\ChapterController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Standard\StandardController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', function () {
    $user = Auth::user();
    $classes = Standard::all(['id', 'name']);
    return view('welcome', [
        'user' => $user,
        'classes' =>$classes
    ]);
});

// dashboard
Route::get('/getSubjectList/{id}', [DashboardController::class, 'getSubjectList']);

// login
Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LogoutController::class, 'logoutUser'])->middleware('auth')->name('logout');

// admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('adminDashboard');

    // manage class
    Route::get('/manageClass', [StandardController::class, 'index'])->name('manageClass');
    Route::post('/manageClass', [StandardController::class, 'store']);
    Route::get('/manageClass/{id}', [StandardController::class, 'show']);
    Route::post('/manageClass/edit/{id}', [StandardController::class, 'update']);

    // manage subject
    Route::get('/manageSubject', [SubjectController::class, 'index'])->name('manageSubject');
    Route::post('/manageSubject', [SubjectController::class, 'store']);

    // manage chapter
    Route::get('/manageChapter', [ChapterController::class, 'index'])->name('manageChapter');
    Route::post('/manageChapter', [ChapterController::class, 'store']);
    Route::get('/getSubject/{id}', [ChapterController::class, 'getSubject']);
});
