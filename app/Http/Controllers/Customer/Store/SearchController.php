<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $allProducts = Product::all() ;
        return view('customer.store.search' , compact('allProducts')) ;
    }
}
