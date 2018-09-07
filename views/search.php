<?php 
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
			//var_dump($_SESSION);
		}
	if (isset($_POST['start'])){
	
                $_SESSION['fechainicio'] = $_POST['start'];
                $_SESSION['fechafin'] = $_POST['end'];
                $_SESSION['locPickup'] = $_POST['Pick'];
				$_SESSION['locDropoff'] =$_POST['Drop'];
				$_SESSION['recargoPick'] =$_POST['locPickup'];
				$_SESSION['recargoLoc'] =$_POST['locDropoff'];

	}
	if (isset($_SESSION['fechainicio'])){
		$start = $_SESSION['fechainicio'];
		$end = $_SESSION['fechafin'];
		$nuevoTiempo = new Busqueda();
		$transcurrido = $nuevoTiempo -> tiempo($start,$end);
		$horas=  $transcurrido->h;
		$minutos=  $transcurrido->i;
		$meses = $transcurrido->m;
		$diasex = $transcurrido->d;
		$semanas = intval($diasex/7);
		$dias = $diasex - ($semanas * 7); 
		//var_dump($transcurrido);
		if ($minutos >=1){
			$horas++;
		}
		if ($horas >= 1){
			$diasex++;
		} 
	}
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

	<title>turentalcars - Home</title>

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
		
		<!-- Header Section -->
		<header id="header" class="header-section container-fluid no-padding">
			<?php include "modules/menu.php"; ?>	
		</header><!-- Header Section /- -->
	
		<main>

			<div class="section-padding-100"></div>
			
			<!-- Inventory Section -->
			<div class="inventroy-section container-fluid no-padding">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Select you Model</h3>
						<h4><?php
								if (isset($_SESSION['fechainicio'])){
								$start = $_SESSION['fechainicio'];
								$end = $_SESSION['fechafin'];
								$nuevoTiempo = new Busqueda();
								$transcurrido = $nuevoTiempo -> tiempo($start,$end);
								$horas=  $transcurrido->h;
								$minutos=  $transcurrido->i;
								$meses = $transcurrido->m;
								$diasex = $transcurrido->d;
								$semanas = intval($diasex/7);
								$dias = $diasex - ($semanas * 7); 
								//var_dump($transcurrido);
								if ($minutos >=1){
									$horas++;
								}
								if ($horas >= 1){
									$diasex++;
								}
								echo "<p> $meses month(s), $semanas week(s), $dias days and $horas hours</p>" ;
								}
								?>	</h4>
					</div><!-- Section Header /- -->
					<!-- Row -->
					<div class="row">
						
							<?php

								$restulado = new Busqueda();
								@$restulado -> listarResultados($meses,$semanas,$dias,$horas);

							?>

						
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Main Section /- -->
			
			<div class="padding-20"></div>
			<div class="padding-100"></div>
		
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
</body>
</html>