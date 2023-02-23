<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function order(){
        return $this->belongTo(Order::class,'order_id','id');
    }
}
