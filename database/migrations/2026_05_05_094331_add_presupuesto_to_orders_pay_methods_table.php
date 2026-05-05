<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPresupuestoToOrdersPayMethodsTable extends Migration
{
    public function up()
    {
        Schema::table('orders_pay_methods', function (Blueprint $table) {
            $table->decimal('presupuesto', 10, 2)->nullable()->after('pay_methods_id');
        });
    }

    public function down()
    {
        Schema::table('orders_pay_methods', function (Blueprint $table) {
            $table->dropColumn('presupuesto');
        });
    }
}