<html>
    <head>
        <link rel="stylesheet" href="<?=base_url()?>recursos/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>recursos/bootstrap/css/edicion_bootstrap.css">
        
        <title>PROCESO DE PAGO ONLINE</title>
        <style>
            .resumen{
                background-color: #F9F9F9;
                padding: 20px;
                border:1px solid #CCCCCC;
            }
        </style>
    </head>
<body>
    <section class="">
        <div class="container">
            <h2 class="light text-center">Proceso de pago</h2>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div id="pago" class="resumen" style="display: none">
                            <label>PAGO PROCESADO. EN BREVE NOS COMUNICAREMOS CON USTED.</label>
                        </div>
                        <div id="resumen" class="resumen">
                            <label>FACTURA: <?php echo $factura['numero']; ?></label><br>
                            <label>CLIENTE: <?php echo $cliente['razon_social']; ?></label><br>
                            <label>FECHA FACTURA: <?php echo $factura['fecha']; ?></label><br><br><br>
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>COD</th>
                                        <th>SERVICIO</th>
                                        <th>CANT</th>
                                        <th>PRECIO</th>
                                        <th>DESC</th>	
                                    </tr>
                                </thead>

                                <tbody id="table_body">
                                    <?php
                                        foreach ($factura_detalle as $d) {
                                            echo "<tr>
                                                    <th>".$d["cod_servicio"]."</th>
                                                    <th>".$d["descripcion"]."</th>
                                                    <th>".$d["cantidad"]."</th>
                                                    <th>".$d["precio"]."</th>
                                                    <th>".$d["descuento"]."</th>  
                                                </tr>";
                                        }
                                    ?>
                                </tbody>

                                <tfoot>
                                  <tr>
                                    <!-- init_point para produccion-->
<!--                                    <td><a href="<?php //echo $preference['response']['sandbox_init_point']; ?>" name="MP-Checkout" class="lightblue-M-Ov-ArOn" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a></td>-->
                                    <td><a href="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout" class="lightblue-M-Ov-ArOn" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="hidden-xs text-center"><strong><strong>Total $<span id="total_final"><?php echo $factura['total']; ?></span></strong></strong></td>
                                      </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    	
    <script src="<?=base_url()?>recursos/bootstrap/js/bootstrap.min.js"></script>
         
    <script type="text/javascript">
        var numero_factura=<?php echo $factura['numero']; ?>;
        
        function execute_my_onreturn (json) {
            if (json.collection_status=='approved'){
                alert ('Pago acreditado');
                pagar_factura(numero_factura);
                $('#pago').show();
                $('#resumen').hide();
                

            } else if(json.collection_status=='pending'){
                alert ('El usuario no completo el pago');
            } else if(json.collection_status=='in_process'){    
                alert ('El pago esta siendo revisado');    
            } else if(json.collection_status=='rejected'){
                alert ('El pago fue rechazado, el usuario puede intentar nuevamente el pago');
            } else if(json.collection_status==null){
                alert ('El usuario no completo el proceso de pago, no se ha generado ningun pago');
            }
        }
        
        function pagar_factura(numero_factura){
        $.ajax({
             type:"POST",
             url: "<?php echo base_url()?>index.php/Response_Ajax/pagar_factura",
             data:{numero:numero_factura},

             beforeSend: function(event){},
             success: function(data){
               data = JSON.parse(data);

               if(data)
               {
                  alert("se registro el pago con fecha de hoy");
               }
             },
             error: function(event){alert(event.responseText);},
     });   
  }

    </script>    
    <script type="text/javascript">
        (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
    </script>
     
</body>
</html>
			