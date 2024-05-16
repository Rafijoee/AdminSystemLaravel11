<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Submissions1Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('detail_lomba.index');
});

// Dashboard - mada
Route::get('/dashboard', function () { //get untuk path di browser #1 peserta
    return view('dashboard.index'); // path ke file yang dirun
});
Route::get('/teamdata', function () { // #2 Team data
    return view('dashboard.team'); // 
});
Route::get('/submission', function () { // #3 Submission
    return view('dashboard.submission'); //
});

Route::get('/dashboard2', function () {
    return view('dashboard'); // awalnya dashboard aja
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/users/profiles.php';
require __DIR__.'/auth.php';
