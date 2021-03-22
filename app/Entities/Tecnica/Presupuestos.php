<?php
namespace App\Entities\Tecnica;


use App\Entities\Tecnica\Equipments;
use App\Entities\Entity;

class Presupuestos extends Entity
{

    protected $table = 'presupuestos';
    protected $fillable = ['name'];
    protected $section = 'presupuestos';

 
}