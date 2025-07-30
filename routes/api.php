<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\InnovationController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\AuthController;

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Public routes (guests can view only)
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/publications', [PublicationController::class, 'index']);
Route::get('/publications/{id}', [PublicationController::class, 'show']);

Route::get('/innovations', [InnovationController::class, 'index']);
Route::get('/innovations/{id}', [InnovationController::class, 'show']);

Route::get('/research', [ResearchController::class, 'index']);
Route::get('/research/{id}', [ResearchController::class, 'show']);

// Protected routes (only logged-in users can create, update, delete)
Route::middleware('auth:sanctum')->group(function () {
    // News CRUD
    Route::post('/news', [NewsController::class, 'store']);
    Route::put('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);

    // Publications CRUD
    Route::post('/publications', [PublicationController::class, 'store']);
    Route::put('/publications/{id}', [PublicationController::class, 'update']);
    Route::delete('/publications/{id}', [PublicationController::class, 'destroy']);

    // Innovations CRUD
    Route::post('/innovations', [InnovationController::class, 'store']);
    Route::put('/innovations/{id}', [InnovationController::class, 'update']);
    Route::delete('/innovations/{id}', [InnovationController::class, 'destroy']);

    // Research CRUD
    Route::post('/research', [ResearchController::class, 'store']);
    Route::put('/research/{id}', [ResearchController::class, 'update']);
    Route::delete('/research/{id}', [ResearchController::class, 'destroy']);

    // Authenticated user info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
