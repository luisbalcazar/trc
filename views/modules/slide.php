<!-- Slider Section -->
<div id="home-revslider" class="slider-section container-fluid no-padding ">
	<!-- START REVOLUTION SLIDER 5.0 -->
	<div class="rev_slider_wrapper">
		<div id="home-slider1" class="rev_slider" data-version="5.0">

			<ul style="z-index: 0;"> 
                <?php

                    $slide = new Slide();
                    $slide -> seleccionarSlideController();
                ?>
			</ul>

			<div class='container' style='position: relative; top: 45%; left: -18%; width: 50%; z-index: 1 !important;'>
				<form class='form-inline' action='search' method='POST' autocomplete='off' style='position: relative; top: -50% !important;'>

						<div class='form-group row'>

							<input type='hidden' id='categoria' name='categoria' value='1'>

							<div class='form-group col-5' >
								<span style='font-size: 16px; font-weight: bold; text-shadow: 0.5px 0px 1px #000 !important; color: #EEE; position: relative; bottom: 7px;'>LUGAR DE RECOGIDA</span><br>
								<select name='locPickup' id='locPickup' class='form-control caja' required >";
									<?php 
										$locacions = new locacionController();
										$locacions -> mostrarLocacionController();
									 ?>

						  		</select>
						  	</div>

						  	<div class='form-group col-5 contenedor2'>
								<input type='hidden' name='Pick' id='Pick' style='margin-top: 7px;'><br>

								<span id='recogida_text' style='font-size: 16px; font-weight: bold; text-shadow: 0.5px 0px 1px #000 !important; color: #EEE; position: relative; bottom: 9px;'>FECHA DE RECOGIDA</span><br>

								<input type='text' class='form-control caja' name='start' id='start'  required placeholder='FECHA RECOGIDA'>
							</div>

							
							<div class='form-group col-5'>
								<span style='font-size: 16px; font-weight: bold; text-shadow: 0.5px 0px 1px #000 !important; color: #EEE; position: relative; bottom: 7px;'>LUGAR DE ENTREGA</span><br>
								<select name='locDropoff' id ='locDropoff' class='form-control caja' required >";
										<?php 
										$locacions2 = new locacionController();
										$locacions2 -> mostrarLocacionController();
										?>
								</select>
							</div>

							<div class='form-group col-5 contenedor2' >
									<input type='hidden' name='Drop' id='Drop' style='margin-top: 7px;'><br>
									<span style='font-size: 16px; font-weight: bold; text-shadow: 0.5px 0px 1px #000 !important; color: #EEE; position: relative; bottom: 9px;'>FECHA DE ENTREGA</span><br>
									<input type='text' class='form-control caja' name='end' id='end' required  placeholder='FECHA DE ENTREGA'>
							</div>
							
						</div>

						<div class='row'>
							<button class='btn btn-lg hello_boton'> BUSCAR</button>
						</div>
							
				</form>
			</div>

		</div><!-- END REVOLUTION SLIDER -->
	</div><!-- END OF SLIDER WRAPPER -->
</div><!-- Slider Section /- -->
                        