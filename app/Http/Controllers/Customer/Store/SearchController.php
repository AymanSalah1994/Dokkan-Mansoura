<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SearchRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $all_categories  = Category::all();
        $all_merchants   = User::where('role_as', '2')->get();
        $search_word = $request->input('search_word');
        // TODO :
        // Order Them By Newest/Lates First  ;
        $allProducts = Product::all();
        $sent_data = ['allProducts', 'all_categories', 'all_merchants'] ;
        // On Product Model we will Make 1 Scope for cats , 1 scope for Merchants , 1 For min price
        // 1 Scope for Max Price , 1 Scope for cheapers First , 1 scope for Highest first
        return view('customer.store.search', compact($sent_data));
    }
}
