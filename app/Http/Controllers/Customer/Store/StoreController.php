<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class StoreController extends Controller
{
    public function index()
    {
        // TODO : Changing this Main Page
        // Make a New Folder Outside Layouts and Exntend the Main Page
        $featured_products = Product::where('trending', '1')->take(5)->get();
        $featured_categories = Category::where('popular', '1')->take(5)->get();
        return view('customer.store.home', compact(['featured_products', 'featured_categories']));
    }

    public function categories()
    {
        $allCategories = Category::where('status', '1')->get();
        // This is to make Sure Only active Category NOT all !
        return view('customer.store.categories', compact('allCategories'));
    }

    public function categoryProducts($id)
    {
        $category = Category::findOrFail($id);

        // Get Products ONLY that are Availiable
        $categoryProducts = $category->products()->where('status', '1')->get();
        return view('customer.store.category-products', compact(['categoryProducts', 'category']));
    }

    public function productDetails($id)
    {
        $user = Request::user() ;
        $average_rating = Review::where('product_id',$id)->avg('rating_stars') ;
        $average_rating = round($average_rating) ;
        if($user) {
            $user_review = Review::where('product_id' ,$id )->where('user_id',$user->id)->first() ;
        }
        else {
            $user_review = false  ;
        }
        $product = Product::findOrFail($id);
        // dd($user_review) ;
        return view('customer.store.product-details' , compact(['product','average_rating','user_review']));
    }

    public function allMerchants(){
        $all_merchants = User::where('role_as' , '2')->get() ;
        return view('customer.store.all-merchants' , compact('all_merchants')) ;
    }
    public function merchantDetails($id){
        return view('customer.store.merchant-details') ;
    }
    public function merchantProducts($id){
        return view('customer.store.merchant-products') ;
    }
}
