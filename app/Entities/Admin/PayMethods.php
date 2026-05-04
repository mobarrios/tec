<?php
namespace App\Entities\Admin;

use App\Entities\Tecnica\Orders;
use App\Entities\Entity;

class PayMethods extends Entity{

    protected $table = 'pay_methods';

    protected $fillable = ['name','method'];

    protected $section = 'payMethods';

    public function Orders()
    {
        return $this->belongsToMany(Orders::getClass(), 'orders_pay_methods', 'pay_methods_id', 'orders_id')->withTimestamps();
    }

}
