<?php 
		$idmodelo = $_GET['model'];

		if (session_status() == PHP_SESSION_NONE) {
                session_start();


                if ($_POST["fechasModal"]) {
		        	$_SESSION['fechainicio'] = $_POST['start'];
		            $_SESSION['fechafin'] = $_POST['end'];
		            $_SESSION['locPickup'] = $_POST['Pick'];
					$_SESSION['locDropoff'] =$_POST['Drop'];
					$_SESSION['recargoPick'] =$_POST['locPickup'];
					$_SESSION['recargoLoc'] =$_POST['locDropoff'];

		        }



				$nuevoTiempo = new Busqueda();
				$start = $_SESSION['fechainicio'];
				$end = $_SESSION['fechafin'];
                $transcurrido = $nuevoTiempo -> tiempo($start,$end);
						$meses = $transcurrido->m;
						$horas = $transcurrido->h;
						$minutos=  $transcurrido->i;
						$diasex = $transcurrido->d;
						$semanas = intval($diasex/7);
						$dias = $diasex - ($semanas * 7);
						if ($minutos >=1){
							$horas++;
						}
						if ($horas >= 1){
							$diasex++;
						} 
						
						
        }


        $resultado = new Busqueda();
		$respuesta = $resultado -> calculo($meses,$semanas,$dias,$horas,$idmodelo);
		//var_dump($_GET);

		$listaCargos = $resultado -> cargos($diasex, $idmodelo);

		$config = $resultado -> config($diasex);
		$recargos = $_SESSION['recargoLoc'] + $_SESSION['recargoPick'];	
		$total = ($meses * $respuesta["mes"]) + ($semanas * $respuesta["semana"]) + ($dias * $respuesta["dia"]) + ($horas * $respuesta["hora"] + $respuesta["refueling"] + $recargos );
		$automatico = ($respuesta["automatico"] == 1) ? "Automatic" : "Manual";
		$aire = ($respuesta["aire"] == 1) ? "Yes" : "No";
			
 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>turentalcars - Rental</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="views/images//favicon.ico" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="views/images//apple-touch-icon-114x114-precomposed.png">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="views/images//apple-touch-icon-72x72-precomposed.png">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="views/images//apple-touch-icon-57x57-precomposed.png">	
	
	<!-- Library - Google Font Familys -->	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto+Slab:100,300,400,700" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="views/libraries/lightslider/lightslider.min.css" />
	
	<link rel="stylesheet" type="text/css" href="views/revolution/css/settings.css">
 
	<!-- RS5.0 Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="views/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="views/revolution/css/navigation.css">
	
	
	<!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="views/libraries/lib.css">
	
	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="views/style.css">	
	<link rel="stylesheet" type="text/css" href="views/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="views/css/navigation-menu.css">
	<link rel="stylesheet" type="text/css" href="views/css/shortcode.css">
	<link rel="stylesheet" href="views/css/fa/css/fontawesome-all.min.css" type="text/css" />
	<link href="backend/views/css/sweetalert.css" rel="stylesheet">
	<!--[if lt IE 9]>
		<script src="views/js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<div class="main-container">
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="loader-inner ball-clip-rotate">
					<div></div>
				</div>
			</div>
		</div><!-- Loader /- -->
		
		<?php include "modules/menu.php"; ?>

		<main>
			<div id="maindata">
		
			<!-- Welcome Section -->
			<div class="welcome-section container-fluid no-padding">
					
				<div class="col-md-6 ">
					<h3><?php echo $respuesta['marca'] . " " .$respuesta['modelo']; ?></h3>
					<h5>o similar de la categoría <?php echo $respuesta['modelo_categoria']; ?></h5>
					<a href="search">Cambiar Categoría</a>
					<img src="backend/<?php echo $respuesta['ruta']; ?>" alt="Welcome" />
					<input type="hidden" name="modelo" value="<?php echo $respuesta['marca'] . " - " .$respuesta['modelo']; ?>">
				</div>
				<div class="col-md-6">
					<div class="padding-100"></div>
					<!-- Section Header -->
					<div class="section-header">
						<h3>Resumen</h3>
						<p><strong>Recepción: </strong> <?php echo $_SESSION['fechainicio']; ?> - <?php echo $_SESSION['locPickup']; ?><input type="hidden" name="fechainicio" value="<?php echo $_SESSION['fechainicio']; ?>"><input type="hidden" name="locPickup" value="<?php echo $_SESSION['locPickup']; ?>"></p>
						<p><strong>Entrega: </strong> <?php echo $_SESSION['fechafin']; ?> - <?php echo $_SESSION['locDropoff']; ?><input type="hidden" name="fechafin" value="<?php echo $_SESSION['fechafin']; ?>"><input type="hidden" name="locDropoff" value="<?php echo $_SESSION['locDropoff']; ?>"></p>
						<p>	<strong>Duración: </strong><?php 	echo "$meses mes(es), $semanas semana(s), $dias dias y  $horas horas" ; ?>
							<input type="hidden" name="duration" value="<?php 	echo "$meses Mes(es), $semanas Semana(s), $dias Dia(s) y $horas horas" ; ?>">
							<input type="hidden" name="days" value="<?php 	echo  $diasex ;?>">
						</p>
						<?php if ($recargos > 0) { ?>
						<p><strong>Recargo por traslado:</strong> $ <?php echo $recargos ; ?></p>
						<?php } ?>
						<a href="#" data-toggle="modal" data-target="#modal-act">Modificar</a>
					</div><!-- Section Header /- -->
				</div>
			</div><!-- Welcome Section /- -->
			
			<!-- Why Choose Us Section -->
			<div class="why-chooseus-section container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Cargos</h3>
						<p>Duración en días: <?php 	echo "$diasex Days" ; ?></p>
					</div><!-- Section Header /- -->
					<!-- Row -->
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Dollar"></i>
								<h3>Cargo por servicio de combustible:</h3>
								<h4><?php 	echo "monto: $".$listaCargos['refueling']; ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Goto"></i>
								<h3>Cargo por renta local (<?php 	echo "diario: $".$listaCargos['localcharge']; ?>)</h3>
								<h4><?php 	echo "monto: $".$listaCargos['vlocalcharge']; ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Info"></i>
								<h3>Tasa de Llantas y Batería  (<?php 	echo "diario: $".$listaCargos['llantas_impuesto']; ?>) </h3>
								<h4><?php echo "monto: $". $listaCargos['vllantas_impuesto'] ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-StorageBox"></i>
								<h3>Impuesto del estado de Florida  (<?php 	echo "diario: $".$listaCargos['surcharge']; ?>) </h3>
								<h4><?php echo "monto: $". $listaCargos['vsurcharge'] ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Car"></i>
								<h3>Impuesto de Licencia  (<?php 	echo "diario: $".$listaCargos['licensefee']; ?>) </h3>
								<h4><?php echo "monto: $". $listaCargos['vlicensefee'] ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Calculator"></i>
								<h3>Impuesto de Venta   : <?php echo $config['tax']; ?>%</h3>
								<?php $taxV= round(($total+ $listaCargos['acum']) * $config['tax']/100 , 2); ?>
								<input type="hidden" value="<?php echo $taxV; ?>" name="tax">
								<h4>impuesto $<?php echo $taxV; ?></h4>
							</div>
						</div>
					</div><!-- Row /- -->
					<div class="row">
						<p></p>
							<div class="col-md-10 col-sm-10 col-xs-12" style="text-align: right;">
								<h4>SUB TOTAL: $<span><?php echo $listaCargos['acum'] + $total + $taxV ; ?></span></h4>
								<input type="hidden" name="total" value="<?php echo $listaCargos['acum'] + $total + $taxV; ?>">
								<input type="hidden" name="cargos" value="<?php echo $listaCargos['acum'] + $listaCargos['refueling'] ?>">
								<input type="hidden" name="subtotal" value="<?php echo $total; ?>">
								<input type="hidden" name="tax" value="<?php echo $taxV; ?>">
							
							</div>
					</div>
					
					
					<div class="inventory-tabs col-md-6 col-sm-12">
						<h4>INSURANCE</h4>
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active" id="basicv"><a href="#specifications" role="tab" data-toggle="tab">BASIC</a></li>
								<li role="presentation" id="fullv"><a href="#overview" role="tab" data-toggle="tab">FULL COVER</a></li>
								<li role="presentation" id="vipv"><a href="#locations" role="tab" data-toggle="tab">V.I.P.</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content col-md-12 col-sm-12">
								<div role="tabpanel" class="tab-pane active" id="specifications">
										<p>PIP Mandatory (Included)<br>
											$10,000.00 Third Parties<br>
											$10,000.00 Property Damage<br>
											20.000.00 Combine</p>
											<p>Deductible $1,500.00</p>
											<input type="hidden" value="<?php 	echo $listaCargos['basic']* $diasex; ?>" name="basic" id="basic">
											<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['basic']* $diasex; ?></span></p>
								</div>
								<div role="tabpanel" class="tab-pane" id="overview">
										<p>PIP + Collision Damage<br>
										$10,000.00 Third Parties<br>
										$10,000.00 Property Damage<br>
										20.000.00 Combine
										</p>
										
										<p>Deductible $500.00</p>
										<input type="hidden" id="full" value="<?php 	echo $listaCargos['full']* $diasex; ?>" name="basic">
										<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['full'] * $diasex; ?></span></p>
								</div>
								<div role="tabpanel" class="tab-pane" id="locations">
										<p>PIP + Collision Damage
											<br>Personal Accident Insurance
											<br>Personal Effects Coverage
											<br>Supplement Liability Insurance</p>
											<p>Deductible $0.00</p>
											<input type="hidden" id="vip" value="<?php 	echo $listaCargos['vip']* $diasex; ?>" name="basic">
											<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['vip']* $diasex; ?></span></p>
								</div>
								
						
					</div>
					</div>

						<div class="col-md-6 col-sm-12 col-xs-12 welcom-box">
						<div class="padding-100"></div>
							<h4>EXTRAS</h4>
							<form>

								<div class="form-group" >
									<label for="silla">Child Seat (free)</label>
									<select name="silla" id="silla" >
										<option>0</option>
										<option>1</option>
										<option>2</option>

									</select>
								</div>
								<div class="form-group">
									<div class="check-box">
										<input type="checkbox" name="gps" id="gps" />
										<label for="gps">GPS (free)</label>
									</div>
								</div>
								
							</form>
						</div>	
					
					<input name="insurance" id="insurance" type="hidden" value="<?php echo $listaCargos['basic'] * $diasex; ?>">
					<input name="insuranceT" id="insuranceT" type="hidden" value="<?php echo "BASIC"; ?>">
					<div class="padding-50"></div>
				
				<div class="row">
						<div class="col-md-10 col-sm-10 col-xs-12" style="text-align: right;">
								<h4>TOTAL: $<span id= "totalVE"><?php echo $listaCargos['acum'] + $total + $taxV ; ?></span></h4>
								<input type="hidden" id= "totalVI" name="totalV" value="<?php echo $listaCargos['acum'] + $total + $taxV; ?>">
								<input type="hidden" id= "estatico" name="totalV" value="<?php echo $listaCargos['acum'] + $total + $taxV ; ?>">
								<input type="hidden" name="sesion" value="<?php echo session_id() ; ?>">
						</div>
				</div>
			
			<!-- Why Choose Us Section /- -->
			
			<!-- Call To Action -->
				<div class="container-fluid no-padding contact-section">
					<!-- Container -->
					<div class="container">
						<h3>Datos de la Reserva</h3>
						<form>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="nombre"  required="" placeholder="Nombre*" class="form-control">
								<input type="email" name="email"  required="" placeholder="Email*" class="form-control">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="phone"  required="" placeholder="Número Telefónico*" class="form-control">
								<input type="text" name="address"  required="" placeholder="Direción*" class="form-control">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" name="payment" id="payment" required>
									<option value="" selected>Tipo de Pago</option>
									<option value="Paypal" >Paypal - TDC</option>
								</select>
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="license"  required="" placeholder="N. de Licencia Local*" class="form-control">
							</div>		
							
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<textarea name="notas"  placeholder="Observaciones" rows="4" class="form-control"></textarea>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<button id="btn_submit" type="button" title="Send">Reservar</button>
								<div class="mx-auto"> * al hacer click en reservar, declaro que he leído y aceptado los <a href="terminos-y-condiciones" target="_blank">Términos y Condiciones<a><div>
							</div>
							<div class="alert-msg" id="alert-msg"></div>
						</form>
					</div>
				</div>
			
			
			<div class="section-padding"></div>
			
			<!-- Inventory Section -->
		</div>
		</main>
		<!-- Modal Paypal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pago con Paypal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<p>A continuación, será redirigido a Paypal.com para completar el pago de su orden. Haga click en continuar para proceder. </p>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="Juanzadra@hotmail.com">
				<input type="hidden" name="item_name" value="Car Rental - Turentalcars.net">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="image_url" value="http://www.turentalcars.net/views/images/logo.png">
				<input type="hidden" name="invoice" value="<?php echo session_id() ; ?>">
				<input type="hidden" id="amount" name="amount" value="<?php echo $listaCargos['acum'] + $respuesta['total'] + $taxV + $listaCargos['refueling']; ?>">
				<input type="hidden" name="return" value="http://turentalcars.net/confirmacion">
				<input type="hidden" name="cancel_return" value="http://turentalcars.net/fail">
				<button type="submit" class="btn btn-primary">Continuar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</form>
			</div>
			<div class="modal-footer">
				<p>Con Paypal&copy; sus pagos están protegidos</p><img src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" alt="">
				
			</div>
			</div>
		</div>
		</div>

		<!-- Modal  -->
		
		<div class="modal fade" id="modal-act" tabindex="-1" role="dialog" aria-labelledby="#modal-actLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modal-actLabel">ACTUALIZAR</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="">
							<form class="" method="POST" autocomplete="off">
								<div class="row">
									<div class="form-group col-md-6">
										<select name="locPickup" id="locPickup" class="form-control mr-4" required >
											<option value="">LUGAR DE RECOGIDA</option>
											<?php 
												$locacions = new locacionController();
												$locacions -> mostrarLocacionController();
											?>
										</select>
									</div>
									<div class="col-md-6">
										<input type="hidden" name="Pick" id="Pick">
										<input type="text" class="form-control" name="start" id="start"  required placeholder="FECHA RECOGIDA" value="<?php echo $_SESSION['fechainicio']?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<select name="locDropoff" id ="locDropoff" class="form-control" required >
											<option value="">LUGAR DE ENTREGA</option>
											<?php 
												$locacions2 = new locacionController();
												$locacions2 -> mostrarLocacionController();
											?>
										</select>
										
									</div>
									<div class="col-md-6">
										<input type="hidden" name="Drop" id="Drop">
										<input type="text" class="form-control" name="end" id="end" required  placeholder="FECHA DE ENTREGA" value="<?php echo $_SESSION['fechafin']?>">
									</div>
								</div>
								<input type="text" name="fechasModal" hidden value="true">
								<button style="width: 100%" class="btn btn-primary"><i class="icon icon-Search"></i></button>
								
							</form>

							<input type="text" id="valFechaInicio" hidden value="$_SESSION['fechafin']">
							<input type="text" id="valFechaFin" hidden value="true">
						</div>

							

					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
		<?php include('modules/footer.php'); ?>
		
	</div>
	
	<!-- JQuery v1.12.4 -->
	<script src="views/js/jquery-3.3.1.min.js"></script>

	<!-- Library - Js -->
	<script src="views/libraries/lib.js"></script>
	<script src="views/libraries/lightslider/lightslider.min.js"></script>
	
	<!-- RS5.0 Core JS Files -->

	<script src="backend/views/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="views/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="views/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="views/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="views/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="views/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="views/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	
	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCf0dPCQ0C7oVF0WFKhuyz7v7oWei3vFPI "></script>
	
	<!-- Library - Theme JS -->
	<script src="views/js/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="views/css/jquery.datetimepicker.min.css"/>
	<script src="views/js/jquery.datetimepicker.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
			
			
			$('#start').datetimepicker({
				format:'m/d/Y H:00',
				minDate:'+1970/01/02', //yesterday is minimum date
			});
			
			$('#end').datetimepicker({
				format:'m/d/Y H:00',
				minDate:'+1970/01/02', //yesterday is minimum date
			});
			
		

			$("#totalVI").change(function(){
				$("#amount").val($("#totalVI").val());
			})

			$("#basicv").click(function(){
				valor= parseFloat($("#estatico").val());	
				$("#insurance").val($("#basic").val());
				$("#insuranceT").val("BASIC");
				$("#totalVI").val(parseFloat(valor));
				$("#totalVE").html(parseFloat(valor));
			})
			$("#fullv").click(function(){
				valor= parseFloat($("#estatico").val());			
				$("#insurance").val($("#full").val());
				$("#insuranceT").val("FULL COVER");
				$("#totalVI").val(parseFloat($("#full").val()) + valor);
				$("#totalVE").html(parseFloat($("#full").val()) + valor);
			})
			$("#vipv").click(function(){	
				valor= parseFloat($("#estatico").val());			
				$("#insurance").val($("#vip").val());
				$("#insuranceT").val("VIP");
				$("#totalVI").val(parseFloat($("#vip").val()) + valor);
				$("#totalVE").html(parseFloat($("#vip").val()) + valor);
			})

			$("#btn_submit").click(function(){
					
					mydata=$('#maindata').find('select, textarea, input, form').serialize();
					console.log(mydata);
				$.ajax({
					url:"views/ajax/gestorReserva.php",
					method: "POST",
					data: mydata,
					cache: false,
				success: function(respuesta) {
					
					if ($("#payment").val() == "Paypal") {	
						$("#exampleModal").modal('toggle');
					} else {
							
						swal({
							title: "¡OK!",
							text: "¡La Reserva se ha enviado correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						},

						function(isConfirm){
								if (isConfirm) {	   
									window.location = "index.php";
								} 
						});
					}
					
				},
				error: function() {
					console.log("No se ha podido obtener la información");
				}
				});
			})


			$("#locPickup").change(function(){
				$("#Pick").val($(this).find('option:selected').text());
			})

			$("#locDropoff").change(function(){
				$("#Drop").val($(this).find('option:selected').text());
			})
			

		})
	</script>

</body>
</html>