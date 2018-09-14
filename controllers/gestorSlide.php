<link rel="stylesheet" type="text/css" href="views/style.css">	
<link rel="stylesheet" type="text/css" href="views/css/plugins.css">
<link rel="stylesheet" type="text/css" href="views/css/navigation-menu.css">
<link rel="stylesheet" type="text/css" href="views/css/shortcode.css">
<?php
//#ff061a
class Slide{

	public function seleccionarSlideController(){

		$respuesta = SlideModels::seleccionarSlideModel("slide");

		foreach ($respuesta as $row => $item){
			$imagen = substr($item["ruta"], 6);
			$titulo = $item["titulo"];
			$descripcion =$item["descripcion"];
			echo "
			<li data-transition=\"fade\" data-slotamount=\"1\"  data-easein=\"default\" data-easeout=\"default\" data-masterspeed=\"1500\" > 
			<!-- MAIN IMAGE -->
			<img class='parallax' src=\"backend/$imagen\" alt=\"home1\"/> 
			<!-- LAYER NR. 1 -->
			<div class=\"tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0 text-1 title_slide\" id=\"slide-1-layer-1\" 
				data-x=\"['left','left','left','left']\" data-hoffset=\"['165','-730','-730','-730']\" 
				data-y=\"['top','top','top','top']\"  data-voffset=\"['200','200','200','200']\" 
				data-fontsize=\"['70','100','120','140']\"
				data-lineheight=\"['100','100','100','100']\"
				data-width=\"none\"
				data-height=\"none\"
				data-whitespace=\"nowrap\"
				data-transform_idle=\"o:1;\"
				data-transform_in=\"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;\" 
				data-transform_out=\"y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;\" 
				data-mask_in=\"x:0px;y:0px;s:inherit;e:inherit;\" 
				data-mask_out=\"x:inherit;y:inherit;s:inherit;e:inherit;\" 
				data-start=\"1000\" 
				data-splitin=\"chars\" 
				data-splitout=\"none\" 
				data-responsive_offset=\"on\"
				data-elementdelay=\"0.05\"							
				style=\"z-index:6; position:relative; color:#fff; font-weight:400; letter-spacing: 7px; font-family: 'Roboto Slab', serif; text-transform: uppercase; text-shadow: 0.8px 2px 1px #000 !important;\">
				<h3>$titulo</h3>
			</div>
			<div class=\"tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0\" id=\"slide-1-layer-3\" 
				data-x=\"['left','left','left','left']\" data-hoffset=\"['165','365','365','20']\" 
				data-y=\"['top','top','top','top']\"  data-voffset=\"['290','290','290','290']\" 
				data-fontsize=\"['105','105','130','160']\"
				data-lineheight=\"['100','100','100','100']\"
				data-width=\"none\"
				data-height=\"none\"
				data-whitespace=\"nowrap\"
				data-transform_idle=\"o:1;\"
				data-transform_in=\"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;\" 
				data-transform_out=\"y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;\" 
				data-mask_in=\"x:0px;y:0px;s:inherit;e:inherit;\" 
				data-mask_out=\"x:inherit;y:inherit;s:inherit;e:inherit;\" 
				data-start=\"1000\" 
				data-splitin=\"chars\" 
				data-splitout=\"none\" 
				data-responsive_offset=\"on\"
				data-elementdelay=\"0.05\"							
				style=\"z-index:6; position:relative; color:#E20909; font-weight:700; letter-spacing: 2.1px; font-family: 'Open Sans', sans-serif; text-transform: uppercase; text-shadow: 0.5px 1px 1px #EEE !important;\" >
				<h3>$descripcion</h3>
			</div>

			
			<br class='d-none d-sm-block'>
			<br class='d-none d-sm-block'>
			<br class='d-none d-sm-block'>
		</li>
			
			";		
			
		}



	}
}
//<div class="w-100"></div>