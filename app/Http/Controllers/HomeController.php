<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;
use App\Http\Repositories\Tecnica\OrdersRepo;
use Auth;

class HomeController extends Controller
{
	protected $ordersRepo;

	public function __construct(OrdersRepo $ordersRepo){
		$this->ordersRepo = $ordersRepo;
	}

    public function index()
    {
        $this->data['section'] = 'home';
        $this->data['activeBread'] = '';
        // $this->data['config'] = (object)['sectionName'=>'Home', 'indexRoute'=>'home'];
 		$this->data['models']	= $this->ordersRepo->getModel()->where('users_id', Auth::user()->id)->orderBy('updated_at','ASC')->get();

        return view('home')->with($this->data);
    }

}
