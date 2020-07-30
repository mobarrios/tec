<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddConfirmarStatesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_states', function (Blueprint $table) {
            $table->integer('confirmar_cliente')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_states', function (Blueprint $table) {
            $table->dropColumn('confirmar_cliente');
        });
    }
}
