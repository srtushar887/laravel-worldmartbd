<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_order extends Model
{
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function dealer()
    {
        return $this->hasOne(Dealer::class,'id','user_id');
    }



}
