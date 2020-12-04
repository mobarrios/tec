<?php

use Illuminate\Database\Seeder;

class PayMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pay_methods')->insert([
                [
                    'id'    => 8,
                    'name'=>'Canje de equipo',

                ],
                [
                    'id'    => 9,
                    'name'=>'Otro',

                ],
        ]);

    }
}
