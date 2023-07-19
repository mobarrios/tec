<?php
	
Route::group(['prefix'=>'herotech'],function(){


        $section =  'herotech';

        Route::get('/destroy/{id?}',    ['as'=>'admin.herotech.destroy','uses'=>'Tecnica\HerotechController@destroy']);
        Route::get('/edit/{id?}',       ['as'=>'admin.herotech.edit','uses'=>'Tecnica\HerotechController@edit']);
        Route::post('/update/{id?}',    ['as'=>'admin.herotech.update','uses'=>'Tecnica\HerotechController@update']);

        Route::get('/create',           ['as'=>'admin.herotech.create','uses'=>'Tecnica\HerotechController@create']);
        Route::post('/store',           ['as'=>'admin.herotech.store','uses'=>'Tecnica\HerotechController@store']);
        Route::get('/show/{id}',             ['as'=>'admin.herotech.show','uses'=>'Tecnica\HerotechController@show']);
        Route::get('/details/{id}',             ['as'=>'admin.herotech.details','uses'=>'Tecnica\HerotechController@details']);
        Route::get('/index/{search?}',  ['as'=>'admin.herotech.index','uses'=>'Tecnica\HerotechController@index']);
        Route::get('/pdf',              ['middleware'=>'permission:'.$section.'.list','as'=>'admin.herotech.pdf','uses'=>'Tecnica\HerotechController@exportListToPdf']);
        
        Route::get('/reporte/{id}',              ['as'=>'admin.herotech.reporte','uses'=>'Tecnica\HerotechController@reporte']);
        Route::get('/compra/{id}',              ['as'=>'admin.herotech.compra','uses'=>'Tecnica\HerotechController@ordenCompra']);
        Route::get('/remito/{id}',     ['as'=>'admin.herotech.remito','uses'=>'Tecnica\HerotechController@remito']);

        Route::post('updateEstado',     ['as'=>'admin.herotech.updateEstado','uses'=>'Tecnica\HerotechController@updateEstado']);
        
});