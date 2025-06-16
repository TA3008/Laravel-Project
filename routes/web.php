<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('Home');
});

// Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User
// Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit/{id?}', [UserController::class, 'edit'])->name('users.edit');
    Route::match(['post', 'put'], '/users/save/{id?}', [UserController::class, 'save'])->name('users.save');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
// });

// Product
Route::get('/products/edit/{id?}', [ProductController::class, 'edit'])->name('products.edit');
Route::match(['post', 'put'], '/products/save/{id?}', [ProductController::class, 'save'])->name('products.save');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');