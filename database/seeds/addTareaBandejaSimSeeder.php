<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Tasks;

class addTareaBandejaSimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Tasks();
    	$task->descripcion = 'Bandeja de Sim';
    	$task->save();
    }
}
