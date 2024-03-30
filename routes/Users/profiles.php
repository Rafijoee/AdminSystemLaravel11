<?php

use App\Http\Controllers\Users\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfilesController::class);
});