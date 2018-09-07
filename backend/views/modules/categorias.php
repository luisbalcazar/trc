<?php
        
        if(!$_SESSION["validar"]){

            header("location:ingreso");

            exit();

        }
        include "views/modules/cabezote.php";
        include "views/modules/botonera.php";
        

    ?> 
    <div id="main-wrapper">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Categorías</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item">Categorías</li>
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
                        <div class="card" id="card-lista">
                            <div class="card-body">
                                <h4 class="card-title">Listado de Categorías</h4>
                                <div class="trans text-right">     
                                    <!-- <a href="modelosAgregar" class="btn btn-success waves-effect waves-light">Nuevo Modelo</a> -->
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10">ID</th>
                                                <th>Categoría</th>
                                                <th width="15">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php

                                          $mostrarArticulo = new GestorCategoriasController();
                                          $mostrarArticulo -> mostrarCategorias();
                                          // $mostrarArticulo -> borrarModeloController();
                                          // $mostrarArticulo -> editarModeloController();
                                         

                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="card-editar" style="display: none;">
                            <div class="card-body">
                                <h4 class="card-title text-center"><span id="titulo"></span>  
                                    <a href="#" class="float-right back-lista"><i class="fa fa-arrow-left"></i></a>
                                </h4>
                                <div class="trans text-right">     
                                    <!-- <a href="modelosAgregar" class="btn btn-success waves-effect waves-light">Nuevo Modelo</a> -->
                                </div>
                                <h4>Tarifas</h4>
                                <hr>
                                <form id="form-tarifas-editar">
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
                                                    <input name="semana" type="text" id="semana" class="form-control" placeholder="semana">
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tarifa Mes</label>
                                                    <input name="mes" type="text" id="mes" class="form-control"  placeholder="mes">
                                                </div>
                                        </div>
                                    </div>
                                </form>
                                    

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success guardarTarifa"> <i class="fa fa-check guardarTarifa"></i> Guardar</button>
                                </div>

                                <hr>
                                <h4 id="titulo2">Cargos</h4>
                                <hr>
                                <form id="form-cargos-editar">
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
                                                <input name="refueling" type="text" id="refueling" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Rental Car Local Charge</label>
                                                <input name="localcharge" type="text" id="localcharge" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Florida Surcharge</label>
                                                <input name="surcharge" type="text" id="surcharge" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Vehicle License Fee</label>
                                                <input name="licensefee" type="text" id="licensefee" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                    
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success guardarCargos"> <i class="fa fa-check guardarCargos"></i> Guardar</button>
                                </div>                                
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
    </div>
    <!-- This is data table -->
    