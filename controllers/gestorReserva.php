<?php

class reservaController{

	public function registroReservaController(){

		if(isset($_POST["email"])){
			$respuesta = reservaModel::registroReservaModel($_POST, "orden");	
			var_dump($respuesta);
			if($respuesta == "ok"){
			 session_start();
			 session_regenerate_id(true); 
			 session_destroy();
			 
			 echo'OK';
	 
			 } else {
				 echo 'error';
			 }
			$gps = (isset($_POST["gps"])) ? 1 : 0;	
			#ENVIAR EL CORREO ELECTRÓNICO
			#------------------------------------------------------
			#mail(Correo destino, asunto del mensaje, mensaje, cabecera del correo);
			//var_dump($_POST);
			$correoDestino = "gerardg12@gmail.com , ".$_POST['email'];
			$asunto = "Details Reserve ".$_POST['nombre'];
			$mensaje = '	<h1>Reservation</h1>	
							<p> <strong>Date Pickup:</strong> '.$_POST['fechainicio'].'</p>
							<p> <strong>Date Dropoff:</strong> '.$_POST['fechafin'].'</p>
							<p> <strong>Location Pickup:</strong> '.$_POST['locPickup'].'</p>
							<p> <strong>Location Dropoff:</strong> '.$_POST['locDropoff'].'</p>
							<hr>
							<h2>Modelol:</h2>
							<p>'.$_POST['modelo'].'</p>
							<hr>
							<h2>Datos de la Reserva:</h2>
							<p> <strong>Duration:</strong> '.$_POST['duration'].'</p>
							<p> <strong>Total Days:</strong> '.$_POST['days'].'</p>
							<p> <strong>SubTotal:</strong> '.$_POST['subtotal'].'</p>
							<p> <strong>Charges:</strong> '.$_POST['cargos'].'</p>
							<p> <strong>Total:</strong> '.$_POST['total'].'</p>
							<p> <strong>Insurance:</strong> '.$_POST['insurance'].'</p>
							<p> <strong>Payment:</strong> '.$_POST['payment'].'</p>
							<hr>
							<h2>Extras:</h2>
							<p> <strong>GPS:</strong> '.$gps.'</p>
							<p> <strong>Silla:</strong> '.$_POST['silla'].'</p>
							<hr>
							<h2>Personal Info:</h2>
							<p> <strong>Name:</strong> '.$_POST['nombre'].'</p>
							<p> <strong>Email:</strong> '.$_POST['email'].'</p>
							<p> <strong>Phone:</strong> '.$_POST['phone'].'</p>
							<p> <strong>Address:</strong> '.$_POST['address'].'</p>
							<p> <strong>IDP:</strong> '.$_POST['license'].'</p>
							<p> <strong>Notes:</strong> '.$_POST['notas'].'</p>
							<hr>
							<p>Deberá Formalizar La Reserva a través de una Transferencia o deposito por el monto indicado al Número de Cuenta: #########################, deberá remitirnos copia de la Transferencia o del depósito al correo reservas@turentalcars.net.</p>
							<p>NOTA: Turentalcars Se reserva el derecho de cancelar la reservación a los tres (3) días luego de hacer la reserva sin recibir la notificación del pago correspondiente.
							</p>
							';

			$cabecera = 'MIME-Version: 1.0' . "\r\n";
			$cabecera .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$cabecera .= 'From: '.$_POST['nombre'].'<'.$_POST['email'].'>';


			@$envio = mail($correoDestino, $asunto, $mensaje, $cabecera);
	

	  


		}

	}
}