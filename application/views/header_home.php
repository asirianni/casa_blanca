<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Tillage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstarp-css -->
        <link href="<?php echo base_url()?>recursos/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstarp-css -->
        <!-- css -->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/style.css" type="text/css" media="all" />
        <!--// css -->
        <script src="<?php echo base_url()?>recursos/js/jquery-1.11.1.min.js"></script>
        <!--fonts-->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600' rel='stylesheet' type='text/css'>
        <!--/fonts-->
        <link href="<?php echo base_url()?>recursos/css/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="<?php echo base_url()?>recursos/js/wow.min.js"></script>
        <script>
                 new WOW().init();
        </script>
    </head>
    <body>
	<!-- banner -->
	<div class="banner <?php if(!$slider_textos){echo " a-banner";}?>">
		<!-- container -->
		<div class="container">
			<div class="header">
				<div class="head-logo">
                                    <a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>recursos/images/logo1.png" alt="" /></a>
				</div>
				<div class="top-nav">
					<span class="menu"><img src="<?php echo base_url()?>recursos/images/menu.png" alt=""></span>
					<ul class="nav1">
                                            <li class="hvr-sweep-to-bottom<?php if($home){echo " active";}?>"><a href="<?php echo base_url()?>">Home<i>Bienvenido!</i></a></li>
						<li class="hvr-sweep-to-bottom<?php if($nosotros){echo " active";}?>"><a href="<?php echo base_url()?>index.php/welcome/nosotros">Nosotros<i>Quienes Somos</i></a></li>
						<li class="hvr-sweep-to-bottom<?php if($productos){echo " active";}?>"><a href="<?php echo base_url()?>index.php/welcome/productos">Productos<i>Destacados</i></a></li>
						<li class="hvr-sweep-to-bottom<?php if($marcas){echo " active";}?>"><a href="<?php echo base_url()?>index.php/welcome/marcas">Marcas<i>Lideres</i></a></li>
						<li class="hvr-sweep-to-bottom<?php if($contacto){echo " active";}?>"><a href="<?php echo base_url()?>index.php/welcome/contacto">Contacto<i></i></a></li>
						<div class="clearfix"> </div>
					</ul>
					<!-- script-for-menu -->
							 <script>
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							</script>
						<!-- /script-for-menu -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
                
		<!-- //container -->
		<div class="container">
				<script src="<?php echo base_url()?>recursos/js/responsiveslides.min.js"></script>
					 <script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
					  </script>
                                          
                       <?php
                       if($slider_textos){
                           ?>
                            <div  id="top" class="callbacks_container">
                                 <ul class="rslides" id="slider3">
                                     <?php
                                        $html="";
                                                                foreach ($slider as $s) {
                                                                  $html.="<li>
                                                                            <div class='banner-info'>
                                                                                <h2>".$s["texto_principal"]."</h2>
                                                                                <div class='line'> </div>
                                                                                <p>".$s["leyenda"]."</p>
                                                                            </div>
                                                                        </li>";  
                                                                }
                                        echo $html;                        
                                     ?>
                                 </ul>
                            </div>               
                           <?php               
                       }
                       ?>                   
                                          
                                          
			
		</div>
	</div>