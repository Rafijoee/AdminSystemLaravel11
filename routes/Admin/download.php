<?php

use App\Http\Controllers\Admin\Download1Controller;
use App\Http\Controllers\Admin\Download2Controller;
use App\Http\Controllers\Admin\DownloadFinalController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('download-path1', Download1Controller::class);
    Route::resource('download-path2', Download2Controller::class);
    Route::resource('download-path3', DownloadFinalController::class);
    Route::get('download', [Download1Controller::class, 'index2']);
});