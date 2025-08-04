<div class="col-xs-12">
    <h4 class="text-left" style="margin-left: 15px;">Fotos adicionales</h4>
    <div id="coba"></div>
  </div>
@foreach($models->images->chunk(3) as $key => $imagen)
    <div class="row">
    @foreach($imagen as $key => $img)
        @if(isset($imagen[$key]) && $imagen[$key]->types_id == '' )
        <div class="col-md-4 col-sm-4 col-xs-6">
            {{$imagen[$key]->types_id == 1 ? 'IMEI': '' }}
            {{$imagen[$key]->types_id == 2 ? 'IMEI 2': '' }}
            {{$imagen[$key]->types_id == '' ? 'Imágenes adicionales': '' }}

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