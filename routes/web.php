<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --- តំបន់ការពារសម្រាប់តែ ADMIN ប៉ុណ្ណោះ ---
// យើងប្រើ Middleware 'auth' ដើម្បីប្រាកដថាគាត់ Login និង 'role:admin' ដើម្បីប្រាកដថាគាត់ជា Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('food', FoodController::class);
});

// --- តំបន់សម្រាប់ USER ទាំងអស់ (Profile) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
