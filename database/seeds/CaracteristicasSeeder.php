<?php

use Illuminate\Database\Seeder;

class CaracteristicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//nombre tipo porcentaje importe
        DB::table('caracteristicas')->insert([
            [
                'id'    => 1,
                'nombre' => 'MÓDULO/ PANTALLA ROTA',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ],
            [
                'id'    => 2,
                'nombre' => 'HUELLA',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ],

            [
                'id'    => 3,
                'nombre' => 'CÁMARA FRONTAL Y TRASERA',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ],

            [
                'id'    => 4,
                'nombre' => 'PIN DE CARGA',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 5,
                'nombre' => 'BATERÍA EN MANTENIMIENTO',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 6,
                'nombre' => 'MICRÓFONO',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 7,
                'nombre' => 'ALTAVOZ',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 8,
                'nombre' => 'VIBRADOR',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 9,
                'nombre' => 'BOTON VOLUMEN Y POWER',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 10,
                'nombre' => 'FACE ID',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 11,
                'nombre' => 'NFC',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]
            ,

            [
                'id'    => 12,
                'nombre' => 'OTRA',
                'tipo' => '1',
                'porcentaje' => '10',
                'importe' => '100'
            ]

        ]);
    }
}
