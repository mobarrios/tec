<?php

namespace App\Http\Controllers\Utilities;

use App\Entities\Admin\Clients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\Brands;
use App\Entities\Admin\Models;
use App\Entities\Tecnica\Orders;
use Maatwebsite\Excel\Excel;
use DB;

class InsertsController extends Controller
{
	public function datos(){
		
		return view('admin.inserts.index');

		dd('datos');
	}

	public function procesarBase(Request $request, Excel $excel){
		$file 			= $request->file;
        $results 		= $excel->load($file, function ($reader) {
            $results	= $reader->get();
        })->get();
        
        

        $transacciones =[]; 

        foreach ($results as $result) {
        	dd($result);
        }
	}

}
