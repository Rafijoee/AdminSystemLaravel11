<?php

use App\Http\Controllers\Admin\CheckStageController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::resource('checkstage', CheckStageController::class);
});