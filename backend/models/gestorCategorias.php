<?php 
require_once "conexion.php";

class GestorCategoriasModelo{

	public function mostrarCategorias(){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM `modelos_categorias`");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	public function actualizarTarifaCategoria(){


		$hora = "";
		$coma1 = "";
		$dia = "";
		$coma2 = "";
		$semana = "";
		$coma3 = "";
		$mes = "";

		$back = false;
		$id = $_POST["id"];


		if ($_POST["hora"] != "") {
			$hora = " hora='".$_POST["hora"] . "'";
			$back = true;
		}
		if ($_POST["dia"] != "") {
			$dia = " dia='".$_POST["dia"] . "'";
			if ($back) {
				$coma1 = ",";
			}else{
				$back = true;
			}	
		}
		if ($_POST["semana"] != "") {
			$semana = " semana='".$_POST["semana"] . "'";
			if ($back) {
				$coma2 = ",";
			}else{
				$back = true;
			}	
		}
		if ($_POST["mes"] != "") {
			$mes = " mes='".$_POST["mes"] . "'";
			if ($back) {
				$coma3 = ",";
			}else{
				$back = true;
			}	
		}


		$stmt = Conexion::conectar()->prepare("UPDATE modelos SET $hora $coma1 $dia $coma2 $semana $coma3 $mes WHERE idmodelos_categorias = '$id'");

		$stmt -> execute();

		return 'ok';

		$stmt -> close();
	}
	public function actualizarCargosCategoria(){

		$llantas = "";
		$coma1 = "";
		$refueling = "";
		$coma2 = "";
		$localcharge = "";
		$coma3 = "";
		$surcharge = "";
		$coma4 = "";
		$licensefee = "";
		$coma5 = "";
		$back = false;
		$id = $_POST["id"];


		if ($_POST["llantas_impuesto"] != "") {
			$llantas = " llantas_impuesto='".$_POST["llantas_impuesto"] . "'";
			$back = true;
		}
		if ($_POST["refueling"] != "") {
			$refueling = " refueling='".$_POST["refueling"] . "'";
			if ($back) {
				$coma1 = ",";
			}else{
				$back = true;
			}	
		}
		if ($_POST["localcharge"] != "") {
			$localcharge = " localcharge='".$_POST["localcharge"] . "'";
			if ($back) {
				$coma2 = ",";
			}else{
				$back = true;
			}	
		}
		if ($_POST["surcharge"] != "") {
			$surcharge = " surcharge='".$_POST["surcharge"] . "'";
			if ($back) {
				$coma3 = ",";
			}else{
				$back = true;
			}	
		}
		if ($_POST["licensefee"] != "") {
			$licensefee = " licensefee='".$_POST["licensefee"] . "'";
			if ($back) {
				$coma4 = ",";
			}else{
				$back = true;
			}	
		}

		$sql = "UPDATE modelos SET $llantas $coma1 $refueling $coma2 $localcharge $coma3 $surcharge $coma4 $licensefee WHERE idmodelos_categorias = '$id'";


		$stmt = Conexion::conectar()->prepare($sql);

		$stmt -> execute();

		return 'ok';

		$stmt -> close();
	}
}