<?php

require_once "conexion.php";

class GestorArticulosModel{

	#GUARDAR ARTICULO
	#------------------------------------------------------------

	public function guardarArticuloModel($datosModel, $tabla){
		
		//var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, subtitulo, url, ruta, contenido, fecha, etiquetas, estado, idcategoria, comentarios, tipoarticulo, extracto) VALUES (:titulo, :subtitulo, :url, :ruta, :contenido, :fecha, :etiquetas, :estado, :idcategoria, :comentarios, :tipoarticulo, :extracto)");

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":subtitulo", $datosModel["subtitulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $datosModel["url"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":etiquetas", $datosModel["etiquetas"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datosModel["estadoArticulo"], PDO::PARAM_STR );
		$stmt -> bindParam(":idcategoria", $datosModel["idcategoria"], PDO::PARAM_INT);
		$stmt -> bindParam(":comentarios", $datosModel["estadoArticulo"], PDO::PARAM_STR );
		$stmt -> bindParam(":tipoarticulo", $datosModel["formato"], PDO::PARAM_INT);
		$stmt -> bindParam(":extracto", $datosModel["extracto"], PDO::PARAM_STR );
		if($stmt->execute()){

			return "ok";
		}

		else{
			/*var_dump($stmt->errorInfo());
			echo "#####################################";
			echo $stmt->debugDumpParams();
			return "error: ";*/

		}
	
		$stmt->close();

	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	public function mostrarArticulosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `articulos` inner join `categorias` on articulos.`idcategoria` = categorias.`idcategoria`");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	public function llenarArticulosModel($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt -> close();

	}

#MOSTRAR Categorias en select
	#------------------------------------------------------
	public function mostrarCategorias($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idcategoria, categoria FROM $tabla ORDER BY idcategoria ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
#MOSTRAR Categorias en select
	#------------------------------------------------------
	public function mostrarFormato($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idformato, formato FROM $tabla ORDER BY idformato ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	public function borrarArticuloModel($datosModel, $tabla){

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

	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	public function editarArticuloModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, subtitulo = :subtitulo, url = :url, ruta = :ruta, contenido = :contenido, extracto = :extracto, etiquetas = :etiquetas, fecha = :fecha, estado = :estado, idcategoria = :idcategoria, tipoarticulo=:tipoarticulo, comentarios=:comentarios  WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":subtitulo", $datosModel["subtitulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $datosModel["url"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":etiquetas", $datosModel["etiquetas"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datosModel["estadoArticulo"], PDO::PARAM_INT );
		$stmt -> bindParam(":comentarios", $datosModel["comentarios"], PDO::PARAM_INT );
		$stmt -> bindParam(":idcategoria", $datosModel["idcategoria"], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datosModel["estadoArticulo"], PDO::PARAM_STR );
		$stmt -> bindParam(":extracto", $datosModel["extracto"], PDO::PARAM_STR );
		$stmt -> bindParam(":tipoarticulo", $datosModel["formato"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
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