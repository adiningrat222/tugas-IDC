<?php

use App\Http\Controllers\Api\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('/v1')->group(function () {
    Route::get('/books', [BooksController::class, 'index']);
    Route::post('/books', [BooksController::class, 'store']);
    Route::get('books/{id}', [BooksController::class, 'show']);
    Route::put('books/{id}/update', [BooksController::class, 'update']);
    Route::delete('books/{id}/delete', [BooksController::class, 'destroy']);
});
