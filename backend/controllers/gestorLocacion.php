<?php
class LocacionController{

	#GUARDAR LOCACION
	#-----------------------------------------------------------

	public function guardarLocacionController(){
		if(isset($_POST["locacion"])){

			$datosController = $_POST;

			$respuesta = LocacionModel::guardarLocacion($datosController, "locacion");

			if($respuesta == "ok"){

				echo'<script>
					swal({
						  title: "¡OK!",
						  text: "¡Locación ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "locacion";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#MOSTRAR MENUS EN LA VISTA
	#------------------------------------------------------------
	public function mostrarLocacionController(){

		$respuesta = LocacionModel::mostrarLocacionModel("locacion");
		foreach ($respuesta as $row => $item){

			echo '<tr>
			        <td><input disabled style="background-color:transparent; border: 0;" type="text" id="zlocacion" value="'.$item["locacion"].'"</td>
					<td>'.$item["recargo"].'</td>
					<td>
			        	<a href="index.php?action=locacion&idBorrar='.$item["idlocacion"].'"><span class="btn btn-danger fa fa-times"></span></a>
			        </td>
			      </tr>';

		}

	}

	#BORRAR Suscriptores
	#------------------------------------------------------------

	public function borrarlocacionController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = LocacionModel::borrarLocacionModel($datosController, "locacion");

			if($respuesta == "ok"){

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El menú se ha borrado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "locacion";
									  } 
							});


						</script>';

			}

		}

	}

}