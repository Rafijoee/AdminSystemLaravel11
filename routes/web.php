<?php

use App\Http\Controllers\Controller;
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
    return view('welcome');
});

Route::get('/rulebook/{name}', [Controller::class, 'download'])->name('download');
Route::get('/proposal/{filename}', [Controller::class, 'download2'])->name('proposal');

// Dashboard - mada
Route::get('/dashboard', [ProfilesController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/teamdata', function () { // #2 Team data
    return view('dashboard.team'); // 
})->middleware(['auth', 'verified']);
Route::get('/submission', function () { 
    return view('dashboard.submission');
})->middleware(['auth', 'verified']);
Route::get('/checkpayment', function () { 
    return view('dashboard.checkpayment');
})->middleware(['auth', 'verified']);

Route::get('/dashboard2', function () {
    return view('dashboard'); // awalnya dashboard aja
})->middleware(['auth', 'verified']);


Route::get('/submissions1', [UsersSubmissions1Controller::class, 'index']);
// Route::post('/submissions1/store', [Sub1Controller::class,'store']);




require __DIR__ . '/users/profiles.php';
require __DIR__ . '/users/payment.php';
require __DIR__ . '/users/detailcategory.php';
require __DIR__ . '/Admin/checkingstage.php';
require __DIR__ . '/Admin/checkingpayment.php';
require __DIR__ . '/auth.php';
