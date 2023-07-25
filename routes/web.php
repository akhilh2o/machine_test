<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;
use Illuminate\Support\Facades\Route;

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
Route::get('lang/change', [LangController::class, 'change'])->name('change');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'do_login'])->name('do_login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('user', AdminUserController::class);
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [AdminController::class, 'update'])->name('profile.update');
    });
});

Route::prefix('/user')->name('user.')->group(function () {
    Route::get('/register', [UserRegisterController::class, 'register'])->name('register');
    Route::post('/register', [UserRegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [UserLoginController::class, 'login'])->name('login');
    Route::post('/login', [UserLoginController::class, 'do_login'])->name('do_login');
    Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
    });
});
