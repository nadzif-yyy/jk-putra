<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Auth\AdminAuthController;
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

// Rute penyelamat agar middleware 'auth' tidak crash saat melempar user belum login
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');

Route::prefix('admin')->group(function () {
    
    // Rute Guest: Hanya bisa diakses jika BELUM login
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

        // ==========================================
        // FITUR TAMBAHAN: CETAK DOMPDF
        // ==========================================
        // Rute untuk mengunduh rekap SEMUA project ke PDF
        Route::get('projects/download-pdf', [AdminProjectController::class, 'downloadAllPDF'])->name('projects.pdf_all');
        
        // Rute untuk mengunduh SATU project spesifik ke PDF
        Route::get('projects/{id}/pdf', [AdminProjectController::class, 'downloadPDF'])->name('projects.pdf_single');

        // CRUD Projects Admin (Bawaan Laravel Resource)
        Route::resource('projects', AdminProjectController::class);
    });
});