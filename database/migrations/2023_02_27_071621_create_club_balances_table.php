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
        Schema::create('club_balances', function (Blueprint $table) {
            $table->id();
            $table->date('motion_date');
            $table->string('operation_type');
            $table->integer('aloe_balance')->nullable();
            $table->integer('tea_balance')->nullable();
            $table->integer('cocktail_balance')->nullable();
            $table->integer('aloe_writeoff')->nullable();
            $table->integer('tea_writeoff')->nullable();
            $table->integer('cocktail_writeoff')->nullable();
            $table->string('reason')->nullable();
            $table->string('customer');
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
        Schema::dropIfExists('club_balances');
    }
};
