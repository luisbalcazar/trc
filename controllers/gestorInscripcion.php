<?php

class InscripcionController{

	public function registroInscripcionController(){

		if(isset($_POST["nombre"])){

	   	#ENVIAR EL CORREO ELECTRÓNICO
	   	#------------------------------------------------------
	   	#mail(Correo destino, asunto del mensaje, mensaje, cabecera del correo);
		
		$correoDestino = "logxxiformacion@gmail.com , info@logxxiformacion.com";
		$asunto = "Inscripción ".$_POST['nombre']." ".$_POST['apellido'];
		$mensaje = '	<h1>Inscripci&oacute;n de Participante</h1>	
						<p> <strong>Fecha:</strong> '.$_POST['fecha'].'</p>
						<hr>
						<h2>Datos del Curso:</h2>
						<p>'.$_POST['cursot'].'</p>
						<hr>
						<h2>Datos del Participante:</h2>
						<p> <strong>Nombre:</strong> '.$_POST['nombre'].'</p>
						<p> <strong>Apellido:</strong> '.$_POST['apellido'].'</p>
						<p> <strong>DNI:</strong> '.$_POST['dni'].'</p>
						<p> <strong>Email:</strong> '.$_POST['email'].'</p>
						<p> <strong>Domicilio:</strong> '.$_POST['domicilio'].'</p>
						<p> <strong>Código Postal:</strong> '.$_POST['cp'].'</p>
						<p> <strong>Población:</strong> '.$_POST['poblacion'].'</p>
						<p> <strong>Provincia:</strong> '.$_POST['provincia'].'</p>
						<p> <strong>Telefóno:</strong> '.$_POST['telefono'].'</p>
						<p> <strong>Profesión:</strong> '.$_POST['profesion'].'</p>
						<p> <strong>Lugar de Trabajo:</strong> '.$_POST['lugarTrabajo'].'</p>';

		$cabecera = 'MIME-Version: 1.0' . "\r\n";
		$cabecera .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: '.$_POST['nombre']." ".$_POST['apellido'].'<'.$_POST['email'].'>';


	   	$envio = mail($correoDestino, $asunto, $mensaje, $cabecera);
 

	   $respuesta = InscripcionModel::registroInscripcionModel($_POST, "inscripcion");	

	   if($respuesta == "ok"){

		echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡La Inscripción se ha sido enviado correctamente!",
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