<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function color()
    {
        return $this->hasMany('App\product_color');
    }

    public function size()
    {
        return $this->hasMany('App\product_size');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class,'id','is_admin');
    }

    public function top_cat()
    {
        return $this->hasOne(top_category::class,'id','top_cat_id');
    }
}
