<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class UserController extends Controller
{
    //
    public function index(){
        //return view
        return view('user.profile',[
            'user'=>auth()->user()
        ]);
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required','min:8'],
            'password' => ['required','min:8','confirmed',]
        ]);
        if(Hash::check($request->input('current_password'),auth()->user()->password)){
            User::where('id',auth()->user()->id)->update([
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect()->route('user.profile')->with('info-message','Your Password Has been Updated');
        }
        $errors = array('Wrong Current Password');
        return redirect()->route('user.profile')->withErrors($errors);
    }
    public function updateDetails(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email']
        ]);

        if(auth()->user()->email != $request->email){
            $request->validate(['email' => ['unique:users']]);
            User::where('id',auth()->user()->id)->update([
                'name' => $request->name,
                'email_verified_at' => null,
                'email' => $request->email
            ]);

        }else{
            User::where('id',auth()->user()->id)->update([
                'name' => $request->name,
            ]);
        }
        return redirect()->route('user.profile')->with('info-message','Your information has been updated');
    }
}
