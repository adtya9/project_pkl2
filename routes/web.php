<?php

use App\Http\Controllers\BagianpklController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PembimbingpklController;
use App\Http\Controllers\PembimbingsekolahController;
use App\Http\Controllers\PenempatanpklController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jurusan', JurusanController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::resource('bagianpkl', BagianpklController::class);
    Route::resource('siswa', SiswaController::class);   
    Route::resource('pembimbingsekolah', PembimbingsekolahController::class);
    Route::resource('pembimbingpkl', PembimbingpklController::class);
    Route::resource('penempatanpkl', PenempatanpklController::class);
});

require __DIR__.'/auth.php';
