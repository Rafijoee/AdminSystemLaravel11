<?php

use App\Http\Controllers\Admin\CheckPaymentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::resource('checkpayment', CheckPaymentController::class);
});