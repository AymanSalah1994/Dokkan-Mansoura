<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function home()
    {
        return view('merchant.index');
    }

    public function allProducts()
    {
        $products = request()->user()->products()->get();
        return view('merchant.products', compact('products'));
    }

    public function viewProduct($slug)
    {
        $user = Auth::user();
        $product = Product::where('slug', $slug)->where('user_id', $user->id)->first();
        $categories = Category::all();
        return view('merchant.view-update', compact(['product', 'categories']));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('merchant.create-product', compact('categories'));
    }

    public function updateProduct(Request $request)
    {
    }

    public function relatedOrders()
    {
        $user = Auth::user();
        $userProducts = $user->products->pluck('id')->toArray();
        $relatedCartItems = CartItem::where('status', '0')->whereIn('product_id', $userProducts)->get();
        return view('merchant.related-orders', compact('relatedCartItems'));
    }

    public function relatedItemsCounter()
    {
        $user = Auth::user();
        $userProducts = $user->products->pluck('id')->toArray();
        $relatedCartItems = CartItem::where('status', '0')->whereIn('product_id', $userProducts)->get();

        $relatedCount = $relatedCartItems->count();
        return response()->json(['relatedCount' => $relatedCount]);
    }
}
