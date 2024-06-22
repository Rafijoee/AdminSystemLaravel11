<?php

use App\Http\Controllers\Users\Submission2Controller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'stage_2'])->group(function () {
    Route::resource('submission2', Submission2Controller::class);
});