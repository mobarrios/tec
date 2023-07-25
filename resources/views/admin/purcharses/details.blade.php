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
          <a href="{{route('admin.purcharses.remito',$models->id)}}" target="_blank" class="btn btn-default pull-right" style="margin-left: 10px;" >Remito</a>  
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
        <span class="text-muted">DNI:</span> <strong> {{ isset($models->Cliente->dni)  ? $models->Cliente->dni : ''}}</strong>
        <br><br>
        <span class="text-muted">CUIT:</span> <strong> {{ isset($models->Cliente->cuit)  ? $models->Cliente->cuit : ''}}</strong>
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

        <span class="text-muted">Sucursal : </span> <strong>{{ isset($models->Sucursal) ? $models->Sucursal->name : '' }}</strong>
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


<div class="col-xs-6">
  <div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">  Estados </h3>
  </div>
  <div class="box-body">
    <div class="col-lg-12">

      
      {!! Form::open(['route'=>('admin.purcharses.updateEstado')]) !!}
      <div class="input-group">
        
        <select class="form-control select2" name="estado_id">
          <option value="">Seleccionar Estado</option>
          
          @foreach($states as $key => $estado)
         
            @if( is_array(config('models.roles.estados.'.$key)) && in_array ( Auth::user()->Roles()->first()->slug, config('models.roles.estados.'.$key), true ) ) 

              <option value="{{ $key }}"> {{ $estado }} </option>
            @else
               <option value="{{ $key }}" disabled > {{ $estado }} </option>
            @endif

          @endforeach

        </select>

        {!! Form::hidden('items_id', $models->id) !!}

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
          @foreach($models->Estados as $orden)

            <tr>
              <td>{{ $orden->created_at }}</td>
              <td>{{ isset($orden->User)  ? $orden->User->user_name : '' }}</td>
              <td>{{ isset($orden->States->description) ? $orden->States->description : '' }}</td>
              <td>
                @if($orden->confirmar_cliente == 1)
                  <span class="label" style="background-color:green "> Confirmado por el cliente </span>
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
    </div>

    </div>
  </div>
</div>


<div class="col-xs-6">
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Datos de pago </h3>
    </div>

    <div class="box-body">

      <span class="text-muted">Nombre completo : </span> <strong>{{ isset($models->Pago->nombre) ? $models->Pago->nombre : ''   }} {{ isset($models->Pago->apellido) ? $models->Pago->apellido : ''   }}</strong>
      <br><br>
      <span class="text-muted">Fecha y hora  : </span> <strong>{{ isset($models->Pago) ? date('d/m/Y' ,strtotime($models->Pago->created_at)) : ''   }} {{ isset($models->Pago) ? date('H:i' ,strtotime($models->Pago->created_at)) : ''   }}</strong>
      <br><br>
      <span class="text-muted">Forma de pago  : </span> <strong>{{ isset($models->Pago->PayMethods) ? $models->Pago->PayMethods->name : ''   }}
        {{ isset($models->Pago->term) ? $models->Pago->term : '' }}
      </strong>
      <br><br>

      @if($models->Pago->pay_methods_id == 8)
        <span class="text-muted">Modelo de canje  : </span> <strong>{{ isset($models->Pago->ModelCanje) ? $models->Pago->ModelCanje->name : ''   }}
        
        </strong>
        <br><br>
      @else
        <span class="text-muted">CBU  : </span> <strong>{{ isset($models->Pago->number) ? $models->Pago->number : ''   }}

        </strong>
        <br><br>
        <span class="text-muted">Alias  : </span> <strong>{{ isset($models->Pago->alias) ? $models->Pago->alias : ''   }}

        </strong>
        <br><br>
        <span class="text-muted">Numero De Cuenta  : </span> <strong>{{ isset($models->Pago->numero_cuenta) ? $models->Pago->numero_cuenta : ''   }}
        </strong>
        <br><br>
      @endif

      <span class="text-muted">Monto  : </span> <strong>$ {{ isset($models->Pago->amount) ? $models->Pago->amount : ''   }}

      </strong>
      <br><br><hr>
      

      @if(isset($models->Pago))
        @foreach($models->Pago->images->chunk(3) as $key => $imagen)
          <div class="row">
          @foreach($imagen as $key => $img)
            @if(isset($imagen[$key]))
              <div class="col-md-4 col-sm-4 col-xs-6">
                <a href="" class="btn_imagen" data-toggle="modal" data-target="#myModal" data-img="{{ $img->path}}">
                  <img src="{{ asset($img->path)}}" class="img-responsive">
                </a>
              </div>
            @endif
          @endforeach
          </div>
        @endforeach
      @endif
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

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">

        </div>
    </div>
  </div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/multiUpload.js') }}"></script>
<script type="text/javascript">
  $('.btnVenta').on('click', function(e){

    $(".btnVenta").attr("disabled", true);

  });
    $(".btn_imagen" ).click(function() {       
    $('div.modal-body > img').remove();
    //console.log($(this).data('img'))
    //var row   = $(this).find('a');
    var imagen  = $(this).data('img')
    console.log(imagen);
    $('.modal-body').append('<img src="'+imagen+'" class="img-responsive">');
  });


  
</script>
@endsection








