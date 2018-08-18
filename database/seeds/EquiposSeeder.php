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
		  array('id' => '1','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'iphone'),
		  array('id' => '2','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'celular'),
		  array('id' => '3','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'notebook'),
		  array('id' => '4','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'pc'),
		  array('id' => '5','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'camara de fotos'),
		  array('id' => '6','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'consola'),
		  array('id' => '7','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'ipad'),
		  array('id' => '8','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'ipod'),
		  array('id' => '9','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'tableta'),
		  array('id' => '10','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'imac')
		);

        Equipments::insert($equipments);
    }
}
