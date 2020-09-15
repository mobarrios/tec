<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\PurcharsesRepo;
use App\Http\Repositories\Tecnica\PurcharsesRepo as Repo;
use App\Http\Repositories\Tecnica\OrdersRepo;
use App\Http\Repositories\Admin\ClientsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Admin\ItemsRepo;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Configs\CompanyRepo;
use App\Http\Repositories\Configs\UsersRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Auth;
use PDF;

class PurcharsesController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, ClientsRepo $clientsRepo, ModelsRepo $modelsRepo, BrandsRepo $brandsRepo, CompanyRepo $companyRepo, OrdersRepo $ordersRepo, UsersRepo $usersRepo, ItemsRepo $itemsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;
       
        $this->section          = 'purcharses';
        $this->data['section']  = $this->section;
        $this->data['tiposDocumento']  = [ '1' => 'DNI','2' => 'Doc. Extranjero','3' => 'Doc. Precaria','4' => 'Doc. Transitorio','5' => 'Doc. en Trámite','6' => 'Otros' ];


        $this->data['clients']      = $clientsRepo->getModel()->all()->lists('fullname','id');
        $this->data['users_id']     = Auth::user()->id;
        $this->data['models_id']    = $modelsRepo->ListsData('name','id');
        $this->data['companies']    = $companyRepo->getModel()->all()->lists('razon_social','id');
        $this->data['brands']       = $brandsRepo->getAllWithModels();
        $this->data['users']        = $usersRepo->ListsData('name','id');
        $this->companyRepo          = $companyRepo;
        $this->ordersRepo           = $ordersRepo;
        $this->itemsRepo            = $itemsRepo;

    }


      public function show(){
         
    	$this->data['models'] 		= $this->repo->find($this->route->getParameter('id'));
    
    	
    	return view('admin.purcharses.details')->with($this->data);

    }

    
    public function reporte(){

        //$this->data['models']       = $this->repo->find($this->route->getParameter('id'));
        $model      = $this->repo->find($this->route->getParameter('id'));
        $company    = $this->companyRepo->getModel()->first();
        //$letraChica = $toPrintRepo->ultimo();
        $pdf        = PDF::loadView('admin.purcharses.reporte', compact('model','company'));

        return $pdf->stream();
        
    
    }

    public function ordenCompra(){

        $this->data['ordenCompra']      = $this->ordersRepo->find($this->route->getParameter('id'));
      
        return view('admin.purcharses.form')->with($this->data);
    }

    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));
        //crea a traves del repo con el request
        
        //dd($this->request->all());
        $model = $this->repo->create($this->request->all());

        $items = $this->itemsRepo->create([

            'name' => 'prueba',
            'status' => '1',
            'models_id' => $model->models_id,
            'purcharses_id' => $model->id,
            'clients_id' => $model->clients_id,
            'users_id' => $model->users_id
        ]);

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$model->id)->withErrors(['Regitro Agregado Correctamente']);

        //return view('admin.purcharses.index')->with($this->data);


    }


}
