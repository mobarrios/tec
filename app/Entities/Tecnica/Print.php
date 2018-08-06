<?php
namespace App\Entities\Tecnica;

use App\Entities\Tecnica\Print;
use App\Entities\Entity;

class Print extends Entity
{

    protected $table = 'print';
    protected $fillable = ['descripcion'];
    protected $section = 'states';

    
}


