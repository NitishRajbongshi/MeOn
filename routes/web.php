<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Standard\StandardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $user = Auth::user();
    return view('welcome', ['user' => $user]);
});

// login
Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LogoutController::class, 'logoutUser'])->middleware('auth')->name('logout');

// admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    Route::get('/manageClass', [StandardController::class, 'index'])->name('manageClass');
});
