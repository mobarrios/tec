@extends('template.model_form')

    @section('form_title')
        Nuevo Estado
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

        <div class="col-xs-12 form-group">
          {!! Form::label('Descripción') !!}
          {!! Form::text('description', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
          {!! Form::label('Texto Email') !!}
          {!! Form::textarea('text_email', null, ['class'=>'form-control']) !!}
        </div>

@endsection

