<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->where('status', 1)->get();
        return view('admin.orders.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        if(Auth::user()->orders->contains($order)){
            return view('admin.orders.show', compact('order'));
        }
        return redirect()->route('home');
    }
}
