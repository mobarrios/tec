<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->time('hora')->nullable(); 
            $table->string('nombre')->nullable(); 
            $table->string('apellido')->nullable(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('hora');
            $table->dropColumn('nombre');
            $table->dropColumn('apellido');
        });
    }
}
