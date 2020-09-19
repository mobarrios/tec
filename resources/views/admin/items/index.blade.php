@extends('template.model_index')

    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->Models->Brands->name }} <strong>{{$model->Models->name }}</strong><br></td>
                <td>{{$model->Compra->color }}</td>
                <td>{{$model->Compra->capacidad }}</td>
                <td>Precio Venta <strong>$ {{$model->Compra->precio_venta}}</strong><br></td>
                <td><span class="label" style="background-color:{{ isset($model->lastItemsEstados()->States->color) ? $model->lastItemsEstados()->States->color : '' }} "> {{ isset($model->lastItemsEstados()->States->description) ? $model->lastItemsEstados()->States->description : '' }} </span></td>
                <td>
                    @if($model->Sucursal)
                    <label class="label label-default"> {{$model->Sucursal->name }}</label>
                    @endif
                </td>
                <td><a href="{{route('admin.items.show', $model->id)}}" class="btn btn-sm btn-success" ><span class="fa  fa-info-circle"></span></a></td>
               
            </tr>
        @endforeach


    @endsection