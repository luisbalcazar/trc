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

    ?> 
<link href="../backend/assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <div id="main-wrapper">
                <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Gestor de Archivos</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="inicio">inicio</a></li>
                        <li class="breadcrumb-item">Archivos</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Subir Archivo</h4>
                                <h6 class="card-subtitle">Tamaño máximo recomendado <code>2 MB</code></h6>
                                <form action="controllers/uploadController.php" class="dropzone" method="post" enctype="multipart/form-data">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Listado de Archivos</h4>
                              
    </div>
<!--=====================================
SUSCRIPTORES         
======================================-->

<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
 
 <div>

    <table id="myTable" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  
      <?php

      $archivos = new archivosController();
      $archivos -> mostrarArchivosController();
      $archivos -> borrarArchivosController();


      ?>

    </tbody>
  </table>

  
  </div>

</div>


<!--====  Fin de SUSCRIPTORES  ====-->
</div>
                        </div>
                    </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2017 Admin Press Admin by themedesigner.in
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script src="../backend/assets/plugins/dropzone-master/dist/dropzone.js"></script>
    <script>
        $( "#input-file-now").change(function() {
          $( "#nuevaFoto").val("Nueva");
        });
        
    </script>
   
    