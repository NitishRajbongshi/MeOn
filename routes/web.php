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
use App\Http\Controllers\Subscription\ManageSubscription;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/subscription/plans/all-plans', [SubscriptionController::class, 'index'])->name('subscription');

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
    Route::delete('/manageClass/delete', [StandardController::class, 'destroy'])->name('class.delete');
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
    Route::get('/manageNotes/upload/{note:name}', [NoteController::class, 'uploadAdditionalNotes']);
    Route::post('/manageNotes/upload', [NoteController::class, 'storeAdditionalNotes']);

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
    Route::get('/student/view/{student:email}', [StudentController::class, 'view'])->name('student.view');
    Route::post('/student/delete', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/student/new', [StudentController::class, 'newStudentList'])->name('student.list.new');
    Route::post('/student/active', [StudentController::class, 'activeStudent'])->name('student.active');

    // manage subscription
    Route::get('/subscription/new', [ManageSubscription::class, 'newSubscription'])->name('subscription.new');
    Route::post('/subscription/approve', [ManageSubscription::class, 'approveSubscription']);
    Route::get('/subscription/approve/{payment:reference_id}', [ManageSubscription::class, 'showSubscription'])->name('subscription.aprrove');
});

// user
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/profile/{user:name}', [UserProfileController::class, 'index'])->name('user.profile');
    Route::get('/plan/my-plans', [UserProfileController::class, 'plans'])->name('user.plans');
});

// subscription
Route::middleware(['auth'])->prefix('user/subscription/plan')->group(function () {
    Route::get('/basic', [SubscriptionController::class, 'basic'])->name('plan.basic')->middleware('signed');
    Route::get('/standard', [SubscriptionController::class, 'standard'])->name('plan.standard')->middleware('signed');
    Route::get('/premium', [SubscriptionController::class, 'premium'])->name('plan.premium')->middleware('signed');

    Route::get('/subject/list/{id}', [SubscriptionController::class, 'subjectList']);
    Route::get('/chapter/list/{id}', [SubscriptionController::class, 'chapterList']);
    Route::get('/class/price/{id}', [SubscriptionController::class, 'classPrice']);
    Route::get('/subject/price/{id}', [SubscriptionController::class, 'subjectPrice']);
    Route::get('/chapter/price/{id}', [SubscriptionController::class, 'chapterPrice']);

    Route::post('/purchase/basic', [SubscriptionController::class, 'purchasePlan'])->name('plan.purchase')->middleware('signed');
    Route::post('/purchase/basic/submit', [SubscriptionController::class, 'storePlanDetails'])->name('plan.store')->middleware('signed');

    Route::post('/purchase/standard', [SubscriptionController::class, 'purchaseStandardPlan'])->name('plan.purchase.standard')->middleware('signed');
    Route::post('/purchase/standard/submit', [SubscriptionController::class, 'storeStandardPlan'])->name('plan.store.standard')->middleware('signed');

    Route::post('/purchase/premium', [SubscriptionController::class, 'purchasePremiumPlan'])->name('plan.purchase.premium')->middleware('signed');
    Route::post('/purchase/premium/submit', [SubscriptionController::class, 'storePremiumPlan'])->name('plan.store.premium')->middleware('signed');
});

// subject
Route::prefix('content')->group(function () {
    Route::get('/subject/{standard:name}/language/all-languages', [SubjectController::class, 'getLanguageList'])->name('language');
    Route::get('/subject/{standard:name}/language/assamese/all-subjects', [SubjectController::class, 'getAssameseSubjectList'])->name('subjectList.assamese');
    Route::get('/subject/{standard:name}/language/english/all-subjects', [SubjectController::class, 'getEnglishSubjectList'])->name('subjectList.english');
});

// notes
Route::prefix('notes')->group(function () {
    Route::get('/chapter/{subject:name}/all-chapters', [NoteController::class, 'getChapterList']);
    Route::get('/show/{chapter:name}/all-notes', [NoteController::class, 'getAvailableNote']);
    Route::get('/view/{note:name}/free', [NoteController::class, 'showFreeNotes'])->name('view.note.free')->middleware('signed');
    Route::get('/view/{note:name}/preview', [NoteController::class, 'previewNotes'])->name('view.note.preview')->middleware('signed');
    Route::get('/view/{note:name}/premium', [NoteController::class, 'showPremiumNotes'])->name('view.note.premium')->middleware(['auth', 'signed']);
});
