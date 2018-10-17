@extends('template.model_form')

    @section('form_title')
        Nueva Orden 
          <small> 
          {{isset($clientSelect) ? $clientSelect->name .','. $clientSelect->last_name  : ''}}
           </small>
         
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
              {!! Form::text('codigo_orden', null, ['class'=>'form-control']) !!}
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
              {!! Form::select('clients_id', $clients , isset($clientSelect) ? $clientSelect->id : '' ,['class'=>'select2 form-control ']) !!}
              {!! Form::hidden('users_id', $users_id) !!}
            </div>
            {{--
            <div class="col-xs-4 form-group">
              {!! Form::label('Modelo') !!}
              {!! Form::select('models_id', $models_id , null ,['class'=>'select2 form-control ']) !!}
            </div>
            --}}
            <div class="col-xs-4 form-group">
              {!! Form::label('Modelos') !!}
              <select name='models_id' class=" select2 form-control">
                @foreach($brands as $br)
                    <optgroup label="{{$br->name}}">
                        @foreach($br->Models as $m)
                                <option value="{{$m->id}}" @if(isset($models) && ($models->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
              </select>
            </div>    
            <div class="col-xs-4 form-group">
              {!! Form::label('Serie/IMEI') !!}
              {!! Form::text('numero_serie', null, ['class'=>'form-control']) !!}
            </div>
          </div>

           <div class="row">  
            <div class="col-xs-4 form-group">
              {!! Form::label('Equipo') !!}
              {!! Form::select('equipments_id',$equipments, isset($models->equipments_id) ? $models->equipments_id : null, ['class'=>'form-control select2']) !!}
            </div>
           
             <div class="col-xs-4 form-group">
              {!! Form::label('Repuesto') !!}
              {!! Form::text('partes', null, ['class'=>'form-control']) !!}
            </div>

         
            <div class="col-xs-4 form-group">
              {!! Form::label('Numero serie partes') !!}
              {!! Form::text('serie_partes', null, ['class'=>'form-control']) !!}
            </div>
           
          </div>

          <div class="row">  
           
             <div class="col-xs-4 form-group">
              {!! Form::label('Falla a Reparar') !!}
              {!! Form::textarea('falla_declarada', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40 ]) !!}
            </div>
         
            <div class="col-xs-4 form-group">
              {!! Form::label('Observaciones') !!}
              {!! Form::textarea('observaciones', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>


            <div class="col-xs-4 form-group">
              {!! Form::label('Presupuesto') !!}
              {!! Form::text('presupuesto_estimado', null, ['class'=>'form-control']) !!}
            </div>
          </div>
          
@endsection

