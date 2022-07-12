<?php

namespace App\Http\Middleware;

use App\Order;
use Closure;
use Illuminate\Contracts\Session\Session;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $orderId = session('orderId');
        if(!is_null($orderId) && Order::getFullSum() > 0){
            return $next($request);
        }
        session()->flash('warning', 'У корзині нічого нема(');
        return redirect()->route('home');
        
    }
}
