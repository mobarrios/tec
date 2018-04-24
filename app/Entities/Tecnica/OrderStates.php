<?php
namespace App\Entities\Tecnica;


use App\Entities\Tecnica\Orders;
use App\Entities\Admin\OrderStates;
use App\Entities\Entity;

class OrderStates extends Entity
{

    protected $table = 'orders_states';
    protected $fillable = ['orders_id','states_id','users_id' ];
    protected $section = 'orders';

  
}


