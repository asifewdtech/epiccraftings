<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillingDetailColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('billing_first_name')->after('phone')->nullable();
            $table->string('billing_last_name')->after('billing_first_name')->nullable();
            $table->string('billing_email')->after('billing_last_name')->nullable();
            $table->string('billing_company')->after('billing_email')->nullable();
            $table->string('billing_address')->after('billing_company')->nullable();
            $table->string('billing_city')->after('billing_address')->nullable();
            $table->string('billing_country')->after('billing_city')->nullable();
            $table->string('billing_post_code')->after('billing_country')->nullable();
            $table->string('billing_phone')->after('billing_post_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
