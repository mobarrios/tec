
        @if(isset($modelItems))
            {!! Form::model($modelItems,['route'=> ['admin.financials.updateDue', $modelItems->id,$models->id], 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=> ['admin.financials.addDue' ], 'files' =>'true']) !!}
        @endif
    <div class="col-xs-12 form-group">
            {!! Form::label('Cuota') !!}
            {!! Form::number('due', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Coeficiente') !!}
            {!! Form::text('coef', null, ['class'=>'form-control','step' => '0,1']) !!}
        </div>
        <div class="col-xs-12 form-group">
            {!! Form::label('Porcentaje') !!}
            {!! Form::text('porcent', null, ['class'=>'form-control','step' => '0,1']) !!}
        </div>


        <div class="col-xs-12 text-center form-group" style="padding-top: 2%">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a data-toggle="control-sidebar" class="btn btn-danger">Cancelar</a>
        </div>
{!! Form::close() !!}
 