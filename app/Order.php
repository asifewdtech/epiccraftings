<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class,'order_id','id');
    }
}
