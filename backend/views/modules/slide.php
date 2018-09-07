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
<!--=====================================
SLIDE ADMINISTRABLE          
======================================-->
<div id="main-wrapper">
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Gestor de SlideShow</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                        <li class="breadcrumb-item">SlideShow</li>
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

				<div id="imgSlide" class="col-lg-12 col-md-10 col-sm-9 col-xs-12">

				<p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen (tamaño recomendado: 1800px * 597px y peso recomendado: 2MB)</p>
					
					<ul id="columnasSlide">

					<?php

					$slide = new GestorSlide();
					$slide -> mostrarImagenVistaController();

					?>
						
					</ul>

					<button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

					<button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>

				</div>

				<!--===============================================-->
				<div class="clearfix"></div>
				<div id="textoSlide" class="col-lg-12 col-md-10 col-sm-9 col-xs-12">

				<hr>
					
					<ul id="ordenarTextSlide">

					<?php

					$slide = new GestorSlide();
					$slide -> editorSlideController();

					?>

					</ul>
				</div>

		</div>
	</div>
</div>
</div>
<!--===============================================-->

<!-- <div id="slide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<hr>
	
	<ul>
       <li>
       	<img src="views/images/slide/slide01.jpg">
       	<div class="slideCaption">
       		<h3>Lorem Ipsum</h3>
	   		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
       	</div>
       </li>
       
       <li>
       	<img src="views/images/slide/slide02.jpg"> 	
       	<div class="slideCaption">
       		<h3>Lorem Ipsum</h3>
	   		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
       	</div>
       </li>
       
       <li>
       	<img src="views/images/slide/slide03.jpg">
       	<div class="slideCaption">
       		<h3>Lorem Ipsum</h3>
	   		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
       	</div>
       </li>
       
       <li>
       	<img src="views/images/slide/slide04.jpg">
       	<div class="slideCaption">
       		<h3>Lorem Ipsum</h3>
	   		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
       	</div>
       </li>

	</ul>

    <ol id="indicadores">			
		<li role-slide = "1"><span class="fa fa-circle"></span></li>
		<li role-slide = "2"><span class="fa fa-circle"></span></li>
		<li role-slide = "3"><span class="fa fa-circle"></span></li>
		<li role-slide = "4"><span class="fa fa-circle"></span></li>
	</ol>

	<div id="slideIzq"><span class="fa fa-chevron-left"></span></div>
	<div id="slideDer"><span class="fa fa-chevron-right"></span></div>

</div>

<!====  Fin de SLIDE ADMINISTRABLE  ====-->

