<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\ProfileController;
use App\Models\Franchise;
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
});

Route::get('franchises', [FranchiseController::class, 'index'])->name('franchises.index');
Route::get('franchises/create', [FranchiseController::class, 'create'])->name('franchises.create');
Route::post('franchises', [FranchiseController::class, 'store'])->name('franchises.store');
Route::get('franchises/{id}/edit', [FranchiseController::class, 'edit'])->name('franchises.edit');
Route::put('franchises/{id}', [FranchiseController::class, 'update'])->name('franchises.update');
Route::delete('franchises/{id}',[FranchiseController::class, 'destroy'])->name('franchises.destroy');

Route::get('characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('characters/create', [CharacterController::class, 'create'])->name('characters.create');
Route::post('characters', [CharacterController::class, 'store'])->name('characters.store');
Route::get('characters/{id}/edit', [CharacterController::class, 'edit'])->name('characters.edit');
Route::put('characters/{id}', [CharacterController::class, 'update'])->name('characters.update');
Route::delete('characters/{id}',[CharacterController::class, 'destroy'])->name('characters.destroy');


require __DIR__.'/auth.php';
