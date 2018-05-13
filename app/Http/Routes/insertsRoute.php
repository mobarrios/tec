<?php

Route::group(['prefix'=>'inserts'],function(){
	//return view('inserts.index');
	Route::get('/datos',['uses'=>'Utilities\InsertsController@datos']);
	



});
