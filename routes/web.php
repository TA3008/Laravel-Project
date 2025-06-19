<?php

use App\Livewire\Posts\Edit;
use App\Livewire\Posts\Detail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
     Route::get('/', fn() => redirect()->route('posts.index'));

    // User
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/edit/{id?}', [UserController::class, 'edit'])->name('users.edit');
        Route::match(['post', 'put'], '/users/save/{id?}', [UserController::class, 'save'])->name('users.save');
        Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
    });

    // Post
        // Tất cả roles đều được xem danh sách bài viết
        Route::get('/posts', fn () => view('posts.index'))->name('posts.index');
        

        // Chỉ admin và editor mới được tạo bài viết
        Route::middleware(['editorOrAdmin'])->group(function () {
            Route::get('/posts/edit/{id?}', function ($id = null) {
                return view('posts.edit', compact('id'));
            })->name('posts.edit');
            Route::get('/posts/{slug}', function ($slug) {
                return view('posts.detail', compact('slug'));
            })->name('posts.detail');
        });
        // Chỉ admin được xoá bài viết
        Route::middleware(['admin'])->group(function () {
            Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.delete');
        });
});



// Product
Route::get('/products/edit/{id?}', [ProductController::class, 'edit'])->name('products.edit');
Route::match(['post', 'put'], '/products/save/{id?}', [ProductController::class, 'save'])->name('products.save');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');