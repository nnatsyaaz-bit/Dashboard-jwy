<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect halaman utama sesuai status login
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('auth.login');
});

// ----- Halaman Login & Registrasi (khusus tamu / belum login) -----
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'processRegister'])->name('register');
});

// ----- Area Admin (wajib login) -----
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Dashboard Utama (ringkasan)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Preview Portofolio (khusus pemilik akun, tidak publik)
    Route::prefix('portfolio')->name('portfolio.')->group(function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('index');
        Route::get('/about', [PortfolioController::class, 'about'])->name('about');
        Route::get('/biodata', [PortfolioController::class, 'biodata'])->name('biodata');
        Route::get('/pendidikan', [PortfolioController::class, 'pendidikan'])->name('pendidikan');
        Route::get('/project', [PortfolioController::class, 'project'])->name('project');
        Route::get('/activity', [PortfolioController::class, 'activity'])->name('activity');
        Route::get('/activity-detail', [PortfolioController::class, 'activityDetail'])->name('activity-detail');
    });

    // Profil / Biodata (1 data per user)
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // CRUD Proyek / Portfolio
    Route::get('/fe/project', [ProjectController::class, 'index'])->name('fe.project');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // CRUD Aktivitas & Kegiatan
    Route::get('/fe/activity', [ActivityController::class, 'index'])->name('fe.activity');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activity.store');
    Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activity.update');
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');

    // CRUD Pendidikan
    Route::get('/fe/pendidikan', [PendidikanController::class, 'index'])->name('fe.pendidikan');
    Route::post('/pendidikan', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::put('/pendidikan/{id}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pendidikan/{id}', [PendidikanController::class, 'destroy'])->name('pendidikan.destroy');

    // CRUD Kontak
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/create', [KontakController::class, 'create'])->name('kontak.create');
    Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
    Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});
