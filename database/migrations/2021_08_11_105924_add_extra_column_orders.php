<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_tracking')->after('total')->nullable();
            $table->string('order_courier')->after('order_tracking')->nullable();
            $table->string('order_shipping_date')->after('order_courier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_tracking');
            $table->dropColumn('order_courier');
            $table->dropColumn('order_shipping_date');
        });
    }
}
