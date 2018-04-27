<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\OrdersRepo;
use App\Http\Repositories\Tecnica\OrdersRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\ClientsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Tecnica\StatesRepo;
use App\Http\Repositories\Tecnica\EquipmentsRepo;
use App\Entities\Tecnica\OrderStates;
use PDF;
use Auth;

class OrdersController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, BrandsRepo $brandsRepo, ClientsRepo $clientsRepo, ModelsRepo $modelsRepo, StatesRepo $statesRepo, EquipmentsRepo $equipmentsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section              = 'orders';
        $this->data['section']      = $this->section;
        $this->data['ultima_orden'] = !is_null($repo->ultimo()) ? $repo->ultimo()->id + 1 : '1';

        $this->data['brands']       = $brandsRepo->ListsData('name','id');
        $this->data['clients']      = $clientsRepo->ListsData('name','id');
        $this->data['states']       = $statesRepo->ListsData('description','id');
        $this->data['equipments']   = $equipmentsRepo->ListsData('name','id');
        $this->data['users_id']     = Auth::user()->id;
        $this->data['models_id']    = $modelsRepo->ListsData('name','id');
       
        //$this->data['models']     = $modelsRepo->ListsData('name','id');
        //$this->data['clients']    = $clientsRepo->listForSelect();   
     
    }

    public function detail(){

    	$this->data['models'] = $this->repo->find($this->route->getParameter('id'));
    	
    	return view('admin.orders.detail')->with($this->data);

    }

    public function updateEstado(Request $request, StatesRepo $statesRepo){
        

        $model              = new OrderStates();
        $model->orders_id   = $request->get('orden_id');
        $model->users_id    = $this->data['users_id'];
        $model->states_id   = $request->get('estado_id');
        $model->save();

        
        $data['estado']     = $statesRepo->find($request->get('estado_id'));
        $data['orden']      = $this->repo->find($request->get('orden_id'));
        


        // if(!empty($data['orden']->Cliente->email))    
        // {
        //     //Envio de email
        //     Mail::send('models.ordenes.email', ['estado'=>$data['estado']], function($message) use ($data)
        //     {
        //         $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'))->subject('Servicio Técnico');
        //         $message->to($data['orden']->Cliente->email, $data['orden']->Cliente->fullname);

        //     });
    
        //     return redirect()->back()->withErrors(['Regitro Agregado Correctamente. Email enviado al cliente.']);

        // }else{
         
        //     return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);
        // }
        return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);
       
    }

    public function reporte(Route $route){
        
        $model  = $this->repo->find($route->getParameter('id')); 
        $pdf    = PDF::loadView('admin.orders.reportes', compact('model'));

        return $pdf->stream();
    }

    public function updatePagos(Request $request){
       
        $model          = $this->repo->find($request->get('orden_id')); 
        $model->pagado  = $request->get('pagado');
        $model->save();

        return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);

    }   

    public function updateObservaciones(Request $request){
        
        $model                          = $this->repo->find($request->get('orden_id')); 
        $model->observaciones           = $request->get('observaciones');
        $model->falla_declarada         = $request->get('falla_declarada');
        $model->observaciones_tecnicas  = $request->get('observaciones_tecnicas');
        $model->save();

        return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);
    }
    
  
}
