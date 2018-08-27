<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Equipments;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipments = array(
		  array('id' => '2','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Iphone'),
		  array('id' => '3','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Celular'),
		  array('id' => '4','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Notebook'),
		  array('id' => '5','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Pc'),
		  array('id' => '6','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Camara de Fotos'),
		  array('id' => '7','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Consola'),
		  array('id' => '8','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Ipad'),
		  array('id' => '9','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Ipod'),
		  array('id' => '10','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Tableta'),
		  array('id' => '11','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Imac')
		);

        Equipments::insert($equipments);
    }
}
