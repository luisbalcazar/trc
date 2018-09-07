<?php  

class archivosController{ 
	public function mostrarArchivosController(){

		
	$directorio = opendir("../views/resources"); //ruta actual

	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
	    if (is_dir($archivo))//verificamos si es o no un directorio
	    {
	        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
	    }
	    else
	    {
	        echo '<tr>
			        <td>'.$archivo.'</td>
			        <td>
			        	<a href="index.php?action=archivos&idBorrar='.$archivo.'"><span class="btn btn-danger fa fa-times quitarSuscriptor"></span></a>
			        </td>
			        <td>
			        </td>
			      </tr>';
	    }
	}

		}

	public function borrarArchivosController(){ 
		if(isset($_GET["idBorrar"])){

			$respuesta = unlink("../views/resources/".$_GET["idBorrar"]);

			if($respuesta == "ok"){

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El Archivo se ha borrado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "archivos";
									  } 
							});


						</script>';

			}


		}

	}
	}

