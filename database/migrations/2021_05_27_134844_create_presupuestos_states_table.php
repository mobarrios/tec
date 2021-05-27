<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('presupuestos_id')->nullable(); 
            $table->integer('states_id')->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('users_id')->nullable();

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
        Schema::drop('presupuestos_states');
    }
}
