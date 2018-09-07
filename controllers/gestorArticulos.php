<?php

class Articulos{

	public function seleccionarArticulosCursosController(){

		$respuesta = ArticulosModels::mostrarCursos("articulos");

		foreach ($respuesta as $row => $item){

			echo '
					<div class="item">
							<div class="ed_item_img">
								<a href="'.$item["url"].'"><img src="backend/'.$item["ruta"].'" alt="item1" class="img-responsive"></a>
							</div>
							<div class="ed_item_description">
								<a href="'.$item["url"].'"><h4>'.$item["titulo"].'</h4></a>
								<p>'.$item["extracto"].'</p>
							</div>
						</div>';

		}


	}

	public function listarArticulosCursosController(){

		$respuesta = ArticulosModels::mostrarCursos("articulos");

		foreach ($respuesta as $row => $item){

			$arreglo2 = explode("/", $item["subtitulo"] );

			echo '
					<li><a href="'.$item["url"].'">'.$item["titulo"].'</a></li>';

		}


	}

	public function seleccionarArticulosCursosMController(){

		$respuesta = ArticulosModels::mostrarCursos("articulos");

		foreach ($respuesta as $row => $item){

			$arreglo2 = explode("/", $item["subtitulo"] );

			echo '

				<div class="item listing-item col-lg-3 col-md-4 col-sm-6 col-xs-10" data-listing-price="'.@$arreglo2[2].'" data-listing-titu="'.$item["titulo"].'" data-listing-fecha="'.fechas::torden($item["fecha"]).'">
					<div class="ed_item_img"><img src="backend/'.$item["ruta"].'" alt="item1" class="img-responsive" /></div>
					<div class="ed_item_description ed_most_recomended_data">
					<h4><a href="'.$item["url"].'">'.$item["titulo"].'</a><span>'.@$arreglo2[2].'&euro;</span></h4>
					<div class="course_detail">
					<div class="course_faculty"><a href="'.@$arreglo2[1].'">'.@$arreglo2[0].'</a></div>
					</div>
					<p>'.$item["extracto"].'</p>
					<a href="'.$item["url"].'" class="ed_getinvolved">leer m&aacute;s <i class="fa fa-long-arrow-right"></i></a></div>
					</div>';

		}


	}

	public function seleccionarArticulosBienvenido(){

		$respuesta = ArticulosModels::mostrarArticulo("bienvenido");

			echo '
					<div class="col-md-6 img-block">
					<h2>INICIO</h2>
					<img src="backend/'.$respuesta["ruta"].'" alt="Welcome" />
				</div>
				<div class="col-md-6">
					<div class="padding-100"></div>
					<!-- Section Header -->
					<div class="section-header">
						<h3>'.$respuesta["titulo"].'</h3>
						<p>'.$respuesta["extracto"].'</p>
						<a href="'.$respuesta["url"].'" title="Read More">leer más</a>
					</div><!-- Section Header /- -->
					<div class="padding-50"></div>
				</div>';


	}

	public function seleccionarArticulosTestimonios(){

		$respuesta = ArticulosModels::seleccionarArticulosCategoria(4);
		$clase= "item active";
		foreach ($respuesta as $row => $item){
			echo '<div class="'.$clase.'">
					<div class="testi-content">
						<span><i class="fa fa-quote-left"></i><i class="fa fa-quote-right"></i></span>
						<p>'.$item["extracto"].'</p>
						<h4><b>'.$item["titulo"].'</b>'.$item["subtitulo"].'</h4>
					</div>
				  </div>';
				  
			$clase= "item";	
		}


	}

	public function enlacesArticulosController($enlaces){

		$respuesta = ArticulosModels::seleccionarEnlacesArticulosModel("articulos" , $enlaces);

			include "views/general.php";

	}

	public function frontArticulosController($alias){

		$respuesta = ArticulosModels::mostrarArticulo($alias);
		echo $respuesta["contenido"];

	}
	

	public function mostrarCursosController($id){
		$respuesta = ArticulosModels::mostrarCursos("articulos");		
		foreach($respuesta as $row => $item) {
				echo '
				<option value="'.$item["id"].'">'.$item["titulo"].'</option>';

		}

	}

}
