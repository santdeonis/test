<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'owner'])->group(function()
{
  Route::patch('/books/{book}', [ApiController::class, 'bookUpdate']);
  Route::delete('/books/{book}', [ApiController::class, 'bookDestroy']);
});

Route::get('/books', [ApiController::class, 'bookIndex']);
Route::get('/books/{book}', [ApiController::class, 'bookShow']);

Route::get('/authors', [ApiController::class, 'authorIndex']);
Route::get('/authors/{author}', [ApiController::class, 'authorShow']);

Route::patch('/authors/{author}', [ApiController::class, 'authorUpdate'])
->middleware('author');
