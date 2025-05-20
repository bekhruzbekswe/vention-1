<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AuthController;



// Route::get('contacts', [ContactController::class, 'index']);
// Route::post('contacts', [ContactController::class, 'store']);
// Route::get('contacts/{id}', [ContactController::class, 'show']);
// Route::put('contacts/{id}', [ContactController::class, 'update']);
// Route::delete('contacts/{id}', [ContactController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('contacts', ContactController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
