<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::prefix('/')->controller('AuthController')->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('save/auth', [AuthController::class, 'SaveRegister'])->name('register.save');
    Route::post('login/auth', [AuthController::class, 'LoginAuth'])->name('login.authenticate');
    Route::post('login', [AuthController::class, 'processLogin'])->name('auth.processLogin');
    Route::post('register', [AuthController::class, 'processRegister'])->name('auth.processRegister');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('home',[HomeController::class, 'index'])->name('home');
});
