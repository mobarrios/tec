<?php
namespace App\Entities\Tecnica;


use App\Entities\Tecnica\Orders;
use App\Entities\Admin\Clients;
use App\Entities\Tecnica\Equipments;
use App\Entities\Entity;

class Orders extends Entity
{

    protected $table 	= 'orders';
    protected $fillable = ['codigo_orden', 'fecha_inicio','fecha_final','presupuesto_id','importe_total','dto','numero_serie','falla_declarada','observaciones', 'observaciones_tecnicas', 'presupuesto_estimado', 'states_id', 'total', 'pagado','orden_manual','observaciones_internas', 'users_id', 'equipments_id', 'brands_id', 'models_id', 'clients_id' ];
    protected $section 	= 'orders';

    public function Cliente(){
    	return $this->belongsTo(Clients::getClass(), 'clients_id');
    }

    public function Equipo(){
    	return $this->belongsTo(Equipments::getClass(), 'equipments_id');
    }

    public function OrdenEstados(){
		return $this->hasMany(OrderStates::getClass());
	}

	public function User(){
		return $this->belongsTo(User::getClass(), 'users_id');
	}

	
}


