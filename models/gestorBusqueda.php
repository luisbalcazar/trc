<?php

require_once "backend/models/conexion.php";

class BusquedaModels{

	public function listarResultados(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM (select * from modelos order by rand()) as T  inner join `modelos_categorias` on T.`idmodelos_categorias` = modelos_categorias.`idmodelos_categorias` inner join `marcas` on T.`idmarca` = marcas.`idmarca` group by T.idmodelos_categorias");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();


	}

	public function listarCargos($id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `modelos` where estado = 1 AND idmodelo = $id");

		$stmt -> execute();

		return $stmt -> fetch(PDO::FETCH_ASSOC);

		$stmt -> close();


	}

	public function config(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `config`");

		$stmt -> execute();

		return $stmt -> fetch(PDO::FETCH_ASSOC);

		$stmt -> close();


	}

	public static function calculo($id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `modelos` inner join `modelos_categorias` on modelos.`idmodelos_categorias` = modelos_categorias.`idmodelos_categorias` inner join `marcas` on modelos.`idmarca` = marcas.`idmarca` where estado = 1 AND idmodelo = $id");

		$stmt -> execute();


		return $stmt->fetch(PDO::FETCH_ASSOC);
			
		$stmt -> close();


	}


	public static function cargos(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `config`");

		$stmt -> execute();


		return $stmt->fetch(PDO::FETCH_ASSOC);
			
		$stmt -> close();


	}


}
