<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id')->nullable(); 
            $table->integer('states_id')->nullable();
            $table->integer('users_id')->nullable();
            //$table->integer('users_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_states');
    }
}
