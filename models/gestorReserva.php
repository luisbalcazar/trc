<?php

require_once "../../backend/models/conexion.php";

class reservaModel{

	#REGISTRO MENSAJES
	#-----------------------------------------------------------

	public static function registroReservaModel($datos, $tabla){

		$gps = (isset($_POST["gps"])) ? 1 : 0;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`nombre`, `email`, `telefono`, `direccion`, `pago`, `notes`, `finicio`, `ffin`, `lugar1`, `lugar2`, `duracion`, `dias`, `subtotal`, `cargos`, `gps`, `silla`, `seguroMonto`, `segurotipo`, `impuesto`, `modelo`, `total` , `licencia`, `sesion`) VALUES (:nombre, :email, :telefono, :direccion, :pago, :notes, :inicio, :fin, :lugar1, :lugar2, :duracion, :dias, :subtotal, :cargos, :gps, :silla, :insurance, :insuranceT, :impuesto, :modelo ,:total , :licencia , :sesion )");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["address"], PDO::PARAM_STR);
		$stmt -> bindParam(":pago", $datos["payment"], PDO::PARAM_STR);
		$stmt -> bindParam(":notes", $datos["notas"], PDO::PARAM_STR);
		$stmt -> bindParam(":inicio", fechas::tomysqlSH($datos["fechainicio"], PDO::PARAM_STR));
		$stmt -> bindParam(":fin", fechas::tomysqlSH($datos["fechafin"]), PDO::PARAM_STR);
		$stmt -> bindParam(":lugar1", $datos["locPickup"], PDO::PARAM_STR);
		$stmt -> bindParam(":lugar2", $datos["locDropoff"], PDO::PARAM_STR);
		$stmt -> bindParam(":duracion", $datos["duration"], PDO::PARAM_STR);
		$stmt -> bindParam(":dias", $datos["days"], PDO::PARAM_STR);
		$stmt -> bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt -> bindParam(":cargos", $datos["cargos"], PDO::PARAM_STR);
		$stmt -> bindParam(":silla", $datos["silla"], PDO::PARAM_INT);
		$stmt -> bindParam(":gps", $gps, PDO::PARAM_INT);
		$stmt -> bindParam(":insurance", $datos["insurance"], PDO::PARAM_STR);
		$stmt -> bindParam(":insuranceT", $datos["insuranceT"], PDO::PARAM_STR);
		$stmt -> bindParam(":impuesto", $datos["tax"], PDO::PARAM_STR);
		$stmt -> bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt -> bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":licencia", $datos["license"], PDO::PARAM_STR);
		$stmt -> bindParam(":sesion", $datos["sesion"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";
		}
		else{

			return $stmt->errorInfo();
		}

		$stmt->close();

	}

	
}