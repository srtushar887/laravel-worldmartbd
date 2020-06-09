<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class middle_category extends Model
{
    public function top_cat()
    {
        return $this->hasOne(top_category::class,'id','top_cat_id');
    }
}
