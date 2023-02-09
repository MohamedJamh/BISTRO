<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

// email confirmation routes 
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
//

Route::get('/', [AuthController::class,'login'])->name('home');

Route::get('register',[AuthController::class,'register'])->name('registration');



Route::get('login',[AuthController::class,'login'])->name('login');

Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');

Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::post('store',[AuthController::class,'store'])->name('user.store');


Route::get('dashboard', DashboardController::class)->name('dashboard')->middleware(['auth','verified']);

Route::resource('meal', MealController::class)->middleware(['auth','verified']);


