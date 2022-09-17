<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function viewProfile() {
        $user = Auth::user() ;
        // return "This is your View Profile POge" ;
        return view('customer.profile' , compact('user')) ;
    }
}
