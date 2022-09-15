<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function checkout() {
        // This is Controller to Check Out the Active Order is Exist  ;
        return view('customer.orders.checkout') ;
    }
}
