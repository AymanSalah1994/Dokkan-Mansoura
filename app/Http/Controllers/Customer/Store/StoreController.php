<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

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
        $product = Product::findOrFail($id);
        return view('customer.store.product-details' , compact('product'));
    }
}
