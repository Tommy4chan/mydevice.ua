<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function productsWithTrashed(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTrashed()->withTimestamps();
    }

    public function calculateFullSum(){
        $sum = 0;
        foreach($this->products()->withTrashed()->get() as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function changeFullSum($changeSum){
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    public static function getFullSum(){
        return session('full_order_sum', 0);
    }

    public function saveOrder($name, $phone){
        if($this->status == 0){
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }
        else{
            return false;
        }

    }
}
