<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Tasks;

class addTareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$task = new Tasks();
    	$task->descripcion = 'Cierre de sesión iCloud';
    	$task->save();
     
    }
}
