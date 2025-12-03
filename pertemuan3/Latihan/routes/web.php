<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

// contoh route untuk menampilkan view
Route::get('/', function () {
    return view('Home');
});

// Route untuk memanggil method di postcontroller
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


// Categories CRUD (auth required)
Route::middleware('auth')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


// Route untuk Home
Route::view('/home', 'Home')->name('home');

// Route untuk About
Route::view('/about', 'About')->name('about.us');

// Halaman Blog
Route::view('/blog', 'Blog')->name('blog');

// Halaman Contact
Route::view('/contact', 'Contact')->name('contact');

//protect posts dan categories dengan auth middleware
//route dari laravel-main
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');
    
// roue model binding dengan slug
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// route untuk register - middleware guest (hanya untuk yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

//route untuk login - middleware guest (hanya untuk yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

//route untuk logout - middleware auth (hanya untuk yang sudah login)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route redirect dashboard ke dashboard/posts
Route::get('/dashboard', function () {
    return redirect()->route('dashboard.posts.index');
})->middleware('auth')->name('dashboard');

// Route untuk dashboard posts - hanya untuk yang sudah login 
// index - menampilkan semua posts milik user
Route::get('/dashboard/posts', [App\Http\Controllers\DashboardPostController::class, 'index'])->middleware('auth','verified')->name('dashboard.posts.index');
// create - menampilkan form untuk membuat post baru
Route::get('/dashboard/posts/create', [App\Http\Controllers\DashboardPostController::class, 'create'])->middleware('auth','verified')->name('dashboard.posts.create');
// store - menyimpan post baru
Route::post('/dashboard/posts', [App\Http\Controllers\DashboardPostController::class, 'store'])->middleware('auth','verified')->name('dashboard.posts.store');
// show - menampilkan detail post berdasarkan slug
Route::get('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'show'])->middleware('auth','verified')->name('dashboard.posts.show');
// edit & update
Route::get('/dashboard/posts/{post}/edit', [DashboardPostController::class, 'edit'])->middleware('auth','verified')->name('dashboard.posts.edit');
Route::put('/dashboard/posts/{post}', [DashboardPostController::class, 'update'])->middleware('auth','verified')->name('dashboard.posts.update');
// destroy
Route::delete('/dashboard/posts/{post}', [DashboardPostController::class, 'destroy'])->middleware('auth','verified')->name('dashboard.posts.destroy');