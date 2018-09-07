<?php
if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

        if(!$_SESSION["validar"]){

            header("location:ingreso");

            exit();

        }
        include "views/modules/cabezote.php";
        include "views/modules/botonera.php";

        if (isset($_POST["id"])) {

            $editarModelo = new GestorModelos();
            $editarModelo -> editarModeloController($_POST["id"]);
        }

        $llenarModelo = new GestorModelos();
        $datos = $llenarModelo -> llenarModeloController($_GET['id']);

    ?> 



<link rel="stylesheet" href="../backend/assets/plugins/html5-editor/bootstrap-wysihtml5.css" /> 
<link rel="stylesheet" href="../backend/assets/plugins/dropify/dist/css/dropify.min.css">

<link href="../backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <div id="main-wrapper">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Editar Modelo</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item">Modelo</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title">Complete la Información del Modelo</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre del Modelo *</label>
                                                    <input title="se necesita un Nombre" value="<?php echo $datos["modelo"];  ?>"  name="modelo" type="text" id="modelo" class="form-control" placeholder="Modelo" required>
                                                    <input name="id" type="hidden" value="<?php echo $datos["idmodelo"];  ?>" >
                                                 </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Categoría</label>
                                                    <select name="categoriaModelo" class="form-control custom-select">
                                                    <?php 
                                                        $mostrarModelos = new GestorModelos();
                                                        $mostrarModelos -> mostrarModelosCategoriasController($datos['idmodelos_categorias']);
                                                     ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Seleccione la categoría del artículo </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Marca</label>
                                                    <select name="marca" class="form-control custom-select">
                                                    <?php 
                                                        $mostrarMarcas = new GestorModelos();
                                                        $mostrarMarcas -> mostrarMarcasController($datos["idmarca"]);
                                                     ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Seleccione la marca del artículo </small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Hora</label>
                                                        <input name="hora" value="<?php echo $datos["hora"];  ?>" type="text" id="hora" class="form-control"  placeholder="hora">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Día</label>
                                                        <input name="dia" value="<?php echo $datos["dia"];  ?>" type="text" id="dia" class="form-control"  placeholder="dia">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Semana</label>
                                                        <input name="semana" type="text" id="semana" class="form-control" value="<?php echo $datos["semana"];  ?>" placeholder="semana">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Mes</label>
                                                        <input name="mes" value="<?php echo $datos["mes"];  ?>" type="text" id="mes" class="form-control"  placeholder="mes">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Publicado</label>
                                                    <input type="checkbox" name="estado" <?php echo GestorModelos::chequearController($datos["estado"]);?> class="js-switch" data-color="#009efb" data-switchery="true" style="display: none;">
                                                    
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Automático</label>
                                                    <input type="checkbox" name="automatico"  <?php echo GestorModelos::chequearController($datos["automatico"]);?> class="js-switch" data-color="#009efb" data-switchery="true" style="display: none;">
                                                    
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Aire Acondicionado</label>
                                                    <input type="checkbox" name="aire" <?php echo GestorModelos::chequearController($datos["aire"]);?> class="js-switch" data-color="#009efb" data-switchery="true" style="display: none;">
                                                    
                                                </div> 
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Puestos</label>
                                                        <input name="puestos" value="<?php echo $datos["puestos"];  ?>" type="text"  class="form-control" >
                                                    </div>
                                                    </div>
                                            
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Maleta</label>
                                                        <input name="maleta" value="<?php echo $datos["maleta"];  ?>" type="text" class="form-control"  >
                                                    </div>
                                                    </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Tanque</label>
                                                        <input name="tanque" value="<?php echo $datos["tanque"];  ?>" type="text"  class="form-control"  >
                                                    </div>
                                                    </div>
                                        </div>
                                        </div>
                                        <hr>
                                        <h4>Cargos</h4>
                                        <hr>
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Llantas/Batería</label>
                                                        <input name="llantas_impuesto" type="text" id=" llantas_impuesto" class="form-control"  placeholder="0,00" value="<?php echo $datos["llantas_impuesto"];  ?>">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Refueling</label>
                                                        <input name="refueling" type="text" id="refueling" class="form-control"  value="<?php echo $datos["refueling"];  ?>" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Rental Car Local Charge</label>
                                                        <input name="localcharge" type="text" id="localcharge" class="form-control" value="<?php echo $datos["refueling"];  ?>">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Florida Surcharge</label>
                                                        <input name="surcharge" type="text" id="surcharge" class="form-control"  value="<?php echo $datos["surcharge"];  ?>">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Vehicle License Fee</label>
                                                        <input name="licensefee" type="text" id="licensefee" class="form-control" value="<?php echo $datos["licensefee"];  ?>">
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>INSURANCE</h4>
                                        <div class="row"> 
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Basic</label>
                                                        <input name="basic" type="text" id="localcharge" class="form-control"  placeholder="0,00" value="<?php echo $datos["basic"]; ?>">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Cover</label>
                                                        <input name="full" type="text" id="surcharge" class="form-control"  placeholder="0,00" value="<?php echo $datos["full"]; ?>">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">V.I.P.</label>
                                                        <input name="vip" type="text" id="licensefee" class="form-control"  placeholder="0,00" value="<?php echo $datos["vip"]; ?>">
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6     col-md-6">
                                                    <label for="input-file-now">Imagen Principal del Modelo — formatos jpg o png</label>

                                                        <input type="file" id="input-file-now" class="dropify" name="imagen" accept="image/jpeg , image/png" data-default-file="<?php echo $datos["ruta"]; ?>" /><small>Tamaño recomendado: 800px * 600px, peso máximo 2MB</small>
                                                    </div>
                                                        <input type="hidden" name="fotoAntigua" value="<?php echo $datos["ruta"]; ?>">
                                                        <input type="hidden" id="nuevaFoto" name="nuevaFoto" value="">

                                            <!--/span-->
                                    <div class="col-lg-6 col-md-12">
                                        <h4 class="card-title">Etiquetas</h4>
                                        <h6 class="card-subtitle">Agrega las palabras claves relacionadas al artículo, separadas por coma o presionando enter</h6>
                                        <div class="tags-default">
                                            <input type="text" value="<?php echo $datos["etiquetas"]; ?>" name="etiquetas" data-role="tagsinput" placeholder="add tags" /> </div>
                                                <div class="form-group">
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Unidades Disponibles</label>
                                                        <input name="unidades" value="<?php echo $datos["unidades"];  ?>" type="text" class="form-control"  >
                                                    </div>
                                                     
                                                    <small class="form-control-feedback"> Ingrese el número de unidades de este modelo que estén disponibles </small> 
                                                </div>
                                    </div>
                                    <hr> 
                                    <div class="col-lg-6 col-md-12">
                                       
                                    </div>

                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                    <hr>
                                   
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                                        <button type="button" class="btn btn-inverse">Cancelar</button>
                                    </div>
                                    </div>
                                </form> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Press Admin by themedesigner.in </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script>
        $( "#input-file-now").change(function() {
          $( "#nuevaFoto").val("Nueva");
        });
        
    </script>
   
    