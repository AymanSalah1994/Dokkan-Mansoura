<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddCartItemRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addCartItem(AddCartItemRequest $request)
    {
        if (Auth::check()) {
            // TODO : Put this Checking in a Seperate Place
            if (CartItem::where('product_id', $request->product_id)->where('user_id', $request->user()->id)->where('status', '0')->exists()) {
                return response()->json([
                    'status' => 'Item is Already Added'
                ]);
            } else {
                $cartItemData = $request->handleRequest();
                CartItem::create($cartItemData);
                // If there is an Error , Laravel Will send it Automatically to the Ajax , We
                // Need to handle it from there "From the View "
                return response()->json([
                    'status' => 'I got yourack !'
                ]);
            }
        }
        else {
            return response()->json([
                'status' => 'Please Log in First'
            ]);
        }
    }
}
