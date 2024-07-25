<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;


route::middleware('guest')->group(function(){

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forget-password',[AuthController::class, 'forgetPassword'])->name('password.request');
    Route::get('/reset-password',[AuthController::class, 'resetPassword'])->name('password.reset');
});

Route::middleware('auth', 'auth.session', 'verified')->group(function(){
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

});

Route::get('/email/verify/need-verification', [AuthController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])->middleware('auth','signed')->name('verification.verify');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', function () {
    return view('auth.login');
});



