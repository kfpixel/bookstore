<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'getAll']);
Route::get('/books/{id}', [BookController::class, 'get']);
Route::post('/books', [BookController::class, 'add']);
Route::put('/books/{id}', [BookController::class, 'edit']);
Route::delete('/books/{id}', [BookController::class, 'remove']);

// catch others
Route::fallback(function(){
    return response()->json([
        'message' => 'Unknown API endpoint.',
    ], 404);
});