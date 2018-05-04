<?php

Route::group(['prefix'=>'inserts'],function(){

	Route::get('/',['uses'=>'Utilities\InsertsController@datos']);
	Route::post('procesarBase',[ 'as'=>'procesar.base','uses'=>'Utilities\InsertsController@procesarBase']);
	
});
