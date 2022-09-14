<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddCartItemRequest;
use App\Http\Requests\Customer\DeleteCartItemRequest;
use App\Http\Requests\Customer\UpdateCartItemRequest;
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
                $request->updateTotalOrder($cartItemData['order_id']);
                // If there is an Error , Laravel Will send it Automatically to the Ajax , We
                // Need to handle it from there "From the View "
                return response()->json([
                    'status' => 'I got yourack !'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'Please Log in First'
            ]);
        }
    }

    public function viewCart()
    {
        // Get the User Object Holding User Data  :
        $user = Auth::user();
        $currentCartItems = CartItem::Where('user_id', $user->id)->where('status', '0')->get();

        $total = 0;
        foreach ($currentCartItems as $item) {
            $total += ($item->quantity * $item->product->selling_price);
        }
        return view('customer.store.view-cart', compact(['currentCartItems', 'total']));
    }

    public function deleteCartItem(DeleteCartItemRequest $request)
    {
        $cartItem  = CartItem::find($request->cartItemID);
        $cartItem->delete();
        // TOTAL
        $user = Auth::user();
        $activeOrder = $user->orders->where('status', '0')->first();
        $request->updateTotalOrder($activeOrder->id);
        return response()->json([
            'status' => 'Item Deleted Successfully'
        ]);
        // TODO : In case something went wrong how to just make One Universal message "sth went wrong" ??
    }
    public function updateCartItem(UpdateCartItemRequest $request)
    {
        CartItem::where('id', $request->cartItemID)->update(['quantity' => $request->product_quantity]);
        $cartItem = CartItem::find($request->cartItemID);
        $request->updateTotalOrder($cartItem->order_id);
        return response()->json([
            'status' => 'UpDated Quantity '
        ]);
    }
}
