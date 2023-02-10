<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function authenticate(Request $request){
        //login logique here
        $request->validate([
            "email" => ['required','email'],
            "password" => ['required']
        ]);

        if(auth()->attempt($request->only('email','password'))){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors('Email or password are incorrect');
    }
    public function logout(){
        //logout logique here
        auth()->logout();
        return redirect()->route('login');
    }
    public function store(Request $request){
        $validatedInput = $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required'],
        ]);
        $validatedInput['password'] = bcrypt($validatedInput['password']);
        $user = User::create($validatedInput);
        event(new Registered($user));
        Auth()->login($user);

        return redirect()->route('dashboard')->with('info-message','Account created');
    }
}
