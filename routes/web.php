<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\RolesController;
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

// FOR CAR CONTROLLER
Route::get('cars', [CarsController::class, 'index'])->name('cars.index');
Route::get('cars/create', [CarsController::class, 'create'])->name('cars.create')->middleware('is_admin: 1');
Route::get('cars/edit/{id}', [CarsController::class, 'edit'])->name('cars.edit')->middleware('is_admin: 1');
Route::post('cars/store', [CarsController::class, 'store'])->name('cars.store')->middleware('is_admin: 1');
Route::put('cars/update/{id}', [CarsController::class, 'update'])->name('cars.update')->middleware('is_admin: 1');
Route::delete('cars/delete/{id}', [CarsController::class, 'destroy'])->name('cars.destroy')->middleware('is_admin: 1');

// FOR ADMIN
Route::get('author', function () {
    return view('admin.admin-page');
})->name('admin');


require __DIR__.'/auth.php';
