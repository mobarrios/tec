<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purcharses', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('descripcion');
            $table->integer('precio_unitario');
            $table->integer('total');
            $table->string('condicion_venta');
            $table->integer('cantidad');


            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('clients_id')->unsigned();
            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('cascade');
            /*
            Relations


            $table->integer('iva_conditions_id')->unsigned()->index()->nullable();
            $table->foreign('iva_conditions_id')->references('id')->on('iva_conditions');

            $table->integer('equipments_id')->unsigned();
            $table->foreign('equipments_id')->references('id')->on('equipments')->onDelete('cascade');

            $table->integer('brands_id')->unsigned();
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');

            $table->integer('models_id')->unsigned();
            $table->foreign('models_id')->references('id')->on('models')->onDelete('cascade');

            */

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
        Schema::drop('purcharses');
    }
}
