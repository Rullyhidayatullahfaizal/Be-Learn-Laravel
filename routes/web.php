<?php

use App\Http\Controllers\DistrikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubdistrictController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VillageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProvinceController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/provinces/{id}', [ProvinceController::class, 'show']);
Route::post('/provinces', [ProvinceController::class, 'store']);
Route::put('/provinces/{id}', [ProvinceController::class, 'update']);
Route::delete('/provinces/{id}', [ProvinceController::class, 'destroy']);

// district
Route::get('/distrits', action: [DistrikController::class, 'index']);

// regencies
Route::get('/regencies', action: [SubdistrictController::class, 'index']);

//villages
Route::get('/villages', action: [VillageController::class, 'index']);

// soal no2

Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);




require __DIR__.'/auth.php';
