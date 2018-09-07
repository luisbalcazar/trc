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
        

    ?> 
<link href="../backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <div id="main-wrapper">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Nuevo Modelo</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item">Modelos</li>
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
                                                    <input title="se necesita un Nombre"  name="modelo" type="text" id="modelo" class="form-control" placeholder="Modelo" required>
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
                                                        $mostrarModelos -> mostrarModelosCategoriasController(0);
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
                                                        $mostrarMarcas -> mostrarMarcasController(0);
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
                                                        <input name="hora" type="text" id="hora" class="form-control"  placeholder="hora">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Día</label>
                                                        <input name="dia" type="text" id="dia" class="form-control"  placeholder="dia">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Semana</label>
                                                        <input name="semana" type="text" id="semana" class="form-control"  placeholder="semana">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tarifa Mes</label>
                                                        <input name="mes" type="text" id="mes" class="form-control"  placeholder="mes">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Publicado</label>
                                                    <input type="checkbox" name="estado" checked="" class="js-switch" data-color="#009efb" data-switchery="true" style="display: none;">
                                                    
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Automático</label>
                                                    <input type="checkbox" name="automatico"  checked="" class="js-switch" data-color="#009efb" data-switchery="true" style="display: none;">
                                                    
                                                </div> 
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Aire Acondicionado</label>
                                                    <input type="checkbox" name="aire" checked="" class="js-switch" data-color="#009efb" data-switchery="true" style="display: none;">
                                                    
                                                </div> 
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Puestos</label>
                                                        <select name="puestos"  id="puestos" class="form-control" >
                                                                <option>2</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                                <option>13</option>
                                                                <option>14</option>
                                                                <option>15</option>
                                                                <option>16</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Maleta</label>
                                                        <select name="maleta"  id="maleta" class="form-control" >
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Tanque</label>
                                                        <select name="tanque"  id="tanque" class="form-control" >
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Cargos</h4>
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Llantas/Batería</label>
                                                        <input name="llantas_impuesto" type="text" id=" llantas_impuesto" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Refueling</label>
                                                        <input name="refueling" type="text" id="refueling" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Rental Car Local Charge</label>
                                                        <input name="localcharge" type="text" id="localcharge" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Florida Surcharge</label>
                                                        <input name="surcharge" type="text" id="surcharge" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Vehicle License Fee</label>
                                                        <input name="licensefee" type="text" id="licensefee" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>INSURANCE</h4>
                                        <div class="row"> 
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Basic</label>
                                                        <input name="basic" type="text" id="localcharge" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Cover</label>
                                                        <input name="full" type="text" id="surcharge" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">V.I.P.</label>
                                                        <input name="vip" type="text" id="licensefee" class="form-control"  placeholder="0,00">
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
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
                                                <div class="form-group">
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Unidades Disponibles</label>
                                                        <select name="unidades"  id="unidades" class="form-control" >
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>

                                                        </select>
                                                    </div>
                                                     
                                                    <small class="form-control-feedback"> Ingrese el número de unidades de este modelo que estén disponibles </small> </div>
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

                                    $crearModelo = new GestorModelos();
                                    $crearModelo -> guardarModelosController();

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
   <script type="text/javascript">
       $(document).ready(function() {

           $("#modelo").jFriendly("#url",true);

        });
   </script>
    