<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

// ==========================================
// RUTE UTAMA / PUBLIC
// ==========================================
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Halaman projects & detail
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('projects.show');

// Halaman about & contact
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    return redirect()->route('contact')->with('success', 'Pesan berhasil dikirim!');
})->name('contact.submit');


// ==========================================
// RUTE ADMIN (DENGAN PREFIX & MIDDLEWARE)
// ==========================================

Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login'); 
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    });

    // Rute Auth: Hanya bisa diakses jika SUDAH login
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Dashboard Admin
        Route::get('/', function () {
            return view('admin.home');
        })->name('admin.dashboard');

        Route::get('projects/download-pdf', [AdminProjectController::class, 'downloadAllPDF'])->name('projects.pdf_all');
        Route::get('projects/{id}/pdf', [AdminProjectController::class, 'downloadPDF'])->name('projects.pdf_single');
        Route::resource('projects', AdminProjectController::class);
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    });
});