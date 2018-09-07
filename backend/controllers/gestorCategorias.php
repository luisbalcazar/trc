<?php 

class GestorCategoriasController{
	public function mostrarCategorias(){

		$respuesta = GestorCategoriasModelo::mostrarCategorias();		

		foreach($respuesta as $row => $item) {

			echo ' 
			 <tr>
                <td>'.$item["idmodelos_categorias"].'</td>
                <td id="n'.$item["idmodelos_categorias"].'">'.$item["modelo_categoria"].'</td>
                <td>
                	<button type="button" class="btn waves-effect waves-light btn-xs btn-info editarCategoria" accesskey="'.$item["idmodelos_categorias"].'">
                		<i class="fa fa-edit editarCategoria"></i>
                	</button>
                </td>
            </tr>';

		}

	}

	public function actualizarTarifaCategoria(){
		$respuesta = GestorCategoriasModelo::actualizarTarifaCategoria();
		$array = [];
		if ($respuesta == "ok") {

			$array["status"] = "ok";

			return $array;
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Ha ocurrido un error";
			return $array;
		}
	}

	public function actualizarCargosCategoria(){
		$respuesta = GestorCategoriasModelo::actualizarCargosCategoria();
		$array = [];
		if ($respuesta == "ok") {

			$array["status"] = "ok";

			return $array;
		}else{
			$array["status"] = "error";
			$array["mensaje"] = "Ha ocurrido un error";
			$array["resp"] = $respuesta;
			return $array;
		}
	}
}