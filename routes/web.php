<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.create');
});

Route::resource('users', UserController::class);
Route::post('users/send-to-api', [UserController::class, 'sendToAPI'])->name('users.sendToAPI');
