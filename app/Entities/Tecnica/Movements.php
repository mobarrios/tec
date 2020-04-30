<?php
namespace App\Entities\Tecnica;

use App\Entities\Tecnica\Movements;
use App\Entities\Entity;

class Movements extends Entity
{

    protected $table = 'movements';
    protected $fillable = ['fecha_entrada','codigo_entrada', 'nombre_traslado_entrada','hora_solicitud_entrada','hora_entrada','fecha_salida','codigo_salida','nombre_traslado_salida','hora_solicitud_salida','hora_salida'];
    protected $section = 'movements';

    
}


