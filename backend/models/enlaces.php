<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if($enlaces == "inicio" ||
		   $enlaces == "ingreso" ||
		   $enlaces == "slide" ||
		   $enlaces == "articulos" ||
		   $enlaces == "articulosAgregar" ||
		   $enlaces == "articulosEditar" ||
		   $enlaces == "menu" || //agregue el enlace hacia menú
		   $enlaces == "galeria" ||
		   $enlaces == "locacion" ||
		   $enlaces == "videos" ||
		   $enlaces == "suscriptores" ||
		   $enlaces == "ordenes" ||
		   $enlaces == "mensajes" ||
		   $enlaces == "perfil" ||
		   $enlaces == "inscripciones" ||
		   $enlaces == "archivos" ||
		   $enlaces == "modelos" ||
		   $enlaces == "categorias" ||
		   $enlaces == "modelosAgregar" ||
		   $enlaces == "modelosEditar" ||
		   $enlaces == "ordenesVer" ||
		   $enlaces == "temporadas" ||
		   $enlaces == "salir"){

			$module = "views/modules/".$enlaces.".php";
		}	

		else if($enlaces == "index"){
			$module = "views/modules/ingreso.php";
		}

		else{
			$module = "views/modules/ingreso.php";		
		}

		return $module;

	}


}