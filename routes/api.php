<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [\App\Http\Controllers\API\UserController::class, 'index']);
Route::get('/users/{user}', [\App\Http\Controllers\API\UserController::class, 'show']);
Route::post('/users/store', [\App\Http\Controllers\API\UserController::class, 'store']);
