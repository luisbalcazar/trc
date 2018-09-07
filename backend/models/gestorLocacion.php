<?php

require_once "conexion.php";

class LocacionModel{

	#guardar locacion

	public function guardarLocacion($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (locacion, recargo) VALUES (:locacion , :recargo)");

		$stmt -> bindParam(":locacion", $datosModel["locacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":recargo", $datosModel["recargo"], PDO::PARAM_STR);

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
	public function mostrarLocacionModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR Suscriptores
	#-----------------------------------------------------
	public function borrarLocacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idlocacion = :id");

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