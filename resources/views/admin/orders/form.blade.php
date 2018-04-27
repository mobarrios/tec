@extends('template.model_form')

    @section('form_title')
        Nueva Orden #  {{ isset($ultima_orden) ? $ultima_orden : '' }}
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

          <div class="row">
            <div class="col-xs-4 form-group">
              {!! Form::label('Numero de orden') !!}
              {!! Form::text('codigo_orden', 'ist-'.$ultima_orden, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Fecha Inicio') !!}
              {!! Form::text('fecha_inicio', null, ['class'=>'form-control datePicker']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Fecha Final') !!}
              {!! Form::text('fecha_final', null, ['class'=>'form-control datePicker']) !!}
            </div>
          
          </div>
          
          <div class="row">  

            <div class="col-xs-4 form-group">
              {!! Form::label('Cliente') !!}
              {!! Form::select('clients_id', $clients , null ,['class'=>'select2 form-control ']) !!}
              {!! Form::hidden('users_id', $users_id) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Modelo') !!}
              {!! Form::select('models_id', $models_id , null ,['class'=>'select2 form-control ']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('N Serie') !!}
              {!! Form::text('numero_serie', null, ['class'=>'form-control']) !!}
            </div>
          </div>

           <div class="row">  
            <div class="col-xs-4 form-group">
              {!! Form::label('Equipo') !!}
              {!! Form::select('equipments_id',$equipments, isset($models->equipments_id) ? $models->equipments_id : null, ['class'=>'form-control select2']) !!}
            </div>
           
             <div class="col-xs-4 form-group">
              {!! Form::label('Partes') !!}
              {!! Form::text('partes', null, ['class'=>'form-control']) !!}
            </div>

         
            <div class="col-xs-4 form-group">
              {!! Form::label('Numero serie partes') !!}
              {!! Form::text('serie_partes', null, ['class'=>'form-control']) !!}
            </div>
           
          </div>

          <div class="row">  
           
             <div class="col-xs-4 form-group">
              {!! Form::label('Falla Declarada') !!}
              {!! Form::textarea('falla_declarada', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40 ]) !!}
            </div>
         
            <div class="col-xs-4 form-group">
              {!! Form::label('Observaciones') !!}
              {!! Form::textarea('observaciones', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>

            <div class="col-xs-4 form-group">
              {!! Form::label('Presupuesto Estimado') !!}
              {!! Form::text('presupuesto_estimado', null, ['class'=>'form-control']) !!}
            </div>
          </div>
          
@endsection

