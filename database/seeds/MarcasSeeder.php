<?php

use Illuminate\Database\Seeder;
use App\Entities\Admin\Brands;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = array(
		  array('id' => '2','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'samsung'),
		  array('id' => '3','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'blackberry'),
		  array('id' => '4','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'nokia'),
		  array('id' => '5','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'motorola'),
		  array('id' => '6','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'htc'),
		  array('id' => '7','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'sony'),
		  array('id' => '9','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'ibm'),
		  array('id' => '10','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'gigaset'),
		  array('id' => '11','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Apple'),
		  array('id' => '12','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL,'name' => 'Acer')
		);

        Brands::insert($brands);
    }
}
