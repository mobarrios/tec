@extends('template.model_form')

    @section('form_title')
        Movimientos
          <small> 
          
           </small>
         
    @endsection
    
    @section('form_inputs')
        
        @if(isset($models))
            {!! Form::model($models->Movements,['route'=> ['admin.ordenes.postMovimientos',$models->id]]) !!}
        @else
            {!! Form::open(['route'=>['admin.ordenes.postMovimientos',$models->id]]) !!}
        @endif

          <div class="row">

            <div class="col-xs-6">

              <div class="col-xs-6 form-group">
                {!! Form::label('Fecha entrada') !!}
                {!! Form::date('fecha_entrada', null, ['class'=>'form-control']) !!}

              </div>
            
              <div class="col-xs-6 form-group">
                {!! Form::label('Codigo entrada') !!}
                {!! Form::text('codigo_entrada', null, ['class'=>'form-control']) !!}
              </div>
            
            <div class="col-xs-6 form-group">
                {!! Form::label('Nombre de persona') !!}
                {!! Form::text('nombre_traslado_entrada', null, ['class'=>'form-control']) !!}
              </div>
            
            <div class="col-xs-6 form-group">
                {!! Form::label('Hora solicitud') !!}
                {!! Form::time('hora_solicitud_entrada', null, ['class'=>'form-control']) !!}
              </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Hora entrada') !!}
                {!! Form::time('hora_entrada', null, ['class'=>'form-control']) !!}
            </div>
        
            
            </div>

            <div class="col-xs-6">

              <div class="col-xs-6 form-group">
                {!! Form::label('Fecha salida') !!}
                {!! Form::date('fecha_salida', null, ['class'=>'form-control']) !!}
              </div>
            
              <div class="col-xs-6 form-group">
                {!! Form::label('Codigo salida') !!}
                {!! Form::text('codigo_salida', null, ['class'=>'form-control']) !!}
              </div>
            
            <div class="col-xs-6 form-group">
                {!! Form::label('Nombre de persona') !!}
                {!! Form::text('nombre_traslado_salida', null, ['class'=>'form-control']) !!}
              </div>
            
            <div class="col-xs-6 form-group">
                {!! Form::label('Hora solicitud') !!}
                {!! Form::time('hora_solicitud_salida', null, ['class'=>'form-control']) !!}
              </div>
            <div class="col-xs-6 form-group">
                {!! Form::label('Hora entrada') !!}
                {!! Form::time('hora_salida', null, ['class'=>'form-control']) !!}
              </div>
  
            
            </div>


          
          </div>
          
         
          
@endsection