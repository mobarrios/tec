<?php
namespace App\Entities\Tecnica;

use App\Entities\Tecnica\Purcharses;
use App\Entities\Tecnica\States;
use App\Entities\Configs\User;
use App\Entities\Tecnica\PurcherseState;
use App\Entities\Entity;

class PurcherseState extends Entity
{

    protected $table = 'purchases_states';
    protected $fillable = ['states_id', 'purcharses_id', 'users_id', 'confirmar_cliente'];
    protected $section = 'purcharses';


  	public function States(){
  		return $this->belongsTo(States::getClass(), 'states_id');
  	}

  	public function User(){
        return $this->belongsTo(User::getClass(), 'users_id');
    }


}