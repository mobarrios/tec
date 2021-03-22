<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\ProductosRepo;
use App\Http\Repositories\Tecnica\ProductosRepo as Repo;
use App\Http\Repositories\Admin\BrandsRepo;
use App\Http\Repositories\Admin\ModelsRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class ProductosController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route,  BrandsRepo $brandsRepo, ModelsRepo $modelsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'productos';
        $this->data['section']  = $this->section;
        $this->data['brands']   = $brandsRepo->getAllWithModels();
    }

  
}
