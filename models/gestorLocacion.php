<?php

require_once "backend/models/conexion.php";

class LocacionModel{

	
	#MOSTRAR LOCACIONES  EN LA VISTA
	#------------------------------------------------------------
	public function mostrarLocacionModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	
		
}