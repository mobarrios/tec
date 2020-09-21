@extends('template')

    @section('form_title')
       Orden # {{$models->id}}
    @endsection

 	@section('sectionContent')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-header">
            <div class="col-xs-8"><h3 class="box-title">  Compra # {{$models->id}}</h3></div>
              <a href="{{route('admin.purcharses.reporte',$models->id)}}" target="_blank" class="btn btn-default pull-right" style="margin-left: 10px;" >Reporte</a>  
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
            <h3 class="box-title">  Compra </h3>
          </div>
          <div class="box-body">

            <span class="text-muted">Sucursal : </span> <strong>{{ isset($models->Company->razon_social) ? $models->Company->razon_social : '' }}</strong>
            <br><br> 
            <span class="text-muted">ID Reparación : </span> <strong>{{ isset($models->Orden) ? $models->Orden->id : '' }}</strong>
            <br><br> 
            <span class="text-muted">ID Compra : </span> <strong>{{ $models->id }}</strong>
            <br><br>  
            <span class="text-muted">Marca : </span> <strong>{{ isset($models->Model->Brands) ? $models->Model->Brands->name : '' }}</strong>
            <br><br>
            <span class="text-muted">Modelo : </span> <strong>{{ isset($models->Model) ? $models->Model->name : '' }}</strong>
            <br><br>
            <span class="text-muted">IMEI: </span> <strong>{{ $models->numero_serie }}</strong>
            <br><br>
     
            <span class="text-muted">Cantidad : </span> <strong>{{ $models->cantidad }}</strong>
            <br><br>
            <span class="text-muted">Precio Compra : </span> <strong>$ {{ $models->precio_unitario }}</strong>
           
          </div>
        </div>
      </div>

    </div>  


  </div>
<div class="col-xs-12">
   <div class="box box-solid">
     <div class="box box-solid">
      <div class="box-body">
      <a href="{{ route('admin.items.compra', $models->id )}}" class="btn btn-success btn-md pull-right btnVenta {{ $models->Venta ? 'disabled' : '' }}">
      <i class="fa fa-shopping-cart"></i> Generar venta</a>
      </div>
    </div>
  </div>
</div>



@endsection
@section('js')
<script type="text/javascript">
  $('.btnVenta').on('click', function(e){

    $(".btnVenta").attr("disabled", true);

  });
</script>
@endsection








