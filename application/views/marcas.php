<div class="products-bottom">
    <!-- container -->
    <div class="container">
            <h3 class="wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">Marcas Lideres</h3>
            <div class="products-bottom-grids">
            <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/swipebox.css">
                                            <script src="<?php echo base_url()?>recursos/js/jquery.swipebox.min.js"></script> 
                                            <script type="text/javascript">
                                                                    jQuery(function($) {
                                                                            $(".swipebox").swipebox();
                                                                    });
                                            </script>
                    <div class="gallery-grids">
                        
                        <?php
                            $html="";
                                                    foreach ($marcas_cargadas as $s) {
                                                      $html.="<div class='gallery-grid wow bounceIn animated' data-wow-delay='0.4s' style='visibility: visible; -webkit-animation-delay: 0.4s;'>
                                                                <a href='".base_url()."recursos/images/marcas/".$s["imagen"]."' class='b-link-stripe b-animate-go  swipebox'  title='".$s["titulo"]."'>
                                                                        <img src='".base_url()."recursos/images/marcas/".$s["imagen"]."' alt='' class='img-responsive'>
                                                                </a>
                                                        </div>";  
                                                    }
                            echo $html;                        
                         ?>
                        
                        
                           
                        
                            <div class="clearfix"> </div>
                    </div>
                    
            </div>
    </div>
    <!-- //container -->
</div>