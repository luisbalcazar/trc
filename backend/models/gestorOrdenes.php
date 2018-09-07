<?php

require_once "conexion.php";

class OrdenesModel{

	#MOSTRAR ordenes EN LA VISTA
	#------------------------------------------------------------
	public function mostrarOrdenesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * from orden");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#MOSTRAR ordenes EN EL DETALLE
	#------------------------------------------------------------
	public function mostrarDetalleOrdenes($id){

		$stmt = Conexion::conectar()->prepare("SELECT * from orden where idorden = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt -> close();

	}
#MOSTRAR Ordenes EN el home
	#------------------------------------------------------------
	public function mostrarOrdenesHomeModel(){

		$stmt = Conexion::conectar()->prepare("SELECT idorden as id, nombre, apellido, email, titulo FROM orden inner join `articulos` on orden.`idcurso` = articulos.`id` WHERE estado = 1");

		$stmt -> execute();

		return $stmt -> rowCount();

		$stmt -> close();

	}
	#BORRAR Ordenes
	#-----------------------------------------------------
	public function borrarOrdenesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idorden = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#SELECCIONAR Ordenes SIN REVISAR
	#------------------------------------------------------------
	public function OrdenesSinRevisarModel($tabla){
	
		$stmt = Conexion::conectar()->prepare("SELECT revision FROM $tabla WHERE revision = 0");

		$stmt -> execute();

		return $stmt -> rowCount();

		$stmt -> close();

	}

	#ordenes REVISADOS
	#------------------------------------------------------------
	public function OrdenesRevisadosModel($datosModel, $tabla){

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


