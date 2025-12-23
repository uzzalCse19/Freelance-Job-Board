<?php

use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('jobs.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Convenience name used by some auth/navigation stubs: keep a `profile` named route
Route::get('/my-profile', function () {
    return redirect()->route('profile.edit');
})->name('profile');

Route::middleware(['auth', \App\Http\Middleware\EnsureProfileIsComplete::class])->group(function () {
    Route::resource('jobs', JobController::class)->except(['show']);
});

Route::get('/high-value-jobs', [JobController::class, 'highValue']);
