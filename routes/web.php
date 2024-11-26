<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/login', function () {
    return view('login');
});





Route::post('/login', [BookController::class, 'login']);

Route::get('/index', [BookController::class, 'index']);


Route::get('/logout', [BookController::class, 'logout']);

Route::get('/detail', [BookController::class, 'detail']);


