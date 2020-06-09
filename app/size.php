<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    public function end_cat()
    {
        return $this->hasOne(end_category::class,'id','end_cat_id');
    }


//    public function product_size()
//    {
//        return $this->belongsTo('App\product_size');
//    }
}
