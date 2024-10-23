<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [AnimalController::class, 'index']);
Route::post('/users/store', [AnimalController::class, 'store']);


Route::get('/animals', [AnimalController::class, 'index']);

Route::post('/animals', [AnimalController::class, 'store']);

Route::put('/animals/{id}', [AnimalController::class, 'update']);

Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);