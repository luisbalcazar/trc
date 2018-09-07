<?php

require_once "backend/models/conexion.php";

class InscripcionModel{

	#REGISTRO MENSAJES
	#-----------------------------------------------------------

	public function registroInscripcionModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, cp, domicilio, provincia, telefono, poblacion, dni, email, idcurso ) VALUES (:nombre, :apellido, :cp, :domicilio, :provincia, :telefono, :poblacion, :dni, :email, :curso)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":cp", $datos["cp"], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio", $datos["domicilio"], PDO::PARAM_STR);
		$stmt -> bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":poblacion", $datos["poblacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":curso", $datos["curso"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}
		else{

			return "error";
		}

		$stmt->close();

	}

	
}