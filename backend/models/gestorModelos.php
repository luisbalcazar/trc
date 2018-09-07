<?php

require_once "conexion.php";

class GestorModelosModel{

	#GUARDAR MODELO
	#------------------------------------------------------------

	public function guardarModeloModel($datosModel, $tabla){
		
		//var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("INSERT INTO `modelos` (`idmodelo`, `idmarca`, `idmodelos_categorias`, `modelo`, `hora`, `dia`, `semana`, `mes`, `puestos`, `maleta`, `tanque`, `automatico`, `aire`, `unidades`, `estado`, `etiquetas`, `ruta`, `refueling`, `localcharge`, `llantas_impuesto`, `surcharge`, `licensefee`, `basic`, `full`, `vip`) VALUES (:idmodelo, :idmarca, :idmodelos_categorias, :modelo, :hora, :dia, :semana, :mes, :puestos, :maleta, :tanque, :automatico, :aire, :unidades, :estado, :etiquetas, :ruta, :refueling, :localcharge, :llantas_impuesto , :surcharge, :licensefee, :basico, :full, :vip )");

		$stmt -> bindParam(":idmodelo", $datosModel["idmodelo"], PDO::PARAM_INT);
		$stmt -> bindParam(":idmarca", $datosModel["marca"], PDO::PARAM_INT);
		$stmt -> bindParam(":idmodelos_categorias", $datosModel["categoriaModelo"], PDO::PARAM_INT);
		$stmt -> bindParam(":modelo", $datosModel["modelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt -> bindParam(":dia", $datosModel["dia"], PDO::PARAM_STR);
		$stmt -> bindParam(":semana", $datosModel["semana"], PDO::PARAM_STR);
		$stmt -> bindParam(":mes", $datosModel["mes"], PDO::PARAM_STR);
		$stmt -> bindParam(":puestos", $datosModel["puestos"], PDO::PARAM_INT);
		$stmt -> bindParam(":maleta", $datosModel["maleta"], PDO::PARAM_INT);
		$stmt -> bindParam(":tanque", $datosModel["tanque"], PDO::PARAM_INT);
		$stmt -> bindParam(":automatico", $datosModel["automatico"], PDO::PARAM_INT);
		$stmt -> bindParam(":aire", $datosModel["aire"], PDO::PARAM_INT);
		$stmt -> bindParam(":unidades", $datosModel["unidades"], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR );
		$stmt -> bindParam(":etiquetas", $datosModel["etiquetas"], PDO::PARAM_STR );
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR );
		$stmt -> bindParam(":refueling", $datosModel["refueling"], PDO::PARAM_STR);
		$stmt -> bindParam(":localcharge", $datosModel["localcharge"], PDO::PARAM_STR);
		$stmt -> bindParam(":llantas_impuesto", $datosModel["llantas_impuesto"], PDO::PARAM_STR);
		$stmt -> bindParam(":surcharge", $datosModel["surcharge"], PDO::PARAM_STR);
		$stmt -> bindParam(":licensefee", $datosModel["licensefee"], PDO::PARAM_STR);
		$stmt -> bindParam(":basico", $datosModel["basic"], PDO::PARAM_STR);
		$stmt -> bindParam(":full", $datosModel["full"], PDO::PARAM_STR);
		$stmt -> bindParam(":vip", $datosModel["vip"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{
			
			var_dump($stmt->errorInfo());
			echo "#####################################";
			echo $stmt->debugDumpParams();
			return "error: ";
			

		}
	
		$stmt->close();

	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	public function mostrarModelosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `modelos` inner join `modelos_categorias` on modelos.`idmodelos_categorias` = modelos_categorias.`idmodelos_categorias`");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	public function llenarModelosModel($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idmodelo = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt -> close();

	}

#MOSTRAR mostrarModelosCategorias en select
	#------------------------------------------------------
	public function mostrarModelosCategorias($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idmodelos_categorias ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
#MOSTRAR Marcas en select
	#------------------------------------------------------
	public function mostrarMarca($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idMarca ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	public function borrarModeloModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idmodelo = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	public function editarModeloModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE `modelos` SET `idmarca` = :idmarca, `idmodelos_categorias` = :idmodelos_categorias, `modelo` = :modelo, `hora` = :hora, `dia` = :dia, `semana` = :semana, `mes` = :mes, `puestos` = :puestos, `maleta` = :maleta, `tanque` = :tanque, `automatico` = :automatico, `aire` = :aire, `unidades` = :unidades, `estado` = :estado, `etiquetas` = :etiquetas, `ruta` = :ruta, `refueling` = :refueling ,`localcharge` = :localcharge ,`llantas_impuesto` = :llantas_impuesto ,`surcharge` = :surcharge ,`licensefee` = :licensefee , `basic` = :basico, `full` = :full, `vip` = :vip  WHERE `modelos`.`idmodelo` = :id; ");	

		$stmt -> bindParam(":idmarca", $datosModel["marca"], PDO::PARAM_INT);
		$stmt -> bindParam(":idmodelos_categorias", $datosModel["categoriaModelo"], PDO::PARAM_INT);
		$stmt -> bindParam(":modelo", $datosModel["modelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt -> bindParam(":dia", $datosModel["dia"], PDO::PARAM_STR);
		$stmt -> bindParam(":semana", $datosModel["semana"], PDO::PARAM_STR);
		$stmt -> bindParam(":mes", $datosModel["mes"], PDO::PARAM_STR);
		$stmt -> bindParam(":puestos", $datosModel["puestos"], PDO::PARAM_INT);
		$stmt -> bindParam(":maleta", $datosModel["maleta"], PDO::PARAM_INT);
		$stmt -> bindParam(":tanque", $datosModel["tanque"], PDO::PARAM_INT);
		$stmt -> bindParam(":automatico", $datosModel["automatico"], PDO::PARAM_INT);
		$stmt -> bindParam(":aire", $datosModel["aire"], PDO::PARAM_INT);
		$stmt -> bindParam(":unidades", $datosModel["unidades"], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR );
		$stmt -> bindParam(":etiquetas", $datosModel["etiquetas"], PDO::PARAM_STR );
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR );
		$stmt -> bindParam(":refueling", $datosModel["refueling"], PDO::PARAM_STR);
		$stmt -> bindParam(":localcharge", $datosModel["localcharge"], PDO::PARAM_STR);
		$stmt -> bindParam(":llantas_impuesto", $datosModel["llantas_impuesto"], PDO::PARAM_STR);
		$stmt -> bindParam(":surcharge", $datosModel["surcharge"], PDO::PARAM_STR);
		$stmt -> bindParam(":licensefee", $datosModel["licensefee"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT );
		$stmt -> bindParam(":basico", $datosModel["basic"], PDO::PARAM_STR);
		$stmt -> bindParam(":full", $datosModel["full"], PDO::PARAM_STR);
		$stmt -> bindParam(":vip", $datosModel["vip"], PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";
		}

		else{

			//var_dump($stmt->errorInfo());
			//echo "#####################################";
			//echo $stmt->debugDumpParams();
			return "error: ";
		}

		$stmt->close();

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenArticulos"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		}

		else{
			return "error";
		}

		$stmt -> close();

	}

	#SELECCIONAR ORDEN 
	#---------------------------------------------------
	public function seleccionarOrdenModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetch();

		$stmt->close();

	}

}