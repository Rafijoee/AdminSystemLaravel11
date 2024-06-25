<?php

use App\Http\Controllers\Users\Submission2Controller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkstage', 'payment2'])->group(function () {
    Route::resource('submissions2', Submission2Controller::class);
});