<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MoviesApiController;
use App\Http\Controllers\Controller;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('movies', [MoviesApiController::class, 'index']);

Route::get('genres',[MoviesApiController::class,'genres']);

Route::post('movies', [MoviesApiController::class,'store']);


Route::get('movies/show/{id}',[MoviesApiController::class,'show'])->name('movies.show');

Route::get('movies/adventures',[MoviesApiController::class,'adventures']);

