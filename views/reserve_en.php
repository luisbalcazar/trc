<?php 
		$idmodelo = $_GET['model'];


		if (session_status() == PHP_SESSION_NONE) {
                session_start();

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

		$total = ($meses * $respuesta["mes"]) + ($semanas * $respuesta["semana"]) + ($dias * $respuesta["dia"]) + ($horas * $respuesta["hora"]);
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
		
			<!-- Welcome Section -->
			<div class="welcome-section container-fluid no-padding">
					
				<div class="col-md-6 ">
					<h3><?php echo $respuesta['marca'] . " " .$respuesta['modelo']; ?></h3>
					<h5>o similar</h5>
					<img src="backend/<?php echo $respuesta['ruta']; ?>" alt="Welcome" />
					<input type="hidden" name="modelo" value="<?php echo $respuesta['marca'] . " - " .$respuesta['modelo']; ?>">
				</div>
				<div class="col-md-6">
					<div class="padding-100"></div>
					<!-- Section Header -->
					<div class="section-header">
						<h3>Resume</h3>
						<p><strong>Pick-up: </strong> <?php echo $_SESSION['fechainicio']; ?> - <?php echo $_SESSION['locPickup']; ?><input type="hidden" name="fechainicio" value="<?php echo $_SESSION['fechainicio']; ?>"><input type="hidden" name="locPickup" value="<?php echo $_SESSION['locPickup']; ?>"></p>
						<p><strong>Return: </strong> <?php echo $_SESSION['fechafin']; ?> - <?php echo $_SESSION['locDropoff']; ?><input type="hidden" name="fechafin" value="<?php echo $_SESSION['fechafin']; ?>"><input type="hidden" name="locDropoff" value="<?php echo $_SESSION['locDropoff']; ?>"></p>
						<p>	<strong>Rental Duration: </strong><?php 	echo "$meses month(s), $semanas week(s), $dias days and $horas hours" ; ?>
							<input type="hidden" name="duration" value="<?php 	echo "$meses month(s), $semanas week(s), $dias days and $horas hours" ; ?>">
						</p>
					</div><!-- Section Header /- -->
				</div>
			</div><!-- Welcome Section /- -->
			
			<!-- Why Choose Us Section -->
			<div class="why-chooseus-section container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Charges</h3>
						<p>Rental Duration: <?php 	echo "$diasex Days" ; ?></p>
					</div><!-- Section Header /- -->
					<!-- Row -->
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Dollar"></i>
								<h3>Refueling service charge:</h3>
								<h4>0,00</h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Goto"></i>
								<h3>Rental Car Local Charge (<?php 	echo "Daily: $".$listaCargos['localcharge']; ?>)</h3>
								<h4><?php 	echo "amount: $".$listaCargos['vlocalcharge']; ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Info"></i>
								<h3>Taxed Tires/Battery  (<?php 	echo "Daily: $".$listaCargos['llantas_impuesto']; ?>) </h3>
								<h4><?php echo "amount: $". $listaCargos['vllantas_impuesto'] ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-StorageBox"></i>
								<h3>Florida Surcharge  (<?php 	echo "Daily: $".$listaCargos['surcharge']; ?>) </h3>
								<h4><?php echo "amount: $". $listaCargos['vsurcharge'] ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Car"></i>
								<h3>License Fee  (<?php 	echo "Daily: $".$listaCargos['licensefee']; ?>) </h3>
								<h4><?php echo "amount: $". $listaCargos['vlicensefee'] ?></h4>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="choose-box">
								<i class="icon icon-Calculator"></i>
								<h3>Sale Tax   : <?php echo $config['tax']; ?>%</h3>
								<h4>Tax $<?php echo round(($respuesta['total'] + $listaCargos['acum'] ) * $config['tax']/100); ?></h4>
							</div>
						</div>
					</div><!-- Row /- -->
					<div class="row">
						<p></p>
						<div class="col-md-10 col-sm-10 col-xs-12" style="text-align: right;">
								<h4>SUB TOTAL: $<b><?php echo $listaCargos['acum'] + $respuesta['total']; ?></b></h4>
								<input type="hidden" name="total" value="<?php echo $listaCargos['acum'] + $respuesta['total']; ?>">
								<input type="hidden" name="cargos" value="<?php echo $listaCargos['acum'] ?>">
								<input type="hidden" name="subtotal" value="<?php echo $respuesta['total']; ?>">
							
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
					
					<div class="inventory-tabs col-md-12 col-sm-12">
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
											<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['basic']* $diasex; ?></strong></span>
								</div>
								<div role="tabpanel" class="tab-pane" id="overview">
										<p>PIP + Collision Damage<br>
										$10,000.00 Third Parties<br>
										$10,000.00 Property Damage<br>
										20.000.00 Combine
										</p>
										
										<p>Deductible $500.00</p>
										<input type="hidden" id="full" value="<?php 	echo $listaCargos['full']* $diasex; ?>" name="basic">
										<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['full'] * $diasex; ?></strong></p>
								</div>
								<div role="tabpanel" class="tab-pane" id="locations">
										<p>PIP + Collision Damage
												<br>Personal Accident Insurance
												<br>Personal Effects Coverage
												<br>Supplement Liability Insurance</p>
												<p>Deductible $0.00</p>
												<input type="hidden" id="vip" value="<?php 	echo $listaCargos['vip']* $diasex; ?>" name="basic">
												<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['vip']* $diasex; ?></strong></p></div>
								</div>

							</div>

						</div>
						<div class="padding-100"></div>
						<div class="col-md-6 col-sm-12 col-xs-12 welcom-box">
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
										<label for="gps">GPS</label>
									</div>
								</div>
								
							</form>
						</div>	
					</div>
					
					<input name="insurance" id="insurance" type="hidden" value="<?php echo $listaCargos['basic'] * $diasex; ?>">
					
					<div class="padding-50"></div>
				</div><!-- Container /- -->
			</div><!-- Why Choose Us Section /- -->
			
			<!-- Call To Action -->
			<div class="container-fluid no-padding contact-section">
					<!-- Container -->
					<div class="container">
						<h3>Complete your reserve</h3>
						<form class="row">
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="nombre"  required="" placeholder="Name*" class="form-control">
								<input type="email" name="email"  required="" placeholder="Email*" class="form-control">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="phone"  required="" placeholder="Telephone Number*" class="form-control">
								<input type="text" name="address"  required="" placeholder="Address*" class="form-control">
							</div>
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
									<label for="">Payment</label>
									<select class="form-control" name="payment" id="">
										<option>Bank Transfer</option>
										<option>Square</option>
									</select>
									<input type="text" name="license"  required="" placeholder="LICENSE LOCAL N°*" class="form-control">
									
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<textarea name="contact-message"  placeholder="Notes" rows="4" class="form-control"></textarea>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<button id="btn_submit" type="submit" title="Send">Send</button>
							</div>
							<div class="alert-msg" id="alert-msg"></div>
						</form>
					</div>
				</div>
			
			<div class="section-padding"></div>
			
			<!-- Inventory Section -->
			
		</main>
	
		
		<?php include('modules/footer.php'); ?>
		
	</div>
	
	<!-- JQuery v1.12.4 -->
	<script src="views/js/jquery-1.12.4.min.js"></script>

	<!-- Library - Js -->
	<script src="views/libraries/lib.js"></script>
	<script src="views/libraries/lightslider/lightslider.min.js"></script>
	
	<!-- RS5.0 Core JS Files -->
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
			
		});
	
			$("#basicv").click(function(){	
				$("#insurance").val($("#basic").val());
			})
			$("#fullv").click(function(){	
				$("#insurance").val($("#full").val());
			})
			$("#vipv").click(function(){	
				$("#insurance").val($("#vip").val());
			})
    </script>
</body>
</html>