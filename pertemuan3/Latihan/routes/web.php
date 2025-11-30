<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan view
Route::get('/', function () {
    return view('Home');
});

// Route untuk memanggil method di postcontroller
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


// Route untuk memanggil method di categorycontroller
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


// Route untuk Home
Route::view('/home', 'Home')->name('home');

// Route untuk About
Route::view('/about', 'About')->name('about.us');

// Halaman Blog
Route::view('/blog', 'Blog')->name('blog');

// Halaman Contact
Route::view('/contact', 'Contact')->name('contact');

