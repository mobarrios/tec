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
use PDF;

class OrdersController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, BrandsRepo $brandsRepo, ClientsRepo $clientsRepo, ModelsRepo $modelsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section              = 'orders';
        $this->data['section']      = $this->section;
        $this->data['ultima_orden'] = $repo->ultimo()->id + 1;
        $this->data['brands']       = $brandsRepo->getAllWithModels();
        $this->data['clients']      = $clientsRepo->ListsData('name','id');
        //$this->data['models']     = $modelsRepo->ListsData('name','id');
        //$this->data['clients']    = $clientsRepo->listForSelect();   
     
    }

    public function detail(){

    	$this->data['models'] = $this->repo->find($this->route->getParameter('id'));
    	
    	return view('admin.orders.detail')->with($this->data);

    }

    public function updateEstado(Request $request, EstadosRepo $estadosRepo){
        
        $model = new OrdenesEstados();
        $model->orden_id  = $request->get('orden_id');
        $model->user_id   = Auth::user()->id;
        $model->estado_id = $request->get('estado_id');
        $model->save();

        
        $data['estado'] = $estadosRepo->find($request->get('estado_id'));
        $data['orden']  = $this->repo->find($request->get('orden_id'));
        
        if(!empty($data['orden']->Cliente->email))    
        {
            //Envio de email
            Mail::send('models.ordenes.email', ['estado'=>$data['estado']], function($message) use ($data)
            {
                $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'))->subject('Servicio Técnico');
                $message->to($data['orden']->Cliente->email, $data['orden']->Cliente->fullname);

            });
            /*
            Mail::send('casos.prestaciones.mails.mail_presupuesto_proveedor', [$pres], function ($message) use ($pres, $file)
            {
                $message->from(env('MAIL_AYUDA_DIRECTA'));

                $message->to($pres->first()->Proveedores->EmailLists())->subject('COMPULSA DE MEDICAMENTOS ')
                    ->replyTo(env('MAIL_SECTOR_PRESUPUESTOS'), 'DADSE');

                if (!is_null($file))
                    $message->attach($file);
            });
            */
            return redirect()->back()->withErrors(['Regitro Agregado Correctamente. Email enviado al cliente.']);

        }else{
         
            return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);
        }
       
    }

    public function reporte(Route $route){
        
        $model = $this->repo->find($route->getParameter('id')); 
        
        $pdf = PDF::loadView('admin.orders.reportes', compact('model'));

        return $pdf->stream();
    }

    public function updatePagos(Request $request){
       
        $model = $this->repo->find($request->get('orden_id')); 
        $model->pagado = $request->get('pagado');
        $model->save();

        return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);

    }   

    public function updateObservaciones(Request $request){
        $model = $this->repo->find($request->get('orden_id')); 
        $model->observaciones = $request->get('observaciones');
        $model->falla_declarada = $request->get('falla_declarada');
        $model->observaciones_tecnicas = $request->get('observaciones_tecnicas');
        
        $model->save();

        return redirect()->back()->withErrors(['Regitro Agregado Correctamente']);
    }
    
  
}
