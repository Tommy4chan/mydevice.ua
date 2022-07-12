<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $products = Product::paginate(4);
        return view('home', compact('products'));
    } 

    public function hotPrices(){
        return view('hotPrices');
    }

    public function categories($code, ProductsFilterRequest $request){
        $category = Category::where('code', $code)->first();
        
        //$category->products = Product::paginate(4);
        if($request->filled('price_from')){
            $category->products->where('price', '>=', $request->price_from);
        }
        if($request->filled('price_to')){
            $category->products = $category->products->where('price', '<=', $request->price_to);
        }
        foreach(['hit','new','recommend'] as $field){
            if($request->has($field)){
                $category->products = $category->products->where($field, 1);
            }
        }
        $category->products = $category->products->paginate(2)->withPath("?" . $request->getQueryString());

        return view('category', compact('category'));
    }

    public function product($productCode){
        $product = Product::where('code', $productCode)->first();
        return view('product', compact('product'));
    }
}
