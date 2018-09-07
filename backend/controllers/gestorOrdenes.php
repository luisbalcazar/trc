<?php

class OrdenesController{

	#MOSTRAR ordenes EN LA VISTA
	#------------------------------------------------------------
	public function mostrarOrdenesController(){

		$respuesta = OrdenesModel::mostrarOrdenesModel("orden");

		foreach ($respuesta as $row => $item){
			echo '<tr>
			        <td>'.$item["nombre"].'</td>
			        <td>'.fechas::tospainSH($item["finicio"]).'</td>
			        <td>'.fechas::tospainSH($item["ffin"]).'</td>
			        <td>'.$item["email"].'</td>
					<td>
						<a href="ordenesVer_'.$item["idorden"].'"><span class="btn btn-primary fa fa-search quitarSuscriptor"></span></a>
			        	<a href="index.php?action=ordenes&idBorrar='.$item["idorden"].'"><span class="btn btn-danger fa fa-times quitarSuscriptor"></span></a>
			        </td>
			        <td>
			        </td>
			      </tr>';

		}

	}



	#MOSTRAR DETALLE ordenes
	#------------------------------------------------------------
	public function mostrarDetalleOrdenes($id){

		$respuesta = OrdenesModel::mostrarDetalleOrdenes($id);

		return $respuesta;

	}

	#BORRAR ordenes
	#------------------------------------------------------------

	public function borrarOrdenesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = OrdenesModel::borrarOrdenesModel($datosController, "orden");

			if($respuesta == "ok"){

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡La Orden se ha borrado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "ordenes";
									  } 
							});


						</script>';

			}

		}

	}

	#IMPRESIÓN ordenes
	#------------------------------------------------------------

	public function impresionOrdenesHomeController(){

		$respuesta = OrdenesModel::mostrarOrdenesHomeModel();
		
		return $respuesta;

	}

	#IMPRESIÓN ordenes
	#------------------------------------------------------------

	public function impresionOrdenesController($datos){

		$datosController = $datos;

		$respuesta = OrdenesModel::mostrarOrdenesModel($datosController);
	
		return $respuesta;

	}


	#Ordenes SIN REVISAR
	#------------------------------------------------------------
	public function OrdenesSinRevisarController(){

		$respuesta = OrdenesModel::OrdenesSinRevisarModel("orden");
		if ($respuesta > 0) {
		echo '<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>';
		}
	}

	#ordenes REVISADOS
	#------------------------------------------------------------
	public function OrdenesRevisadosController($datos){

		$datosController = $datos;

		$respuesta = OrdenesModel::OrdenesRevisadosModel($datosController, "orden");

		echo $respuesta;

	}

}