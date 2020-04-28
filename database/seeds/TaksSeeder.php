<?php

use Illuminate\Database\Seeder;

class TaksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'id' => 1,
                'descripcion' => 'boton_power',
            ],
            [
                'id' => 2,
                'descripcion' => 'lcd',
            ],
            [
                'id' => 3,
                'descripcion' => 'touch',
            ],
            [
                'id' => 4,
                'descripcion' => 'botones_volumen',
            ],
            [
                'id' => 5,
                'descripcion' => 'boton_home',
            ],
            [
                'id' => 6,
                'descripcion' => 'huella',
            ],
            [
                'id' => 7,
                'descripcion' => 'vibrador',
            ],
            [
                'id' => 8,
                'descripcion' => 'pin_carga',
            ],
            [
                'id' => 9,
                'descripcion' => 'auricular',
            ],
            [
                'id' => 10,
                'descripcion' => 'altavoz',
            ],
            [
                'id' => 11,
                'descripcion' => 'flex_proximidad',
            ],
            [
                'id' => 12,
                'descripcion' => 'camara_frontal',
            ],
            [
                'id' => 13,
                'descripcion' => 'camara_trasera',
            ],
            [
                'id' => 14,
                'descripcion' => 'senal',
            ],
            [
                'id' => 15,
                'descripcion' => 'wifi',
            ],
            

        ]);
    }
}
