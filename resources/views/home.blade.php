@extends('template')

@section('sectionContent')
    <div class="row">
        {{--
         <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red-active">
                <div class="inner">
                    <h3>{{\App\Entities\Tecnica\Orders::all()->count()}}</h3>
                    <p>Ordenes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admin.orders.create')}}" class="small-box-footer">Nueva Orden <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        --}}

        {{--
        <!-- Default box -->
        <div class="col-xs-12 col-sm-3 pull-right">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{!! Auth::user()->images ? Auth::user()->images->path : "vendors/LTE/dist/img/avatar5.png"!!}" alt="User profile picture">

                    <h3 class="profile-username text-center"><a href="{!! route('admin.profiles.index') !!}">{{\Illuminate\Support\Facades\Auth::user()->fullName}}</a></h3>

                    <p class="text-center ">
                        <span class="text-muted">Perfil : </span>

                    @foreach(\Illuminate\Support\Facades\Auth::user()->Roles as $rol)
                            <label class=" label label-primary"> {{$rol->slug}}</label>
                        @endforeach
                    </p>
                    <span >
                        <span class="text-muted">Sucursales : </span>
                      @foreach(\Illuminate\Support\Facades\Auth::user()->brancheables as $branch)
                        <label class=" label label-default">{{$branch->branches->name}}</label>
                      @endforeach
                    </span>

                </div>

            </div>
        </div>
        <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{\App\Entities\Admin\Budgets::all()->count()}}</h3>
                    <p>Presupuestos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-bookmark"></i>
                </div>
            </div>
            <div class="box-footer">
                {!! Form::open(['route'=>('admin.budgets.index'),'method'=>'GET']) !!}
                    <div class="input-group">
                        <input name="search" placeholder="Buscar Presupuesto..." class="form-control" type="text">
                        <input  type="hidden" name="filter[]" value="id">
                          <span class="input-group-btn">
                            <button type="submit" class="btn bg-aqua btn-flat"><span class="fa fa-search"></span></button>
                          </span>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        --}}
       

        {{--

      <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-orange ">
                <div class="inner">
                    <h3>{{\App\Entities\Admin\Models::all()->count()}}</h3>
                    <p>Lista de Precios</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="{{route('admin.models.index')}}" class="small-box-footer">ir a Lista  <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        --}}

    </div>

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Ordenes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Codigo Orden</th>
                      <th>Name</th>
                      <th>Observaciones</th>
                      <th>Nombre Completo</th>
                      <th>Ultimo Estado</th>
                      <th></th>
                    </tr>
                    @foreach($models as $model)
                      
                        <tr>
                            <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"> </td>
                          
                            <td>{{$model->codigo_orden }}</td>
                            <td>{{ isset($model->Model->name) ? $model->Model->name : '' }}</td>                
                            <td>{{$model->observaciones_internas}}</td>
                            <td>{{ isset($model->Cliente->fullname) ? $model->Cliente->fullname : '' }}</td>
                            <td>{{ isset($model->lasTOrdenEstados()->States->description) ? $model->lasTOrdenEstados()->States->description : '' }}</td>
                            <td><a href="{{route('admin.orders.details', $model->id)}}">detalles</a></td>
                        </tr>
                    @endforeach
                
                  </table>
                </div>
                <!-- /.box-body -->
          </div>
        </div>
    </div>
@endsection
