<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $products = Product::get();
        return view('home', compact('products'));
    }

    public function hotPrices(){
        return view('hotPrices');
    }

    public function categories($code){
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($productCode){
        $product = Product::where('code', $productCode)->first();
        return view('product', compact('product'));
    }
}
