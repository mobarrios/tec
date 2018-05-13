<?php

Route::group(['prefix'=>'inserts'],function(){
	//return view('inserts.index');
	Route::get('/datos',['uses'=>'Utilities\InsertsController@datos']);


	Route::get('/',['uses'=>'Utilities\InsertsController@datos']);
	Route::post('procesarBase',[ 'as'=>'procesar.base','uses'=>'Utilities\InsertsController@procesarBase']);
	



});
