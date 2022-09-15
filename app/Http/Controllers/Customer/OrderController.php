<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function checkout()
    {
        // This is Controller to Check Out the Active Order is Exist  ;
        $user = Auth::user();
        $cartItems  = CartItem::Where('user_id', $user->id)->where('status', '0')->get();

        foreach ($cartItems as $item) {
            if($item->product->status == '0') {
                $outOfStockItem = CartItem::find($item->id) ;
                $outOfStockItem->delete() ;
            }
        }
        $cartItems = CartItem::Where('user_id', $user->id)->where('status', '0')->get();
        return view('customer.orders.checkout', compact([
            'user', 'cartItems'
        ]));
    }
}
