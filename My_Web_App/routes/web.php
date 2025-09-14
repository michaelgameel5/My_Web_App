<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('doregister', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('dologin', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');
Route::get('profile/{id?}', [UsersController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/main', [UsersController::class, 'welcome'])->name('main');

// Book routes - Updated to use BooksController instead of BookController
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('/books/store', [BooksController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::post('/books/{id}/update', [BooksController::class, 'update'])->name('books.update');
Route::get('/books/{id}/delete', [BooksController::class, 'delete'])->name('books.delete');
Route::get('/books/{id}/buy', [BooksController::class, 'buy'])->name('books.buy');


