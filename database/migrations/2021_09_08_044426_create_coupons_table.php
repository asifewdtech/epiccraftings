<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon_code');
            $table->enum('coupon_type',['Fixed','Percentage'])->default('Percentage');
            $table->string('coupon_type_value');
            $table->enum('coupon_restriction_type',['limited','unlimited'])->default('unlimited');
            $table->string('coupon_restriction_value')->nullable();
            $table->string('coupon_expiry_date')->nullable();
            $table->enum('status',['0','1'])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
