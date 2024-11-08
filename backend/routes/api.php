<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\createUserController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/register',[createUserController::class,'store']);
Route::get('books', [BookController::class, 'index']);
Route::get('/search/books', [BookController::class, 'search']);
Route::get('get_book/{id}', [BookController::class, 'get_book']);
Route::delete('delete_book/{id}', [BookController::class, 'destroy']);
Route::post('save_book', [BookController::class, 'create']);
Route::post('update_book/{id}', [BookController::class, 'update']);
Route::post('/book/{id}/stock', [BookController::class, 'updateStock']);



Route::get('authors', [AuthorController::class, 'index']);
Route::get('/search/authors', [AuthorController::class, 'search']);
Route::get('get_author/{id}', [AuthorController::class, 'get_author']);
Route::delete('delete_author/{id}', [AuthorController::class, 'destroy']);
Route::post('save_author', [AuthorController::class, 'create']);
Route::post('update_author/{id}', [AuthorController::class, 'update']);


Route::get('publishers', [PublisherController::class, 'index']);
Route::get('/search/publishers', [PublisherController::class, 'search']);
Route::get('get_publisher/{id}', [PublisherController::class, 'get_publisher']);
Route::delete('delete_publisher/{id}', [PublisherController::class, 'destroy']);
Route::post('save_publisher', [PublisherController::class, 'create']);
Route::post('update_publisher/{id}', [PublisherController::class, 'update']);