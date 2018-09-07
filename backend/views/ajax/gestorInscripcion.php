<?php

require_once "../../controllers/gestorInscripciones.php";
require_once "../../models/gestorInscripciones.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{


	#REVISAR INSCRIPCION
	#----------------------------------------------------------

	public $revisionInscripcion;

	public function gestorRevisionInscripcionesAjax(){

		$datos = $this->revisionInscripcion;

		$respuesta = InscripcionesController::InscripcionesRevisadosController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------

if(isset($_POST["revisionInscripcion"])){

	$b = new Ajax();
	$b -> revisionInscripcion = $_POST["revisionInscripcion"];
	$b -> gestorRevisionInscripcionesAjax();

}
