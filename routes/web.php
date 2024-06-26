<?php

use App\Http\Controllers\AlurController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InstalasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StrukturController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/dashboardadmin');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');
Route::get('/profil', [DashboardController::class, 'profil'])->name('profil');
Route::get('/sejarah', [DashboardController::class, 'sejarah'])->name('sejarah');
Route::get('/poliklinik', [DashboardController::class, 'poliklinik'])->name('poliklinik');
Route::get('/poliklinik/{slug}', [DashboardController::class, 'poliklinikDetail'])->name('poliklinikDetail');
Route::get('/instalasi', [DashboardController::class, 'instalasi'])->name('instalasi');
Route::get('/alur', [DashboardController::class, 'alur'])->name('alur');
Route::get('/program', [DashboardController::class, 'program'])->name('program');
Route::get('/program/{slug}', [DashboardController::class, 'programDetail'])->name('programDetail');
Route::get('/struktur', [DashboardController::class, 'struktur'])->name('struktur');
Route::get('/berita', [DashboardController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [DashboardController::class, 'beritaDetail'])->name('beritaDetail');
Route::get('/galeri', [DashboardController::class, 'galeri'])->name('galeri');
Route::get('/pengumuman', [DashboardController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{slug}', [DashboardController::class, 'pengumumanDetail'])->name('pengumumanDetail');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::middleware([UserAccess::class . ':Admin'])->group(function () {
        // ROUTE Admin/Login Access only
        Route::get('/dashboardadmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');

        Route::resource('data-user', UserController::class);
        Route::resource('data-poli', PoliController::class);
        Route::resource('data-instalasi', InstalasiController::class);
        Route::resource('data-fasilitas', FasilitasController::class);
        Route::resource('data-struktur', StrukturController::class);
        Route::resource('data-galeri', GaleriController::class);
        Route::resource('data-pengumuman', PengumumanController::class);
        Route::resource('data-berita', BeritaController::class);
        Route::resource('data-alur', AlurController::class);
        Route::resource('data-program', ProgramController::class);
    });
});

// Route User


// // Route Register
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'saveRegister'])->name('saveRegister');
