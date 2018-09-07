<?php
if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

if(!$_SESSION["validar"]){

  header("location:ingreso");

  exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>
<div id="main-wrapper">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Reservaciones</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item">Reservas</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Listado de Reservas</h4>
                              
    </div>
<!--=====================================
SUSCRIPTORES         
======================================-->

<div id="suscriptores" class="col-lg-12 col-md-10 col-sm-9 col-xs-12">
 
 <div>

	<table id="myTable" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Desde</th>
        <th>Hasta</th>
        <th>Email</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  
      <?php

      $inscripciones = new OrdenesController();
      $inscripciones -> mostrarOrdenesController();
      $inscripciones -> borrarOrdenesController();

      ?>

    </tbody>
  </table>
  </div>

</div>


<!--====  Fin de SUSCRIPTORES  ====-->
</div>
                        </div>
                    </div>
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
<script language="javascript">

 $(function() 
  {

  var datos = new FormData();

  datos.append("revisionInscripcion", 1);

  $.ajax({
      url:"views/ajax/gestorInscripcion.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){}

    });
})

</script>