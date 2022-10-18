<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Product;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        $product = Product::where('code', $productCode)->withTrashed()->firstOrFail();
        return view('product', compact('product'));
    }

    public function subscribe(SubscriptionRequest $request, Product $product){
        $email = Auth::check() ? Auth::user()->email : $request->email;
        Subscription::create([
            'email' => $email,
            'product_id' => $product->id
        ]);
        return redirect()->back()->with('success', __('main.subscription'));
    }

    public function changeLanguage($language){
        $availableLanguages = ['ua', 'eng'];
        if(in_array($language, $availableLanguages)){
            session(['language' => $language]);
            App::setLocale($language);
            return redirect()->back();
        }
    }
}
