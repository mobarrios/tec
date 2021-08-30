var modelo = $('select[name=modelo]')


console.log(modelo)


$(modelo).on('change', function(ev){
    ev.preventDefault();
  
    var modeloId = $(this).val();

    //var cod_depto 	  = $('select[name=departamento_espacio_comunitario_id]').val();

    //$('[name=provincia_espacio_comunitario]').val($(provincia_espacioComunitario).select2('data')[0].text)
    
    //domicilio_espacioComunitario.empty();

    //$('[name=calle_espacio_comunitario]').val('')
  
   
    $.ajax({
        method: "get",
        //url: 'https://apis.datos.gob.ar/georef/api/departamentos?provincia='+cod_provincia+'&campos=id,nombre&max=5000&orden=nombre',
        url: 'porGama',
        data: {
            modelos_id: modeloId,
        },
        success: function (data) {
            
            console.log(data)
            //$('.lblPrecio').html(data.precio_final)
            //$(departamento_espacioComunitario).empty();
            //$(departamento_espacioComunitario).append($('<option value="">Seleccionar</option>'))
            var divCaracteristicas = $('.divCaracteristicas');
            divCaracteristicas.empty();

            $.each(data, function(key, value){

                if( value[0] !== 'undefined' ){
                    divCaracteristicas.append( inputTemplate(value[0].nombre, value[0].id)  )
                }

                if( value[1] !== 'undefined' ){
                    divCaracteristicas.append( inputTemplate(value[1].nombre, value[1].id)  )
                }
              
               
            });
     

        }
    });
    

});


function inputTemplate(nombre, id){

    return  '<div class="col-md-6">'+
            '<label class="containerCheckbox">'+ nombre +
              '<input type="checkbox" name="caracteristicas[]" value="'+ id +'" >'+
              '<span class="checkmark"></span>'+
            '</label>'+
            '</div>';

}

$('.btnTerminos').on('click', function(){
	console.log('ds')
	var div = $('.divTerminos');
	
	if(div.css('display') == 'none' ){
		$('.divTerminos').show();
	}else{
		$('.divTerminos').hide();
	}


})

$('.btnCoordinarCita').on('click', function(){
    console.log('ds')
    if( $("#radioTerminos").is(':checked') == false ) {  
        $('.divErrorTerminos').show();
        return false;
    }

    
   


})