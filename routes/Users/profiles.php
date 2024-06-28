<?php

use App\Http\Controllers\Users\FinalController;
use App\Http\Controllers\Users\ProfilesController;
use App\Http\Controllers\Users\Submissions1Controller;
use App\Http\Controllers\Users\Submission2Controller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('profile/data/update/{id}', [ProfilesController::class, 'edit'])->name('profile.edit');
    Route::put('profile/data/update/{id}', [ProfilesController::class, 'update2'])->name('profile2.update');
    Route::resource('profile', ProfilesController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('submissions1', Submissions1Controller::class);
});
