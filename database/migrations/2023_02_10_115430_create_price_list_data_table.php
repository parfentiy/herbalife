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
        Schema::create('price_list_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price_list_id');
            $table->float('vpoints', 5, 2);
            $table->float('retail_price', 8, 2);
            $table->float('pd10', 8, 2);
            $table->float('pd20', 8, 2);
            $table->float('pd30', 8, 2);
            $table->float('pc15', 8, 2);
            $table->float('pc25', 8, 2);
            $table->float('pc35', 8, 2);
            $table->float('ip25', 8, 2);
            $table->float('ip35', 8, 2);
            $table->float('ip42', 8, 2);
            $table->float('sv_price', 8, 2);
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
        Schema::dropIfExists('price_list_data');
    }
};
