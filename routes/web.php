<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

// Login & Register
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware(['auth'])->group(function () {
     Route::get('/', fn() => redirect()->route('posts.index'));

     Route::get('/home', fn() => redirect()->route('home'));

    // User
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', fn () => view('users.index'))->name('users.index');
        Route::get('/users/edit/{id?}', function ($id = null) {
            return view('users.edit', compact('id'));
        })->name('users.edit');
    });

    // Category
    Route::middleware(['admin'])->group(function () {
        Route::get('/categories', fn () => view('categories.index'))->name('categories.index');
        Route::get('/categories/edit/{id?}', function ($id = null) {
            return view('categories.edit', compact('id'));
        })->name('categories.edit');
    });

    // Post
    // Tất cả roles đều được xem danh sách bài viết
    Route::get('/posts', fn () => view('posts.index'))->name('posts.index');
    Route::get('/posts/{slug}', function ($slug) {
            return view('posts.detail', compact('slug'));
        })->name('posts.detail');

    // Chỉ admin và editor mới được tạo bài viết
    Route::middleware(['editorOrAdmin'])->group(function () {
        Route::get('/posts/edit/{id?}', function ($id = null) {
            return view('posts.edit', compact('id'));
        })->name('posts.edit');
    });
});