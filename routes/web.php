<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


route::middleware('guest')->group(function(){

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forget-password', function () {
    return view('auth.login'); });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');


