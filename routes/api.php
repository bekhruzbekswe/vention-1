<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



Route::middleware(['auth:sanctum', Authenticate::class])->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());
    Route::apiResource('contacts', ContactController::class);
});

Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return response()->json([
        'token' => $user->createToken('api-token')->plainTextToken,
    ]);
});

