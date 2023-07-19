@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->Cliente->name }} {{$model->Cliente->last_name }} <br> DNI: {{$model->Cliente->dni }}  </td>
                <td>Falla declarada: {{$model->falla_declarada}} </td>
                <td><a href="{{route('admin.herotech.show', $model->id)}}" class="btn btn-sm btn-success" ><span class="fa  fa-info-circle"></span></a></td>
            </tr>
        @endforeach
    @endsection