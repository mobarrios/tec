@extends('template.model_index')

    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->Models->Brands->name }} <strong>{{$model->Models->name }}</strong><br></td>
                <td>Precio Venta <strong>$ {{$model->Compra->precio_venta}}</strong><br></td>
                <td>
                    @foreach($model->Brancheables as $branch)
                       <label class="label label-default"> {{$branch->branches->name}} </label>
                    @endforeach
                </td>
                <td><a href="{{route('admin.items.show', $model->id)}}" class="btn btn-sm btn-success" ><span class="fa  fa-info-circle"></span></a></td>
               
            </tr>
        @endforeach


    @endsection