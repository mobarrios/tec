@extends('template.model_form')

    @section('form_title')
        Nueva Compra
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif  

    <div class="col-xs-12">
    <h4> Detalles de la compra</h4>
    </div>

    <div class="col-xs-3 form-group">
      {!! Form::label('Cliente') !!}

      @if(isset($ordenCompra))
        {!! Form::hidden('orders_id', $ordenCompra->id) !!}
        {!! Form::select('clients_id', $clients , isset($ordenCompra->Cliente) ? $ordenCompra->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
  
      @else
        {!! Form::select('clients_id', $clients , isset($models->Cliente) ? $models->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
      @endif

    </div>

    <div class="col-xs-3 form-group">
      {!! Form::label('Vendedor') !!}

      @if(isset($ordenCompra))
        {!! Form::select('users_id', $users , isset($ordenCompra->User) ? $ordenCompra->User->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
      @else
        {!! Form::select('users_id', $users , isset($models->User) ? $models->User->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
      @endif
    </div>

    <div class="col-xs-6 form-group">
      {!! Form::label('Compañia') !!}
      {!! Form::select('companies_id', $companies , isset($models->Company) ? $models->Company->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Compañia']) !!}
    
    </div>

    <div class="col-xs-12">
    <h4> Datos del producto</h4>
    </div>

    <div class="col-xs-3 form-group">
      {!! Form::label('Modelos') !!}
       <select name='models_id' class="select2 form-control" placeholder="seleccionar Cliente" >
        @foreach($brands as $br)
            <optgroup label="{{$br->name}}">
                @foreach($br->Models as $m)
                  @if(isset($ordenCompra))
                    <option value="{{$m->id}}" @if(isset($ordenCompra) && ($ordenCompra->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                  @else
                    <option value="{{$m->id}}" @if(isset($models) && ($models->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                  @endif
                @endforeach
            </optgroup>
        @endforeach
      </select>
    </div>

    <div class="col-xs-3 form-group">
      {!! Form::label('Serie/IMEI') !!}
      @if(isset($ordenCompra))
        {!! Form::text('numero_serie', $ordenCompra->numero_serie, ['class'=>'form-control']) !!}
      @else
        {!! Form::text('numero_serie', null, ['class'=>'form-control']) !!}
      @endif
    </div>

    <div class="col-xs-12">
    <h4> Datos de la operación</h4>
    </div>

   
    <div class="col-xs-3 form-group">
      {!! Form::label('Cantidad') !!}
      {!! Form::text('cantidad', null, ['class'=>'form-control']) !!}
    </div>


    <div class="col-xs-3 form-group">
      {!! Form::label('Precio Compra') !!}
      {!! Form::text('precio_unitario', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-12">
    <h4> Datos de pago</h4>
    </div>
   
   <div class="col-xs-3 form-group">
      {!! Form::label('Fecha y Hora') !!}
      {!! Form::text('cantidad', null, ['class'=>'form-control']) !!}
    </div>


    <div class="col-xs-3 form-group">
      {!! Form::label('Forma de Pago') !!}
      {!! Form::text('precio_unitario', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-3 form-group">
      {!! Form::label('Datos de la cuenta') !!}
      {!! Form::text('precio_unitario', null, ['class'=>'form-control']) !!}
    </div>
            
@endsection

