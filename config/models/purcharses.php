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
          'precio_unitario' => 'required',
          'number' =>   "required_if:pay_methods_id,==,6|numeric|digits:22",
          'numero_cuenta' => 'required_if:pay_methods_id,==,6',
          'numero_serie' => 'required|numeric|digits:15',
          'pay_methods_id' => 'required',
          'nombre' => 'required',
          'apellido' => 'required',
          'amount' => 'required',
          'alias' => 'required_if:pay_methods_id,==,6',
          'cuil' => 'required|numeric|digits_between:10,11',
          //'image'   => 'required',
          'image'   => 'required|array|min:1',
          //'image.*'  => 'required|distinct|min:3',
    
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
          'precio_unitario' => 'required',
          'number' =>   "required_if:pay_methods_id,==,6|numeric|digits:22",
          'numero_serie' => 'required|numeric|digits:15',
          'pay_methods_id' => 'required',
          'nombre' => 'required',
          'apellido' => 'required',
          'amount' => 'required',
          'alias' => 'required_if:pay_methods_id,==,6',
          'cuil' => 'required|numeric|digits_between:10,11',
          'numero_cuenta' => 'required_if:pay_methods_id,==,6',
          //'image'   => 'required|array|min:1',
          'image'   => 'required',
    ],
    /*
    'validationMessage' => [
        'alias.required' => 'El campo Alias es obligatorio',
        'companies_id.required' => 'El campo Sucursal es obligatorio',
        'number.required' => 'El campo Cbu es obligatorio',
        'number.numeric' => 'El campo Cbu debe ser numerico',
        //'number.digits_betweens' => 'El campo Cbu debe contener entre 24 y 24 dígitos',
        'amount.required' => 'El campo Monto es obligatorio',
    ]
    */

];