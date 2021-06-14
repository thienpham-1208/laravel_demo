<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category(){
        return $this->belongsTo('App\Models\Category','cate_id','id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\BrandProduct','brand_id','id');
    }
}
