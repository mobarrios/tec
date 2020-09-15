<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddModuloVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('purcharses_id')->nullable(); 
           // $table->string('precio_venta')->nullable();
            $table->integer('clients_id')->nullable();
            $table->integer('users_id')->nullable();
            $table->integer('companies_id')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('purcharses_id');
           // $table->dropColumn('precio_venta');
            $table->dropColumn('clients_id');
            $table->dropColumn('users_id');
            $table->dropColumn('companies_id');
        });
    }
}
