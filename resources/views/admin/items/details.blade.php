@extends('template')

    @section('form_title')
       Orden # {{$models->id}}
    @endsection

 	@section('sectionContent')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-header">
            <div class="col-xs-8"><h3 class="box-title">  Venta # {{$models->id}}</h3></div>
              <a href="{{route('admin.items.reporte',$models->id)}}" target="_blank" class="btn btn-default pull-right" style="margin-left: 10px;" >Reporte</a>  
          </div>
        </div>
      </div>
   
    <div class="row">  
    <div class="col-xs-12">  
      <div class="col-xs-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Cliente </h3>
          </div>

          <div class="box-body">
            <span class="text-muted">Codigo Cliente : </span> <strong>{{ isset($models->Cliente->id) ? $models->Cliente->id : '' }}</strong>
            <br><br>
            <span class="text-muted">Apellido y Nombre :</span><strong> {{ isset($models->Cliente->last_name) ? $models->Cliente->last_name : '' }}

             {{ isset($models->Cliente) ? $models->Cliente->name : '' }} 

            </strong>
            <br><br>
           <span class="text-muted"> Razon Social: </span><strong>{{ isset($models->Cliente->razon_social) ? $models->Cliente->razon_social : '' }}</strong>
            <br><br>
            <span class="text-muted">DNI / CUIT:</span> <strong> {{ isset($models->Cliente->dni)  ? $models->Cliente->dni : ''}}</strong>
            <br><br>
            <span class="text-muted">Email:</span> <strong>{{ isset($models->Cliente->email) ? $models->Cliente->email : ''}}</strong>
            <br><br>
            <span class="text-muted">Direccion:</span> <strong> {{ isset($models->Cliente->address) ? $models->Cliente->address  : '' }} {{ isset($models->Cliente->Localidades) ? $models->Cliente->Localidades->name  : '' }}</strong>
            <br><br>
            <span class="text-muted">Tel / Cel:</span> <strong> {{ isset($models->Cliente->phone1) ? $models->Cliente->phone1 : '' }}</strong>

          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">  Venta </h3>
          </div>
          <div class="box-body">

            <span class="text-muted">Sucursal : </span> <strong>{{ isset($models->Company->razon_social) ? $models->Company->razon_social : '' }}</strong>
            <br><br> 
            <span class="text-muted">ID Reparación : </span> <strong>{{ isset($models->Compra->Orden) ? $models->Compra->Orden->id : '' }}</strong>
            <br><br> 
            <span class="text-muted">ID Compra : </span> <strong>{{ $models->Compra->id }}</strong>
            <br><br>  
            <span class="text-muted">Marca : </span> <strong>{{ isset($models->Models->Brands) ? $models->Models->Brands->name : '' }}</strong>
            <br><br>
            <span class="text-muted">Modelo : </span> <strong>{{ isset($models->Models) ? $models->Models->name : '' }}</strong>
            <br><br>
            <span class="text-muted">IMEI: </span> <strong>{{ $models->Compra->numero_serie }}</strong>
            <br><br>
            <span class="text-muted">Capacidad: </span> <strong>{{ $models->Compra->capacidad }}</strong>
            <br><br>
            <span class="text-muted">Color: </span> <strong>{{ $models->Compra->color }}</strong>
            <br><br>
            <span class="text-muted">Accesorios extras: </span> <strong>{{ $models->Compra->accesorios }}</strong>
            <br><br>
            <span class="text-muted">Estado: </span> <strong>{{ $models->status }}</strong>
            <br><br>

            <span class="text-muted">Cantidad : </span> <strong>{{ $models->Compra->cantidad }}</strong>
            <br><br>
            <span class="text-muted">Precio Compra : </span> <strong>$ {{ $models->Compra->precio_unitario }}</strong>
            <br><br>
            <span class="text-muted">Precio Venta : </span> <strong>$ {{ $models->Compra->precio_venta  }}</strong>
            <br><br>
            <span class="text-muted">Condición u Observaciones para venta: </span> <strong>{{ $models->Compra->observacion }}</strong>
            <br>
          </div>
        </div>
      </div>

    </div>  
  </div>

@endsection