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

        // Delete Out of Stock "Products with status 0  "
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
        $user = Auth::user();
        $order_id = $request->checking_order;
        $order = Order::find($order_id);
        // //  Check If he Has previous Order with status 1 ?
        // If so then Alert Him  , Else , Continue to Making the Status 1
        if ($user->orders->where('status', '1')->first()) {
            return redirect()->route('orders.all')->with('status', 'No you Cant!!!!!!');
            // Now you are supposed to add a Functionality for "Checked and Pinding
            // So that a user Can Cancel it Or Add Items to it !
        }
        $order->status = "1";
        $order->save();
        $order_cart_items = CartItem::where('order_id', $order_id)->get();
        foreach ($order_cart_items as $item) {
            $cartItem = CartItem::find($item->id);
            $cartItem->status = "1";
            $cartItem->save();
        }

        return redirect()->route('orders.all')->with('status', 'Order and its Items are Updated!');
    }


    public function allOrders()
    {
        $user =  Auth::user();
        $orders = $user->orders;
        return view('customer.orders.all-orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        // get the Order "With Cart items "
        $order = Order::find($id);
        // Return a View Showing All Details about the Cart item
        return view('customer.orders.order-details', compact('order'));
    }

    public function cancelOrder(Request $request)
    {
        $order = Order::find($request->order);
        $order_items = CartItem::where('order_id', $order->id)->get();
        foreach ($order_items as $item) {
            $cartItem  = CartItem::find($item->id);
            $cartItem->status = '3';
            $cartItem->save();
        }
        $order->status  = '3';
        $order->save();
        return redirect()->route('orders.all')->with('status', 'Order is Cancelled');
    }

    public function returnOrderToCart(Request $request)
    {
        // How To Check that the User Has This Order ?
        $returned_order  = Order::where('user_id', Auth::user()->id)->where('id', $request->order)->first();
        $active_order = Order::where('user_id', Auth::user()->id)->where('status', '0')->first();

        if ($active_order) {
            $returned_items  = $returned_order->cartItems;
            $active_items  = $active_order->cartItems;
            foreach ($returned_items as $item) {
                if ($active_items->contains('product_id', $item->product_id)) {
                    $item->delete();
                } else {
                    $item->status = '0';
                    $item->order_id = $active_order->id;
                    $item->save();
                }
            }
            $returned_order->delete();
            self::updateTotalOrder($active_order->id);
            return redirect()->route('orders.all')->with('status', 'Order is Returned');
        } else {
            $returned_items  = $returned_order->cartItems;
            foreach ($returned_items as $item) {
                $item->status = '0';
                $item->save();
            }
            $returned_order->status = '0';
            $returned_order->save();
            self::updateTotalOrder($returned_order->id);
            return redirect()->route('orders.all')->with('status', 'Order is Returned');
        }
    }
    public static function updateTotalOrder($order_id)
    {
        // This is a Helper Function For Calculating the Total For Order
        // WHenver an Update Happens
        $or = Order::find($order_id);
        $total = 0;
        foreach ($or->cartItems->all() as $orderItem) {
            $total = $total + ($orderItem->product->selling_price * $orderItem->quantity);
        }
        Order::where('id', $order_id)->update(['total' => $total]);
    }
}
