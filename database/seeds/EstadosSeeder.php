<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\States;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $states = array(
		array('id' => '1','description' => 'Iniciado','text_email' => NULL,'color' => '#ef9555','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),      	
		  array('id' => '2','description' => 'en Reparacion','text_email' => NULL,'color' => 'Yellow','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '3','description' => 'en Espera de Repuesto','text_email' => '<font face=\'Verdana\' size=\'2\'><b>ESTIMADO CLIENTE SU EQUIPO SE ENCUENTRA EN PROCESO DE REPARACION, ESTAMOS AGUARDANDO EL INGRESO DEL REPUESTO PARA CONCLUIR EL TRABAJO. LE INFORMAREMOS CUANDO ESTE LISTO.</b>
		MUCHAS GRACIAS.
		</font>','color' => 'Grey','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '4','description' => 'en Espera Confirmacion Cliente','text_email' => '<font face=\'Verdana\' size=\'2\'><b>ESTIMADO CLIENTE COMUNIQUESE CON NOSOTROS PARA INFORMALE EL PRESUPUESTO. LE PEDIMOS QUE AL MOMENTO DE HACERLO TENGA  A MANO EL NUMERO DE LA ORDEN DE SERVICIO. 

		</b>MUCHAS GRACIAS.</font>','color' => '#800000','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '5','description' => 'Devolucion','text_email' => '<font face=\'Verdana\' size=\'2\'><b> ESTIMADO CLIENTE SU EQUIPO SE ENCUENTRA PARA SER RETIRADO. NO SE HA REALIZADO LA REPARACION. 
		</b>
		Muchas Gracias.</font>','color' => '#0000FF','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '6','description' => 'Reparado','text_email' => '<font face=\'Verdana\' size=\'2\'><b>ESTIMADO CLIENTE SU EQUIPO ESTA REPARADO Y  LISTO PARA SER RETIRADO.</b>+
		Muchas Gracias</font>','color' => 'Green','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '7','description' => 'Entregado','text_email' => '<font face=\'Verdana\' size=\'2\'><b>El equipo fue entregado . gracias por elegirnos.</b></font>','color' => 'LightCoral ','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '9','description' => 'Confirmado','text_email' => NULL,'color' => '#FF00FF','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '10','description' => 'listo en taller','text_email' => NULL,'color' => '#008080','enviar' => NULL,'created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL)
		);


        States::insert($states);
    }
}
