
<!-- nav -->
	<nav class="ow-navigation sticky-top navbar navbar-default navbar-light bg-light navbar-expand-lg">
					
		<a href="index.php" class="navbar-brand">
			<img src="views/images/logo.png" width="70" height="70">
		</a>

		<button class="navbar-toggler" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button" aria-label="Toggle navigation">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon"></span>
		</button>
					
		<!-- Menu Icon -->
		<div class="menu-icon">
			<div class="search">	
				<a href="#" id="search" title="Search"><img src="views/images/search-ic.png" alt="Search" /></a>
			</div>
		</div><!-- Menu Icon /- -->

		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav mr-auto mt-2 mt-lg-0">
                     <?php
                             $mostrarArticulo = new MenuController();
                             $mostrarArticulo -> mostrarMenuController();
                     ?>
							
			</ul>
			
		</div><!--/.nav-collapse -->

	</nav><!-- nav /- -->
	<!-- Search Box -->
	<div class="search-box">
		<span><i class="icon_close"></i></span>
		<form><input type="text" class="form-control" placeholder="Enter a keyword and presenter..." /></form>
	</div><!-- Search Box /- -->
			