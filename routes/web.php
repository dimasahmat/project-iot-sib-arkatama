<?php

use App\Http\Controllers\Api\LogDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.landing');
});

Route::get('/dashboard', function () {
    $data['title'] = 'Dashboard';
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/logdata', function () {
//     $data['title'] = 'Log Data';
//     return view('pages.logdata.temperature');
// })->middleware(['auth', 'verified'])->name('logdata');

// adalah route yang hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // Log Data
    // Route::get('logdata', [LogDataController::class, 'index'])->name('users.index');
});

require __DIR__ . '/auth.php';
