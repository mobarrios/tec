<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_orden')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->integer('presupuesto_id')->nullable();
            $table->integer('importe_total')->nullable();
            $table->integer('dto')->nullable();


            $table->string('numero_serie')->nullable(); 
            $table->string('serie_partes')->nullable();
            $table->string('falla_declarada')->nullable(); 
            $table->string('observaciones')->nullable(); 
            $table->string('observaciones_tecnicas')->nullable(); 
            $table->integer('presupuesto_estimado')->nullable(); 
            $table->integer('states_id')->nullable(); 
            $table->integer('total')->nullable(); 
            $table->integer('pagado')->nullable(); 
            $table->string('orden_manual')->nullable(); 
            $table->string('observaciones_internas')->nullable(); 
            $table->string('partes')->nullable(); 
            
            /*
            Relations
            */

            $table->integer('users_id')->nullable(); 
            $table->integer('equipments_id')->nullable();  
            $table->integer('brands_id')->nullable(); 
            $table->integer('models_id')->nullable(); 
            $table->integer('clients_id')->nullable(); 
            
            
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
        Schema::drop('orders');
    }
}
