<?php 
	if (isset($_POST['start']))
		if (session_status() == PHP_SESSION_NONE) {
                session_start();
                $_SESSION['fechainicio'] = $_POST['start'];
                $_SESSION['fechafin'] = $_POST['end'];
                $_SESSION['locPickup'] = $_POST['locPickup'];
                $_SESSION['locDropoff'] =$_POST['locDropoff'];
                $_SESSION['horaInicio'] =$_POST['startTime'];
                $_SESSION['horaFin'] =$_POST['endTime'];
                $_SESSION['horas'] = ($_SESSION['horaFin'] - $_SESSION['horaInicio'])/100;

            }
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="views/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="views/css/style.css" type="text/css" />
<link rel="stylesheet" href="views/css/dark.css" type="text/css" />

<link rel="stylesheet" href="views/demos/travel/travel.css" type="text/css" />
<link rel="stylesheet" href="views/demos/travel/css/datepicker.css" type="text/css" />

<link rel="stylesheet" href="views/css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="views/css/fa/css/fontawesome-all.min.css" type="text/css" />
<link rel="stylesheet" href="views/css/animate.css" type="text/css" />
<link rel="stylesheet" href="views/css/magnific-popup.css" type="text/css" />
<link rel="stylesheet" href="views/css/responsive.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="views/css/colors.php?color=AC4147" type="text/css" />

<link rel="stylesheet" href="views/demos/car/car.css" type="text/css" />
<link rel="stylesheet" href="views/demos/car/css/car-icons/style.css" type="text/css" />

<title>Sicarental.com | Home</title>
</head>
<body class="stretched">

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
<section id="slider" class="swiper_wrapper clearfix" style="height: 80px; display: none;">

</section>

<section id="content">
<div class="content-wrap">
	<div class="section nomargin nobg clearfix">
					<div class="container clearfix">
						<div class="heading-block center">
							<div class="before-heading ls1" style="font-size: 13px; font-style: normal;">
								<?php
								if (isset($_SESSION['fechainicio'])){
								$start = $_SESSION['fechainicio'] . " " .$_SESSION['horaInicio'];
								$end = $_SESSION['fechafin']. " " .$_SESSION['horaFin'];
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
								echo "$meses month(s), $semanas week(s), $dias days and $horas hours $minutos" ;
								}
								?>	
							</div>
							<h3 >Choose Vehicles					
							</h3>
						</div>

						<!-- Portfolio Filter
						============================================= -->
						<ul class="portfolio-filter style-2 clearfix" data-container="#portfolio">
							<li><a href="#" data-filter=".cf-1"><i class="icon-car-micro"></i><span>Economy</span></a></li>
							<li><a href="#" data-filter=".cf-2"><i class="icon-car-sedan"></i><span>Compact</span></a></li>
							<li><a href="#" data-filter=".cf-3"><i class="icon-car-supercar"></i><span>INTERMEDIATE</span></a></li>
							<li><a href="#" data-filter=".cf-5"><i class="icon-car-suv"></i><span>CROSSOVER SUV</span></a></li>
							<li><a href="#" data-filter=".cf-6"><i class="icon-car-minivan"></i><span>VAN</span></a></li>
							<!-- Show All Button -->
							 <li class="fright activeFilter"><a class="button button-small button-rounded button-reset" href="#" data-filter="*">Show All</a></li>
						</ul> <!-- #portfolio-filter end -->

						<div class="clear"></div>

						<!-- Portfolio Items
						============================================= -->
						<div id="portfolio" class="portfolio portfolio-3 grid-container clearfix" data-layout="fitRows">
							<?php

								$restulado = new Busqueda();
								@$restulado -> listarResultados($meses,$semanas,$dias,$horas);

							?>

						</div>
					</div>
				</div>
<div class="container clearfix">
<div class="heading-block center nobottomborder">
<span class="before-heading color">Which model are you looking for?</span>
<h2>latest models available</h2>
</div>
</div>
<div id="portfolio" class="portfolio grid-container portfolio-nomargin portfolio-full portfolio-overlay-open clearfix">
<article class="portfolio-item pf-media pf-icons">
<div class="portfolio-image">
<a href="portfolio-single.html">
<img src="views/demos/travel/images/packages/1.jpg" alt="NISSAN PATHFINDER">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>NISSAN PATHFINDER</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-illustrations">
<div class="portfolio-image">
<a href="portfolio-single.html">
<img src="views/demos/travel/images/packages/2.jpg" alt="CHEVROLET IMPALA">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>CHEVROLET IMPALA</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-graphics pf-uielements">
<div class="portfolio-image">
<a href="#">
<img src="views/demos/travel/images/packages/3.jpg" alt="HYUNDAI SANTA FE">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>HYUNDAI SANTA FE</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-icons pf-illustrations">
<div class="portfolio-image">
<a href="portfolio-single.html">
<img src="views/demos/travel/images/packages/4.jpg" alt="TOYOTA HIGHLANDER">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>TOYOTA HIGHLANDER</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-uielements pf-media">
<div class="portfolio-image">
<a href="portfolio-single.html">
<img src="views/demos/travel/images/packages/5.jpg" alt="KIA SORENTO">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>KIA SORENTO</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-graphics pf-illustrations">
<div class="portfolio-image">
<a href="portfolio-single.html">
<img src="views/demos/travel/images/packages/6.jpg" alt="WOLKSVAGEN PASSAT">
<div class="portfolio-overlay" data-lightbox="gallery">
<div class="portfolio-desc">
<h3>WOLKSVAGEN PASSAT</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-uielements pf-icons">
<div class="portfolio-image">
<a href="portfolio-single-video.html">
<img src="views/demos/travel/images/packages/7.jpg" alt="FORD ESCAPE">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>FORD ESCAPE</h3>
</div>
</div>
</a>
</div>
</article>
<article class="portfolio-item pf-graphics">
<div class="portfolio-image">
<a href="portfolio-single.html">
<img src="views/demos/travel/images/packages/8.jpg" alt="HONDA CIVIC">
<div class="portfolio-overlay">
<div class="portfolio-desc">
<h3>HONDA CIVIC</h3>
</div>
</div>
</a>
</div>
</article>
</div>
<a href="#" class="button button-full button-dark center bottommargin-lg">
<div class="container clearfix">
Can't find your Favorite Model? <strong>Browse Models</strong> <i class="icon-caret-right" style="top:4px;"></i>
</div>
</a>
<div class="container clear-bottommargin clearfix">
<div class="heading-block center">
<h2>Latest from our Blog</h2>
</div>
<div class="row clearfix">
<div class="ipost col-md-6 bottommargin clearfix">
<div class="row">
<div class="col-lg-6">
<div class="entry-image nobottommargin">
<a href="#"><img src="views/demos/travel/images/blog/1.jpg" alt="Paris"></a>
</div>
</div>
<div class="col-lg-6" style="margin-top: 20px;">
<span class="before-heading">Efficitur</span>
<div class="entry-title">
<h3><a href="#">Donec efficitur metus purus, eget tristique</a></h3>
</div>
<ul class="entry-meta clearfix">
<li><i class="icon-calendar3"></i> 16th February</li>
<li><a href="#"><i class="icon-comments"></i> 19</a></li>
</ul>
<div class="entry-content">
<a href="#" class="more-link">Read more</a>
</div>
</div>
</div>
</div>
<div class="ipost col-md-6 bottommargin clearfix">
<div class="row">
<div class="col-lg-6">
<div class="entry-image nobottommargin">
<a href="#"><img src="views/demos/travel/images/blog/2.jpg" alt="Paris"></a>
</div>
</div>
<div class="col-lg-6" style="margin-top: 20px;">
<span class="before-heading">Consectetur</span>
<div class="entry-title">
<h3><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h3>
</div>
<ul class="entry-meta clearfix">
<li><i class="icon-calendar3"></i> 16th February</li>
<li><a href="#"><i class="icon-comments"></i> 19</a></li>
</ul>
<div class="entry-content">
<a href="#" class="more-link">Read more</a>
</div>
</div>
</div>
</div>
<div class="ipost col-md-6 bottommargin clearfix">
<div class="row">
<div class="col-lg-6">
<div class="entry-image nobottommargin">
<a href="#"><img src="views/demos/travel/images/blog/3.jpg" alt="Paris"></a>
</div>
</div>
<div class="col-lg-6" style="margin-top: 20px;">
<span class="before-heading">Tincidunt</span>
<div class="entry-title">
<h3><a href="#">Maecenas id tellus sed neque tincidunt commodo</a></h3>
</div>
<ul class="entry-meta clearfix">
<li><i class="icon-calendar3"></i> 16th February</li>
<li><a href="#"><i class="icon-comments"></i> 19</a></li>
</ul>
<div class="entry-content">
<a href="#" class="more-link">Read more</a>
</div>
</div>
</div>
</div>
<div class="ipost col-md-6 bottommargin clearfix">
<div class="row">
<div class="col-lg-6">
<div class="entry-image nobottommargin">
<a href="#"><img src="views/demos/travel/images/blog/4.jpg" alt="Paris"></a>
</div>
</div>
<div class="col-lg-6" style="margin-top: 20px;">
<span class="before-heading">Lorem Efficitur</span>
<div class="entry-title">
<h3><a href="#">Deget tristique lorem efficitur vitae</a></h3>
</div>
<ul class="entry-meta clearfix">
<li><i class="icon-calendar3"></i> 16th February</li>
<li><a href="#"><i class="icon-comments"></i> 19</a></li>
</ul>
<div class="entry-content">
<a href="#" class="more-link">Read more</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="section topmargin-lg footer-stick">
<div class="container center clearfix">
<div class="heading-block bottommargin-sm nobottomborder">
<span class="before-heading color">Start a long term rental, save with our rates</span>
<h2>Long Term Rental</h2>
</div>
<p class="lead">Feugiat augue tincidunt, rhoncus mauris. Nulla facilisi. In hac habitasse platea dictumst. Vestibulum rhoncus justo tortor, non molestie ligula tristique sit amet. Praesent at libero bibendum, interdum metus id, fermentum sem. Sed ut nisl ante. Aenean ac sollicitudin dui, a laoreet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer scelerisque mattis augue sit amet aliquet..</p>
<a href="#" class="button button-rounded button-reveal tright button-xlarge topmargin-sm"><i class="icon-angle-right"></i><span>Start</span></a>
</div>
</div>
</div>
</section>
<div class="common-height row clearfix">
<div id="popular-dest-map" class="col-lg-8 col-padding gmap d-none d-md-block"></div>
<div class="col-lg-4 col-padding" style="background-color: #F9F9F9;">
<div class="max-height clearfix">
<div class="heading-block nobottommargin">
<h4>CONTACT US</h4>
</div>
<div class="spost col-lg-12 col-md-6 noborder noleftpadding clearfix">
<div class="col-md-10 col-10">
<label for="">Name</label>
<input type="text" value="" class="sm-form-control" name="name" placeholder="your name">
</div>
<div class="col-md-10 col-10">
<label for="">email</label>
<input type="text" value="" class="sm-form-control" name="email" placeholder="your email">
</div>
<div class="col-md-10 col-10">
<label for="">message</label>
<textarea class="sm-form-control" rows=5 >your message</textarea>

</div>
</div>
<div class="clearfix">	</div>
<div class="col-md-12">
<button class="button button-3d nomargin rightmargin-sm">SEND </button>
</div>



</div>
</div>
</div>
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

<script data-cfasync="false" src="views/demos/travel/js/email-decode.min.js"></script><script src="views/js/jquery.js"></script>
<script src="views/js/plugins.js"></script>

<script src="views/demos/travel/js/datepicker.js"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
<script src="views/js/jquery.gmap.js"></script>

<script src="views/js/functions.js"></script>
<script>

		$(function() {
			$('.travel-date-group').datepicker({
				autoclose: true,
				startDate: "today"
			});
		});

		jQuery(window).on( 'load', function(){

			jQuery('#popular-dest-map').gMap({
				address: 'Spain',
				maptype: 'ROADMAP',
				zoom: 2,
				markers: [
					{
						address: "Melbourne, Australia",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Ibiza, Spain",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "New York",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Rio de Janeiro, Brazil",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Moscow, Russia",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Rome, Italy",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "New Delhi, India",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Bangkok, Thailand",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Dubai",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					},
					{
						address: "Cape Town, South Africa",
						icon: {
							image: "images/icons/map-icon-red.png",
							iconsize: [32, 39],
							iconanchor: [16,36]
						}
					}
				],
				doubleclickzoom: false,
				controls: {
					panControl: false,
					zoomControl: true,
					mapTypeControl: false,
					scaleControl: false,
					streetViewControl: false,
					overviewMapControl: false
				},
				styles: [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]
			});
		});

	</script>
</body>
</html>