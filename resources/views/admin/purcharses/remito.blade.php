<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Orden Compra {!! $model->id !!}</title>
      <style>

        body{
            font-size: 11px;
            font-family: Arial, sans-serif;
        }

        hr {
            border: 0.5px solid #000000;
        }



          table{
              border-collapse: collapse;
          }

          .titulo{
              width: 100%;
              margin-top: 5px;
              margin-bottom: -15px !important;
          }

          .titulo *{
              vertical-align: middle !important;
              display: inline-block;
          }


          .titulo span{
              width: 50%;
              /*border: 1px solid red;*/
          }

          .right{
              display: inline-block;
              /*vertical-align: bottom !important*/;
              width: 50%;
          }

          .left{
              width: 50%;
              display: inline-block;
              /*vertical-align: top !important;*/
          }

          .content{
              border-top: 1px solid #c1c1c1;
              padding-top: 3px;
              /*margin-top: -40px !important;*/
          }

          .content span,.content p{
              display: inline-block;
              vertical-align: top !important;
          }

          .content span{
              width:100%;
          }

          .border{
              /*border-bottom: 1px solid black;*/
              /*margin-top: -10px;*/
              padding-top: 0 !important;
              margin-bottom: -20px !important;
              padding-bottom: 0 !important;
          }

          .datos_medicos p{
              margin:0 !important;
              padding:0 !important;
          }



      </style>
  </head>
  <body>

  <table style="width: 100%;">
      <tr>
          <td>
             <table style="width: 100%;">
                  <tr>
                      <td style="width: 50%;">
                        
                        @if($company->images->count() > 0)
                            <img width="200px" src="{{ $company->images->first()->path }}">
                        @endif 
                      </td>

                      <td style="font-size: 1.5em;" >

                          <strong>Fecha de Ingreso</strong> {{ date('d/m/Y',strtotime($model->created_at)) }}<br />
                          <strong>Orden de Compra</strong> {{$model->id}}<br />
                          <strong>Sucursal </strong> {{ isset($model->Company->razon_social) ?  $model->Company->razon_social : '' }}

                      </td>
                  </tr>
              </table>
          </td>
         
      </tr>
  
      <tr>
          <td>
              <table style="width: 100%;">
                  <tr valign="top">
                   
                      <td style="font-size: 1.2em;">
                         Dir: {{$company->direccion}} <br>
                         Tel: {{$company->telefono}} <br>
                         Cuit: {{$company->cuit}}
                      </td>
                 
                   
                      <td style="font-size: 1.2em;">
                        Condición Frente al IVA: {{ isset($company->IvaConditions) ?  $company->IvaConditions->name : '' }} <br>
                        Ingresos Brutos Nº: {{$company->ingresos_brutos}} <br>
                        Inicio de Actividades: {{$company->inicio_actividades}} <br>
                      </td>
              </tr>
              </table>
          </td>
      </tr>
  </table>
  <br/> 
  <br/>
  <fieldset style="font-size: 1.2em;">
    <legend>Cliente</legend>
      <table style="width: 100%; font-size: 1.2em;" >
      <tr>
        <td>
          Nombre completo: {{ isset($model->Orden->Cliente->name) ? $model->Orden->Cliente->name : '' }}, {{ isset($model->Orden->Cliente->last_name) ? $model->Orden->Cliente->last_name : '' }}
        </td>
        <td>
          Teléfono: {{ isset($model->Orden->Cliente->phone1) ? $model->Orden->Cliente->phone1 : '' }}
        </td>
      </tr>
      <tr>
      	<td>DNI
      		{{ isset($model->Orden->Cliente->dni) ? $model->Orden->Cliente->dni : '' }}
      	</td>
      	<td>CUIT
      		{{ isset($model->Orden->Cliente->cuit) ? $model->Orden->Cliente->cuit : '' }}
      	</td>
      </tr>
  </table>
 </fieldset>

  <br/>
  <br/>
  <fieldset>
    <legend style="font-size: 1.2em;">Equipo</legend>
      <table style="width: 100%; font-size: 1.2em;" >
      <tr>
         <td>
         Modelo : {{ isset($model->Orden->Model->Brands) ? $model->Orden->Model->Brands->name : '' }} {{ isset($model->Orden->Model) ? $model->Orden->Model->name : '' }}
         </td>
         <td>
         Serie/IMEI :  {{ $model->Orden->numero_serie }}
         </td>
         
      </tr>
      <tr>
         <td>
         Capacidad : {{  $model->Orden->capacidad }}
         </td>
         <td>
         Color :  {{ $model->Orden->color }}
         </td>
         
      </tr>
      
      <tr>
        <td>Observaciones : {{ $model->Orden->observacion  }} </td>
      </tr>

  </table>
 </fieldset>

<br/>
<br/>

  <fieldset>
    <legend style="font-size: 1.2em;">Datos de pago</legend>
      <table style="width: 100%; font-size: 1.2em;" >
      <tr>
         <td>Fecha y hora
         	{{ isset($model->Pago) ? date('d/m/Y' ,strtotime($model->Pago->created_at)) : ''   }} 
         	{{ isset($model->Pago) ? date('H:i' ,strtotime($model->Pago->created_at)) : ''   }}
         </td>
         <td>Forma de pago
         	{{ isset($model->Pago->PayMethods) ? $model->Pago->PayMethods->name : ''   }}
        	{{ isset($model->Pago->term) ? $model->Pago->term : '' }}
         </td>
      </tr>
      <tr>
         <td>CBU
         	{{ isset($model->Pago->number) ? $model->Pago->number : ''   }}
         </td>
         <td>Alias
         	{{ isset($model->Pago->alias) ? $model->Pago->alias : ''   }}
         </td>
      </tr>
      <tr>
         <td>Monto
         	$ {{ isset($model->Pago->amount) ? $model->Pago->amount : ''   }}
         </td>
        
      </tr>
  
  </table>
 </fieldset>

 <fieldset>
    <legend style="font-size: 1.2em;">Imágenes</legend>
      <table style="width: 100%; font-size: 1.2em;">
   
        @foreach($model->Pago->images->chunk(3) as $key => $imagen)
          <tr>
          @foreach($imagen as $key => $img)
            @if(isset($imagen[$key]))
            	<td>
            		<img src="{{ asset($img->path)}}" class="img-responsive" width="450" height="250">
		     	</td>
            @endif
          @endforeach
          </tr>
        @endforeach
  
  </table>
 </fieldset>

</body>

</html>