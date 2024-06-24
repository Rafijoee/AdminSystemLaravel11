<?php

use App\Http\Controllers\Users\FinalController;
use App\Http\Controllers\Users\Submissions1Controller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkstage'])->group(function () {
    Route::resource('final-submission', FinalController::class);
});