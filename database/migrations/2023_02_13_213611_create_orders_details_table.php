<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product');
            $table->integer('quantity');
            $table->float('customer_price');
            $table->float('customer_sum')->nullable();
            $table->float('cost_price');
            $table->float('cost_sum')->nullable();
            $table->float('income')->nullable();
            $table->float('vpoints')->nullable();
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
        Schema::dropIfExists('orders_details');
    }
};
