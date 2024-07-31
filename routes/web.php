<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Chapter\ChapterController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Standard\StandardController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ExamLink\ExamLinkController;
use App\Http\Controllers\Marquee\MarqueeController;
use App\Http\Controllers\Note\NoteController;
use App\Http\Controllers\Standard\CategoryController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentRegistrationController;
use App\Http\Controllers\WelcomeController;
use App\Models\Student\Student;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

// dashboard
Route::get('/getSubjectList/{id}', [DashboardController::class, 'getSubjectList']);

// login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/contact-us', [WelcomeController::class, 'contact'])->name('contact.us');
Route::post('/logout', [LogoutController::class, 'logoutUser'])->middleware('auth')->name('logout');

// student
Route::get('/student/registration', [StudentRegistrationController::class, 'index'])->name('student.registration');
Route::post('/student/registration', [StudentRegistrationController::class, 'store']);

// admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('adminDashboard');

    // manage class
    Route::get('/manageClass', [StandardController::class, 'index'])->name('manageClass');
    Route::post('/manageClass', [StandardController::class, 'store']);
    Route::get('/manageClass/{id}', [StandardController::class, 'show']);
    Route::post('/manageClass/edit/{id}', [StandardController::class, 'update']);
    Route::get('/getSubject/{id}', [StandardController::class, 'getSubject']);

    // manage subject
    Route::get('/manageSubject', [SubjectController::class, 'index'])->name('manageSubject');
    Route::post('/manageSubject', [SubjectController::class, 'store']);
    Route::get('/manageSubject/{id}', [SubjectController::class, 'show']);
    Route::post('/manageSubject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('/getChapter/{id}', [SubjectController::class, 'getChapter']);

    // manage chapter
    Route::get('/manageChapter', [ChapterController::class, 'index'])->name('manageChapter');
    Route::post('/manageChapter', [ChapterController::class, 'store']);
    Route::get('/manageChapter/{id}', [ChapterController::class, 'getChapter']);
    Route::post('/manageChapter/edit/{id}', [ChapterController::class, 'update']);

    // manage notes
    Route::get('/manageNotes', [NoteController::class, 'index'])->name('manageNote');
    Route::post('/manageNotes', [NoteController::class, 'store']);

    // add Exam Link
    Route::get('/addExamLink', [ExamLinkController::class, 'index'])->name('addExamLink');
    Route::post('/addExamLink', [ExamLinkController::class, 'store']);
    Route::delete('/deleteExamLink', [ExamLinkController::class, 'destroy'])->name('deleteExamLink');

    // add marquee text
    Route::get('/manageMarquee', [MarqueeController::class, 'index'])->name('marquee');
    Route::post('/manageMarquee', [MarqueeController::class, 'store']);

    // add class category
    Route::get('/addClassCategory', [CategoryController::class, 'index'])->name('classCategory');
    Route::post('/addClassCategory', [CategoryController::class, 'store']);

    // manage student
    Route::get('/student/all', [StudentController::class, 'index'])->name('student.list');
    Route::get('/student/new', [StudentController::class, 'newStudentList'])->name('student.list.new');
    Route::post('/student/active', [StudentController::class, 'activeStudent'])->name('student.active');
});

// subject
Route::prefix('content')->group(function() {
    Route::get('/subject/{id}', [SubjectController::class, 'getSubjectList'])->name('subjectList'); // class-10/all-subject
});

// notes
Route::prefix('notes')->group(function () {
    Route::get('/subject/{subject}', [NoteController::class, 'getChapterList']); // class-10/g-math/unit-measurement/all-notes
    Route::get('/getNotes/{chapter}', [NoteController::class, 'getAvailableNote']);
    Route::get('/viewNotes/{note}', [NoteController::class, 'showPdfFile']);
});
