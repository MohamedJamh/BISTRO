<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MealController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



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






    

Route::middleware(['guest'])->group(function(){
    //Auth system routes
    Route::get('register',[AuthController::class,'register'])->name('registration');
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    Route::post('store',[AuthController::class,'store'])->name('user.store');

    //Reset Password routes
    //get view to submit email
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    //send reset email
    Route::post('/forgot-password', function (Request $request) {

        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);

    })->name('password.email');

    //reset password view after email
    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    //edit password after submition 
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});
//

Route::middleware(['auth'])->group(function(){
    //logout route
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    // email confirmation routes ---------------------------
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('meal');
    })->middleware(['signed'])->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('info-message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
    //--------------------------
    
    Route::middleware(['verified'])->group(function(){
        
        // meal routes--------------------------------
        Route::resource('/meal', MealController::class);
        
        //profile routes-------------------------------
        Route::get('/profile',[UserController::class,'index'])->name('user.profile');
        Route::put('/reset-password',[UserController::class,'updatePassword'])->name('user.reset-password');
        Route::put('/reset-details',[UserController::class,'updateDetails'])->name('user.change-details');
        
        //super admin routes----------------------------
        Route::middleware(['role:SuperAdmin'])->group(function(){
            Route::get('/user-dashboard', DashboardController::class)->name('dashboard');
            Route::post('/switch-user-role/{user}/{action}',[DashboardController::class,'switchUserRole'])->name('dashboard.switch-user-role');
        });
    });
});

//debug route
Route::get('/debug', function () {
});
//

