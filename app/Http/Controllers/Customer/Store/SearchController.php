<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        // TODO : 
        // Order Them By Newest/Lates First  ;
        $allProducts = Product::all() ;
        return view('customer.store.search' , compact('allProducts')) ;
    }
}
