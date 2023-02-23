<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['coupon_code','user_coupon_code', 'coupon_type', 'coupon_type_value', 'coupon_restriction_type', 'coupon_restriction_value', 'coupon_expiry_date'];
}
