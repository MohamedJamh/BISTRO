<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function __invoke(){
        //
        return view('dashboard',[
            'users' => User::all()
        ]);
    }
}
