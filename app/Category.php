<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['code', 'name', 'description', 'image', 'description_eng', 'name_eng'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
