<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Certificates;
use App\Entities\Admin\Items;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\CertificatesRepo;
use App\Http\Repositories\Admin\ColorsRepo;
use App\Http\Repositories\Admin\ItemsRepo as Repo;
use App\Http\Repositories\Tecnica\PurcharsesRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use App\Http\Repositories\Configs\UsersRepo;
use App\Http\Repositories\Admin\ClientsRepo;
use App\Http\Repositories\Configs\CompanyRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Config;
use PDF;

class ItemsController extends Controller
{

    protected  $certificatesRepo;

    public function  __construct(Request $request, Repo $repo, Route $route, ModelsRepo $modelsRepo, ColorsRepo $colorsRepo ,  BrandsRepo $brandsRepo, UsersRepo $usersRepo, ClientsRepo $clientsRepo,  CompanyRepo $companyRepo, PurcharsesRepo $purcharsesRepo)
    {
        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'items';
        $this->data['section']  = $this->section;

        //data
        $this->data['models_types'] = $modelsRepo->ListsData('name','id');
        $this->data['colors']       = $colorsRepo->ListsData('name','id');

        $this->data['brands']   = $brandsRepo->getAllWithModels();
        $this->data['users']    = $usersRepo->ListsData('name','id');
        $this->data['clients']  = $clientsRepo->getModel()->all()->lists('fullname','id');
        $this->data['companies']    = $companyRepo->getModel()->all()->lists('razon_social','id');
        $this->purcharsesRepo = $purcharsesRepo;



       // $this->certificatesRepo = $certificatesRepo;
    }

    public function index()
    {
        //breadcrumb activo
        $this->data['activeBread'] = 'Listar';

        //si request de busqueda
        if( isset($this->request->search) && !is_null($this->request->filter))
        {
            $model = $this->repo->search($this->request);

            if(is_null($model) || $model->count() == 0)
                //si paso la seccion
                $model = $this->repo->listAll($this->section);
        }
        else
        {
            $model  = $this->repo->listAll($this->section);

        }



        //guarda en session lo que se busco para exportar
        Session::put('export', ['model' => $this->repo->getModel()->getClass(),'section' => config('models.'.$this->section.'.sectionName')]);

        //pagina el query
        $this->data['models'] = $model->paginate(config('models.'.$this->section.'.paginate'));

        //return view($this->getConfig()->indexRoute)->with($this->data);
        return view(config('models.'.$this->section.'.indexRoute'))->with($this->data);


    }

    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));

        //crea a traves del repo con el request
        $model = $this->repo->create($this->request);

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'))->withErrors(['Regitro Agregado Correctamente']);
    }


    public function update()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsUpdate'));

        $id = $this->route->getParameter('id');

        //edita a traves del repo
        //$model = $this->repo->update($id,$this->request);
        //dd($this->request->all());
        $model = $this->repo->getModel()->find($id);

        $model->fill($this->request->all());
        $model->save();

        $data = $this->request->only('color', 'accesorios', 'capacidad', 'precio_venta','observacion');
        $model->Compra()->update($data);
  

        return redirect()->route(config('models.'.$this->section.'.postUpdateRoute'))->withErrors(['Regitro Editado Correctamente']);
    }


    public function itemsByModels()
    {
        $id = $this->route->getParameter('id');

        $data = $this->repo->ItemsByModels($id);
        return response()->json($data);
    }

    //busca nro motor
    public function itemsByMotor()
    {
        // busca si el numero de motor existe devuelvo bool

        $nMotor = $this->route->getParameter('nMotor');
        $res = $this->repo->getModel()->where('n_motor', $nMotor)->get();

        if($res->count() == '1')
            return response()->json(true);
        else
            return response()->json(false);
    }


    //busca nro cuadro
    public function itemsByCuadro()
    {
        // busca si el numero de motor existe devuelvo bool

        $nCuadro = $this->route->getParameter('nCuadro');
        $res = $this->repo->getModel()->where('n_cuadro', $nCuadro)->get();

        if($res->count() == '1')
            return response()->json(true);
        else
            return response()->json(false);
    }

    public function show(){
        $this->data['models']       = $this->repo->find($this->route->getParameter('id'));
    
        
        return view('admin.items.details')->with($this->data);

    }


    public function reporte(CompanyRepo $companyRepo){

        //$this->data['models']       = $this->repo->find($this->route->getParameter('id'));
        $model      = $this->repo->find($this->route->getParameter('id'));
        $company    = $companyRepo->getModel()->first();
        //$letraChica = $toPrintRepo->ultimo();
        $pdf        = PDF::loadView('admin.items.reporte', compact('model','company'));

        return $pdf->stream();
        
    
    }

    public function compra(){


    $purcharse      = $this->purcharsesRepo->find($this->route->getParameter('id'));

    $items = $this->repo->create([
        'name' => 'venta',
        'status' => '1',
        'models_id' => $purcharse->models_id,
        'purcharses_id' => $purcharse->id,
        'clients_id' => $purcharse->clients_id,
        'users_id' => $purcharse->users_id
    ]);


    return redirect()->route('admin.items.index')->withErrors(['Regitro Agregado Correctamente']);
    
    }
    
}
