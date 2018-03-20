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
        Tipos Usuarios
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>MENU DE NAVEGACION</a></li>
        <li class="active">ABM TIPOS USUARIOS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary" onclick="$('#modal_agregar').modal('show');"><i class='fa fa-plus'></i> Agregar</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                    <thead>
                      <tr >
                        <th>Tipo</th>
                        <th style="width: 120px;">Controles</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tipos_usuarios as $value)
                      {
                        echo "
                        <tr>
                            <td>".$value["tipo"]."</td>
                            <td>
                              <button class='btn btn-sm btn-primary' onclick='abrir_modal_editar(".$value["id"].")'><i class='fa fa-edit'></i></button>";

                              if($value["id"] != 1)
                              {
                                echo "&nbsp;<a href='".base_url()."index.php/Usuarios/administrar_modulos_tipo_usuario/".$value["id"]."' class='btn btn-sm btn-success' ><i class='fa fa-cube'></i></a>";

                                if($value["id"] != 2)
                                {
                                  echo "&nbsp;<button class='btn btn-sm btn-danger' onclick='abrir_modal_eliminar(".$value["id"].")'><i class='fa fa-close'></i></button>";
                                }
                                else
                                {
                                  echo "&nbsp;<button class='btn btn-sm btn-danger disabled'><i class='fa fa-close'></i></button>";
                                }
                                
                              }
                              else
                              {

                                echo "&nbsp;<button class='btn btn-sm btn-success disabled' ><i class='fa fa-cube'></i></button>";

                                echo "&nbsp;<button class='btn btn-sm btn-danger disabled'> <i class='fa fa-close'></i></button>";
                              }



                                
                        echo "</td>";
                        echo "</tr>";
                            
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Tipo de Usuario:</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="tipo_usuario_agregar" id="label_tipo_usuario_agregar">Tipo de Usuario: *</label>
                    <input type="text" id="tipo_usuario_agregar" class="form-control" name="tipo_usuario_agregar">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_agregar').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
              <button class="btn btn-sm btn-primary pull-right" onCLick="guardar()">
                <i class="fa fa-save"></i> Guardar
              </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default modal_editar" id="modal_editar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Tipo de Usuario:</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-md-12">
                  <label id="label_tipo_usuario_editar" for="tipo_usuario_editar">Tipo de Usuario: *</label>
                  <input type="text" id="tipo_usuario_editar" class="form-control" name="tipo_usuario_editar">
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
                <h4 class="modal-title">Eliminar Tipo de Usuario:</h4>
            </div>
            <div class="modal-body">
                
                <p>¿Desea eliminar el tipo de usuario seleccionado?</p>
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

  var id_trabajando = 0;

    function abrir_modal_eliminar(id)
    {
      id_trabajando = id;
      $("#modal_eliminar").modal("show");
    }

    function guardar()
    {
      var tipo_usuario = $.trim($("#tipo_usuario_agregar").val());

      if(validar_agregar())
      {
        $.ajax({
            url: "<?php echo base_url()?>index.php/Usuarios/agregar_tipo_usuario",
            type: "POST",
            data:{tipo_usuario:tipo_usuario},
            success: function(data)
            {
              data= JSON.parse(data);
              
              if(data === true)
              {
                location.reload();
              }
            },
            error: function(event){
              alert("ERROR: verifique que el tipo de usuario no este agregado");
            },
        });
      }
    }

    function validar_agregar()
    {
      var respuesta = true;

      var tipo_usuario = $.trim($("#tipo_usuario_agregar").val());

      if(tipo_usuario == "")
      {
        activar_error("label_tipo_usuario_agregar");
        respuesta = false;
      }
      else
      {
        desactivar_error("label_tipo_usuario_agregar");
      }

      return respuesta;
    }

    function abrir_modal_editar(id){
      $.ajax({
            url: "<?php echo base_url()?>index.php/Usuarios/get_tipo_usuario",
            type: "POST",
            data:{id},
            success: function(data)
            {
              data= JSON.parse(data);
              
              if(data)
              {
                $("#tipo_usuario_editar").val(data["tipo"]);
                id_trabajando = data["id"];
                $("#modal_editar").modal("show");
              }
            },
            error: function(event){
              alert("ERROR: verifique que el tipo de usuario no este agregado");
            },
        });
    }

    function editar()
    {
      var tipo_usuario = $("#tipo_usuario_editar").val();

      if(validar_editar())
      {
        $.ajax({
            url: "<?php echo base_url()?>index.php/Usuarios/editar_tipo_usuario",
            type: "POST",
            data:{id: id_trabajando,tipo_usuario:tipo_usuario},
            success: function(data)
            {
              data= JSON.parse(data);
              
              if(data === true)
              {
                location.reload();
              }
            },
            error: function(event){
              alert("ERROR: verifique que el tipo de usuario no este agregado");
            },
        });
      }
    }

    function validar_editar()
    {
      var respuesta = true;

      var tipo_usuario = $.trim($("#tipo_usuario_editar").val());

      if(tipo_usuario == "")
      {
        activar_error("label_tipo_usuario_editar");
        respuesta = false;
      }
      else
      {
        desactivar_error("label_tipo_usuario_editar");
      }

      return respuesta;
    }

    function eliminar()
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Usuarios/eliminar_tipo_usuario",
          type: "POST",
          data:{id: id_trabajando},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data === true)
            {
              location.reload();
            }
            else
            {
              alert("ERROR: no se ha podido eliminar");
            }
          },
          error: function(event){
            alert("ERROR: no se ha podido eliminar");
          },
      });
    }

     
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
</script>
</body>
</html>
