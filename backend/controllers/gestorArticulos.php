<?php

class GestorArticulos{

	#MOSTRAR IMAGEN ARTÍCULO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/articulos/temp/articulo".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);

			echo $ruta;
		}

	}

	#VALIDAR ARTICULO
	#-----------------------------------------------------------------------
	
		public function noVacio ($data){
			$data = $_POST['tituloArticulo'];
			if(empty($data)) {
				return false;	
			}return true;
		}

		public function permitidos ($data){
			$permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNOPQRSÑTUVWXYZ0123456789áéíóúÁÉÍÓÚ-_"; 
			if(strlen($data)<3 || strlen($data)>20){ 
				return false;
		    }else{
		   		for ($i=0; $i<strlen($data); $i++){ 
		            if (strpos($permitidos, substr($data,$i,1))===false){ 
		           		return false; 
		       		} 
		   		}
		   	}//este es el que cierra el else 
		   return true; 
	    }	
	

	#GUARDAR ARTICULO
	#-----------------------------------------------------------

	public function guardarArticuloController(){

		if(isset($_POST["tituloArticulo"])){

			$imagen = $_FILES["imagen"]["tmp_name"];
			$aleatorio = mt_rand(100, 999);

			$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";

			if (move_uploaded_file($imagen,$ruta)) {

				$borrar = glob("views/images/articulos/temp/*");

				foreach($borrar as $file){

				unlink($file);

			}
			}

			
			if ($_POST['estadoArticulo'] == "on") {
				$estado = 1;
			};
			if ($_POST['comentarios'] == "on") {
				$comentarios = 1;
			};


			$datosController = array("titulo"=>$_POST["tituloArticulo"],
								     "subtitulo"=>$_POST["subtituloArticulo"],
				                     "url"=>$_POST["url"],
				                     "idcategoria"=>$_POST["categoriaArticulo"],
				                     "fecha"=>$_POST["fechaArticulo"],
				                     "extracto"=>$_POST["extracto"],
				                     "contenido"=>$_POST["cuerpo"],
				                     "estadoArticulo"=>$estado,
			 	                      "ruta"=>$ruta,
			 	                      "etiquetas"=>$_POST["etiquetas"],
			 	                  	 "comentarios"=>$comentarios,
			 	                      "formato"=>$_POST["formato"]);

			$respuesta = GestorArticulosModel::guardarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){
				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
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

	public function mostrarArticulosController(){

		$respuesta = GestorArticulosModel::mostrarArticulosModel("articulos");		

		foreach($respuesta as $row => $item) {
			$newDate = date("d-m-Y", strtotime($item["fecha"]));
			echo ' 
			 <tr>
                <td>'.$item["id"].'</td>
                <td>'.$item["titulo"].'</td>
                <td>'.$item["categoria"].'</td>
                <td>'.$newDate.'</td>
                <td>
                <a href="articulosEditar_'.$item["id"].'"><button type="button" class="btn waves-effect waves-light btn-xs btn-info"><i class="fa fa-edit"></i></button><a>
                <a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'"><button type="button" class="btn waves-effect waves-light btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
                
                </td>
            </tr>';

		}

	}

#MOSTRAR Formatos
	#-----------------------------------------------------------

	public function mostrarFormatosController($id){

		$respuesta = GestorArticulosModel::mostrarFormato("formato");		
		foreach($respuesta as $row => $item) {

			if ($id == 0) {
				echo '
				<option value="'.$item["idformato"].'">'.$item["formato"].'</option>';
			} else {
				if ($item["idformato"] == $id) {$chequeado = ' selected ';} else {$chequeado = "";} 
				echo '
				<option value="'.$item["idformato"].'" '.$chequeado.' >'.$item["formato"].'</option>';
			}

		}


	}
	#MOSTRAR ARTICULOS
	#-----------------------------------------------------------

	public function mostrarCategoriasController($id){
		$respuesta = GestorArticulosModel::mostrarCategorias("categorias");		
		foreach($respuesta as $row => $item) {

			if ($id == 0) {
				echo '
				<option value="'.$item["idcategoria"].'">'.$item["categoria"].'</option>';
			} else {
				if ($item["idcategoria"] == $id) {$chequeado = ' selected ';} else {$chequeado = "";} 
				echo '
				<option value="'.$item["idcategoria"].'" '.$chequeado.' >'.$item["categoria"].'</option>';
			}

		}

	}

	

	#LLENAR ARTICULOS
	#-----------------------------------------------------------

	public function llenarArticuloController($id){

		$respuesta = GestorArticulosModel::llenarArticulosModel("articulos", $id);		

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

	public function borrarArticuloController(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];

			$respuesta = GestorArticulosModel::borrarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
							  } 
					});


				</script>';

			}
		}

	}

	#ACTUALIZAR ARTICULO
	#-----------------------------------------------------------

	public function editarArticuloController(){

		$ruta = "";

		if(isset($_FILES["imagen"]["tmp_name"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			if ($_POST["nuevaFoto"] == "Nueva") {
	
				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";

				if (move_uploaded_file($imagen,$ruta)) {

					$borrar = glob("views/images/articulos/temp/*");

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

			if (isset($_POST['estadoArticulo'])) {
				$estado = 1;
			} else { $estado = 0; }
			if (isset($_POST['comentarios'])) {
				$comentarios = 1;
			} else {$comentarios = 0;}

			//var_dump($ruta);
			$datosController = array("titulo"=>$_POST["tituloArticulo"],
								     "subtitulo"=>$_POST["subtituloArticulo"],
				                     "url"=>$_POST["url"],
				                     "idcategoria"=>$_POST["categoriaArticulo"],
				                     "fecha"=>$_POST["fechaArticulo"],
				                     "contenido"=>$_POST["cuerpo"],
				                     "extracto"=>$_POST["extracto"],
			 	                      "ruta"=>$ruta,
			 	                      "etiquetas"=>$_POST["etiquetas"],
			 	                      "formato"=>$_POST["formato"],
			 	                      "estadoArticulo"=>$estado,
			 	                      "comentarios"=>$comentarios,
									 "id"=>$_POST["id"]
			 	                  );

			$respuesta = GestorArticulosModel::editarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
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