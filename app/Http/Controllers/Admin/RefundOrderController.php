<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;

class RefundOrderController extends Controller
{
    public function allDoneOrders()
    {
        $alldoneOrders = Order::where('status', '4')->orderBy('updated_at', 'DESC')->get();
        return view('admin.orders.all-done-orders', compact('alldoneOrders'));
    }
    public function allRefundedOrders()
    {
        $allRefundedOrders = Order::where('status', '5')->orderBy('updated_at', 'DESC')->get();
        return view('admin.orders.all-refunded-orders', compact('allRefundedOrders'));
    }

    public function refundOrderDetails($id)
    {
        $order = Order::find($id);
        return view('admin.orders.refund-order-details', compact('order'));
    }
    public function refundOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = '5';
        $order->save();
        foreach ($order->cartItems as $item) {
            $item->status = '5';
            $item->save();
        }
        return redirect()->route('orders.refunded')->with('status', 'DOOOONEEE!');
    }

    public function refundItem(Request $request)
    {
        // TODO : Refund and Quantity in mind
        $order = Order::find($request->order_id);
        $item  = CartItem::find($request->item_id);
        $item->status = '5';
        $new_Total =  $order->total - (int) $item->product->selling_price;
        $item->save();
        $order->total = $new_Total;
        $order->save();
        return redirect()->route('orders.done')->with('status', 'Item is Returned Back !');
    }
}
