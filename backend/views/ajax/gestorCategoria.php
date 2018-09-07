<?php

require_once "../../models/gestorCategorias.php";
require_once "../../controllers/gestorCategorias.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	public function actualizarTarifaCategoria(){

		$respuesta = GestorCategoriasController::actualizarTarifaCategoria();

		echo json_encode($respuesta);
	}
	public function actualizarCargosCategoria(){

		$respuesta = GestorCategoriasController::actualizarCargosCategoria();

		echo json_encode($respuesta);
	}

}

#OBJETOS
#-----------------------------------------------------------


	$a = new Ajax();
	

if(isset($_POST["actualizarTarifaCategoria"])){

	$a -> actualizarTarifaCategoria();

}
if(isset($_POST["actualizarCargosCategoria"])){

	$a -> actualizarCargosCategoria();

}