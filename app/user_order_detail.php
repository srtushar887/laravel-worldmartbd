<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_order_detail extends Model
{
    public function product()
    {
        return $this->hasOne(product::class,'id','product_id');
    }

    public function size()
    {
        return $this->hasOne(size::class,'id','size_id');
    }

    public function color()
    {
        return $this->hasOne(color::class,'id','color_id');
    }
}
