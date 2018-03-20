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
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/dist/css/skins/skin-blue-light.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <?php
    echo $css;
  ?>
  <!-- EDICION Bootstrap-->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/bootstrap/css/edicion_bootstrap.css">
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <?php echo $header?>
  <?php echo $menu?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shopping-cart"></i>Productos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <button onClick="$('#modal_agregar').modal('show')" class="btn btn-primary" >
                      <i class='fa fa-plus'></i> Agregar Producto
                    </button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                    <thead>
                      <tr >
                        <th>Descripcion</th>
                        <th>Rubro</th>
                        <th>Precio</th>
                        <th>Mostrar</th>
                        <th style="width: 15px;">Controles</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($productos as $value)
                      { 
                        echo "
                        <tr>
                            <td>".$value["descripcion"]."</td>
                            <td>".$value["rubro_rubro"]."</td>
                            <td>".$value["precio"]."</td>
                            <td>".$value["mostrar"]."</td>
                            <td>
                                <button class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Editar' onClick='modal_editar(".$value["id"].")'><i class='fa fa-edit'></i></button>&nbsp;
                                <button class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onClick='modal_eliminar(".$value["id"].")'>
                                    <i class='fa fa-trash-o'></i>
                                </button>&nbsp;";
                                
                        echo "</td>
                        </tr>";
                      }?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $footer?>

  <?php echo $menu_configuracion?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<div class="modal modal-default modal_agregar" id="modal_agregar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Producto:</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="descripcion_agregar" id="label_descripcion_agregar">Descripcion: *</label>
                    <input type="text" id="descripcion_agregar" class="form-control" name="descripcion_agregar">
                </div>
                <div class="col-md-12">
                    <label for="rubro_agregar" id="label_rubro_agregar">Rubro: *</label>
                    <select id="rubro_agregar" class="form-control" name="rubro_agregar" style="width: 100% !important;">
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="precio_agregar" id="label_precio_agregar">Precio: *</label>
                    <input type="text" id="precio_agregar" class="form-control" name="precio_agregar">
                </div>
                <div class="col-md-12">
                    <label for="mostrar_agregar" id="label_mostrar_agregar">Mostrar: *</label>
                    <select id="mostrar_agregar" class="form-control" name="mostrar_agregar">
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_agregar').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
              <button class="btn btn-sm btn-primary pull-right" onCLick="agregar()">
                <i class="fa fa-save"></i> Guardar
              </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default modal_editar" id="modal_editar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Producto:</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="descripcion_editar" id="label_descripcion_editar">Descripcion: *</label>
                    <input type="text" id="descripcion_editar" class="form-control" name="descripcion_editar">
                </div>
                <div class="col-md-12">
                    <label for="rubro_editar" id="label_rubro_editar">Rubro: *</label>
                    <select id="rubro_editar" class="form-control" name="rubro_editar" style="width: 100% !important;">
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="precio_editar" id="label_precio_editar">Precio: *</label>
                    <input type="text" id="precio_editar" class="form-control" name="precio_editar">
                </div>
                <div class="col-md-12">
                    <label for="mostrar_editar" id="label_mostrar_editar">Mostrar: *</label>
                    <select id="mostrar_editar" class="form-control" name="mostrar_editar">
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_editar').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
              <button class="btn btn-sm btn-primary pull-right" onCLick="editar()">
                <i class="fa fa-save"></i> Guardar
              </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default modal_eliminar" id="modal_eliminar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Eliminar Producto:</h4>
            </div>
            <div class="modal-body">
                
                <p>¿Desea eliminar el producto seleccionado?</p>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_eliminar').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
              <button class="btn btn-sm btn-danger pull-right" onCLick="eliminar()">
                <i class="fa fa-trash-o"></i> Eliminar
              </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>recursos/plugins/jQuery/jquery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>recursos/bootstrap/js/bootstrap.min.js"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--<script src="<?php echo base_url()?>recursos/plugins/morris/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="<?php echo base_url()?>recursos/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>recursos/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url()?>recursos/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>recursos/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>recursos/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>recursos/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>recursos/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php echo base_url()?>recursos/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>recursos/dist/js/demo.js"></script>
<!--FUNCIONES GLOBALES -->
<script src="<?php echo base_url()?>recursos/js/global.js"></script>
<?php
    echo $js;
  ?>

<!-- PERTENECIENTE A ABM_USUARIOS-->

<script>

  var id_trabajando=0;

  function modal_eliminar(id)
  {
    id_trabajando= id;
    $("#modal_eliminar").modal("show");
  }

  function eliminar()
  {
     $.ajax({
          url: "<?php echo base_url()?>index.php/Productos/eliminar",
          type: "POST",
          data:{id:id_trabajando},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data)
            {
              location.reload();
            }
            else
            {
              alert("ERROR: No se ha podido eliminar");
            }
          },
          error: function(event){
            alert("ERROR: verifique que el producto no este agregado");
          },
    });
  }

  function modal_editar(id)
  {
    id_trabajando= id;

    $.ajax({
          url: "<?php echo base_url()?>index.php/Productos/get_producto",
          type: "POST",
          data:{id:id},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data)
            {
              $("#descripcion_editar").val(data["descripcion"]);
              $("#rubro_editar").val(data["rubro"]);
              $("#precio_editar").val(data["precio"]);
              $("#mostrar_editar").val(data["mostrar"]);

              $("#rubro_editar").html("<option value='"+data["rubro"]+"'>"+data["rubro_rubro"]+"</option>");
              $("#rubro_editar").val(data["rubro"]).trigger("change");
              $("#modal_editar").modal("show");
            }
          },
          error: function(event){
            alert("ERROR: verifique que el producto no este agregado");
          },
    });
  }

  function editar()
  {
    var descripcion = $.trim($("#descripcion_editar").val());
    var rubro = $.trim($("#rubro_editar").val());
    var precio = $.trim($("#precio_editar").val());
    precio= precio.replace(",",".");
    precio = parseFloat(precio);
    var mostrar = $.trim($("#mostrar_editar").val());

    if(validar_editar())
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Productos/editar",
          type: "POST",
          data:{id:id_trabajando,descripcion:descripcion,rubro:rubro,precio:precio,mostrar:mostrar},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data === true)
            {
              location.reload();
            }
          },
          error: function(event){
            alert("ERROR: verifique que el producto no este agregado");
          },
      });
    }
  }

  function validar_editar()
  {
    var respuesta = true;

    var descripcion = $.trim($("#descripcion_editar").val());
    var rubro = $.trim($("#rubro_editar").val());
    var precio = $.trim($("#precio_editar").val());

    precio= precio.replace(",",".");
    precio = parseFloat(precio);
    $("#precio_editar").val(precio);


    if(descripcion == "")
    {
      activar_error("label_descripcion_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_descripcion_editar");
    }

    if(rubro == "")
    {
      activar_error("label_rubro_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_rubro_editar");
    }

    if(isNaN(precio))
    {
      activar_error("label_precio_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_precio_editar");
    }

    return respuesta;
  }

  function agregar()
  {
    var descripcion = $.trim($("#descripcion_agregar").val());
    var rubro = $.trim($("#rubro_agregar").val());
    var precio = $.trim($("#precio_agregar").val());
    precio= precio.replace(",",".");
    precio = parseFloat(precio);
    var mostrar = $.trim($("#mostrar_agregar").val());

    if(validar_agregar())
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Productos/agregar",
          type: "POST",
          data:{descripcion:descripcion,rubro:rubro,precio:precio,mostrar:mostrar},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data === true)
            {
              location.reload();
            }
          },
          error: function(event){
            alert("ERROR: verifique que el producto no este agregado");
          },
      });
    }
  }

  function validar_agregar()
  {
    var respuesta = true;

    var descripcion = $.trim($("#descripcion_agregar").val());
    var rubro = $.trim($("#rubro_agregar").val());
    var precio = $.trim($("#precio_agregar").val());
    precio= precio.replace(",",".");
    precio = parseFloat(precio);
    $("#precio_editar").val(precio);

    if(descripcion == "")
    {
      activar_error("label_descripcion_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_descripcion_agregar");
    }

    if(rubro == "")
    {
      activar_error("label_rubro_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_rubro_agregar");
    }

    if(isNaN(precio))
    {
      activar_error("label_precio_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_precio_agregar");
    }

    return respuesta;
  }

  $(document).ready(function(){

    $("#rubro_agregar").select2({        
        ajax: {
            url: "<?=base_url()?>index.php/Rubros/get_rubro_busqueda_select2",
            dataType: 'json',
            type: 'post',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term 
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

    $("#rubro_editar").select2({        
        ajax: {
            url: "<?=base_url()?>index.php/Rubros/get_rubro_busqueda_select2",
            dataType: 'json',
            type: 'post',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term 
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

  });

  $(function () {
    $('#example2').DataTable({
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
