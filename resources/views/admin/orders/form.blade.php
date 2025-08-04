@extends('template.model_form')

    @section('form_title')
        Nueva Orden 
          <small> 
          {{isset($clientSelect) ? $clientSelect->name .','. $clientSelect->last_name  : ''}}
           </small>
         
    @endsection
    
    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id], 'files' =>'true']) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute'), 'files' =>'true']) !!}
        @endif

          <div class="row">
            {{--
            <div class="col-xs-4 form-group">
              {!! Form::label('Numero de orden') !!}
              {!! Form::text('codigo_orden', null, ['class'=>'form-control']) !!}
            </div>
            --}}

            <div class="col-xs-4 form-group">
              {!! Form::label('Fecha Inicio') !!}
              @if(isset($models))
                {!! Form::text('fecha_inicio', null, ['class'=>'form-control datePicker']) !!}
              @else
                {!! Form::text('fecha_inicio',  date('d-m-Y'), ['class'=>'form-control datePicker']) !!}
              @endif

            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Fecha Final') !!}
            @if(isset($models))
              {!! Form::text('fecha_final', null, ['class'=>'form-control datePicker']) !!}
            @else
              {!! Form::text('fecha_final',  date('d-m-Y'), ['class'=>'form-control datePicker']) !!}
            @endif
            </div>
            
            <div class="col-xs-4 form-group">
              {!! Form::label('Cliente') !!}
              @if(isset($models))
                <select name="clients_id" class="form-control select2 search-client">
                  <option value="{{$models->Cliente->id}}"> {{$models->Cliente->name}}  {{$models->Cliente->last_name}} {{$models->Cliente->dni}} </option> 
                </select>
              @else
                {!! Form::select('clients_id',[],null,['class'=> 'form-control select2 search-client']) !!}
              @endif
              {{-- {!! Form::select('clients_id', $clients , isset($models->Cliente) ? $models->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!} --}}
              {!! Form::hidden('users_id', $users_id) !!}
              {!! Form::hidden('vendedor_id', $users_id) !!}
            </div>
          
          </div>
          
          <div class="row">  
            <div class="col-xs-4 form-group">
              {!! Form::label('Part number') !!}
              {!! Form::text('part_number', null, ['class'=>'form-control']) !!}
            </div>
            {{--
            <div class="col-xs-4 form-group">
              {!! Form::label('Modelo') !!}
              {!! Form::select('models_id', $models_id , null ,['class'=>'select2 form-control ']) !!}
            </div>
            --}}
            <div class="col-xs-4 form-group">
              {!! Form::label('Modelos') !!}
              <select name='models_id' class="select2 form-control" placeholder="seleccionar Cliente" >
                <option value="">Seleccionar</option>
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
            {{--
            <div class="col-xs-2 form-group">
              {!! Form::label('Equipo') !!}
              {!! Form::select('equipments_id',$equipments, isset($models->equipments_id) ? $models->equipments_id : null, ['class'=>'form-control select2']) !!}
            </div>
            --}}
             <div class="col-xs-4 form-group">
              {!! Form::label('Clave del Equipo') !!}
              {!! Form::text('clave_equipo', null, ['class'=>'form-control']) !!}
            </div>
           
            <div class="col-xs-4 form-group">
              {!! Form::label('Numero serie partes') !!}
              {!! Form::text('serie_partes', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Descripción de la Falla') !!}
              {!! Form::textarea('falla_declarada', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40 ]) !!}
            </div>
         
           
          </div>

          <div class="row">  
            
            {{--
            <div class="col-xs-4 form-group">
              {!! Form::label('Informe tecnico inicial') !!}
              {!! Form::textarea('observaciones_tecnicas', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>

            <div class="col-xs-4 form-group">
              {!! Form::label('Informe tecnico final') !!}
              {!! Form::textarea('partes', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>

            <div class="col-xs-4 form-group">
              {!! Form::label('Observaciones') !!}
              {!! Form::textarea('observaciones', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>
              --}}
          
          </div>
          
          <div class="row">
            {{--
            <div class="col-xs-4 form-group">
              {!! Form::label('Insumos') !!}
              {!! Form::text('insumos', null, ['class'=>'form-control']) !!}
            </div>
            --}}
            <div class="col-xs-2 form-group">
              {!! Form::label('Capacidad') !!}
              {!! Form::text('capacidad', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-2 form-group">
              {!! Form::label('Bateria') !!}
              {!! Form::text('bateria', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Color') !!}
              {!! Form::text('color', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Observaciones') !!}
              {!! Form::textarea('observaciones', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 form-group">
              {!! Form::label('$ Presupuesto Estimado') !!}
              {!! Form::text('presupuesto_estimado', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-xs-4 form-group">
              {!! Form::label('Uso interno') !!}
              {!! Form::textarea('uso_interno', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>
          </div>

          @if(!isset($models))
          <hr>
          <div class="row">
            <div class="col-xs-4 form-group">
              {!! Form::label('Vendedor') !!}
              {!! Form::select('vendedor_id',$users->prepend('Seleccionar', ''), isset($models->vendedor_id) ? $models->vendedor_id : null, ['class'=>'form-control select2']) !!}
            </div>
            <div class="col-xs-4 form-group">
              {!! Form::label('Técnico') !!}
              {!! Form::select('users_id',$users->prepend('Seleccionar', ''), isset($models->users_id) ? $models->users_id : null, ['class'=>'form-control select2']) !!}
            </div>
          </div>

          <h3 class="box-title">Testeos  </h3>
          <hr>

          <div class="row">

            <div class="col-xs-12 table-responsive">
              <table class="table-condensed">
                {{-- <thead>                  
                  <th></th>
                  <th>Control</th>
                </thead> --}}
                <tbody>
                  @foreach($tasks as $task)
                    <tr>
                      <td><input class="checkbox" type="checkbox" name="estado[{{ $task->id }}]" value="1"></td>
                      <td>{!! $task->descripcion !!}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
          @endif

       
          
          <h3 class="box-title">Imágenes  </h3>
          <hr>

          {{-- cuando viene un modelo que ya existe --}}
          @if(isset($models))
           
             {{-- edicion del imei imei2 --}}
            <div class="row">
              <div class="col-xs-4">
                <h4 class="text-left" style="margin-left: 15px;">Imei</h4>
                <div id="imei">
                  @if($models->images()->where('types_id', 1)->first())
                  {!! Form::hidden('imei_old', $models->images()->where('types_id', 1)->first()->path) !!}
                  @endif
                </div>
              </div>
              <div class="col-xs-4">
                <h4 class="text-left" style="margin-left: 15px;">Imei 2 (caso inferior al XS cargar foto del teléfono)</h4>
                <div id="imei2">
                  @if($models->images()->where('types_id', 2)->first())

                  {!! Form::hidden('imei2_old', $models->images()->where('types_id', 2)->first()->path) !!}
                  @endif
                </div>
              </div>
            </div>
      
            {{-- imagenes adicionales --}}
         
            @if(isset($models->images))
              @include('admin.orders.formImage')
            @endif 

          @else

              <div class="row">
                <div class="col-xs-4">
                  <h4 class="text-left" style="margin-left: 15px;">Imei</h4>
                  <div id="imei"></div>
                </div>
                <div class="col-xs-4">
                  <h4 class="text-left" style="margin-left: 15px;">Imei 2 (caso inferior al XS cargar foto del teléfono)</h4>
                  <div id="imei2"></div>
                </div>
              
                <div class="col-xs-12">
                  <h4 class="text-left" style="margin-left: 15px;">Fotos adicionales</h4>
                  <div id="coba"></div>
                </div>

              </div>

          @endif
          
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/multiUpload.js') }}"></script>
<script src="js/buscadorClientes.js"></script>
<script type="text/javascript">


$("#imei").spartanMultiImagePicker({
    isRemove: false,
    fieldName:        'imei',
    maxCount:         1,
    rowHeight:        '200px',
    groupClassName:   'col-md-12 col-sm-12 col-xs-12',
    maxFileSize:      '',
   
    placeholderImage: {
      @if(isset($models) && $models->images()->where('types_id', 1)->first())
        image: '{{ asset($models->images()->where('types_id', 1)->first()->path) }}',
      @else
        image: '{{asset("images/add_image.png")}}',
      @endif
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

  $("#imei2").spartanMultiImagePicker({
    isRemove: false,
    fieldName:        'imei2',
    maxCount:         1,
    rowHeight:        '200px',
    groupClassName:   'col-md-12 col-sm-12 col-xs-12',
    maxFileSize:      '',
    placeholderImage: {
      @if(isset($models) && $models->images()->where('types_id', 2)->first())
        image: '{{ asset($models->images()->where('types_id', 2)->first()->path) }}',
      @else
        image: '{{asset("images/add_image.png")}}',
      @endif
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

  $("#coba").spartanMultiImagePicker({
    isRemove: true,
    fieldName:        'image[]',
    maxCount:         5,
    rowHeight:        '200px',
    groupClassName:   'col-md-4 col-sm-4 col-xs-4',
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
    onRemoveRow : function(index, settings, input, parent){
      console.log(index, settings, input, parent);
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

</script>
@endsection

