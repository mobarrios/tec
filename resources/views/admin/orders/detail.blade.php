@extends('template')

    @section('form_title')
       Orden # {{$models->codigo_orden}}
    @endsection

 	@section('sectionContent')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title">  Orden # {{$models->codigo_orden}}</h3>

            <div class="pull-right ">
              <a href="{{route('admin.ordenes.reporte',$models->id)}}" target="_blank" class="pull-right btn btn-default btn-sm">
                <em class="fa fa-print"></em>
              </a>
            </div>
          </div>

        </div>
      </div>

      <div class="col-xs-4">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Cliente </h3>
          </div>
          <div class="box-body">
            <span class="text-muted">Codigo Cliente : </span> <strong>{{ isset($models->Cliente->id) ? $models->Cliente->id : '' }}</strong>
            <br>
            <span class="text-muted">Apellido y Nombre :</span><strong> {{ $models->Cliente->last_name .' '. $models->Cliente->name }}</strong>
            <br>
           <span class="text-muted"> Razon Social: </span><strong>{{ isset($models->Cliente->razon_social) ? $models->Cliente->razon_social : '' }}</strong>
            <br>
            <span class="text-muted">DNI / CUIT:</span> <strong> {{ isset($models->Cliente->dni)  ? $models->Cliente->dni : ''}}</strong>
            <br>
            <span class="text-muted">Email:</span> <strong>{{ isset($models->Cliente->email) ? $models->Cliente->email : ''}}</strong>
            <br>
            <span class="text-muted">Direccion:</span> <strong> {{ isset($models->Cliente->address) ? $models->Cliente->address  : '' }} {{ isset($models->Cliente->Localidades) ? $models->Cliente->Localidades->name  : '' }}</strong>
            <br>
            <span class="text-muted">Tel / Cel:</span> <strong> {{ isset($models->Cliente->phone1) ? $models->Cliente->phone1 : '' }}</strong>

          </div>
        </div>
      </div>

      <div class="col-xs-4">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">  Equipo </h3>
          </div>
          <div class="box-body">
            <span class="text-muted">Equipo : </span> <strong>{{ isset($models->Equipo) ? $models->Equipo->name : '' }}</strong>
            <br>
            <span class="text-muted">Marca : </span> <strong>{{ isset($models->Brands) ? $models->Brands->name : '' }}</strong>
            <br>
            <span class="text-muted">Modelo : </span> <strong>{{ isset($models->Model) ? $models->Model->name : '' }}</strong>
            <br>
            <span class="text-muted">Número Serie : </span> <strong>{{ $models->numero_serie  }}</strong>
            <br>
            <span class="text-muted">Partes Serie : </span> <strong>{{ $models->serie_partes  }}</strong>
            <br>
            <span class="text-muted">Falla :</span> <strong> {{ $models->numero_serie  }}</strong>
            <br>
            <span class="text-muted">Presupuesto : </span> <strong>$ {{ $models->presupuesto_estimado  }}</strong>
            <br>
            <span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br>
          </div>
        </div>
      </div>

      <div class="col-xs-4">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">  Técnico </h3>
          </div>
          <div class="box-body">
            <span class="text-muted">Usuario  : </span> <strong>{{ isset($models->User) ? $models->User->user_name : '' }}</strong>
            <span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br><span class="text-muted">Observaciones :</span> <strong> {{ $models->observaciones  }}</strong>
            <br>
          </div>
        </div>
      </div>


      <div class="col-xs-4">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">  Estados </h3>
          </div>
          <div class="box-body">
            <div class="col-lg-12">
              {!! Form::open(['route'=>('admin.ordenes.updateEstado')]) !!}
              <div class="input-group">
                {!! Form::select('estado_id',$states, isset($models->estado_id) ? $models->estado_id : null, ['class'=>'form-control select2']) !!}
                {!! Form::hidden('orden_id', $models->id) !!}

                <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><span class="fa fa-plus"></span></button>
            </span>
                {!! Form::close() !!}

              </div>
            </div>
            <div class="col-lg-12">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($models->OrdenEstados as $orden)
                    <tr>
                      <td>{{ $orden->created_at }}</td>
                      <td>{{ isset($orden->User)  ? $orden->User->user_name : '' }}</td>
                      <td>{{ isset($orden->States->description) ? $orden->States->description : '' }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>

          </div>
        </div>
      </div>


      <div class="col-xs-4">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"> Observaciones Tecnicas </h3>
          </div>
          <div class="box-body">
            <!-- textarea -->
            {!! Form::open(['route'=>('admin.ordenes.updateObservaciones')]) !!}
            <div class="form-group">
              <label>FALLA DECLARADA</label>
              <textarea class="form-control" rows="3" name="falla_declarada" > {{$models->falla_declarada}}</textarea>
            </div>
            <div class="form-group">
              <label>OBSERVACIONES</label>
              <textarea class="form-control" rows="3" name="observaciones"> {{$models->observaciones}}</textarea>
            </div>
            {{--
            <div class="form-group">
              <label>OBSERVACIONES TECNICAS</label>
              <textarea class="form-control" rows="3" name="observaciones_tecnicas"> {{$models->observaciones_tecnicas}}</textarea>
            </div>
            --}}
            {!! Form::hidden('orden_id', $models->id) !!}
            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
            {!! Form::close() !!}

          </div>
        </div>
      </div>


      <div class="col-xs-4">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"> Pagos </h3>
          </div>
          <div class="box-body">
            <table class="table table-striped">

              {!! Form::open(['route'=>('admin.ordenes.updatePagos')]) !!}

              <tbody>

              <tr>

                <td width="45%">Presupuesto Estimado</td>

                <td>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control input-sm" disabled value="{{$models->presupuesto_estimado}}">

                    <span class="input-group-addon">.00</span>
                  </div>
                </td>
              </tr>
              <tr>

                <td width="45%">Abonado</td>

                <td>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control input-sm" value="{{$models->pagado}}" name="pagado">
                    <span class="input-group-addon">.00</span>
                    {!! Form::hidden('orden_id', $models->id) !!}
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary pull-right">Guardar</button></td>
              </tr>
              </tbody>
              {!! Form::close() !!}
            </table>

          </div>
        </div>
      </div>

    </div>
  @endsection