<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes - TaskMate HCI Prototype
|--------------------------------------------------------------------------
*/

// Redirect root to dashboard (or login if guest)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication Routes (Figma Screens 1, 4, 5, 16)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get'); // Convenience for easy testing

// Authenticated Application Screens
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Tasks Feature Routes (Figma Screens 3, 6, 7, 8, 9, 10, 11, 15)
Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

// Auxiliary Workspace Pages (Figma Screens 12, 13, 14)
Route::get('/notifications', [PageController::class, 'notifications'])->name('notifications');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::post('/profile', [PageController::class, 'updateProfile'])->name('profile.update');
Route::get('/help', [PageController::class, 'help'])->name('help');
