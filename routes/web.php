<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::middleware('auth')->group(function() {
    Route::get('/buy/{id}', [UserController::class, 'buy'])->name('buy');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    
    Route::middleware('admin')->group(function() {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/notify-user/sms/{id}', [AdminController::class, 'sms'])->name('admin.users.notify.sms');
        Route::get('/admin/notify-user/email/{id}', [AdminController::class, 'mail'])->name('admin.users.notify.email');
    });
});

Route::group(['namespace' => 'Auth'], function(){
    Route::middleware('guest')->group(function() {
        Route::get('/login', [LoginController::class, 'show'])->name('login');
        Route::get('/register', [RegisterController::class, 'show'])->name('register');
    });

    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.form');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
