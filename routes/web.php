<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IsbnSinController;

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


//山岸
// 書籍検索
Route::post('/search_book', [IsbnSinController::class, 'searchBook'])->name('search.book');

// 書籍登録
Route::post('/book_register', [BookController::class, 'register'])->name('book.register');

// 書籍登録完了ページ
Route::get('/book_complete', function () {
    return view('book_complete'); // book_completeビューを作成する必要があります
})->name('book.complete');
