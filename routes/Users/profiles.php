<?php

use App\Http\Controllers\Users\ProfilesController;
use App\Http\Controllers\Users\Submissions1Controller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfilesController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('submission1', Submissions1Controller::class);
});