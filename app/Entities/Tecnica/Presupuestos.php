<?php
namespace App\Entities\Tecnica;


use App\Entities\Tecnica\Equipments;
use App\Entities\Entity;

class Presupuestos extends Entity
{

    protected $table = 'presupuestos';
    protected $fillable = ['clients_id', 'productos_id', 'importe_presupuestado', 'precio_final'];
    protected $section = 'presupuestos';


    public function Caracteristicas(){

        return $this->belongsToMany(Caracteristicas::getClass(), 'presupuestos_caracteristicas');

    }

 
}