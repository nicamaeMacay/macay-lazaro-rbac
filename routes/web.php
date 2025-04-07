<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TagController;

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


Route::middleware(['auth'])->group(function () {

    Route::resource('posts', PostController::class)->names('posts');
    // Roles Routes
    Route::resource('roles', RoleController::class)->names('roles');
    // Permissions Routes
    Route::resource('permissions', PermissionController::class)->names('permissions');
    // Tags Routes
    Route::resource('tags', TagController::class)->names('tags'); 
    // Category Routes
    Route::resource('categories', CategoryController::class)->names('categories'); 
});

require __DIR__.'/auth.php';
