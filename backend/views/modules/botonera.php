	<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo $_SESSION["photo"];?>" alt="user" /> 
                           
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5><?php echo $_SESSION["usuario"];?></h5>
                            <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                            <a href="salir" class="" data-toggle="tooltip" title="Cerrar Sesión"><i class="mdi mdi-power"></i></a>

                        <div class="dropdown-menu animated flipInY">
                        <!-- text--> 
                        <a href="perfil" class="dropdown-item"><i class="ti-user"></i> Mi Perf&iacute;l</a>
                        <!-- text-->  
                        <a href="salir" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                        <!-- text-->  
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap">MENÚ</li>
                        <li> <a class="waves-effect waves-dark" href="inicio" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Inicio</span></a>
                        </li>
                        </li>
                        <li> <a href="modelos" aria-expanded="false"><i class="fa fa-car"></i><span class="hide-menu">Modelos</span></a>
                            
                        </li>
                        <li> <a href="categorias" aria-expanded="false"><i class="fa fa-car"></i><span class="hide-menu">Categorías</span></a>
                            
                        </li>
                        <li> <a href="locacion" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="hide-menu">Locaciones</span></a>
                            
                        </li>
                        <li> <a href="temporadas" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Temporadas</span></a>
                            
                            </li>
                         <li> <a href="slide" aria-expanded="false"><i class="fa fa-image"></i><span class="hide-menu">SlideShow</span></a>
                            
                        </li>
                         </li>
                         <li> <a href="galeria" aria-expanded="false"><i class="fa fa-camera"></i><span class="hide-menu">Multimedia</span></a>
                            
                        </li>
                        <li> <a class="waves-effect waves-dark" href="articulos" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Artículos</span></a>
                            
                        </li>
                            
                        <li> <a class="waves-effect waves-dark" href="menu" aria-expanded="false"><i class="fa  fa-sitemap"></i><span class="hide-menu">Menú</span></a>
                            
                        </li>
                         <li> <a class="waves-effect waves-dark" href="archivos" aria-expanded="false"><i class="fa  fa-archive"></i><span class="hide-menu">Archivos</span></a>
                            
                        </li>
                        <li> <a class="waves-effect waves-dark" href="ordenes" aria-expanded="false"><i class="fa fa-pencil-square-o"></i><span class="hide-menu">Ordenes</span></a>
                            
                        </li>
                        <li> <a class="waves-effect waves-dark" href="suscriptores" aria-expanded="false"><i class="fa fa-rss"></i><span class="hide-menu">Suscriptores</span></a>
                            
                        </li>
                        <li> <a class="waves-effect waves-dark" href="salir" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">Salir</span></a>
                            
                        </li>
                        
                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->