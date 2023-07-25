<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table){
            $table->increments('id');
            
            $table->date('fecha_entrada');
            $table->integer('codigo_entrada');
            $table->string('nombre_traslado_entrada');
            $table->time('hora_solicitud_entrada');
            $table->time('hora_entrada');

            $table->date('fecha_salida');
            $table->integer('codigo_salida');
            $table->string('nombre_traslado_salida');
            $table->time('hora_solicitud_salida');
            $table->time('hora_salida');


            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders');
            $table->softDeletes();
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
        Schema::drop('movements');
    }
}
