<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurcharsesStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   

    Schema::create('purchases_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purcharses_id')->nullable(); 
            $table->integer('states_id')->nullable();
            $table->integer('users_id')->nullable();
            $table->integer('confirmar_cliente')->nullable();

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
       Schema::drop('purchases_states');
    }
}
