<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    public function end_cat()
    {
        return $this->hasOne(end_category::class,'id','end_cat_id');
    }
}
