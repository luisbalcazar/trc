<?php

require_once "backend/models/conexion.php";

class MenuModel{

	
	#------------------------------------------------------------
	public function mostrarMenuModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
		
}