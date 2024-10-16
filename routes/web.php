<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


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
    Route::get('/categories',[CategoriesController::class, 'index'])->name('categories.index');
    Route::post('/categories',[CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/create',[CategoriesController::class, 'create'])->name('categories.create');
    Route::delete('/categories/{categories}',[CategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{categories}',[CategoriesController::class, 'update'])->name('categories.update');
    Route::get('/categories/{categories}/edit',[CategoriesController::class, 'edit'])->name('categories.edit');


});

require __DIR__.'/auth.php';
