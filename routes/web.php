<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ERPController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/en');
})->name('home');

// Routes for guests
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// ==================== EMAIL VERIFICATION ROUTES ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', [VerificationController::class, 'showVerificationForm'])
        ->name('verification.notice');
    
    Route::post('/email/verify', [VerificationController::class, 'verify'])
        ->name('verification.verify');
    
    Route::post('/email/verify/resend', [VerificationController::class, 'resend'])
        ->name('verification.resend');
});


Route::get('/lang/{locale}', [ERPController::class, 'switchLang'])->name('lang.switch');


Route::resource('users', UserController::class);

Route::get('/{locale}', [ERPController::class, 'index'])->name('landing');

Route::middleware(['auth', 'verified', 'locale'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::middleware(['phone.yemen'])->group(function () {
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
});
