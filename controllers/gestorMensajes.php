<?php

class MensajesController{

	public function registroMensajesController(){

		if(isset($_POST["email"])){


			   	#ALMACENAR EN BASE DE DATOS EL SUSCRIPTOR
			   	#-------------------------------------------------------

			   	$datosSuscriptor = $_POST["email"];

			   	$revisarSuscriptor = MensajesModel::revisarSuscriptorModel($datosSuscriptor, "suscriptores");

			   	if(count($revisarSuscriptor["email"]) == 0){

			   		MensajesModel::registroSuscriptoresModel($_POST, "suscriptores");

			   		echo'<script>
						
						swal({
							  title: "¡OK!",
							  text: "¡Suscripción Registrada!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "index.php";
								  } 
						});

					</script>';

			   	}
 

			}



		}


		public function contactoController(){

		if(isset($_POST["nombre"])){

	   	#ENVIAR EL CORREO ELECTRÓNICO
	   	#------------------------------------------------------
	   	#mail(Correo destino, asunto del mensaje, mensaje, cabecera del correo);
		
		$correoDestino = "logxxiformacion@gmail.com , info@logxxiformacion.com";
		$asunto = "Contacto de ".$_POST['nombre'];
		$mensaje = '	<h1>Contacto desde logxxiformacion.com</h1>	
						<p> <strong>Nombre:</strong> '.$_POST['nombre'].'</p>
						<p> <strong>Email:</strong> '.$_POST['email'].'</p>
						<p> <strong>Asunto:</strong> '.$_POST['asunto'].'</p>
						<hr>
						<h2>Mensaje:</h2>
						<p>'.$_POST['mensaje'].'</p>';

		$cabecera = 'MIME-Version: 1.0' . "\r\n";
		$cabecera .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: '.$_POST['nombre']." ".$_POST['apellido'].'<'.$_POST['email'].'>';


	   if($envio = mail($correoDestino, $asunto, $mensaje, $cabecera)){

		echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El Mensaje se ha sido enviado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
						    window.location = "index.php";
						  } 
				});

			</script>';

		}


		}

	}

	}
