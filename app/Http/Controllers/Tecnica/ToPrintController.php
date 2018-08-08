<?php

namespace App\Http\Controllers\Tecnica;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Tecnica\ToPrintRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class ToPrintController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'print';
        $this->data['section']  = $this->section;
    }

  
}
