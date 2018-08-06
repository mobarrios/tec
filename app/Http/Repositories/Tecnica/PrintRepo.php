<?php
namespace App\Http\Repositories\Tecnica;


use App\Entities\Tecnica\Print;
use App\Http\Repositories\BaseRepo;
class PrintRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Print();
    }

}
