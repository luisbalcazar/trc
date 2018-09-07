<?php

        session_start();

        if(!$_SESSION["validar"]){

            header("location:ingreso");

            exit();

        }
        include "views/modules/cabezote.php";
        include "views/modules/botonera.php";
        

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
                    <h3 class="text-themecolor">Nuevo Artículo</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item">Artículos</li>
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
                                        <h3 class="card-title">Complete la Información del Artículo</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Título del Artículo *</label>
                                                    <input title="se necesita un titulo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ]{1,16}" name="tituloArticulo" type="text" id="firstName" class="form-control" placeholder="Título" required>
                                                 </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Subtitulo del Artículo</label>
                                                    <input name="subtituloArticulo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ]{1,16}" type="text" class="form-control" placeholder="Subtitulo">
                                                     </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">URL del Artículo</label>
                                                    <input name="url" type="text" class="form-control" pattern="https?://.+.com" placeholder="https://nombre.com">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Categoría</label>
                                                    <select name="categoriaArticulo" class="form-control custom-select">
                                <?php 
                                    $mostrarCategorias = new GestorArticulos();
                                    $mostrarCategorias -> mostrarCategoriasController();
                                 ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Seleccione la categoría del artículo </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha de Publicación*</label>

                                                    <input name="fechaArticulo" type="date" class="form-control" placeholder="" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Estado</label>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" name="estadoArticulo" type="radio" checked class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Actívo</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Inactivo</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-12">
                                                
                                                        <h4 class="card-title">Cuerpo del Artículo</h4>
                                                        
                                                            <div class="form-group">
                                                                <textarea name="cuerpo" class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                                                            </div>
                                                        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6     col-md-6">
                                                    <label for="input-file-now">Imagen Principal del Artículo — formatos jpg o png</label>

                                                        <input type="file" id="input-file-now" class="dropify" name="imagen" accept="image/jpeg , image/png" value="2097153" /><small>Tamaño recomendado: 800px * 400px, peso máximo 2MB</small>
                                                    </div>

                                            <!--/span-->
                    <div class="col-lg-6 col-md-12">
                                <h4 class="card-title">Etiquetas</h4>
                                <h6 class="card-subtitle">Agrega las palabras claves relacionadas al artículo, separadas por coma o presionando enter</h6>
                                <div class="tags-default">
                                    <input type="text" value="" name="etiquetas" data-role="tagsinput" placeholder="add tags" /> </div>
                    </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                    <hr>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                                        <button type="button" class="btn btn-inverse">Cancelar</button>
                                    </div>
                                </form>
                                <?php

                                    $crearArticulo = new GestorArticulos();
                                    $crearArticulo -> guardarArticuloController();

                                ?>
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
   
    