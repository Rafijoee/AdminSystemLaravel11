<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
