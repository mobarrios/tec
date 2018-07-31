<?php
namespace App\Entities\Tecnica;

use App\Entities\Tecnica\Orders;
use App\Entities\Entity;

class States extends Entity
{

    protected $table = 'states';
    protected $fillable = ['description', 'text_email','color','enviar'];
    protected $section = 'states';

    public function OrdenEstados(){
		return $this->hasMany(OrderStates::getClass());
	}
}


