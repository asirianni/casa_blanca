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
        Nuestros Servicios
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
                  <button class="btn btn-large btn-primary pull-right disabled" id="btn_ver_carrito">
                    <i class="fa fa-shopping-cart"></i> $ <span id="span_total">0</span>
                  </button>
                  <br/><br/>
                  <table id="listado" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SERVICIO</th>
                            <th>PRECIO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($listado_servicios as $value)
                            {
                                
                              echo "<tr>
                                        <td>".$value["descripcion"]."</td>
                                        <td>$ ".$value["precio_lista"]."</td>
                                        <td><button class='btn btn-success btn-sm pull-right' onClick='adquirir_servicio(".$value["id"].")'>Adquirir</button></td>
                                    </tr>";
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
                            <div  style="overflow-y: scroll;height: 400px;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpo_detalle">
                                    </tbody>
                                </table>
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


<div class="modal fade" id="modal_ver_carrito">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> Cerrar</button>
            <h4 class="modal-title">SU PRESUPUESTO</h4>
                </div>
                <div class="modal-body">
                    <div class="row">   
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_agregar_pedido">Fecha Entrega: </label>
                                <input class="form-control datetimepicker" id="fecha_entrega" value="" type="text" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div  style="overflow-y: scroll;height: 400px;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SERVICIO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>TOTAL</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpo_detalle_carrito">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">              
                        <button class='btn btn-sm btn-default pull-left' onClick='$("#modal_ver_carrito").modal("hide");'><i class="fa fa-close"></i>CERRAR</button>

                        <button class='btn btn-medium btn-default pull-right' onClick='abrir_modal_confirmar()'><i class="fa fa-check"></i> SOLICITAR PRESUPUESTO</button>
                                        
                    </div>
                </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_confirmar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">¿Desea solicitar el presupuesto?</h3>
                    
                </div>
                <div class="modal-footer">              
                        <button class='btn btn-sm btn-default pull-left' onClick='$("#modal_confirmar").modal("hide");'><i class="fa fa-close"></i>CERRAR</button>

                        <button class='btn btn-medium btn-default pull-right' onClick='registrar_presupuesto();'><i class="fa fa-check"></i> CONFIRMAR</button>
                                        
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

  var detalle_adquisiciones = new Array();

  $(document).ready(function(){

    $("#btn_ver_carrito").click(function(){
      var seguir = detalle_adquisiciones.length > 0;

      if(seguir)
      {
        $("#cuerpo_detalle_carrito").html(get_detalle_carrito());
        $("#modal_ver_carrito").modal("show");
      }
      else
      {
        alert("Para ver el carrito de compra, tiene que adquirir uno o mas servicios");
      }
    });

  });

  function abrir_modal_confirmar()
  {
    var fecha_entrega = $("#fecha_entrega").val();

    if(fecha_entrega != "" && detalle_adquisiciones.length > 0)
    {
      $("#modal_confirmar").modal("show");
    }
    else
    {
      alert("Seleccione una fecha de entrega");
    }
  }
  function registrar_presupuesto()
  {
    var fecha_entrega = $("#fecha_entrega").val();

    $.ajax({
        url: "<?php echo base_url()?>index.php/Welcome/agregar_pedido_y_detalle",
        type: "POST",
        data:{
            fecha_entrega:fecha_entrega,
            detalle:detalle_adquisiciones,
        },
        success: function(data)
        {
           data= JSON.parse(data);
                
            if(data)
            {
              alert("PRESUPUESTO INSERTADO");
              location.reload();
            }
            else
            {
                alert("No se ha podido agregar");
            }
        },
        error: function(event){alert(event.responseText);
        },
    });
  }

  function get_detalle_carrito()
  {
    var cuerpo_detalle_carrito = '';

    var total = 0.0;

    for(var i=0; i < detalle_adquisiciones.length;i++)
    {
      var mi_row = detalle_adquisiciones[i];

      if(mi_row != undefined)
      {
          cuerpo_detalle_carrito+=
          '<tr> \n\
              <td>'+mi_row["descripcion"]+'</td> \n\
              <td>'+mi_row["cantidad"]+'</td> \n\
              <td>'+mi_row["precio"]+'</td> \n\
              <td>'+mi_row["total"]+'</td> \n\
              <td>\n\
              <button class="btn btn-sm btn-success" onClick="adquirir_servicio('+mi_row["id"]+')"><i class="fa fa-plus"></i></button>\n\
              <button class="btn btn-sm btn-warning" onClick="restar_servicio('+mi_row["id"]+')"><i class="fa fa-minus"></i></button>\n\
                <button class="btn btn-sm btn-danger" onClick="sacar_servicio('+mi_row["id"]+')"><i class="fa fa-close"></i></button>\n\
              </td>\n\
          </tr>';

          total+= (parseInt(mi_row["cantidad"]) * parseFloat(mi_row["precio"]));
      }
    }

    total = total.toFixed(2);

    $("#span_total").text(total);
    cuerpo_detalle_carrito+=
          '<tr> \n\
              <td>&nbsp;</td> \n\
              <td>&nbsp;</td> \n\
              <td>&nbsp;</td> \n\
              <td style="font-size: 22px;font-weight: bold;">$ '+total+'</td> \n\
              <td>\n\</td>\n\
          </tr>';

    return cuerpo_detalle_carrito;
  }

  function get_estructura_row(id_servicio,descripcion,precio,cantidad)
  {
    precio = parseFloat(precio).toFixed(2);
    cantidad = parseInt(cantidad);

    total= (precio * cantidad).toFixed(2);
    var mi_row = {"id":id_servicio,"descripcion":descripcion,"precio":precio,"cantidad":cantidad,"total":total};
    return mi_row;
  }

  function restar_servicio(id)
  {
    var posicion = get_posicion_codigo_en_arreglo(id);

    if(posicion > -1)
    {
      var cantidad = parseInt(detalle_adquisiciones[posicion]["cantidad"]);

      if((cantidad-1) == 0)
      {
        sacar_servicio(id);
      }
      else
      {
        cantidad-=1;

        detalle_adquisiciones[posicion]["cantidad"]= cantidad;
        $("#cuerpo_detalle_carrito").html(get_detalle_carrito());
      }
    }
  }

  function ccleaner_arreglo_detalle()
  {
      var aux=new Array();
      
      for(var i=0; i < detalle_adquisiciones.length;i++)
      {
          if(detalle_adquisiciones[i] != undefined)
          {
              aux.push(detalle_adquisiciones[i]);
          }
      }
      
      detalle_adquisiciones=aux;
      
  }

  function sacar_servicio(id)
  {
    var posicion = get_posicion_codigo_en_arreglo(id);

    if(posicion > -1)
    {
      delete detalle_adquisiciones[posicion];
      ccleaner_arreglo_detalle();

      if(detalle_adquisiciones.length < 1)
      {
        $("#btn_ver_carrito").addClass("disabled");
        $("#modal_ver_carrito").modal("hide");
        $("#span_total").text(0);
      }

      $("#cuerpo_detalle_carrito").html(get_detalle_carrito());
    }
  }

  function adquirir_servicio(id_servicio)
  {
    var posicion = get_posicion_codigo_en_arreglo(id_servicio);
    if(posicion > -1)
    {
      var row = detalle_adquisiciones[posicion];

      var cantidad = parseInt(row["cantidad"]);
      cantidad +=1;
      detalle_adquisiciones[posicion]= get_estructura_row(row["id"],row["descripcion"],row["precio"],cantidad);

      $("#cuerpo_detalle_carrito").html(get_detalle_carrito());
    }
    else
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Welcome/get_servicio",
          type: "POST",
          data:{id:id_servicio},
          success: function(data)
          {
            data= JSON.parse(data);

            var row = get_estructura_row(data["id"],data["descripcion"],data["precio"],1);
            $("#span_total").text(row["total"]);
            detalle_adquisiciones.push(row);

            $("#btn_ver_carrito").removeClass("disabled");
          },
          error: function(event){alert(event.responseText);
          },
      });  
    }
  }

  function get_posicion_codigo_en_arreglo(id)
    {
        var i=0;
        var valor = -1;
        
        while( i < detalle_adquisiciones.length)
        {
            if(detalle_adquisiciones[i] != undefined)
            {
                if(detalle_adquisiciones[i]["id"] == id)
                {
                    valor = i;
                    i= detalle_adquisiciones.length;
                }
            }
            i++;
        }
        
        return valor;
    }

  function get_detalle_presupuesto(numero_presupuesto)
    {
        $.ajax({
            url: "<?php echo base_url()?>index.php/Welcome/get_detalle_presupuesto",
            type: "POST",
            data:{numero_presupuesto:numero_presupuesto},
            success: function(data)
            {
                data= JSON.parse(data);

                var html='';

                for(var i=0; i < data.length;i++)
                {
                    var cantidad = parseFloat(data[i]["cantidad"]);
                    var precio = parseFloat(data[i]["precio"]);
                    
                    var total = (cantidad * precio);

                    html+=
                    '<tr>\n\
                        <td>'+data[i]["servicios_producto"]+'</td>\n\
                        <td>'+data[i]["cantidad"]+'</td>\n\
                        <td>'+data[i]["precio"]+'</td>\n\
                        <td>'+total+'</td>\n\
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


    jQuery('.datetimepicker').datetimepicker({
        lang:'es',
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Märzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,

         format:'d-m-Y'
    });
</script>
</body>
</html>


