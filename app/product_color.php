<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_color extends Model
{
    public function product()
    {
        return $this->belongsTo(product::class);
    }


    public function color_data()
    {
        return $this->hasOne(color::class,'id','color_id');
    }

}
