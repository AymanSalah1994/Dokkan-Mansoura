<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function checkout()
    {
        // This is Controller to Check Out the Active Order is Exist  ;
        $user = Auth::user();

        // TODO :
        // Better One : If user Has Order with status 0 Get Items of this Order
        $cartItems  = CartItem::Where('user_id', $user->id)->where('status', '0')->get();

        foreach ($cartItems as $item) {
            if ($item->product->status == '0') {
                $outOfStockItem = CartItem::find($item->id);
                $outOfStockItem->delete();
            }
        }
        $cartItems = CartItem::Where('user_id', $user->id)->where('status', '0')->get();
        return view('customer.orders.checkout', compact([
            'user', 'cartItems'
        ]));
    }

    public function confirmOrder(Request $request)
    {
        // $order_id = $request->checking_order;
        // $order = Order::find($order_id);
        // $order->status = "1";
        // $order->save();
        // $order_cart_items = CartItem::where('order_id', $order_id)->get();
        // foreach ($order_cart_items as $item) {
        //     $cartItem = CartItem::find($item->id);
        //     $cartItem->status = "1";
        //     $cartItem->save();
        // }

        return redirect()->route('orders.all')->with('status', 'Order and its Items are Updated!');
    }


    public function allOrders() {
        $user =  Auth::user() ;
        $orders = $user->orders ;
        return view('customer.orders.all-orders' , compact('orders')) ;
    }

    public function orderDetails($id){
        // get the Order "With Cart items "
        // Return a View Showing All Details about the Cart item
        return view('customer.orders.order-details') ; 
    }
}
