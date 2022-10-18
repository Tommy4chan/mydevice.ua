<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 1)->get();
        return view('admin.orders.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('productsWithTrashed');
        return view('admin.orders.show', compact('order'));
    }
}
