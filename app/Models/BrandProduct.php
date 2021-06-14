<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    protected $table = 'brand_products';

    public function product(){
        return $this->hasMany('App\Models\Product','brand_id','id');
    }
}
