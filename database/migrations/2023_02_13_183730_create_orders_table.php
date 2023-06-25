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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer');
            $table->integer('pricelist');
            $table->float('customer_sum')->nullable();
            $table->float('cost_sum')->nullable();
            $table->float('income')->nullable();
            $table->float('vp_total')->nullable();
            $table->date('order_date');
            $table->date('paid_date')->nullable();
            $table->date('ship_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
