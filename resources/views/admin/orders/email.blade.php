<html>
<head>
    <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' 
rel='stylesheet' type='text/css'>

<div class="headbar">

    <img 
        alt="Carcasa Logo" 
        title="Carcasa Logo" 
        src="{{ $message->embed(public_path('images/carcasa/logo1/logo_blanco.png')) }}"
        class="headbar-logo-img"
    >

    {{-- <img 
        alt="Carcasa Iso" 
        title="Carcasa Iso" 
        src="{{ $message->embed(public_path('images/carcasa/iso/blanco.png')) }}"
        class="headbar-iso-img"
    > --}}

</div>

<style>

.headbar {
    width: 100%;
    background-color: #000000;
    text-align: center;
    padding: 35px 0 25px 0;
    border-bottom: 4px solid #e5e5e5;
}

.headbar-logo-img {
    width: 300px;
    max-width: 80%;
    height: auto;
    display: block;
    margin: 0 auto 10px auto;
}

.headbar-iso-img {
    width: 35px;
    height: auto;
    display: block;
    margin: 0 auto;
    opacity: 0.9;
}

.button {
  background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

 </style> 


 <body>

<div class="container">
    <div class="col-12 ">
        <div class="status panel">
	       <div class="status-content">
     
                <h1 style="text-align: center;"> {{ $empresa }}</h1>
                <h5 style="text-align: center;"> {{ $direccion }}</h5>
                
                <h3 class="heading-small m-none">{!! $estado->description !!}</h3>
            </div>
        </div>
    </div>

    <style>
    	.container {
        margin-left: auto;
        margin-right: auto;
        padding-left: 15px;
        padding-right: 15px;
        width: 100%;
    </style>


    <div class="col-12  title">
        <div class="">
            <p1>
                ¡Hola!
                <br>
                <style>
                	 p1{ font-family: 'Roboto', sans-serif ; font-weight:bold; color: #000000;}   
                </style>
            </p1>

            <p>
                {!! $estado->text_email !!}
                <br>
            </p>
            <br>
            @if( $estado->confirmar_cliente === 1 || $estado->id === 1 )
                <p>
                    <a href="{{ route('admin.ordenes.confirm', [ 'id' => $models_id, 'estado' => $estado->id, 'tipo' => $tipo ] )}}" target="_blank" class="button">
                        <!--Confirmar recepción del equipo -->
                        EN CONFORMIDAD

                    </a>
                </p>
            @endif
            <br>
            <br>
            <p1>¡Gracias por preferirnos!</p1>
            <br>
            <br>

            <style>
                p { font-family: 'Roboto'; sans-serif; font-weight: normal;  color: #000000; }

                .announcement {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 0;
                padding: 40px;
                border-radius: 6px;
                text-align: center;
                color: #0278a9;
                font-size: 14px;
                }
             </style> 
        </div>
    </div>
</div>

</body>

<footer>                            
    <div class="container-fluid px-md-5">
        <div class="row element-footer">
                              
        </div>
    </div>
</footer>
 <style>

.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
footer {
    color: #000000;
    background: rgba(0, 0, 0, 0.1);
}

body {
    color: #000000;
    font-family: "Montserrat", Sans-serif;
    background-color: #ffffff;
}

.footer-menu-item {
    display: block;
    margin-bottom: 20px;
    font-family: "Montserrat", Sans-serif;
    font-size: 14px;
    box-sizing: inherit;
}
.footer-legal {
    background: #000000;
    color: #ffffff;
    font-family: "Montserrat", Sans-serif;
    padding: 20px 0;
    font-size: 12px;
    max-height: 50px;
}

.col {
    margin:10;
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: inherit;}

.icon-inline {
    max-width: 15px;
    float:left;
}

.titulo-text-uppercase { 
    font-size: 14px;
    font-family: "Montserrat", Sans-serif;
    color: #ffffff;
    padding-right: 30px;
    padding-left: 15px;


}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: none;
}

.p8 {font-size: 14px;
    margin: 10px;
    font-family: "Montserrat", Sans-serif;
    color: #ffffff;
    padding-right: 30px;
    padding-left: 15px;
    padding: 20px 0

}



.btn-whatsapp {
    float:left;
    bottom: 10px;
    right: 10px;
    z-index: 10;
    color: white;
    background-color: #white;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.4);
    border-radius: 50%;


</style> 

        
</footer>
</html>