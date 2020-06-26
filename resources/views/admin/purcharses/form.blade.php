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
            <h4> Identificación del vendedor</h4>
            </div>

            <div class="col-xs-4 form-group">
              {!! Form::label('Cliente') !!}
              {!! Form::select('clients_id', $clients , isset($models->Cliente) ? $models->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
              {!! Form::hidden('users_id', $users_id) !!}
            </div>

            <div class="col-xs-12">
            <h4> Datos de la operación</h4>
            </div>

            <div class="col-xs-6 form-group">
              {!! Form::label('Descripcion') !!}
              {!! Form::text('descripcion', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-2 form-group">
              {!! Form::label('Cantidad') !!}
              {!! Form::text('cantidad', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-2 form-group">
              {!! Form::label('Precio Unitario') !!}
              {!! Form::text('precio_unitario', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-2 form-group">
              {!! Form::label('Total') !!}
              {!! Form::text('total', null, ['class'=>'form-control']) !!}
            </div>
            
@endsection

