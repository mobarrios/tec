<?php
namespace App\Entities\Tecnica;

use App\Entities\Tecnica\Purcharses;
use App\Entities\Configs\User;
use App\Entities\Tecnica\Orders;
use App\Entities\Admin\Clients;
use App\Entities\Entity;

class Purcharses extends Entity
{

    protected $table = 'purcharses';
    protected $fillable = ['descripcion','cantidad','precio_unitario','total','condicion_venta','datos_operacion', 'users_id', 'clients_id'];
    protected $section = 'purcharses';

    public function Cliente(){
    	return $this->belongsTo(Clients::getClass(), 'clients_id');
    }

	public function User(){
		return $this->belongsTo(User::getClass(),'users_id');
	}

}

