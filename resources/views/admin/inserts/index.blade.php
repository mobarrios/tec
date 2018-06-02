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
		            <i class="fa fa-upload"></i>  Subir Excel </button>
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
            {!! Form::open(['route'=>['procesar.base'], 'files' => true]) !!}
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

