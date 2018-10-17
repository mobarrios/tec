@extends('template.model_index')
    @section('table')
        
        @foreach($models as $model)
            <tr>
                
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>
                    {{ isset($model->Model->name) ? $model->Model->name : '' }} 
                <strong>{{ isset($model->Model->Brands->name) ? ': '.$model->Model->Brands->name : ''  }} </strong>

                </td>                
                <td>{{$model->observaciones_internas}}</td>
                <td>{{ isset($model->Cliente->fullname) ? $model->Cliente->fullname : '' }}</td>
                <td><span class="label" style="background-color:{{ isset($model->lasTOrdenEstados()->States->color) ? $model->lasTOrdenEstados()->States->color : '' }} "> {{ isset($model->lasTOrdenEstados()->States->description) ? $model->lasTOrdenEstados()->States->description : '' }} </span></td>
                <td><a href="{{route('admin.orders.details', $model->id)}}" class="btn btn-xs btn-success" ><span class="fa  fa-info-circle"></span> </a></td>

            </tr>
        @endforeach
    @endsection