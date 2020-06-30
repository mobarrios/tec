<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddEmeiCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purcharses', function (Blueprint $table) {
            $table->string('numero_serie')->nullable(); 
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
        Schema::table('purcharses', function (Blueprint $table) {
            $table->string('numero_serie');
            $table->dropColumn('companies_id');
        });
    }
}
