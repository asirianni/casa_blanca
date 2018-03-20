<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CASA BLANCA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/dist/css/skins/skin-blue-light.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/plugins/iCheck/flat/blue.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- EDICION Bootstrap-->
  <link rel="stylesheet" href="<?=base_url()?>recursos/bootstrap/css/edicion_bootstrap.css">

  <?php echo $css ?>
  </head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
        <?php echo $header ?>
            <aside class='main-sidebar'>
              <section class='sidebar'>
                <ul class='sidebar-menu'>
                  <li class='header'>MENU DE NAVEGACION</li><li>
                    <?=$menu?>
              </section>
              <!-- /.sidebar -->
            </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mis Facturas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> Menu de Navegacion</a></li>
        <!--<li class="active">Dashboard</li>-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listado" class="table table-bordered">
                      <thead>
                          <tr>
                              <th>N° FACTURA:</th>
                              <th>IMPORTE</th>
                              <th>FECHA DE CREACION</th>
                              <th>FECHA DE PAGO</th>
                              <th>ESTADO</th>
                              <th style='width: 50px;'></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                        foreach($listado_facturas as $value)
                        {
                            $fecha = DateTime::createFromFormat("Y-m-d",$value["fecha"]);
                            $fecha= $fecha->format("d-m-Y");
                            echo "<tr>
                                    <td>".$value["numero"]."</td>
                                    <td>$ ".$value["total"]."</td>
                                    <td>".$fecha."</td>
                                    <td>".$value["fecha_pago"]."</td>
                                    <td>".$value["desc_condicion"]."</td>
                                    <td>
                                        <button class='btn btn-sm btn-primary' onClick='cargar_detalle_factura(".$value["numero"].")'><i class='fa fa-eye'></i> Ver detalle</button>
                                    ";
                            if ($value["fecha_pago"] == "0000-00-00") {
                                echo "
                                    <a href='".base_url()."index.php/welcome/pagar_factura/". $value["numero"]."' class='btn btn-sm btn-warning' ><i class='fa fa-money'></i> Pagar</a>
                                    ";
                            }
                            echo    "</td></tr>";
                        }
                    ?>
                      </tbody>
                  </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
              
          </div>
          <div class="clearfix"></div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $footer?>
            <!-- /.control-sidebar -->  
          <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal_ver_detalle">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> Cerrar</button>
            <h4 class="modal-title">Detalle factura</h4>
                </div>
                <div class="modal-body">
                    <div class="row">   
                        <div class="col-md-12">

                            <div  style="overflow-y: scroll;height: 300px;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>DESCUENTO</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpo_detalle">
                                    </tbody>
                                </table>
                            </div>
                            <div>
                              <p><strong>OBSERVACIONES</strong></p>
                              <textarea class="form-control" id="observaciones_ver_detalle" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="text-align: center;">              
                        <button class='btn btn-medium btn-default' onClick='$("#modal_ver_detalle").modal("hide");'>CERRAR</button>
                                        
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>recursos/plugins/jQuery/jquery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>recursos/bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>recursos/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>recursos/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>recursos/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url()?>recursos/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url()?>recursos/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>recursos/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>recursos/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>recursos/dist/js/demo.js"></script>

<?php echo $js ?>
<script type='text/javascript'>
(function(){ var widget_id = '5NG0U82TVz';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<script>
  function cargar_detalle_factura(numero_factura)
    {
        $.ajax({
            url: "<?php echo base_url()?>index.php/Welcome/get_detalle_factura",
            type: "POST",
            data:{numero_factura:numero_factura},
            success: function(data)
            {
                data= JSON.parse(data);

                $("#observaciones_ver_detalle").html(data["observaciones"]);

                var detalle_factura = data["detalle_factura"];

                var html='';
                for(var i=0; i < detalle_factura.length;i++)
                {
                    var cantidad = parseFloat(detalle_factura[i]["cantidad"]);
                    var precio = parseFloat(detalle_factura[i]["precio"]);
                    var descuento = parseFloat(detalle_factura[i]["descuento"]);
                    var total = (cantidad * precio) - (precio * descuento / 100);
                    html+=
                    '<tr>\n\
                        <td>'+detalle_factura[i]["descripcion"]+'</td>\n\
                        <td>'+detalle_factura[i]["cantidad"]+'</td>\n\
                        <td>$ '+detalle_factura[i]["precio"]+'</td>\n\
                        <td>'+detalle_factura[i]["descuento"]+' %</td>\n\
                        <td>$ '+total+'</td>\n\
                    </tr>';
                }
                $("#cuerpo_detalle").html(html);
                $("#modal_ver_detalle").modal("show");
            },
            error: function(event){alert(event.responseText);
            },
        });  
    }
    $(function () {
        $('#listado').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
</script>
</body>
</html>