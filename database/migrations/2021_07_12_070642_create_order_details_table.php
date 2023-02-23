<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('title')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('line_one_text')->nullable();
            $table->string('line_two_text')->nullable();
            $table->string('line_three_text')->nullable();
            $table->string('size')->nullable();
            $table->date('deliver_date')->nullable();
            $table->date('ordered_date')->nullable();
            $table->string('fonts')->nullable();
            $table->string('image')->nullable();
            $table->string('colors')->nullable();
            $table->string('install')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('backing_color')->nullable();
            $table->string('backing_shape')->nullable();
            $table->enum('is_rush_order',['0','1'])->default(0);
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
