<?php

class InscripcionesController{

	#MOSTRAR Inscripciones EN LA VISTA
	#------------------------------------------------------------
	public function mostrarInscripcionesController(){

		$respuesta = InscripcionesModel::mostrarInscripcionesModel("inscripcion");

		foreach ($respuesta as $row => $item){
				$titu= $item["titulo"];
			echo '<tr>
			        <td>'.$item["nombre"].'</td>
			        <td>'.$item["apellido"].'</td>
			        <td>'.substr($titu, 0, 30).'</td>
			        <td>'.$item["email"].'</td>
			        <td>
			        	<a href="index.php?action=inscripciones&idBorrar='.$item["id"].'"><span class="btn btn-danger fa fa-times quitarSuscriptor"></span></a>
			        </td>
			        <td>
			        </td>
			      </tr>';

		}

	}

	#BORRAR Inscripciones
	#------------------------------------------------------------

	public function borrarInscripcionesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = InscripcionesModel::borrarInscripcionesModel($datosController, "inscripcion");

			if($respuesta == "ok"){

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El inscrito se ha borrado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "inscripciones";
									  } 
							});


						</script>';

			}

		}

	}

	#IMPRESIÓN Inscripciones
	#------------------------------------------------------------

	public function impresionInscripcionesHomeController(){

		$respuesta = InscripcionesModel::mostrarInscripcionesHomeModel();
		
		return $respuesta;

	}

	#IMPRESIÓN Inscripciones
	#------------------------------------------------------------

	public function impresionInscripcionesController($datos){

		$datosController = $datos;

		$respuesta = InscripcionesModel::mostrarInscripcionesModel($datosController);
	
		return $respuesta;

	}


	#Inscripciones SIN REVISAR
	#------------------------------------------------------------
	public function InscripcionesSinRevisarController(){

		$respuesta = InscripcionesModel::InscripcionesSinRevisarModel("inscripcion");
		if ($respuesta > 0) {
		echo '<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>';
		}
	}

	#Inscripciones REVISADOS
	#------------------------------------------------------------
	public function InscripcionesRevisadosController($datos){

		$datosController = $datos;

		$respuesta = InscripcionesModel::InscripcionesRevisadosModel($datosController, "inscripcion");

		echo $respuesta;

	}

}