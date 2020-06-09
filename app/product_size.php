<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{

    protected $fillable=['product_id','size_id'];



    public function size_data(){
        return $this->hasOne(size::class,'id','size_id');
    }
}
