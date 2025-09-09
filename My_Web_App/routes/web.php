<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('doregister', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('dologin', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');
Route::get('profile', [UsersController::class, 'profile'])->name('profile')->middleware('auth');

