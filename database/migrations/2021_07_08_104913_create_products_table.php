<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('min_price');
            $table->string('max_price')->nullable();
            $table->string('size')->nullable();
            $table->string('quantity')->default(1);
            $table->string('image');
            $table->longText('description')->nullable();
            $table->longText('additional_information')->nullable();
            $table->longText('features')->nullable();
            $table->longText('how_to_order')->nullable();
            $table->longText('shipping_process')->nullable();
            $table->longText('packaging')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
