<?php

namespace App\Observers;

use App\Product;
use App\Subscription;

class ProductObserver
{
    public function updating($product){
        $oldCount = $product->getOriginal('count');

        if($oldCount == 0 && $product->count > 0){
            Subscription::sendEmailBySubscription($product);
        }
    }
}
