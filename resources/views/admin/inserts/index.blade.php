<html>
<head>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Procesar Base de datos</h1>
		<div class="row">
			<div class="col-xs-12">
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myPresupuesto">
		            <i class="fa fa-upload"></i>  Subir Servicios </button><br><br>

                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#procesarBrands">
                <i class="fa fa-upload"></i>  Subir Marcas </button><br><br>

                 <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#procesarModels">
                <i class="fa fa-upload"></i>  Subir Modelos </button><br><br>

                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#procesarEquipos">
                <i class="fa fa-upload"></i>  Subir Equipos </button><br><br>

                                 <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#procesarClients">
                <i class="fa fa-upload"></i>  Subir Clientes </button><br><br>

                                                 <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#procesarOrders">
                <i class="fa fa-upload"></i>  Subir Ordenes </button><br><br>

                       <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#procesarOrdersClients">
                <i class="fa fa-upload"></i>  Subir Ordenes Clientes </button><br><br>

			</div>

	</div>
</div>

<div class="modal fade" id="myPresupuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir </h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarServices'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="procesarBrands" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Marcas</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarBrands'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="procesarEquipos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Equipos</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarEquipos'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="procesarModels" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Marcas</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarModels'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="procesarClients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Clientes</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarClients'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="procesarOrders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Clientes</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarOrders'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="procesarOrdersClients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subir Clientes</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>['procesarOrdersClients'], 'files' => true]) !!}
            {!! Form::file('file') !!}

            </div>
            <div class="modal-footer">
            {!! Form::submit('Subir', ['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


</body>
</html>

