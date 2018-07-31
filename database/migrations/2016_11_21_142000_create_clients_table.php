<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('dni')->nullable();
            $table->enum('sexo',['masculino','femenino'])->nullable();
            $table->enum('marital_status',['soltero','casado','divorciado'])->nullable();
            $table->date('dob')->nullable();
            $table->string('nacionality')->nullable();

            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->string('province')->nullable();

            $table->integer('localidades_id')->nullable()->unsigned()->nullable();
            $table->foreign('localidades_id')->references('id')->on('localidades');


            $table->integer('iva_conditions_id')->unsigned()->index()->nullable();
            $table->foreign('iva_conditions_id')->references('id')->on('iva_conditions');
            
            $table->text('obs')->nullable();

            $table->boolean('prospecto')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
