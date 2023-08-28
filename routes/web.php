<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Auth::routes();
// routes/web.php
Route::get('/register', [App\Http\Controllers\CustomerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\CustomerController::class, 'register']);

Route::get('/login', [App\Http\Controllers\CustomerController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\CustomerController::class, 'login']);

Route::middleware(['auth:customer'])->group(function () {
    Route::post('/logout', [App\Http\Controllers\CustomerController::class, 'logout'])->name('logout');
    Route::get('/home', [App\Http\Controllers\CustomerController::class, 'home'])->name('home');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'adminLogin']);
    
    // Gunakan middleware('auth:admin') dan sesuaikan guard 'admin' yang digunakan di konfigurasi auth
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('admin.produk');
        Route::post('/produk/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('admin.produk.store');
        Route::get('/produk/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::post('/produk/update/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('admin.produk.update');
        Route::delete('/produk/delete/{id}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('admin.produk.destroy');
        // Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('admin.produk');
        Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
        Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::post('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
        

    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
