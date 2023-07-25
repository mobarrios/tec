<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\OrdersRepo;
use App\Http\Repositories\Tecnica\OrdersRepo as Repo;
use App\Http\Repositories\Admin\ClientsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Admin\ItemsRepo;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Configs\CompanyRepo;
use App\Entities\Tecnica\OrderStates;
use App\Entities\Tecnica\Tasks;
use App\Http\Repositories\Configs\UsersRepo;
use App\Http\Repositories\Admin\PayMethodsRepo;
use App\Http\Repositories\Admin\PaymentsRepo;
use App\Http\Repositories\Configs\BranchesRepo;
use App\Http\Repositories\Tecnica\StatesRepo;
use App\Entities\Tecnica\PurcherseState;
use App\Http\Repositories\Tecnica\ToPrintRepo;
use App\Entities\Admin\Payments;
use App\Http\Helpers\ImagesHelper;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Auth;
use PDF;
use Validator;
use Mail;
use Crypt;

class HerotechController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, ClientsRepo $clientsRepo, ModelsRepo $modelsRepo, BrandsRepo $brandsRepo, CompanyRepo $companyRepo, OrdersRepo $ordersRepo, UsersRepo $usersRepo, ItemsRepo $itemsRepo, PayMethodsRepo $payMethodsRepo, PaymentsRepo $paymentsRepo, BranchesRepo $branchesRepo, StatesRepo $statesRepo, ToPrintRepo $toPrintRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;
       
        $this->section          = 'herotech';
        $this->data['section']  = $this->section;
        $this->data['tiposDocumento']  = [ '1' => 'DNI','2' => 'Doc. Extranjero','3' => 'Doc. Precaria','4' => 'Doc. Transitorio','5' => 'Doc. en Trámite','6' => 'Otros' ];


        $this->data['clients']      = $clientsRepo->getModel()->all()->lists('fullname','id');
        $this->data['users_id']     = Auth::user()->id;
        $this->data['models_id']    = $modelsRepo->ListsData('name','id');
        $this->data['companies']    = $companyRepo->getModel()->all()->lists('razon_social','id');
        $this->data['brands']       = $brandsRepo->getAllWithModels();
        $this->data['users']        = $usersRepo->ListsData('user_name','id');
        $this->companyRepo          = $companyRepo;
        $this->ordersRepo           = $ordersRepo;
        $this->itemsRepo            = $itemsRepo;
        $this->itemsRepo            = $itemsRepo;
        $this->paymentsRepo         = $paymentsRepo;
        $this->statesRepo           = $statesRepo;
        $this->toPrintRepo          = $toPrintRepo;
        $this->data['paymethods']   = $payMethodsRepo->getModel()->all()->lists('name','id');
        $this->data['branches']     = $branchesRepo->listsData('name', 'id');
        $this->data['states']       = $statesRepo->getModel()->orderBy('description','ASC')->lists('description','id');

    }

    public function index()
    {   
        
        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        $this->data['models'] = $this->ordersRepo->getModel()->where('tipo_orden',2)->paginate(50);
        
        return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);
    }

    public function show(){
         
    	$this->data['models'] 		= $this->repo->find($this->route->getParameter('id'));
        
    	
    	return view('admin.herotech.details')->with($this->data);

    }

    
    public function reporte(){

        //$this->data['models']       = $this->repo->find($this->route->getParameter('id'));
        $model      = $this->repo->find($this->route->getParameter('id'));
        $company    = $this->companyRepo->getModel()->first();

        //$letraChica = $toPrintRepo->ultimo();
        $pdf        = PDF::loadView('admin.herotech.reporte', compact('model','company'));

        return $pdf->stream();
        
    
    }

    public function ordenCompra(){

        $this->data['ordenCompra']      = $this->ordersRepo->find($this->route->getParameter('id'));
      
        return view('admin.herotech.form')->with($this->data);
    }

    public function store()
    {
        //validar los campos
        //$this->validate($this->request,config('models.'.$this->section.'.validationsStore'), config('models.'.$this->section.'.validationMessage'));

        $data = $this->request;
        $data['tipo_orden'] = 2;
        $model = $this->repo->create($this->request);

        $imagen = $this->request->image;
        if(!empty($imagen))
            foreach ($imagen as $valor){

                $image = new ImagesHelper();
                $time = time();
                $name = $time.$valor->getClientOriginalName();
                $image->upload( $name , $valor, config('models.herotech.imagesPath'));
                $model->images()->create(['path' => config('models.herotech.imagesPath').$name]);
         
            }

        //Estado iniciado
        $state              = new OrderStates();
        $state->orders_id   = $model->id;
        $state->users_id    = $this->data['users_id'];
        $state->states_id   = 1;
        $state->save();

        //Envio de mail
        $data['empresa']    = $model->Brancheables()->first()->branches->name;
        $data['direccion']  = $model->Brancheables()->first()->branches->address;
        $data['estado']     = $this->statesRepo->find(1);
        $data['company']    = $this->companyRepo->getModel()->first();
        $letraChica         = $this->toPrintRepo->ultimo();
        $company            = $this->companyRepo->getModel()->first();
        $idCrypt            = Crypt::encrypt($model->id);
        $tasks              = Tasks::all();
        $vendedor           = Auth::user();
        $letraChica         = $this->toPrintRepo->ultimo();
        $tipo               = 'Reparacion';
        
        for ($i=0; $i < 2 ; $i++) {

            $emails = [ 'coderst@icase.com.ar', $model->Cliente->email ];

            if( !empty($emails[$i]) ){

                //Envio de email
                Mail::send('admin.orders.email', ['estado' => $data['estado'],'company' => $data['company'], 'models_id' => $idCrypt, 'empresa' => $data['empresa'],
                    'direccion' => $data['direccion'], 'tipo' => $tipo ], function($message) use ($data,$model,$letraChica,$company,$tasks, $vendedor,$emails, $i)
                {
                    $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'))->subject('Servicio Técnico');
                    $message->to( $emails[$i], $model->Cliente->fullname);
                });

            }

        }
        
        /*
        $validator = Validator::make($this->request->all(), config('models.'.$this->section.'.validationsStore'), [
            'alias.required' => 'El campo alias es obligatorio',
            'companies_id.required' => 'El campo sucursal es obligatorio',
            'number.required' => 'El campo cbu es obligatorio',
            'number.numeric' => 'El campo cbu debe ser numerico',
            'number.digits' => 'El campo cbu debe contener 22 dígitos',
            'amount.required' => 'El campo monto es obligatorio',
            'users_id.required' => 'El campo vendedor es obligatorio',
            'pay_methods_id.required' => 'El campo forma de pago es obligatorio',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        //crea a traves del repo con el request
        
        
        $model = $this->repo->create($this->request->all());

        $payments = New Payments();
        $payments->pay_methods_id = $this->request->pay_methods_id;
        $payments->date = $this->request->date;
        $payments->hora = $this->request->hora;
        $payments->sales_id = $model->id;
        $payments->term = $this->request->term;
        $payments->number = $this->request->number;
        $payments->nombre = $this->request->nombre;
        $payments->apellido = $this->request->apellido;
        $payments->amount = $this->request->amount;
        $payments->alias = $this->request->alias;
        $payments->cuil = $this->request->cuil;
        $payments->models_canje_id = $this->request->models_canje_id;
        $payments->save();
        
        //$p = $this->paymentsRepo->find(5);

        $imagen = $this->request->image;

        if(!empty($imagen))
            foreach ($imagen as $valor){

                $image = new ImagesHelper();
                $time = time();
                $name = $time.$valor->getClientOriginalName();
                $image->upload( $name , $valor, config('models.payments.imagesPath'));
                $payments->images()->create(['path' => config('models.payments.imagesPath').$name]);
         
            }
        
        */

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$model->id)->withErrors(['Regitro Agregado Correctamente']);

    }

    public function update()
    {   

        //validar los campos
        //$this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'), config('models.'.$this->section.'.validationMessage'));

        $validator = Validator::make($this->request->all(), config('models.'.$this->section.'.validationsUpdate'), [
            'alias.required' => 'El campo alias es obligatorio',
            'companies_id.required' => 'El campo sucursal es obligatorio',
            'number.required' => 'El campo cbu es obligatorio',
            'number.numeric' => 'El campo cbu debe ser numerico',
            'number.digits' => 'El campo cbu debe contener 22 dígitos',
            'amount.required' => 'El campo monto es obligatorio',
            'users_id.required' => 'El campo vendedor es obligatorio',
            'pay_methods_id.required' => 'El campo forma de pago es obligatorio',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $id = $this->route->getParameter('id');

        //edita a traves del repo
        $model = $this->repo->update($id,$this->request->all());
        
        if(isset($model->pago)){
            $payments =$this->paymentsRepo->update($model->Pago->id, $this->request->all());
        }
        else{
            $payments = New Payments();
            $payments->pay_methods_id = $this->request->pay_methods_id;
            $payments->date = $this->request->date;
            $payments->hora = $this->request->hora;
            $payments->sales_id = $model->id;
            $payments->term = $this->request->term;
            $payments->number = $this->request->number;
            $payments->nombre = $this->request->nombre;
            $payments->apellido = $this->request->apellido;
            $payments->cuil = $this->request->cuil;
            $payments->amount = $this->request->amount;
            $payments->alias = $this->request->alias;
            $payments->models_canje_id = $this->request->models_canje_id;
            $payments->save();
        }


        if(isset($model->Pago)){
            foreach ($model->Pago->images as $imagen){

                if(empty($this->request->imageOld)){
                    $image = new ImagesHelper();
                    $image->deleteFile($imagen->path);
                    $imagen->delete();
                }

                if( count($this->request->imageOld) > 0 ){
                    if( !in_array($imagen->path, $this->request->imageOld) ){
                        $image = new ImagesHelper();
                        $image->deleteFile($imagen->path);
                        $imagen->delete();
                    }
                }    

            }
        }



       
        $imagen = $this->request->image;
        if(!empty($imagen))
            foreach ($imagen as $valor){

                $image = new ImagesHelper();
                $time = time();
                $name = $time.$valor->getClientOriginalName();
                $image->upload( $name , $valor, config('models.payments.imagesPath'));
                $payments->images()->create(['path' => config('models.payments.imagesPath').$name]);
         
            }

        return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'),$model->id)->withErrors(['Regitro Editado Correctamente']);
    }

    public function remito(){

        //$this->data['models']       = $this->repo->find($this->route->getParameter('id'));
        $model      = $this->repo->find($this->route->getParameter('id'));
        $company    = $this->companyRepo->getModel()->first();
      
        //$letraChica = $toPrintRepo->ultimo();
        $pdf        = PDF::loadView('admin.herotech.remito', compact('model','company'));

        return $pdf->stream();
        
    
    }

    public function updateEstado(Request $request, StatesRepo $statesRepo, CompanyRepo $companyRepo){


        $state              = new PurcherseState();
 
        $state->purcharses_id   = $request->get('items_id');
        $state->users_id    = $this->data['users_id'];
        $state->states_id   = $request->get('estado_id');
        $state->save();

        $model = $this->repo->find($request->get('items_id'));
        $data['estado']     = $statesRepo->find($request->get('estado_id'));
        
        $data['empresa']    = $model->Brancheables()->first()->branches->name;
        $data['direccion']  = $model->Brancheables()->first()->branches->address;
        $data['company']    = $companyRepo->getModel()->first();
        $vendedor           = Auth::user();
        //$letraChica         = $this->toPrintRepo->ultimo();
        $company            = $this->companyRepo->getModel()->first();
        $idCrypt            = Crypt::encrypt($model->id);
        $tipo               = 'Compra';
     
        //Si el cliente tiene email o enviar es verdadero
        if(!empty($model->Orden->Cliente->email) && $data['estado']->enviar == true){

            try{
                //Envio de email
                Mail::send('admin.orders.email', ['estado' => $data['estado'],'company' => $data['company'], 'models_id' => $idCrypt, 'empresa' => $data['empresa'],'direccion' => $data['direccion'] ,'tipo' => $tipo ], function($message) use ($data,$model,$company, $vendedor)
                {

                    $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'))->subject('Servicio Técnico');
                    $message->to($model->Cliente->email, $model->Cliente->fullname);

                    if($data['estado']->enviar_remito == true){
                        $pdf        = PDF::loadView('admin.purcharses.remito', compact('model','company', 'vendedor'));
                        $message->attachData($pdf->output(), 'remito.pdf', ['mime' => 'application/pdf']);
                    }

                });

            }catch(Exception $e){

                return redirect()->back()->withErrors(['No se ha podido enviar el email']);
            }

            return redirect()->back()->withErrors(['Regitro Agregado Correctamente. Email enviado al cliente.']);

        }else{

            return redirect()->back()->withErrors(['Regitro Agregado Correctamente. El Email no fue enviado al cliente.']);
        }


    }


}
