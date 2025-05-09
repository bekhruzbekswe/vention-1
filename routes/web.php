<?php

use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::resource('contacts', ContactController::class);
