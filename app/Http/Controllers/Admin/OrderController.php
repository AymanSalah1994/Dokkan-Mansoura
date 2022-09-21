<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrders()
    {

        $orders = Order::all();
        return view('admin.orders.all-orders', compact('orders'));
    }
    public function checkedOrders()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.checked-orders', compact('orders'));
    }

    public function preparedOrders()
    {
        $orders = Order::where('status', '2')->get();
        return view('admin.orders.prepared-orderes', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::find($id);
        return view('admin.orders.view-order', compact('order'));
    }
    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('admin.orders.all')->with('status', 'Order is Deleted');
    }
    public function prepareOrder($id)
    {
        $order = Order::find($id);
        $order->status  = '2';
        $order->save();
        return redirect()->route('admin.orders.prepared')->with('status', 'Order is Marked Prepared !');
    }
    public function doneOrder($id)
    {
        $order = Order::find($id);
        $order->status  = '4';
        $order->save();
        return redirect()->route('admin.orders.all')->with('status', 'Order is Marked Done !');
    }
}