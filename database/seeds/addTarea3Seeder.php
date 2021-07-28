<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Tasks;

class addTarea3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Tasks();
    	$task->descripcion = 'Carga inalámbrica';
    	$task->save();

    	$task = new Tasks();
    	$task->descripcion = 'Linterna';
    	$task->save();
    }
}
