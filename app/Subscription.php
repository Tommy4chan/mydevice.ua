<?php

namespace App;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    protected $fillable = ['email', 'product_id'];

    public function scopeActiveByProductId($query, $productId){
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function sendEmailBySubscription(Product $product){
        $subsriptions = self::ActiveByProductId($product->id)->get();

        foreach($subsriptions as $subsription) {
            Mail::to($subsription->email)->send(new SendSubscriptionMessage($product));
            $subsription->status = 1;
            $subsription->save();
        }
    }
}
