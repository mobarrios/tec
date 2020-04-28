<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_orders', function (Blueprint $table){
            $table->increments('id');
            $table->integer('tasks_id')->unsigned();
            $table->foreign('tasks_id')->references('id')->on('tasks');

            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders');

            $table->boolean('estado');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks_orders');
    }
}
