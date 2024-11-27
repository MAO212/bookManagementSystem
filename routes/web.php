<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('login');
});

Route::get('/top', [BookController::class, 'top']);

Route::post('/login', [BookController::class, 'login']);

Route::get('/index', [BookController::class, 'index']);


Route::get('/logout', [BookController::class, 'logout']);

Route::get('/detail', [BookController::class, 'detail']);

Route::post('/review_register',[BookController::class, 'review_register']);
Route::get('/review_register', [BookController::class, 'review_register'])->name('reviews.create');


Route::post('/store', [BookController::class, 'store'])->name('reviews.store');

Route::get('/review_complete', [BookController::class, 'review_complete'])->name('reviews.complete');

Route::get('/book_register', [BookController::class, 'book_register']);