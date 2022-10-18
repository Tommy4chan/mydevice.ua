<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();

        return view('basket', compact('order'));
    }

    public function basketPlace()
    {
        $basket = new Basket();
        $order = (new Basket())->getOrder();
        if(!$basket->countAvailable()){
            session()->flash('warning', 'Більше нема товару');
            return redirect()->route('basket');
        }
        return view('order', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new Basket())->saveOrder($request->name, $request->phone, $email)) {
            session()->flash('success', 'Замовлення прийняте в опрацювання');
        } else {
            session()->flash('warning', 'Більше нема товару');
        }

        Order::changeFullSum(-Order::getFullSum());

        return redirect()->route('home');
    }

    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);

        if($result){
            session()->flash('success', 'Добавлений товар ' . $product->name);
        }
        else{
            session()->flash('warning', 'Більше нема товару');
        }
        
        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);
        
        session()->flash('warning', 'Видалений товар ' . $product->name);
        return redirect()->route('basket');
    }
}
