<?php

require_once "conexion.php";

class MenuModel{

	#guardar menu

	public function guardarMenu($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (menu, enlace) VALUES (:menu, :enlace)");

		$stmt -> bindParam(":menu", $datosModel["menu"], PDO::PARAM_STR);
		$stmt -> bindParam(":enlace", $datosModel["enlace"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}
	#MOSTRAR Suscriptores EN LA VISTA
	#------------------------------------------------------------
	public function mostrarMenuModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR Suscriptores
	#-----------------------------------------------------
	public function borrarMenuModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
		
}