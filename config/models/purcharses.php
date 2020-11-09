<?php

$model = 'purcharses';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Compras',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',
    
    'postStoreRoute'  => 'admin.'.$model.'.index',
    'postUpdateRoute' => 'admin.'.$model.'.index',

    //urls
    'destroyUrl' => 'admin/'.$model.'/destroy/',

    //views
    'storeView' =>  'admin.'.$model.'.form',
    'editView'  =>  'admin.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => true,
    'is_imageable'      => true,
    'is_brancheable'    => true,



    //column search
    
    'search' => [
        
            //'Codigo' => 'codigo_orden',
            'ID'        => 'id',
            'Nombre'  => ['Cliente','name'],
            'Apellido'  => ['Cliente','last_name'],
            'DNI'  => ['Cliente','dni']
            //'Nombre'    => 'name',
            //'Apellido'  => 'last_name',
            //'DNI'       => 'dni'

            // 'Apellido'  => 'last_name' ,
            // 'Email'     => 'email'
    ],

    'validationsStore' => [

          //'codigo_orden'    => 'required',
          'clients_id'      => 'required',
          //'equipments_id'   => 'required',
          //'clave_equipo'    => 'required',
          'companies_id'    => 'required',
          'users_id'           => 'required',
          'models_id'       => 'required',
          'numero_serie'    => 'required',
          'cantidad'        => 'required',
          'precio_unitario' => 'required'
    
    ],

    'validationsUpdate' => [
         //'codigo_orden'    => 'required',
          'clients_id'      => 'required',
          //'equipments_id'   => 'required',
          //'clave_equipo'    => 'required',
          'companies_id'    => 'required',
          'users_id'        => 'required',
          'models_id'       => 'required',
          'numero_serie'    => 'required',
          'cantidad'        => 'required',
          'precio_unitario' => 'required'
    ],

];