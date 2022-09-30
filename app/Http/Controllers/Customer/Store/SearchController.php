<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
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
        $allProducts = Product::orderBy('updated_at', 'DESC')->LowHigh()->SelectCategory()->SelectMerchant()->SearchWord()->MiniPrice()->MaxPrice()->paginate(10);
        $sent_data = ['allProducts', 'all_categories', 'all_merchants'];
        // TODO :
        // Order Them By Newest/Lates First  ;
        return view('customer.store.search', compact($sent_data));
    }
}
