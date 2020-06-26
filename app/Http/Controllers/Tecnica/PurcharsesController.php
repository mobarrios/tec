<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\PurcharsesRepo;
use App\Http\Repositories\Tecnica\PurcharsesRepo as Repo;
use App\Http\Repositories\Admin\ClientsRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Auth;

class PurcharsesController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, ClientsRepo $clientsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;
       
        $this->section          = 'purcharses';
        $this->data['section']  = $this->section;
        $this->data['tiposDocumento']  = [ '1' => 'DNI','2' => 'Doc. Extranjero','3' => 'Doc. Precaria','4' => 'Doc. Transitorio','5' => 'Doc. en Trámite','6' => 'Otros' ];


        $this->data['clients'] = $clientsRepo->getModel()->all()->lists('fullname','id');
        $this->data['users_id']= Auth::user()->id;
    }


      public function show(){
         
    	$this->data['models'] 		= $this->repo->find($this->route->getParameter('id'));
    
    	
    	return view('admin.purcharses.details')->with($this->data);

    }

  
}
