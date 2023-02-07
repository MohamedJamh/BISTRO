<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
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
        return redirect()->route('home');
    }
}
