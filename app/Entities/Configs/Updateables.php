<?php
namespace App\Entities\Configs;

use App\Entities\Entity;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Tecnica\Orders;

 class Updateables extends Entity
 {


     protected $fillable    = ['updateable_type','updateable_id', 'column', 'data_old'];

     protected $section = 'updateables';


     public function updateables(){

         return $this->morphTo();
     }

    public function Orders()
    {
        return $this->belongsTo(Orders::class, 'updateable_id');
    }

 }


