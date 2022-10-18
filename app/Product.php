<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = ['code', 'name', 'description', 'image', 'category_id', 'price', 'hit', 'new', 'recommend', 'count', 'description_eng', 'name_eng'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

    // public function scopeHit($query){
    //     return $query->where('hit', 1);
    // }

    // public function scopeNew($query){
    //     return $query->where('new', 1);
    // }

    // public function scopeRecommned($query){
    //     return $query->where('recommend', 1);
    // }

    public function setNewAttribute($value){
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value){
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value){
        $this->attributes['recommend'] = $value == 'on' ? 1 : 0;
    }

    public function isHit(){
        return $this->hit === 1;
    }

    public function isNew(){
        return $this->new === 1;
    }

    public function isRecommend(){
        return $this->recommend === 1;
    }

    public function isAvailable(){
        return !$this->trashed() && $this->count > 0;
    }
}
