<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('doregister', [UsersController::class, 'doRegister'])->name('do_register');

