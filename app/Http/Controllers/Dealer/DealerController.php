<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        return view('dealer.home');
    }

    public function viewCheckedOrders()
    {
        $checkedOrders = Order::where('status', '1')->get();
        return view('dealer.view-checked-orders', compact('checkedOrders'));
    }

    public function orderDetails($id, $tracking_id)
    {
        $order = Order::find($id);
        return view('dealer.order-details', compact('order'));
    }

    public function markPrepared($id)
    {
        $order = Order::find($id);
        $order->status  = '2';
        foreach ($order->cartItems as $item) {
            $item->status = '2';
            $item->save();
        }
        $order->save();
        return redirect()->route('dealer.panel.view.prepared.orders')->with('status', 'Order is Marked Prepared !');
    }

    public function viewPreparedOrders()
    {
        $orders = Order::where('status', '2')->orderBy('updated_at', 'DESC')->get();
        return view('dealer.view-prepared-orders', compact('orders'));
    }

    public function markDone($id)
    {
        $order = Order::find($id);
        $order->status  = '4';
        $order->save();
        foreach ($order->cartItems as $item) {
            $item->status = '4';
            $item->save();
        }
        return redirect()->route('dealer.panel.view.done.orders')->with('status', 'Order is Marked Done !');
    }

    public function viewDoneOrders()
    {
        $alldoneOrders = Order::where('status', '4')->orderBy('updated_at', 'DESC')->get();
        return view('dealer.view-done-orders', compact('alldoneOrders'));
    }


    public function viewToRefund($id, $tracking_id)
    {
        $order = Order::find($id);
        return view('dealer.view-order-to-refund', compact('order'));
    }










    public function CANCELdeleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('admin.orders.all')->with('status', 'Order is Deleted');
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
        $item->save();
        $new_Total =  $order->total - ((int) $item->product->selling_price * $item->quantity);
        $order->total = $new_Total;
        // TODO
        // If all Items REfunded Mark Order As Refunded
        $order->save();
        return redirect()->route('orders.done')->with('status', 'Item is Returned Back !');
    }
}
