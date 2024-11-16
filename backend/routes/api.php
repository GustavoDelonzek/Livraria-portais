<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\createUserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserGenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('register',[AuthController::class,'register']);
Route::middleware('auth:api')->get('/protected', function () {
    return response()->json(['message' => 'Você está autenticado!']);
});
Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::post('/checkout', [OrdersController::class,'checkout']);
Route::get('/has_purchased/{bookId}', [OrdersController::class, 'hasPurchased']);


Route::get('books', [BookController::class, 'index']);
Route::get('/search/books', [BookController::class, 'search']);
Route::get('get_book/{id}', [BookController::class, 'get_book']);
Route::get('get_all_of_book/{id}', [BookController::class, 'getAllOfBook']);
Route::delete('delete_book/{id}', [BookController::class, 'destroy']);
Route::post('save_book', [BookController::class, 'create']);
Route::post('update_book/{id}', [BookController::class, 'update']);
Route::post('/book/{id}/stock', [BookController::class, 'updateStock']);

//Route::middleware('auth:sanctum')->post('/logout', [authController::class, 'logout']);

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

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres-by-category', [GenreController::class, 'getGenresByCategory']);
Route::post('/save_user_genres', [UserGenreController::class, 'saveGenres']);




Route::get('new_releases', [BookController::class, 'bookNewRelease']);
Route::get('books_by_genre/{genre}', [BookController::class, 'booksByGenre']);
Route::get('books_by_category/{category}', [BookController::class, 'booksByCategory']);


Route::get('reviews/{book_id}', [ReviewController::class, 'index']);
Route::get('reviews/{id}', [ReviewController::class, 'show']);
Route::post('reviews/{book_id}', [ReviewController::class, 'store']);
Route::put('reviews/{id}', [ReviewController::class, 'update']);
Route::delete('reviews/{id}', [ReviewController::class, 'destroy']);