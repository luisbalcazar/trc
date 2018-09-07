<?php

require_once "conexion.php";

class InscripcionesModel{

	#MOSTRAR Inscripciones EN LA VISTA
	#------------------------------------------------------------
	public function mostrarInscripcionesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idinscripcion as id, nombre, apellido, email, titulo FROM $tabla inner join `articulos` on inscripcion.`idcurso` = articulos.`id`");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

#MOSTRAR Inscripciones EN el home
	#------------------------------------------------------------
	public function mostrarInscripcionesHomeModel(){

		$stmt = Conexion::conectar()->prepare("SELECT idinscripcion as id, nombre, apellido, email, titulo FROM inscripcion inner join `articulos` on inscripcion.`idcurso` = articulos.`id` WHERE estado = 1");

		$stmt -> execute();

		return $stmt -> rowCount();

		$stmt -> close();

	}
	#BORRAR Inscripciones
	#-----------------------------------------------------
	public function borrarInscripcionesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idinscripcion = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#SELECCIONAR Inscripciones SIN REVISAR
	#------------------------------------------------------------
	public function InscripcionesSinRevisarModel($tabla){
	
		$stmt = Conexion::conectar()->prepare("SELECT revision FROM $tabla WHERE revision = 0");

		$stmt -> execute();

		return $stmt -> rowCount();

		$stmt -> close();

	}

	#Inscripciones REVISADOS
	#------------------------------------------------------------
	public function InscripcionesRevisadosModel($datosModel, $tabla){

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


