<html>
<head>
    <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' 
rel='stylesheet' type='text/css'>

<div class="headbar">
    <div class="container">
        <div class="row">
            <div class="col text-left">
                <img alt="iCase" title="iCase" src="{{ URL::asset('/images/email/iCase-Fix-bco.svg') }}" class="headbar-logo-img">
            </div>
            <div class="col d-none d-md-block text-right"></div>
        </div>
    </div>
</div>

<style>

.headbar{ width: 100%; min-height:150px; background-color: black; margin:0% 2% 2% 0%; float:left; box-sizing: border-box}

.headbar-logo-img {
max-width: 100%;
max-height: 150px;
float: left!important;
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
            <p>
            <a href="http://icase.coders.com.ar/confirmar-reparacion-y-confirmar-compra/{{ bcrypt($models_id) }} " target="_blank" class="button">Confirmar recepción del equipo
            </a>
            </p>

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
            
            
                                
                                
        <div class="col">
        <h4 class="h3-footer-menu">iCase</h4>
        <ul class="footer-menu">

            <li class="footer-menu-item">
            <p>Alto Palermo</p>
        </li>
        
            <li class="footer-menu-item">
            <p>Abasto Shopping</p>
        </li>
            <li class="footer-menu-item">
            <p>F. Parque Brown</p>
        </li>
            <li class="footer-menu-item">
            <p>El Solar Shopping</p>
        </li>
            <li class="footer-menu-item">
           <p>Devoto Shopping</p>
        </li>
            <li class="footer-menu-item">
           <p>Galerias Pacífico</p>
        </li>
            <li class="footer-menu-item">
            <p>Dot Baires</p>
        </li>
            <li class="footer-menu-item">
            <p>Caballito Shopping Center</p>
        </li>
            <li class="footer-menu-item">
            <p>Nordelta Centro Comercial</p>
        </li>
            
    </ul>                   </div>

                
         <div class="col">
         <h4 class="h3-footer-menu">.</h4>
         <ul class="footer-menu">

        <li class="footer-menu-item">
            </li><li class="footer-menu-item">
            <p>Unicenter</p>
        </li>
            <li class="footer-menu-item">
           <p>Boulevard Shopping</p>
        </li>
            <li class="footer-menu-item">
           <p>Alto Avellaneda</p>
        </li>
                <li class="footer-menu-item">
            <p>Plaza Oeste</p>
        </li>
            <li class="footer-menu-item">
            <p>Caballito, Av. Cabildo 2302</p>
        </li>
            <li class="footer-menu-item">
           <p>Flores, Av. Rivadavia 6795</p>
        </li>
            <li class="footer-menu-item">
           <p>Belgrano, Av. Cabildo 2302</p>
        </li>
            <li class="footer-menu-item">
           <p>Alto Rosario</p>
        </li></div>



                <div class="col">
                <h4 class="h3-footer-menu">Fix Station</h4>
                <ul class="footer-menu">
            <li class="footer-menu-item">
            <p>Abasto Shopping</p>
        </li>
            <li class="footer-menu-item">
            <p>F. Parque Brown</p>
        </li>
            <li class="footer-menu-item">
            <p>Alto Palermo</p>
        </li>
            <li class="footer-menu-item">
            <p>Dot Baires</p>
        </li>
            <li class="footer-menu-item">
           <p>Unicenter</p>
        </li>
            <li class="footer-menu-item">
           <p>Alto Avellaneda</p>
        </li>
            <li class="footer-menu-item">
            <p>Plaza Oeste</p>

        </li>
            <li class="footer-menu-item">
            <p>Belgrano, Av. Cabildo 2216</p>
        </li>
            <li class="footer-menu-item">
            <p>Alto Rosario</p>
        </li>


    </ul></div></div>

     </div>


<div class="footer-legal">
        <div class="container-fluid px-md-5">
            <div class="row">
            
                <div class="col">

            <li class="footer-menu-item">
                  <p8>Línea directa de Whatssap</p8>

              <a href="https://wa.me/5491139177183" target="_blank" class="btn-whatsapp" aria-label="Comunicate por WhatsApp">
        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg></a>




              </li>
                </div>

                                            
                </div>
                </div>
                
            </div>

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