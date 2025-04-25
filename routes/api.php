<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);         // GET semua user
Route::get('/users/{id}', [UserController::class, 'show']);     // GET user by ID
Route::post('/users', [UserController::class, 'store']);        // POST buat user
Route::put('/users/{id}', [UserController::class, 'update']);   // PUT update user
Route::delete('/users/{id}', [UserController::class, 'destroy']); // DELETE user
