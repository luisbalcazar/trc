<?php

        if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

        if(!$_SESSION["validar"]){

            //@header("location:ingreso");

            exit();

        }
        include "views/modules/cabezote.php";
        include "views/modules/botonera.php";
        
        $orden = new OrdenesController();
        $arreglo = $orden -> mostrarDetalleOrdenes($_GET["id"]);
    ?> 
<div class="page-wrapper" style="min-height: 542px;">

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>ORDEN</b> 
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger"><?php echo $_GET["id"];?></b></h3>
                                            <p class="text-muted m-l-5"><?php echo $arreglo["modelo"];  ?></p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>Información del Cliente</h3>
                                            <h4 class="font-bold">Nombre: <?php echo $arreglo["nombre"];  ?></h4>
                                            <h4>Telefono: <?php echo $arreglo["telefono"];  ?></h4>
                                            <h4>Email: <?php echo $arreglo["email"];  ?></h4>
                                            <h4>Licencia: <?php echo $arreglo["licencia"];  ?></h4>
                                            <h4><b>Fecha Inicio :</b> <i class="fa fa-calendar"></i> <?php echo $arreglo["finicio"];  ?></h4>
                                            <h4><b>Fecha Fin :</b> <i class="fa fa-calendar"></i> <?php echo $arreglo["ffin"];  ?></h4>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Descripción</th>
                                                    <th class="text-right">Monto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Renta <?php echo $arreglo["duracion"];  ?></td>
                                                    <td class="text-right"> $<?php echo $arreglo["subtotal"];  ?> </td>
                                                </tr>   
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Cargos</td>
                                                    <td class="text-right"> $<?php echo $arreglo["cargos"];  ?> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Impuestos</td>
                                                    <td class="text-right"> $<?php echo $arreglo["impuesto"];  ?> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Seguro <?php echo $arreglo["segurotipo"];  ?></td>
                                                    <td class="text-right"> $<?php echo $arreglo["seguroMonto"];  ?> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <h4>Extras</h4>
                                        <h5>SILLA: <?php echo $arreglo["silla"];  ?></h5>
                                        <h5>GPS: <?php echo $arreglo["gps"];  ?></h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <h3><b>Total :</b>$ <?php echo $arreglo["total"] + $arreglo["seguroMonto"];  ?></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <a href="ordenes"><button class="btn btn-danger" type="button"> volver </button></a>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Imprimir</span> </button>
                                    </div>
                                </div>
                            </div>
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
        <script src="../backend/views/js/jquery.PrintArea.js" type="text/JavaScript"></script>
        <script>
        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
        </script>
    