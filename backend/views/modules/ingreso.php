<?php

                        $ingreso = new Ingreso();
                        $ingreso -> ingresoController();
                        if (!$_POST) {
                  
    ?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" id="formIngreso" onsubmit="return validarIngreso()">
                    <a href="javascript:void(0)" class="text-center db"><img src="views/images/logo-icon.png" alt="Home" /><br/><img src="views/images/logo-text.png" alt="Home" /></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" name="usuarioIngreso" type="text" required="" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="passwordIngreso" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Recordar</label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Recuperar Password?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                        </div>
                    </div>
                    
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <a href="pages-register2.html" class="text-primary m-l-5"><b>ayuda</b></a>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
<?php } ?>