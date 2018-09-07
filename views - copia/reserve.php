<?php 
		$idmodelo = $_GET['model'];


		if (session_status() == PHP_SESSION_NONE) {
                session_start();

				$nuevoTiempo = new Busqueda();
				$start = $_SESSION['fechainicio'] . " " .$_SESSION['horaInicio'];
				$end = $_SESSION['fechafin']. " " .$_SESSION['horaFin'];
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
					
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="" />

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="views/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="views/css/style.css" type="text/css" />
<link rel="stylesheet" href="views/css/dark.css" type="text/css" />

<link href="views/css/sweetalert.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="views/demos/travel/travel.css" type="text/css" />
<link rel="stylesheet" href="views/demos/travel/css/datepicker.css" type="text/css" />

<link rel="stylesheet" href="views/css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="views/css/fa/css/fontawesome-all.min.css" type="text/css" />
<link rel="stylesheet" href="views/css/animate.css" type="text/css" />
<link rel="stylesheet" href="views/css/magnific-popup.css" type="text/css" />
<link rel="stylesheet" href="views/css/responsive.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="views/js/jquery.js"></script>
<script type="text/javascript" src="views/js/sweetalert.min.js"></script>

<link rel="stylesheet" href="views/css/colors.php?color=AC4147" type="text/css" />

<link rel="stylesheet" href="views/demos/car/car.css" type="text/css" />
<link rel="stylesheet" href="views/demos/car/css/car-icons/style.css" type="text/css" />
<link rel="stylesheet" href="views/css/components/bs-switches.css" type="text/css" />


<title>Sicarental.com | Home</title>
</head>
<body class="stretched">
<?php 
	$reserva = new reservaController();
	$reserva -> registroReservaController();
 ?>
<div id="wrapper" class="clearfix">

<header id="header" class="transparent-header sticky-header" data-sticky-class="not-dark" data-responsive-class="not-dark">
<div id="header-wrap" class="not-dark">
<div class="container clearfix">
<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

<div id="logo">
<a href="index.php" class="standard-logo" data-dark-logo="demos/travel/images/1-596x173.png"><img src="views/demos/travel/images/1-596x173.png" alt="Sicar Rental"></a>
<a href="index.php" class="retina-logo" data-dark-logo="demos/travel/images/1-596x173.png"><img src="views/demos/travel/images/1-596x173.png" alt="Sicar Rental"></a>
</div>

<nav id="primary-menu" >
<ul>
<li class="current"><a href="index.php"><div><i class="icon-home2"></i>Home</div></a> </li>
<li><a href="#"><div><i class="fas fa-car" style="vertical-align: middle;"></i>Models</div></a></li>
<li><a href="#"><div><i class="icon-building"></i>Rental Services</div></a></li>
<li><a href="#"><div><i class="icon-pencil2"></i>Blog</div></a></li>
<li><a href="#"><div><i class="icon-phone3"></i>(786) 365-4846</div></a></li>
</ul>
</nav>
</div>
</div>
</header>
<section id="content">
	<form method="POST">
<div class="content-wrap">
	<div >
					<div class="container clearfix">
							<h3 >Order Details					
							</h3>
					</div>
				</div>

<div class="container clearfix">

					<div class="row clearfix ">
						<div class="col-lg-6">
							<div class="feature-box fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-car-board1"></i></a>
								</div>
								<h3>RESUME</h3>
								<p><strong>Pick-up: </strong> <?php echo $_SESSION['fechainicio']." ".$_SESSION['horaInicio']; ?> - <?php echo $_SESSION['locPickup']; ?><input type="hidden" name="fechainicio" value="<?php echo $_SESSION['fechainicio']; ?>"><input type="hidden" name="locPickup" value="<?php echo $_SESSION['locPickup']; ?>"></p>
								<p><strong>Return: </strong> <?php echo $_SESSION['fechafin']." ".$_SESSION['horaFin']; ?> - <?php echo $_SESSION['locDropoff']; ?><input type="hidden" name="fechafin" value="<?php echo $_SESSION['fechafin']; ?>"><input type="hidden" name="locDropoff" value="<?php echo $_SESSION['locDropoff']; ?>"></p>
								<p>	<strong>Rental Duration: </strong><?php 	echo "$meses month(s), $semanas week(s), $dias days and $horas hours" ; ?>
									<input type="hidden" name="duration" value="<?php 	echo "$meses month(s), $semanas week(s), $dias days and $horas hours" ; ?>">
								</p>
							</div>
							<div >
								<img src="backend/<?php echo $respuesta['ruta']; ?>" alt="Car">
								<input type="hidden" name="modelo" value="<?php echo $respuesta['modelo']; ?>">
							</div>
							<div class="feature-box fbox-plain topmargin">
								<div class="fbox-icon">
									<a href="#"><i class="icon-car-money"></i></a>
								</div>
								<h3>Insurance</h3>						
								<div class="accordion clearfix">
								<div class="acctitle" id="basicv"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Basic</div>
								<div class="acc_content clearfix">
								<p>PIP Mandatory (Included)<br>
								$10,000.00 Third Parties<br>
								$10,000.00 Property Damage<br>
								20.000.00 Combine</p>
								<p>Deductible $1,500.00</p>
								<input type="hidden" value="<?php 	echo $listaCargos['basic']* $diasex; ?>" name="basic" id="basic">
								<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['basic']* $diasex; ?></strong></span>
								</div>

								<div class="acctitle" id="fullv"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Full Cover</div>
								<div class="acc_content clearfix">
								<p>PIP + Collision Damage</p>
								<p>Deductible $500.00</p>
								<input type="hidden" id="full" value="<?php 	echo $listaCargos['full']* $diasex; ?>" name="basic">
								<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['full'] * $diasex; ?></strong></p>
								</div>

								<div class="acctitle" id="vipv"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>V.I.P.</div>
								<div class="acc_content clearfix">
								<p>PIP + Collision Damage
								<br>Personal Accident Insurance
								<br>Personal Effects Coverage
								<br>Supplement Liability Insurance</p>
								<p>Deductible $0.00</p>
								<input type="hidden" id="vip" value="<?php 	echo $listaCargos['vip']* $diasex; ?>" name="basic">
								<p style="text-align:right;">Amount: <span class="amount color lead">$<?php 	echo $listaCargos['vip']* $diasex; ?></strong></p></div>
								</div>
							</div>
							<input name="insurance" id="insurance" type="hidden" value="<?php echo $listaCargos['basic'] * $diasex; ?>">
						</div>
						
						<div class="col-lg-6 col-md-6">
							<div class="feature-box fbox-plain ">
								<div class="fbox-icon">
									<a href="#"><i class="icon-car-note"></i></a>
								</div>
								<h3>Charges</h3>

								<p><strong>Rental Duration: <?php 	echo "$diasex Days" ; ?> </strong></p>
								<div class="row">	
									<div style="text-align:right;" >
										<input type="hidden" name="days" value="<?php echo $diasex; ?>">
										<span class="amount color lead">$ <?php echo $respuesta['total']; ?></span>
									</div>
								</div>
								<p><strong>Refueling service charge: <?php 	echo "" ; ?> </strong></p>
								<div class="row">	
									<div >
										<span style="text-align:right;"></span>
									</div>
								</div>
								<p><strong>Rental Car Local Charge : <?php 	echo "Daily: $".$listaCargos['localcharge']; ?> </strong></p>
								<div class="row">
									<div style="text-align:right;">
										<span >$ <?php echo $listaCargos['vlocalcharge']; ?></span>
									</div>
								</div>
								<p><strong>Taxed Tires/Battery : <?php 	echo "Daily: $".$listaCargos['llantas_impuesto']; ?>  </strong></p>
								<div class="row">
									<div style="text-align:right;">
										<span >$ <?php echo $listaCargos['vllantas_impuesto']; ?></span>
									</div>
								</div>
								<p><strong>Florida Surcharge : <?php 	echo "Daily: $".$listaCargos['surcharge']; ?> </strong></p>
								<div class="row">
									<div style="text-align:right;">
										<span >$ <?php echo $listaCargos['vsurcharge']; ?></span>
									</div>
								</div>
								<p><strong>Vehicle License Fee  : <?php 	echo "Daily: $".$listaCargos['licensefee']; ?> </strong></p>
								<div class="row">
									<div style="text-align:right;">
										<span >$ <?php echo $listaCargos['vlicensefee']; ?></span>
									</div>
								</div>
								<p><strong>Sale Tax   : <?php echo $config['tax']; ?>% </strong></p>
								<div class="row">
									<div style="text-align:right; border-bottom: 2px solid #4c4c4c;">
										<span >$ <?php echo round(($respuesta['total'] + $listaCargos['acum'] ) * $config['tax']/100); ?></span>
									</div>
								</div>
								<div class="row">
									<p></p>
									<div style="text-align:right;">
										Sub Total: <span class="amount color lead">$ <?php echo $listaCargos['acum'] + $respuesta['total']; ?> </span>
											<input type="hidden" name="total" value="<?php echo $listaCargos['acum'] + $respuesta['total']; ?>">
											<input type="hidden" name="cargos" value="<?php echo $listaCargos['acum'] ?>">
											<input type="hidden" name="subtotal" value="<?php echo $respuesta['total']; ?>">
										
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-lg-6 col-md-6  bottommargin-sm">
							<div class="feature-box fbox-plain ">
								
								<h3>Extras</h3>

								<p>GPS (free)</p>
								<div class="row">
									<div style="text-align:right;">	
										<div class="bootstrap-switch-container" style="width: 135.328px; height: 30px; margin-left: 200px; ">
											<input class="bt-switch" type="checkbox" checked=""></div>
									</div>
								</div>
								<p>Child Seat (free)</p>
								<div class="row">	
									<div >
										<div style="text-align:right;" >
											<select name="silla" id="" class="sm-form-control" style="width: 75px;" >
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
											</select>
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
					
					</div>

				</div>
<div class="common-height row clearfix">
<div class="col-lg-12 col-padding" style="background-color: #F9F9F9;">
<div class="max-height clearfix">
<div class="heading-block nobottommargin">
<h4>Complete your reserve</h4>
</div>
<div class="spost col-lg-12 col-md-6 clearfix">
<div class="row">
<div class="col-md-4 col-lg-4">
	<label for="">Name*</label>
	<input type="text" value="" class="sm-form-control" name="nombre" placeholder="your name">
</div>
<div class="col-md-4 col-lg-4">
	<label for="">Email*</label>
	<input type="text" value="" class="sm-form-control" name="email" placeholder="your email">
</div>
<div class="col-md-4 col-lg-4">
	<label for="">Telephone Number*</label>
	<input type="text" value="" class="sm-form-control" name="phone" placeholder="your telephone">
</div>
</div>
<p></p>
<div class="row">
<div class="col-md-7 col-10">
<label for="">Address*</label>
<input type="text" value="" class="sm-form-control" name="address" placeholder="your address">
</div>
<div class="col-md-5 col-10">
<label for="">International Driving Permit #*</label>
<input type="text" value="" class="sm-form-control" name="idp" placeholder="your IDP">
</div>
</div>
<p></p>
<div class="row">
<div class="col-md-4 col-4">
<label for="">Payment</label>
<select class="sm-form-control" name="payment" id="">
	<option>Bank Transfer</option>
	<option>Square</option>
</select>

</div>
<div class="col-md-8 col-8">
<label for="">Notes</label>
<textarea class="sm-form-control" rows=3  name="notes" placeholder="your notes"></textarea>

</div>

</div>
<div class="clearfix">	</div>
<p></p>
<div class="row">
	<div class="col-md-8">
	<button class="button button-3d nomargin rightmargin-sm">SEND </button>
	</div>



	</div>
</div>
</div>
</div>
</form>
</section>

<footer id="footer" class="dark" style="background-color: #222;">
<div class="container">

<div class="footer-widgets-wrap clearfix">
<div class="col_one_third">
<div class="widget clear-bottommargin-sm clearfix">
<div class="row">
<div class="col-lg-12 bottommargin-sm">
<div class="footer-big-contacts">
<span>Call Us:</span>
(786) 365-4846
</div>
</div>
<div class="col-lg-12 bottommargin-sm">
<div class="footer-big-contacts">
<span>Send an Enquiry:</span>
<a href="info@sicarrental.com" class="__cf_email__" >info@sicarrental.com</a>
</div>
</div>
</div>
</div>
<div class="widget subscribe-widget clearfix">
<div class="row">
<div class="col-lg-6 clearfix bottommargin-sm">
<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
<i class="icon-facebook"></i>
<i class="icon-facebook"></i>
</a>
<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
</div>
<div class="col-lg-6 clearfix">
<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
<i class="icon-rss"></i>
<i class="icon-rss"></i>
</a>
<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
</div>
</div>
</div>
</div>
<div class="col_one_third">
<div class="widget clearfix">
<h4>Featured Models</h4>
<div id="post-list-footer">
<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="views/demos/car/images/features/1.jpg" alt="Package"></a>
</div>
<div class="entry-c">
<div class="entry-title">
<h4><a href="#">KIA SPORTAGE </a></h4>
</div>
<ul class="entry-meta">
<li><strong>4,5</strong> stars</li>
</ul>
</div>
</div>
<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="views/demos/car/images/features/2.jpg" alt="Package"></a>
</div>
<div class="entry-c">
<div class="entry-title">
<h4><a href="#">WOLKSVAGEN GOLF</a></h4>
</div>
<ul class="entry-meta">
<li><strong>4</strong> stars</li>
</ul>
</div>
</div>
<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="views/demos/car/images/features/3.jpg" alt="Package"></a>
</div>
<div class="entry-c">
<div class="entry-title">
<h4><a href="#">HYUNDAI TUCSON</a></h4>
</div>
<ul class="entry-meta">
<li><strong>4,5</strong> stars</li>
 </ul>
</div>
</div>
</div>
</div>
</div>
<div class="col_one_third col_last">
<div class="widget widget_links clearfix">
<h4>Popular Destinations</h4>
<div class="row clearfix">
<div class="col-6">
<ul>
<li><a href="#">Thailand</a></li>
<li><a href="#">Indonesia</a></li>
<li><a href="#">Italy</a></li>
<li><a href="#">Spain</a></li>
</ul>
</div>
<div class="col-6">
<ul>
<li><a href="#">India</a></li>
<li><a href="#">France</a></li>
<li><a href="#">Philippines</a></li>
<li><a href="#">New Zealand</a></li>
</ul>
</div>
</div>
</div>

</div>
</div>
</div>

<div id="copyrights">
<div class="container clearfix">
<div class="col_half">
powered by <a href="http://www.uncionweb.com">uncionweb</a><br>
<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
</div>
<div class="col_half col_last tright">
<div class="fright clearfix">
<a href="#" class="social-icon si-small si-borderless si-facebook">
<i class="icon-facebook"></i>
<i class="icon-facebook"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-twitter">
<i class="icon-twitter"></i>
<i class="icon-twitter"></i>
</a>
<a href="#" class="social-icon si-small si-borderless si-gplus">
<i class="icon-gplus"></i>
<i class="icon-gplus"></i>
</a>

</div>
<div class="clear"></div>
<i class="icon-envelope2"></i> <a href="info@sicarrental.com" class="__cf_email__">info@sicarrental.com </a><i class="icon-headphones"></i> (786) 365-4846 <span class="middot">&middot;</span> <i class="icon-skype2"></i> Skype
</div>
</div>
</div>
</footer>
</div>

<div id="gotoTop" class="icon-angle-up"></div>

<script data-cfasync="false" src="views/demos/travel/js/email-decode.min.js"></script>
<script src="views/js/plugins.js"></script>

<script src="views/js/functions.js"></script>
<!-- Bootstrap Switch Plugin -->
<script src="views/js/components/bs-switches.js"></script>

<script>	
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