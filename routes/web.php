<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan view 
Route::get('/', function () {
    return view('welcome');
});

// route untuk memanggil method di postcontroller 
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// route untuk halaman about
Route::get('/about', function () {
    return view('components.About');
});

// route untuk halaman blog
Route::get('/blog', function () {
    return view('components.Blog');
});

// route untuk halaman contact
Route::get('/contact', function () {
    return view('components.Contact');
});

// route untuk memanggil method di postcontroller
Route::get('/posts', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
