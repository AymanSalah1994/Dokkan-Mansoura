<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrders() {

        $orders = Order::all() ;
        return view('admin.orders.all-orders', compact('orders'));
    }
    public function checkedOrders() {
        $orders = Order::where('status' , '1')->get() ;
        return view('admin.orders.checked-orders', compact('orders'));
    }

    public function preparedOrders() {
        $orders = Order::where('status' , '2')->get() ;
        return view('admin.orders.prepared-orderes', compact('orders'));
    }
}
