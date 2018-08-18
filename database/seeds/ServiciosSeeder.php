<?php

use Illuminate\Database\Seeder;
use App\Entities\Tecnica\Services;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = array(
		  array('id' => '3','description' => 'ipod nano 6 pantalla','iva' => '21','amount' => '800.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '4','description' => 'ipod nano 6 botoneras','iva' => '21','amount' => '360.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '5','description' => 'ipod touch 4 pantalla','iva' => '21','amount' => '860.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '6','description' => 'ipod touch 4 auricular','iva' => '21','amount' => '350.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '7','description' => 'ipod touch 4 camara trasera','iva' => '21','amount' => '350.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '8','description' => 'ipod touch 4 camara frontal','iva' => '21','amount' => '320.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '9','description' => 'ipod touch 4 botonera','iva' => '21','amount' => '330.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '10','description' => 'ipod touch 4 boton home','iva' => '21','amount' => '320.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '11','description' => 'ipod touch 4 parlante','iva' => '21','amount' => '320.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '12','description' => 'soft','iva' => '21','amount' => '400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '13','description' => 'reapracion de placa','iva' => '21','amount' => '450.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '14','description' => 'iph 3g/3gs touch','iva' => '21','amount' => '450.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '15','description' => 'iph 3g/3gs lcd','iva' => '21','amount' => '530.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '16','description' => 'iph 3g/3gs bateria','iva' => '21','amount' => '350.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '17','description' => 'iph 3g/3gs carcaza completa','iva' => '21','amount' => '700.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '18','description' => 'iph 3g/3gs boton home','iva' => '21','amount' => '380.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '19','description' => 'iph 4g/4s pantalla','iva' => '21','amount' => '1400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '20','description' => 'iph 4g/4s bateria','iva' => '21','amount' => '450.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '21','description' => 'iph 4g/4s pin de carga','iva' => '21','amount' => '550.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '22','description' => 'iph 4g/4s boton power','iva' => '21','amount' => '520.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '23','description' => 'iph 4g/4s boton home','iva' => '21','amount' => '450.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '24','description' => 'iph 4g/4s tapa bateria','iva' => '21','amount' => '350.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '25','description' => 'iph 5 pantalla','iva' => '21','amount' => '2700.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '26','description' => 'ipad 2 touch','iva' => '21','amount' => '1600.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '27','description' => 'ipad 2 lcd','iva' => '21','amount' => '2100.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '28','description' => 'iphone 5 pantalla','iva' => '21','amount' => '3450.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '29','description' => 'iph 5 dock de carga','iva' => '21','amount' => '650.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '30','description' => 'BB 8520 Pantalla LCD','iva' => '21','amount' => '440.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '31','description' => 'Blackberry soft','iva' => '21','amount' => '400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '32','description' => 'iph 5 auricular','iva' => '21','amount' => '480.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '33','description' => 'BB 8520 Carcasa ','iva' => '21','amount' => '415.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '34','description' => 'BB 8520 Joystick ','iva' => '21','amount' => '260.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '35','description' => 'BB 8520 Menbrana Teclado','iva' => '21','amount' => '330.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '36','description' => 'BB 8520 Reparacion de placa ','iva' => '21','amount' => '400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '37','description' => 'BB 8520 Lente pantalla ','iva' => '21','amount' => '190.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '38','description' => 'BB 9300 LCD','iva' => '21','amount' => '520.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '39','description' => 'BB 9300 Joystick ','iva' => '21','amount' => '330.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '40','description' => 'BB 9300 Carcasa','iva' => '21','amount' => '590.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '41','description' => 'BB 9300 Menbrana de Teclado','iva' => '21','amount' => '370.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '42','description' => 'BB 9300 Reparacion de Placa','iva' => '21','amount' => '400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '43','description' => 'BB 9300 Lente de Pantalla','iva' => '21','amount' => '190.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '44','description' => 'iPad Mini Touch ','iva' => '21','amount' => '2600.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '45','description' => 'iPad Mini Lcd','iva' => '21','amount' => '2800.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '46','description' => 'Samsung S3 Pantalla Completa','iva' => '21','amount' => '2800.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '47','description' => 'BB 9700 / 9780 Pantalla ','iva' => '21','amount' => '900.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '48','description' => 'BB 9700 / 9780 Joystick ','iva' => '21','amount' => '310.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '49','description' => 'BB 9700 / 9780 Carcasa','iva' => '21','amount' => '550.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '50','description' => 'iPad Mini Dock de carga ','iva' => '21','amount' => '1400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '51','description' => 'iPad Mini Jack de auricular','iva' => '21','amount' => '1400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '52','description' => 'iPad Mini Boton Home ','iva' => '21','amount' => '1400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL),
		  array('id' => '53','description' => 'iPad Mini Antena Wifi','iva' => '21','amount' => '1400.00','created_at' => '0000-00-00 00:00:00','updated_at' => '0000-00-00 00:00:00','deleted_at' => NULL)
		);

		Services::insert($services);
    }
}
