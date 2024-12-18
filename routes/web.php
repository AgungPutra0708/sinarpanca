<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'project'])->name('project');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/location', [PageController::class, 'location'])->name('location');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/send-mail', [PageController::class, 'sendContactForm'])->name('send.mail');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/set-home', HomeController::class);
    Route::resource('/set-about', AboutController::class);
    Route::resource('/set-project', ProjectController::class);
    Route::resource('/set-service', ServiceController::class);
    Route::resource('/set-service-detail', ServiceDetailController::class);
    Route::resource('/set-location', LocationController::class);
    Route::resource('/set-company', CompanyController::class);

    // Profile and Logout routes
    Route::post('/profile/update-password', [AuthController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
