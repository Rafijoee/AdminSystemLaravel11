<?php

use App\Http\Controllers\Admin\CheckStageController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('checkstage', CheckStageController::class);
    Route::get('checkstages-ppl', [CheckStageController::class, 'ppl']);
    Route::get('checkstages-ux', [CheckStageController::class, 'ux']);
    Route::get('checkstages-kti', [CheckStageController::class, 'kti']);
    Route::get('checkstages-busplan', [CheckStageController::class, 'busplan']);
});