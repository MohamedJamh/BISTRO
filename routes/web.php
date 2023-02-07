<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::get('dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::get('login',[AuthController::class,'login'])->name('login');

Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');

Route::post('logout',[AuthController::class,'logout'])->name('logout');


