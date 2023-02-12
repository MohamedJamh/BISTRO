<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    //
    public function __invoke(){
        //
        return view('dashboard',[
            'users' => User::all()
        ]);
    }
    public function switchUserRole(User $user,String $action){
        $adminRoleId = Role::where('name','Admin')->value('id');
        switch ($action) {
            case 'Attach':
                $user->roles()->attach([$adminRoleId]);
                break;
            default:
                $user->roles()->detach([$adminRoleId]);
                break;
        }
        return redirect()->route('dashboard');
    }
}
