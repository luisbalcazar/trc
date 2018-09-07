<?php
class TemporadasController{

	#GUARDAR TEMPORADAS
	#-----------------------------------------------------------

	public function guardarTemporadaController(){
		if(isset($_POST["temporada"])){

			$datosController = $_POST;

			$respuesta = TemporadasModel::guardarTemporada($datosController, "temporadas");

			if($respuesta == "ok"){

				echo'<script>
					swal({
						  title: "¡OK!",
						  text: "! La temporada ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "temporadas";
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
	public function mostrarTemporadaController(){

		$respuesta = TemporadasModel::mostrarTemporadaModel("temporadas");
		foreach ($respuesta as $row => $item){

			echo '<tr>
			        <td><input disabled style="background-color:transparent; border: 0;" type="text" id="zlocacion" value="'.$item["nombre"].'"</td>
                    <td>'.$item["fechaini"].'</td>
                    <td>'.$item["fechafin"].'</td>
                    <td>'.$item["porcentaje"].'</td>
					<td>
			        	<a href="index.php?action=temporadas&idBorrar='.$item["idtemporada"].'"><span class="btn btn-danger fa fa-times"></span></a>
			        </td>
			      </tr>';

		}

	}

	#BORRAR TEMPORADA
	#------------------------------------------------------------

	public function borrarTemporadaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = TemporadasModel::borrarTemporadaModel($datosController, "temporadas");

			if($respuesta == "ok"){

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡ Borrado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "temporadas";
									  } 
							});


						</script>';

			}

		}

	}

}