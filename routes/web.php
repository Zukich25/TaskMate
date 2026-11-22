<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes - TaskMate (Cabansay John Kenny C. - BSIT 3rd Year)
|--------------------------------------------------------------------------
*/

// Redirect to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Student Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

// Dashboard Overview
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Task Management & Checkbox Toggle
Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

// Workspace Auxiliary Views
Route::get('/notifications', [PageController::class, 'notifications'])->name('notifications');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::post('/profile', [PageController::class, 'updateProfile'])->name('profile.update');
Route::get('/help', [PageController::class, 'help'])->name('help');
