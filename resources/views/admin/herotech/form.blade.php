@extends('template.model_form')

    @section('form_title')
        Nueva Compra
    @endsection

    @section('form_inputs')
      @if(isset($models))
          {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id], 'files' =>'true']) !!}
      @else
          {!! Form::open(['route'=>config('models.'.$section.'.storeRoute'), 'files' =>'true']) !!}
      @endif  

    <div class="row">
      <div class="col-xs-12">
        <h4> Datos del cliente</h4>
      </div>

      <div class="col-xs-3 form-group">
        {!! Form::label('Cliente') !!}

        @if(isset($ordenCompra))
          {!! Form::hidden('orders_id', $ordenCompra->id) !!}
          {!! Form::select('clients_id', $clients , isset($ordenCompra->Cliente) ? $ordenCompra->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
    
        @else
          {!! Form::select('clients_id', $clients , isset($models->Cliente) ? $models->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
        @endif

      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h4> Datos de la orden</h4>
      </div>

      <div class="col-xs-3 form-group">
        {!! Form::label('Modelos') !!}
        <select name='models_id' class="select2 form-control" placeholder="seleccionar Cliente" >
          @foreach($brands as $br)
              <optgroup label="{{$br->name}}">
                  @foreach($br->Models as $m)
                    @if(isset($ordenCompra))
                      <option value="{{$m->id}}" @if(isset($ordenCompra) && ($ordenCompra->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                    @else
                      <option value="{{$m->id}}" @if(isset($models) && ($models->models_id == $m->id)) selected="selected" @endif>{{$m->name}}</option>
                    @endif
                  @endforeach
              </optgroup>
          @endforeach
        </select>
      </div>
    </div>

    
    <div class="row">
      
      <div class="col-xs-12">
        <h4> Informes</h4>
      </div>


      <div class="col-xs-4 form-group">
        {!! Form::label('Informe inicial') !!}
        {!! Form::text('falla_declarada', null,  ['class'=>'form-control']) !!}
      </div>
      <div class="col-xs-4 form-group">
        {!! Form::label('Informe presupuesto') !!}
        {!! Form::text('observaciones_internas', null,  ['class'=>'form-control']) !!}
      </div>
      <div class="col-xs-4 form-group">
        {!! Form::label('Informe final') !!}
        {!! Form::text('observaciones', null,  ['class'=>'form-control']) !!}
      </div>
      <div class="col-xs-4 form-group">
        {!! Form::label('Insumos') !!}
        {!! Form::text('insumos', null,  ['class'=>'form-control']) !!}
      </div>

    </div>
 

    <hr>
    <div class="row">
      <div class="col-xs-12">
      <h4> Subir imágenes</h4>
      </div>

    @if(isset($models))

    @if(isset($models->Pago))
      @foreach($models->Pago->images->chunk(3) as $key => $imagen)
      <div class="row">
        @foreach($imagen as $key => $img)
          @if(isset($imagen[$key]))
          <div class="col-md-4 col-sm-4 col-xs-6">
            <a href="javascript:void(0)" data-spartanindexremove="0" style="right: 15px; top: 0px; background: rgb(237, 60, 32); border-radius: 3px; width: 25px; height: 25px; line-height: 25px; text-align: center; text-decoration: none; color: rgb(255, 255, 255); position: absolute !important;" class="spartan_remove_row"><i class="fa fa-times"></i></a>
         
            <a href="" class="btn_imagen" data-toggle="modal" data-target="#myModal" data-img="{{ $img->url}}">
              <img src="{{ asset($img->path)}}" class="img-responsive">
            </a>
            {!! Form::hidden('imageOld[]', $img->path) !!}
           </div>
          @endif
        @endforeach
      </div>
      @endforeach
      <br><br>
    @endif 
      <div class="row">
        <div class="col-xs-12">
          <div id="coba"></div>
        </div>
      </div>

    @else
      <div id="coba"></div>
    @endif
  </div>
  
            
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/multiUpload.js') }}"></script>
<script type="text/javascript">
  $('.btnVenta').on('click', function(e){
    $(".btnVenta").attr("disabled", true);
  });

  $("#coba").spartanMultiImagePicker({
    fieldName:        'image[]',
    maxCount:         5,
    rowHeight:        '200px',
    groupClassName:   'col-md-4 col-sm-4 col-xs-6',
    maxFileSize:      '',
    placeholderImage: {
        image: '{{asset("images/add_image.png")}}',
          width : '100%'
    },
    dropFileLabel : "Drop Here",
    onAddRow:       function(index){
      console.log(index);
      console.log('add new row');
    },
    onRenderedPreview : function(index){
      console.log(index);
      console.log('preview rendered');
    },
    onRemoveRow : function(index){
      console.log(index);
    },
    onExtensionErr : function(index, file){
      console.log(index, file,  'extension err');
      alert('Please only input png or jpg type file')
    },
    onSizeErr : function(index, file){
      console.log(index, file,  'file size too big');
      alert('File size too big');
    }
  });
  
  $(".spartan_remove_row" ).click(function(e) {       
    console.log($(this).parent().remove())
  });


  $( ".pay_methods_id" ).change(function() {
  // Check input( $( this ).val() ) for validity here
  console.log( $(this).val() );
    var pago = $(this).val()

    if( pago == 6 ){
      $('.cbu').attr('disabled', false)
      $('.numero_cuenta').attr('disabled', false)
      $('.alias').attr('disabled', false)

      $('.models_canje_id').attr('disabled', true);
    }

    if( pago == 8 ){
      $('.models_canje_id').attr('disabled', false);

      $('.cbu').attr('disabled', true)
      $('.numero_cuenta').attr('disabled', true)
      $('.alias').attr('disabled', true)

    }

  });

</script>
@endsection