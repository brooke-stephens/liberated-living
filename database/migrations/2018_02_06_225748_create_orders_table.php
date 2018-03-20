<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('cart');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('addresslineone');
            $table->text('addresslinetwo');
            $table->string('city');
            $table->string('province');
            $table->string('postalcode');
            $table->string('country')->default('Canada');
            $table->string('phonenumber');
            $table->string('payment_id');
            $table->string('saved');
            $table->string('ispaymentcompleted');
            $table->string('orderstatus')->default(1);
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
        Schema::drop('orders');
    }
}
