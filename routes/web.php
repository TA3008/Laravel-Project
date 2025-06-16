<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('Home');
});

Route::get('/products/edit/{id?}', [ProductController::class, 'edit'])->name('products.edit');
Route::match(['post', 'put'], '/products/save/{id?}', [ProductController::class, 'save'])->name('products.save');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');