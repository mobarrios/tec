<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Tasks;

class addTarea2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Tasks();
    	$task->descripcion = 'NFC';
    	$task->save();
    }
}
