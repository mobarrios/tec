@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>
                    {{ isset($model->Producto->Model->name) ? $model->Producto->Model->name : '' }} 
                <strong>{{ isset($model->Producto->Model->Brands->name) ? ': '.$model->Producto->Model->Brands->name : ''  }} </strong>
                </td>  
                <td>{{ isset($model->Cliente) ? $model->Cliente->fullname : '' }}</td>

                <td>$ {{$model->precio_final}}</td>
                <td><a href="{{ route('admin.presupuestos.show', $model->id)}}" class="btn btn-sm btn-success"><span class="fa  fa-info-circle"></span></a></td>
            </tr>
        @endforeach
    @endsection