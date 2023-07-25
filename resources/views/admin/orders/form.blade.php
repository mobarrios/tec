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
              {!! Form::select('clients_id', $clients , isset($models->Cliente) ? $models->Cliente->id : '' ,['class'=>'select2 form-control ', 'placeholder' => 'seleccionar Cliente']) !!}
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
          @if(isset($models))
            @if(isset($models->images))
              @foreach($models->images->chunk(3) as $key => $imagen)
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


{{--             <div class="col-xs-2 form-group">
              <strong> Controles</strong>
            </div>
            <div class="col-xs-2 form-group">
              <strong> Testeo</strong>
            </div>
          </div> --}}
          {{-- div class="row">
         
            @foreach($tasks as $task)
            <div class="col-xs-2 form-group">
              {!! $task->descripcion !!}

            </div>
            <div class="col-xs-2 form-group">

              <input class="checkbox" type="checkbox" name="estado[{{ $task->id }}]" value="1" >

            </div>
            
            @endforeach
          
          </div> --}}
          
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/multiUpload.js') }}"></script>
<script type="text/javascript">

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


</script>
@endsection

