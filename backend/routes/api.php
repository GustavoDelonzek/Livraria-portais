<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::post('/login', [LoginController::class, 'login']);
Route::get('books', [BookController::class, 'index']);
Route::post('save_book', [BookController::class, 'create']);

