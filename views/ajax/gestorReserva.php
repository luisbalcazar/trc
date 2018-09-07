<?php

require_once "../../models/gestorReserva.php";
require_once "../../controllers/gestorReserva.php";
require_once "../../backend/controllers/fechasController.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------

class Ajax{

	#SUBIR LA IMAGEN DEL SLIDE
	#----------------------------------------------------------

	public function gestorReservaAjax($mydata) {
        var_dump($mydata);
        $respuesta = reservaController::registroReservaController($mydata, 'orden');

        var_dump($respuesta);

	}

	

}

if(1==1){

	$b = new Ajax();
	$b -> gestorReservaAjax($_POST);

}

