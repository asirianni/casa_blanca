<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>CASA BLANCA | Ingresar</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/templatehome/css/flexslider.css" type="text/css" media="screen" /> <!-- Flexslider-CSS -->
      <link href="<?php echo base_url()?>recursos/plugins/templatehome/css/font-awesome.css" rel="stylesheet"><!-- Font-awesome-CSS --> 
      <link href="<?php echo base_url()?>recursos/plugins/templatehome/css/style.css" rel='stylesheet' type='text/css'/><!-- Stylesheet-CSS -->
      <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700" rel="stylesheet">
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>	
    </head>
<body class="hold-transition login-page" style="background-color: #dd4b39;">
    
    <h1></h1>
     
    <div class="main-agile">
        <div class="alert-close"> </div>
            <div class="content-wthree">
                <div class="about-middle">
                    <section class="slider">
                    <div class="flexslider">
                        <h2 style="text-align: center !important;">Ofertas del Mes!</h2>
                        <ul class="slides">

                            <?php

                                foreach ($home_ofertas as $value) {
                                    echo 
                                    '<li>
                                        <div class="banner-bottom-2">                   
                                            <div class="about-midd-main">
                                                    <img class="img-responsive" src="'.base_url().'recursos/images/home_ofertas/'.$value["imagen"].'" alt=" " class="">
                                                    <h4>'.$value["titulo"].'</h4>
                                                    <p>'.$value["descripcion"].'</p>
                                            </div>
                                        </div>
                                    </li>';
                                }
                            ?>
                        </div>
                        <div class="clear"> </div>
                    </section>
		</div>
		<div class="new-account-form">
                 
                    <h2 class="text-center" style="background-color: #ffffff; text-align: center !important;">
                    <img height="150" src="<?php echo base_url() ?>/recursos/images/<?php echo $logo ?>"> 
                </h2>
                    <form action="<?php echo base_url()?>index.php/Welcome/index" method="post">
                        <div class="inputs-w3ls">
                            <p>Email</p>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input type="email" name="correo" class="email" placeholder="Correo" required="true">
                        </div>
                        <div class="inputs-w3ls">
                            <p>Password</p>
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            <input type="password" name="password" class="password" placeholder="Contraseña" required="true">	
                        </div>
                        <label class="anim">
                                <a href="<?php echo base_url()?>index.php/Welcome/olvide_mis_datos">Olvide mi datos</a><br>
                        </label>
                        <div class="col-xs-12">
                            <?php for($i=0;$i < count($mensajes_error);$i++)
                            {
                               echo "<p class='mensaje_error'>".$mensajes_error[$i]."</p>";
                            }?>
                        </div>
                        <div class="col-xs-12">
                            <p class='mensaje_success'><?php echo $mensaje_success?></p>
                        </div>
                        <div class="col-xs-12" style="text-align: center !important;">
                            <input type="submit" value="Ingresar">  
                        </div>
                    </form> 
		</div>
		<div class="clear"> </div>
		</div>
	</div>

    <script src="<?php echo base_url()?>recursos/plugins/templatehome/js/jquery.min.js"></script>
    <script>$(document).ready(function(c) {
                    $('.alert-close').on('click', function(c){
                            $('.main-agile').fadeOut('slow', function(c){
                                    $('.main-agile').remove();
                            });
                    });	  
            });
    </script>
	<!-- FlexSlider -->
    <script defer src="<?php echo base_url()?>recursos/plugins/templatehome/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
            $(function(){

            });
            $(window).load(function(){
              $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                      $('body').removeClass('loading');
                    }
              });
            });
      </script>
    <!-- FlexSlider -->
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
    (function(){ var widget_id = '5NG0U82TVz';var d=document;var w=window;function l(){
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
    <!-- {/literal} END JIVOSITE CODE -->

    
    </body>
</html>
