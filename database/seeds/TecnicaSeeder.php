<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TecnicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        

        //Tenica
        $this->call(EstadosSeeder::class);
        $this->call(MarcasSeeder::class);
        $this->call(ModelosSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(EquiposSeeder::class);


        Model::reguard();
    }
}
