<?php
class MenuController{

	#GUARDAR ARTICULO
	#-----------------------------------------------------------

	public function guardarMenuController(){
		if(isset($_POST["tituloMenu"])){

			$datosController = array("menu"=>$_POST["tituloMenu"],
				                     "enlace"=>$_POST["enlaceMenu"]);

			$respuesta = MenuModel::guardarMenu($datosController, "menu");

			if($respuesta == "ok"){

				echo'<script>
					swal({
						  title: "¡OK!",
						  text: "¡El menú ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "menu";
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
	public function mostrarMenuController(){

		$respuesta = MenuModel::mostrarMenuModel("menu");
		foreach ($respuesta as $row => $item){

			echo '<tr>
			        <td><input disabled style="background-color:transparent; border: 0;" type="text" id="zmenu" value="'.$item["menu"].'"</td>
			        <td><input disabled style="background-color:transparent; border: 0;" type="text" id="zenlace" value="'.$item["enlace"].'"</div></td>
			        <td>
			        	<a href="index.php?action=menu&idBorrar='.$item["id"].'"><span class="btn btn-danger fa fa-times"></span></a>
			        </td>
			      </tr>';

		}

	}

	#BORRAR Suscriptores
	#------------------------------------------------------------

	public function borrarmenuController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = MenuModel::borrarMenuModel($datosController, "menu");

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
									    window.location = "menu";
									  } 
							});


						</script>';

			}

		}

	}

}