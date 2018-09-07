<div class="container-fluid no-padding testimonial-section">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Opiniones</h3>
					</div><!-- Section Header /- -->
					<div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-testimonial" data-slide-to="1"></li>
							<li data-target="#carousel-testimonial" data-slide-to="2"></li>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
                        <?php

                            $articulos = new Articulos();
                            $articulos -> seleccionarArticulosTestimonios();

                            ?>
						</div>
					</div>
				</div><!-- Container /- -->
			</div><!-- Testimonial Section /- -->