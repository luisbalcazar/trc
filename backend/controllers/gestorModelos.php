<?php

class GestorModelos{

	#MOSTRAR IMAGEN ARTÍCULO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/modelos/temp/articulo".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);

			echo $ruta;
		}

	}

	
	#GUARDAR MODELOS
	#-----------------------------------------------------------

	public function guardarModelosController(){
		//var_dump($_POST);
		if(isset($_POST["modelo"])){

			$imagen = $_FILES["imagen"]["tmp_name"];
			$aleatorio = mt_rand(100, 999);

			$ruta = "views/images/modelos/modelo".$aleatorio.".jpg";

			if (move_uploaded_file($imagen,$ruta)) {

				$borrar = glob("views/images/modelos/temp/*");

				foreach($borrar as $file){

				unlink($file);

			}
			}

			$estado = (empty($_POST['estado'])) ? 0 : 1;
			$automatico = (empty($_POST['automatico'])) ? 0 : 1;
			$aire = (empty($_POST['aire'])) ? 0 : 1;


			$datosController = array("modelo"=>$_POST["modelo"],
								     "categoriaModelo"=>$_POST["categoriaModelo"],
				                     "marca"=>$_POST["marca"],
				                     "hora"=>$_POST["hora"],
				                     "dia"=>$_POST["dia"],
				                     "semana"=>$_POST["semana"],
				                     "puestos"=>$_POST["puestos"],
				                     "maleta"=>$_POST["maleta"],
				                     "tanque"=>$_POST["tanque"],
				                     "unidades"=>$_POST["unidades"],
				                     "mes"=>$_POST["mes"],
				                     "estado"=>$estado,
									"automatico"=>$automatico,
									"aire"=>$aire,
									"ruta"=>$ruta,
									"refueling"=>$_POST["refueling"],
									"localcharge"=>$_POST["localcharge"],
									"llantas_impuesto"=>$_POST["llantas_impuesto"],
									"surcharge"=>$_POST["surcharge"],
									"licensefee"=>$_POST["licensefee"],
									"etiquetas"=>$_POST["etiquetas"],
									"basic"=>$_POST["basic"],
									"full"=>$_POST["full"],
									"vip"=>$_POST["vip"]

			 	                  );

			$respuesta = GestorModelosModel::guardarModeloModel($datosController, "modelos");

			if($respuesta == "ok"){
				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El Modelo ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "modelos";
							  } 
					});


				</script>';
				
			}

			else{
				echo'<script>

					swal({
						  title: "ERROR!",
						  text: "¡El artículo no ha podido ser guardado!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					});


				</script>';
				echo $respuesta;

			}

		}

	}

	#MOSTRAR ARTICULOS
	#-----------------------------------------------------------

	public function mostrarModelosController(){

		$respuesta = GestorModelosModel::mostrarModelosModel("modelos");		

		foreach($respuesta as $row => $item) {
			$estado = ($item["estado"] == 1) ? "Activo" : "Inactivo";
			echo ' 
			 <tr>
                <td>'.$item["idmodelo"].'</td>
                <td>'.$item["modelo"].'</td>
                <td>'.$item["modelo_categoria"].'</td>
                <td>'.$estado.'</td>
                <td>
                <a href="modelosEditar_'.$item["idmodelo"].'"><button type="button" class="btn waves-effect waves-light btn-xs btn-info"><i class="fa fa-edit"></i></button><a>
                <a href="index.php?action=modelos&idBorrar='.$item["idmodelo"].'&rutaImagen='.$item["ruta"].'"><button type="button" class="btn waves-effect waves-light btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
                
                </td>
            </tr>';

		}

	}

#MOSTRAR Formatos
	#-----------------------------------------------------------

	public function mostrarMarcasController($id){

		$respuesta = GestorModelosModel::mostrarMarca("marcas");		
		foreach($respuesta as $row => $item) {

			if ($id == 0) {
				echo '
				<option value="'.$item["idmarca"].'">'.$item["marca"].'</option>';
			} else {
				if ($item["idmarca"] == $id) {$chequeado = ' selected ';} else {$chequeado = "";} 
				echo '
				<option value="'.$item["idmarca"].'" '.$chequeado.' >'.$item["marca"].'</option>';
			}

		}


	}
	#MOSTRAR ModeloS
	#-----------------------------------------------------------

	public function mostrarModelosCategoriasController($id){
		$respuesta = GestorModelosModel::mostrarModelosCategorias("modelos_categorias");		
		foreach($respuesta as $row => $item) {

			if ($id == 0) {
				echo '
				<option value="'.$item["idmodelos_categorias"].'">'.$item["modelo_categoria"].'</option>';
			} else {
				if ($item["idmodelos_categorias"] == $id) {$chequeado = ' selected ';} else {$chequeado = "";} 
				echo '
				<option value="'.$item["idmodelos_categorias"].'" '.$chequeado.' >'.$item["modelo_categoria"].'</option>';
			}

		}

	}

	

	#LLENAR ARTICULOS
	#-----------------------------------------------------------

	public function llenarModeloController($id){

		$respuesta = GestorModelosModel::llenarModelosModel("modelos", $id);		

		return $respuesta;
		
	}

	#CHEQUEAR 
	#-----------------------------------------------------------

	public static function chequearController($valor){

		if ($valor == 1){
			$chequeado = "checked";
		}	else {
			$chequeado ="";
		}	

		return $chequeado;
		
	}

	#BORRAR ARTICULO
	#------------------------------------

	public function borrarModeloController(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];

			$respuesta = GestorModelosModel::borrarModeloModel($datosController, "modelos");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El Modelo se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "modelos";
							  } 
					});


				</script>';

			}
		}

	}

	#ACTUALIZAR ARTICULO
	#-----------------------------------------------------------

	public function editarModeloController(){

		$ruta = "";

		if(isset($_FILES["imagen"]["tmp_name"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			if ($_POST["nuevaFoto"] == "Nueva") {
	
				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/modelos/modelo".$aleatorio.".jpg";

				if (move_uploaded_file($imagen,$ruta)) {

					$borrar = glob("views/images/modelos/temp/*");

					foreach($borrar as $file){

					unlink($file);

				}
				}
			}
				

			if($ruta == ""){

				$ruta = $_POST["fotoAntigua"];

			}

			else{

				//unlink($_POST["fotoAntigua"]);

			}

			$estado = (empty($_POST['estado'])) ? 0 : 1;
			$automatico = (empty($_POST['automatico'])) ? 0 : 1;
			$aire = (empty($_POST['aire'])) ? 0 : 1;


			$datosController = array("modelo"=>$_POST["modelo"],
								     "categoriaModelo"=>$_POST["categoriaModelo"],
				                     "marca"=>$_POST["marca"],
				                     "hora"=>$_POST["hora"],
				                     "dia"=>$_POST["dia"],
				                     "semana"=>$_POST["semana"],
				                     "puestos"=>$_POST["puestos"],
				                     "maleta"=>$_POST["maleta"],
				                     "tanque"=>$_POST["tanque"],
				                     "unidades"=>$_POST["unidades"],
				                     "mes"=>$_POST["mes"],
				                     "estado"=>$estado,
			 	                      "automatico"=>$automatico,
			 	                      "aire"=>$aire,
			 	                      "ruta"=>$ruta,
			 	                      "etiquetas"=>$_POST["etiquetas"],
			 	                      "refueling"=>$_POST["refueling"],
			 	                      "localcharge"=>$_POST["localcharge"],
			 	                      "llantas_impuesto"=>$_POST["llantas_impuesto"],
			 	                      "surcharge"=>$_POST["surcharge"],
			 	                      "licensefee"=>$_POST["licensefee"],
			 	                      "etiquetas"=>$_POST["etiquetas"],
									   "id"=>$_POST["id"],
									   "basic"=>$_POST["basic"],
									   "full"=>$_POST["full"],
									   "vip"=>$_POST["vip"]
			 	                  );

			$respuesta = GestorModelosModel::editarModeloModel($datosController, "modelos");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El Modelo ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "modelos";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

		GestorArticulosModel::actualizarOrdenModel($datos, "articulos");

		$respuesta = GestorArticulosModel::seleccionarOrdenModel("articulos");

		foreach($respuesta as $row => $item){

			echo ' <li id="'.$item["id"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
					<img src="'.$item["ruta"].'" class="img-thumbnail">
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#articulo'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="articulo'.$item["id"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["titulo"].'</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["contenido"].'</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}


	}
	
}