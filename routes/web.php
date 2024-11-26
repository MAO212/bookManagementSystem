<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [BookController::class, 'login']);

Route::get('/index', [BookController::class, 'index']);






