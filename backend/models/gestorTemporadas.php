<?php

require_once "conexion.php";

class TemporadasModel{

	#guardar temporada

	public function guardarTemporada($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, fechaini, fechafin, porcentaje) VALUES (:nombre , :fechaini,:fechafin,:porcentaje)");

		$stmt -> bindParam(":nombre", $datosModel["temporada"], PDO::PARAM_STR);
        $stmt -> bindParam(":fechaini", $datosModel["fechaini"], PDO::PARAM_STR);
        $stmt -> bindParam(":fechafin", $datosModel["fechafin"], PDO::PARAM_STR);
        $stmt -> bindParam(":porcentaje", $datosModel["porcentaje"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}
	#MOSTRAR TEMPORADAS EN LA VISTA
	#------------------------------------------------------------
	public function mostrarTemporadaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR TEMPORADA
	#-----------------------------------------------------
	public function borrarTemporadaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idtemporada = :id");

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