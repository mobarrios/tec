<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Tasks;

class addTareaEstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Tasks();
    	$task->descripcion = 'Estatus de equipo';
    	$task->save();
    }
}
