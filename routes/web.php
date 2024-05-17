<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Submissions1Controller;
use App\Http\Controllers\Users\ProfilesController;
use App\Http\Controllers\Sub1Controller;
use App\Http\Controllers\Users\Submissions1Controller as UsersSubmissions1Controller;
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


Route::get('/submissions1', [UsersSubmissions1Controller::class,'index']);
Route::post('/submissions1/store', [Sub1Controller::class,'store']);




require __DIR__.'/users/profiles.php';
require __DIR__.'/auth.php';
