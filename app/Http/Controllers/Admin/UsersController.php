<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function allUsers(){
        $users = User::all() ;
        return view('admin.users.all-users' , compact('users')) ;
    }
    public function allCustomers(){
        $customers = User::where('role_as' , '0')->get() ;
        return view('admin.users.all-customers' , compact('customers')) ;
    }
    public function allMerchants(){
        $merchants = User::where('role_as' , '2')->get() ;
        return view('admin.users.all-merchants' , compact('merchants')) ;
    }
    public function allDealers(){
        $dealers = User::where('role_as' , '3')->get() ;
        return view('admin.users.all-dealers' , compact('dealers')) ;
    }
}
