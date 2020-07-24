<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\OrdersRepo as Repo;
use App\Http\Repositories\Tecnica\PurcharsesRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Crypt;

class ApiController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route, PurcharsesRepo $purcharsesRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;
       
        $this->section          = 'states';
        $this->data['section']  = $this->section;

        $this->purcharses 		= $purcharsesRepo;


    }


    public function confirm(){

    	$id 			= Crypt::decrypt($this->route->parameter('id'));
    	$tipo 			= $this->route->parameter('tipo');

    	$model 			= $tipo === 'Reparacion' ? $this->repo->find($id) : $this->purcharses->find($id);
        


    	$model->confirm = 1;
    	$model->save();

    	//return redirect()->route('admin.orders.confirm')->withErrors(['Regitro Editado Correctamente']);
    	return view('admin.orders.confirm');


    }


}
