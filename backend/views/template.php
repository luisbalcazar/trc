<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../backend/assets/images/favicon.png">
    <title>CMS Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="../backend/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
     <link href="../backend/assets/plugins/morrisjs/morris.css" rel="stylesheet">
     <link href="../backend/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet">
     <link href="../backend/assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet">
     
     <link rel="stylesheet" href="../backend/assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <link href="../backend/views/css/style.css" rel="stylesheet">
    <link href="views/css/sweetalert.css" rel="stylesheet">
    <link href="views/css/style2.css" rel="stylesheet">
     <link href="views/css/slides.css" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="../backend/views/css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="../backend/assets/plugins/jquery/jquery.min.js"></script>
    <script src="views/js/sweetalert.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:/ -->
    <!--[if lt IE 9]>
    <script src="https:/oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:/oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
	<!--====  FONDO DE IMAGEN LOGIN  ====-->
	<!-- <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../backend/assets/images/background/login-register.jpg);"> -->
		<?php
        
			$modulos = new Enlaces();
			$modulos -> enlacesController();
		
		?>
	<!-- </section> -->
		<!--====  Fin de COLUMNA CONTENIDO  ====-->

		

	<script src="views/js/script.js"></script>
    <script src="views/js/ajax.js"></script>
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/gestorSlide.js"></script>
	<script src="views/js/gestorArticulos.js"></script>
	<script src="views/js/gestorGaleria.js"></script>
	<script src="views/js/gestorVideos.js"></script>
	<script src="views/js/gestorMensajes.js"></script>
	<script src="views/js/gestorPerfiles.js"></script>
    <script src="views/js/gestorCategorias.js"></script>
    <script src="views/js/jquery-ui.min.js"></script>
    <script src="views/js/jFriendly.jquery.js"></script>
    
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../backend/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../backend/views/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../backend/views/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../backend/views/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../backend/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../backend/views/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../backend/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!--######################-->
       <!--morris JavaScript -->
    <script src="../backend/assets/plugins/raphael/raphael-min.js"></script>
    <script src="../backend/assets/plugins/morrisjs/morris.min.js"></script>
    <!-- sparkline chart -->
    <script src="../backend/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../backend/views/js/dashboard4.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../backend/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../backend/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../backend/assets/plugins/dropify/dist/css/dropify.min.css">
    
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="../backend/assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="../backend/assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="../backend/assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="../backend/assets/plugins/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                valid_elements : '*[*]',
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
    <script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();


    });
    // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    </script>
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="../backend/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

       
        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
    <script src="../backend/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    
</body>

</html>