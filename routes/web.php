<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookGenreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
->middleware(['auth','user'])
->name('home');

Route::middleware(['auth','admin'])->group(function()
{
  Route::get('/admin', [AdminController::class, 'index'])
  ->name('admin');

  Route::get('/admin/genres_list', [AdminController::class, 'genresList'])
  ->name('genres_list');

  Route::get('/admin/authors_list', [AdminController::class, 'authorsList'])
  ->name('authors_list');

  Route::get('/admin/books_list', [AdminController::class, 'booksList'])
  ->name('books_list');

  Route::resource('/admin/genres', GenreController::class);

  Route::resource('/admin/books', BookController::class);

  Route::resource('/admin/authors', AuthorController::class);

  Route::resource('/admin/book_genre', BookGenreController::class);
});
