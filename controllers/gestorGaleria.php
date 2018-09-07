<?php

class Galeria{

	public function seleccionarGaleriaController(){

		$respuesta = GaleriaModels::seleccionarGaleriaModel("galeria");

		foreach ($respuesta as $row => $item){

			echo '
			<div class="col-md-3 col-sm-4 col-xs-6 portfolio-box no-padding">
					<img src="backend/'.substr($item["ruta"], 6).'" alt="Portfolio" />
					<div class="portfolio-content">
						<h3>Nuevo Modelo</h3>
						<span>2018</span>
						<ul>
							<li><a class="zoom" href="images/portfolio-2.jpg" title="Zoom"><i class="icon icon-Search"></i></a></li>
						</ul>
					</div>
				</div>
				';

		}

	}

}
