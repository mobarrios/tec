@extends('template.model_index')
    @section('table') 
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->description }}</td>
                <td>{{$model->text_email}}</td>  
                <td><div style="widht:5px; height:20px; background-color:{{$model->color}};" ></div> </td>   
                <td></td>           
            </tr>
        @endforeach
    @endsection
