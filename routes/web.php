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
Route::get('franchises/create', [FranchiseController::class, 'create'])->name('franchises.create')
->middleware(['auth', 'verified']);
Route::post('franchises', [FranchiseController::class, 'store'])->name('franchises.store')
->middleware(['auth', 'verified']);
Route::get('franchises/{id}/edit', [FranchiseController::class, 'edit'])->name('franchises.edit')
->middleware(['auth', 'verified']);
Route::put('franchises/{id}', [FranchiseController::class, 'update'])->name('franchises.update')
->middleware(['auth', 'verified']);
Route::delete('franchises/{id}',[FranchiseController::class, 'destroy'])->name('franchises.destroy')
->middleware(['auth', 'verified']);

Route::get('characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('characters/create', [CharacterController::class, 'create'])->name('characters.create')
->middleware(['auth', 'verified']);
Route::post('characters', [CharacterController::class, 'store'])->name('characters.store')
->middleware(['auth', 'verified']);
Route::get('characters/{id}', [CharacterController::class, 'show'])->name('characters.show');
Route::get('characters/{id}/edit', [CharacterController::class, 'edit'])->name('characters.edit')
->middleware(['auth', 'verified']);
Route::put('characters/{id}', [CharacterController::class, 'update'])->name('characters.update')
->middleware(['auth', 'verified']);
Route::delete('characters/{id}',[CharacterController::class, 'destroy'])->name('characters.destroy')
->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
