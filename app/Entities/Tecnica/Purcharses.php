<?php
namespace App\Entities\Tecnica;

use App\Entities\Tecnica\Purcharses;
use App\Entities\Configs\User;
use App\Entities\Tecnica\Orders;
use App\Entities\Admin\Clients;
use App\Entities\Admin\Models;
use App\Entities\Entity;

class Purcharses extends Entity
{

    protected $table = 'purcharses';
    protected $fillable = ['cantidad','precio_unitario','total', 'users_id', 'clients_id', 'models_id', 'observacion'];
    protected $section = 'purcharses';

    public function Cliente(){
    	return $this->belongsTo(Clients::getClass(), 'clients_id');
    }

	public function User(){
		return $this->belongsTo(User::getClass(),'users_id');
	}

	public function Model(){
        return $this->belongsTo(Models::getClass(), 'models_id');
    }
}

