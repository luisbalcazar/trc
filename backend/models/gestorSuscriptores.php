<?php

require_once "conexion.php";

class SuscriptoresModel{

	#MOSTRAR Suscriptores EN LA VISTA
	#------------------------------------------------------------
	public function mostrarSuscriptoresModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	public function mostrarSuscriptoresHomeModel(){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM Suscriptores");

		$stmt -> execute();

		return $stmt -> rowCount();

		$stmt -> close();

	}

	#BORRAR Suscriptores
	#-----------------------------------------------------
	public function borrarSuscriptoresModel($datosModel, $tabla){

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

	#SELECCIONAR SUSCRIPTORES SIN REVISAR
	#------------------------------------------------------------
	public function suscriptoresSinRevisarModel($tabla){
	
		$stmt = Conexion::conectar()->prepare("SELECT revision FROM $tabla WHERE revision = 0");

		$stmt -> execute();

		return $stmt -> rowCount();

		$stmt -> close();

	}

	#SUSCRIPTORES REVISADOS
	#------------------------------------------------------------
	public function suscriptoresRevisadosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET revision = :revision");

		$stmt->bindParam(":revision", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}


