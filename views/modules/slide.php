<!-- Slider Section -->
<div id="home-revslider" class="slider-section container-fluid no-padding slider_responsive">
	<!-- START REVOLUTION SLIDER 5.0 -->
	<div class="rev_slider_wrapper">
		<div id="home-slider1" class="rev_slider" data-version="5.0">

				<ul style="z-index: 0;" class="hidden-sm-down"> 
                <?php

                    $slide = new Slide();
                    $slide -> seleccionarSlideController();
                ?>
				</ul>


			<div class='container slide_form'>

				<form class='form-inline' action='search' method='POST' autocomplete='off' style='position: relative; top: -50% !important;'>

						<div class='form-group row'>

							<input type='hidden' id='categoria' name='categoria' value='1'>

							<div class='form-group col-5' >
								<span class="slide_span" style=''>LUGAR DE RECOGIDA</span><br>
								<select name='locPickup' id='locPickup' class='form-control caja' required >
									<?php 
										$locacions = new locacionController();
										$locacions -> mostrarLocacionController();
									?>

						  		</select>
						  	</div>

						  	<div class='form-group col-5 contenedor2'>
								<input type='hidden' name='Pick' id='Pick' style='margin-top: 7px;'><br>

								<span id='recogida_text' class="slide_span2">FECHA DE RECOGIDA</span><br>

								<input type='text' class='form-control caja' name='start' id='start'  required placeholder='FECHA RECOGIDA'>
							</div>

							
							<div class='form-group col-5 entregas'>
								<span class="slide_span">LUGAR DE ENTREGA</span><br>
								<select name='locDropoff' id ='locDropoff' class='form-control caja' required >";
										<?php 
										$locacions2 = new locacionController();
										$locacions2 -> mostrarLocacionController();
										?>
								</select>
							</div>

							<div class='form-group col-5 contenedor2 entregas'>
									<input type='hidden' name='Drop' id='Drop' style='margin-top: 7px;'><br>
									<span class="slide_span2">FECHA DE ENTREGA</span><br>
									<input type='text' class='form-control caja' name='end' id='end' required  placeholder='FECHA DE ENTREGA'>
							</div>
							
						</div>

						<div class="row" class="contenedor_boton" style="width: 70%; position: relative; left: -7px;">
							<button class="hello_boton" title="buscar" data-title="SEARCH">BUSCAR</button>
						</div>
            				
						
				</form>
			</div>

		</div><!-- END REVOLUTION SLIDER -->
	</div><!-- END OF SLIDER WRAPPER -->
</div><!-- Slider Section /- -->

<div class='slide_form2'>

		<div style="background-color: #f00; position:absolute; z-index:-1; top:0; left:0; right: 0; bottom:0; opacity:0.2;"></div>

		<form class='form-inline' action='search' method='POST' autocomplete='off'>
			<span style="color:#fff; font-size: 30px; letter-spacing: 5px; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; text-transform: uppercase; text-shadow: 0.8px 2px 1px #000 !important; margin-bottom: 6px;">Renta de vehiculos en Florida</span>
			<br>

			<div class='row'>

				<input type='hidden' id='categoria' name='categoria' value='1'>

				<div class='form-group col-12' style="width: 95%; margin-bottom: -3px;">
					<span class="slide_span" style=''>LUGAR DE RECOGIDA</span><br>
					<select name='locPickup2' id='locPickup2' class='form-control caja2' required>
						<?php 
							$locacions = new locacionController();
							$locacions -> mostrarLocacionController();
						?>

					</select>
				</div>

				<div class='form-group col-12'style="width: 95%;">
					<input type='hidden' name='Pick2' id='Pick2'><br>

					<span id='recogida_text' class="slide_span2">FECHA DE RECOGIDA</span><br>

					<input type='text' class='form-control caja2' name='start2' id='start2'  required placeholder='Ej: 12/09/2018 10:00'>
				</div>

								
				<div class='form-group col-12'style="width: 95%; margin-bottom: -3px;">
					<span class="slide_span">LUGAR DE ENTREGA</span><br>
					<select name='locDropoff2' id ='locDropoff2' class='form-control caja2' required >";
							<?php 
							$locacions2 = new locacionController();
							$locacions2 -> mostrarLocacionController();
							?>
					</select>
				</div>

				<div class='form-group col-12' style="width: 95%;">
						<input type='hidden' name='Drop' id='Drop'><br>
						<span class="slide_span2">FECHA DE ENTREGA</span><br>
						<input type='text' class='form-control caja2' name='end2' id='end2' required  placeholder='Ej: 12/09/2018 10:00'>
				</div>
								
			</div>
		
			<div class='row'>
				<button class=' hello_boton' title="buscar" data-title="SEARCH" style="margin-top: 25px"> BUSCAR</button>
			</div>
							
		</form>
	
</div>
                        