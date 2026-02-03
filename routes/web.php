<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\CustomAuth;

Route::get("/", [UserController::class, 'goHome'])->middleware(CustomAuth::class);
Route::get('/register', [UserController::class, 'registerForm'])->name('registerpage');
Route::get('/login', [UserController::class, 'loginForm'])->name("loginpage");
Route::get('/logout', [UserController::class, 'logout'])->name("logout");
Route::get('/book-form', [BookController::class, 'bookForm'])->name("bookpage");
Route::get('/book/edit/{id}', [BookController::class, 'editBook'])->name('edit');
Route::get('/book/delete/{id}', [BookController::class, 'deleteBook'])->name('delete');



Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/add-book', [BookController::class, 'submitBook'])->name('book');
Route::post('/update-book', [BookController::class, 'updateBook'])->name('update.book');
