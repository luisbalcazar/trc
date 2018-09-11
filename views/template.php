
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
	<link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css" />

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
	
	<!--[if lt IE 9]>
		<script src="views/js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>

<body data-offset="200" data-spy="scroll" >
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
	
		<div><!-- Slider -->
				<?php include ('modules/slide.php'); ?>
		</div>		
			<!-- Welcome Section -->
			
		<div class="welcome-section container-fluid no-padding">
				<!--<div class="container">
					<form class="form-inline" action="search" method="POST" autocomplete="off">
						<div class="row">
							<h4>BUSCADOR:</h4>
						</div>
						<div class="row">
							<input type="hidden" id="categoria" name="categoria" value="1">
							<div class="form-group" >
								<select name="locPickup" id="locPickup" class="form-control" required >
									<option value="" selected>LUGAR DE RECOGIDA</option>
									<?php 
										$locacions = new locacionController();
										$locacions -> mostrarLocacionController();
									?>
								</select>
								<input type="hidden" name="Pick" id="Pick">
								<input type="text" class="form-control" name="start" id="start"  required placeholder="FECHA RECOGIDA">
							</div>
							
							<div class="form-group">
								<select name="locDropoff" id ="locDropoff" class="form-control" required >
										<option value="" selected>LUGAR DE ENTREGA</option>
										<?php 
										$locacions2 = new locacionController();
										$locacions2 -> mostrarLocacionController();
										?>
									</select>
									<input type="hidden" name="Drop" id="Drop">
									<input type="text" class="form-control" name="end" id="end" required  placeholder="FECHA DE ENTREGA">
									</div>
						</div>
							<button style="height: 100%"><i class="icon icon-Search"></i></button>
							
					</form>
					
					<div class="padding-50"></div>
				</div>-->
				
			<?php include ('modules/welcome.php');?>
		</div><!-- Welcome Section /- -->
			
			<!-- Counter Section -->
			<div id="counter_section-1" class="container-fluid no-padding counter-section">
				<div class="padding-70"></div>
				<!-- Container -->
			<?php include('modules/count.php'); ?>
				<div class="padding-40"></div>
			</div><!-- Counter Section /- -->
			<div class="padding-50"></div>
			<!-- Testimonial Section -->
			
			<?php include ('modules/testimonials.php');?>
			
			<div class="section-padding"></div>
			<!-- Portfolio Section -->
			<?php include ('modules/galeria.php'); ?>
			<!-- Portfolio Section /- -->
			
			<!-- Call To Action -->
			<div class="cta-section container-fluid no-padding">
				<div class="padding-50"></div>
				<!-- Container -->
				<div class="container">
					<img src="views/images/logo-2.png" width="250" height="250" alt="Loog" />
					<h3>have any queries? call us anytime</h3>
					<a href="#" title="Contact Us">Contact Us</a>
				</div><!-- Container /- -->
			</div><!-- Call To Action /- -->
			

		<?php include('modules/footer.php'); ?>
		
	</div>

	<!-- Bootstrap - Js -->
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/popover.min.js"></script>
	<script src="views/js/utils.js"></script>

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
		
		$("#locPickup").change(function(){
			$("#Pick").val($(this).find('option:selected').text());

		})

		$("#locDropoff").change(function(){
			$("#Drop").val($(this).find('option:selected').text());

		})
		  
		 
    </script>
</body>
</html>