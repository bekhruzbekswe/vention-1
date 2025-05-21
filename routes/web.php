<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('contacts.index');
    });
   
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('contacts', ContactController::class);

    Route::middleware('is_admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::patch('/contacts/{contact}/toggle-block', [ContactController::class, 'toggleBlock'])->name('contacts.toggleBlock');
    });

});

