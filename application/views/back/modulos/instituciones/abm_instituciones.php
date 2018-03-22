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
        Instituciones
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bank"></i>Instituciones</a></li>
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
                      <i class='fa fa-plus'></i> Agregar Institucion
                    </button>
                    <a  href="<?php echo base_url()?>index.php/Instituciones/exportar_instituciones_excel" class="btn btn-success pull-right" >
                        <i class='fa fa-file-excel-o'></i> Exportar
                    </a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example2" class="table table-bordered table-hover" style="text-align: center;margin-top: 10px;">
                    <thead>
                      <tr >
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Localidad</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Rector</th>
                        <th>Referente</th>
                        <th style="width: 15px;">Controles</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php foreach ($instituciones as $value)
                      { 
                        echo "
                        <tr>
                            <td>".$value["nombre_organizacion"]."</td>
                            <td>".$value["direccion"]."</td>
                            <td>".$value["localidades_localidad"]."</td>
                            <td>".$value["telefono"]."</td>
                            <td>".$value["correo"]."</td>
                            <td>".$value["rector"]."</td>
                            <td>".$value["referente"]."</td>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Institucion:</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <label for="nombre_organizacion_agregar" id="label_nombre_organizacion_agregar">Nombre: *</label>
                    <input type="text" id="nombre_organizacion_agregar" class="form-control" name="nombre_organizacion_agregar">
                </div>
                <div class="col-md-6">
                    <label for="direccion_agregar" id="label_direccion_agregar">Direccion: *</label>
                    <input type="text" id="direccion_agregar" class="form-control" name="direccion_agregar">
                </div>
                <div class="col-md-6">
                    <label for="telefono_agregar" id="label_telefono_agregar">Telefono: *</label>
                    <input type="text" id="telefono_agregar" class="form-control" name="telefono_agregar">
                </div>
                <div class="col-md-6">
                    <label for="correo_agregar" id="label_correo_agregar">Correo: *</label>
                    <input type="text" id="correo_agregar" class="form-control" name="correo_agregar">
                </div>
                <div class="col-md-6">
                    <label for="rector_agregar" id="label_rector_agregar">Rector: *</label>
                    <input type="text" id="rector_agregar" class="form-control" name="rector_agregar">
                </div>
                <div class="col-md-6">
                    <label for="referente_agregar" id="label_referente_agregar">Referente: *</label>
                    <input type="text" id="referente_agregar" class="form-control" name="referente_agregar">
                </div>
                <div class="col-md-12">
                    <label for="localidad_agregar" id="label_localidad_agregar">Localidad: *</label>
                    <select id="localidad_agregar" class="form-control" name="localidad_agregar" style="width: 100% !important;">
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Institucion:</h4>
            </div>
            <div class="modal-body">
               <div class="col-md-6">
                    <label for="nombre_organizacion_editar" id="label_nombre_organizacion_editar">Nombre: *</label>
                    <input type="text" id="nombre_organizacion_editar" class="form-control" name="nombre_organizacion_editar">
                </div>
                <div class="col-md-6">
                    <label for="direccion_editar" id="label_direccion_editar">Direccion: *</label>
                    <input type="text" id="direccion_editar" class="form-control" name="direccion_editar">
                </div>
                <div class="col-md-6">
                    <label for="telefono_editar" id="label_telefono_editar">Telefono: *</label>
                    <input type="text" id="telefono_editar" class="form-control" name="telefono_editar">
                </div>
                <div class="col-md-6">
                    <label for="correo_editar" id="label_correo_editar">Correo: *</label>
                    <input type="text" id="correo_editar" class="form-control" name="correo_editar">
                </div>
                <div class="col-md-6">
                    <label for="rector_editar" id="label_rector_editar">Rector: *</label>
                    <input type="text" id="rector_editar" class="form-control" name="rector_editar">
                </div>
                <div class="col-md-6">
                    <label for="referente_editar" id="label_referente_editar">Referente: *</label>
                    <input type="text" id="referente_editar" class="form-control" name="referente_editar">
                </div>
                <div class="col-md-12">
                    <label for="localidad_editar" id="label_localidad_editar">Localidad: *</label>
                    <select id="localidad_editar" class="form-control" name="localidad_editar" style="width: 100% !important;">
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
                <h4 class="modal-title">Eliminar Institucion:</h4>
            </div>
            <div class="modal-body">
                
                <p>¿Desea eliminar la institucion seleccionada?</p>
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
          url: "<?php echo base_url()?>index.php/Instituciones/eliminar",
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
            alert("ERROR: verifique que la institucion no este agregada");
          },
    });
  }

  function modal_editar(id)
  {
    id_trabajando= id;

    $.ajax({
          url: "<?php echo base_url()?>index.php/Instituciones/get_institucion",
          type: "POST",
          data:{id:id},
          success: function(data)
          {
            data= JSON.parse(data);
            
             

            if(data)
            {
              $("#nombre_organizacion_editar").val(data["nombre_organizacion"]);
              $("#direccion_editar").val(data["direccion"]);
              $("#telefono_editar").val(data["telefono"]);
              $("#correo_editar").val(data["correo"]);
              $("#rector_editar").val(data["rector"]);
              $("#referente_editar").val(data["referente"]);

              $("#localidad_editar").html("<option value='"+data["localidad"]+"'>"+data["localidades_localidad"]+"</option>");
              $("#localidad_editar").val(data["localidad"]).trigger("change");
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
    var nombre_organizacion = $.trim($("#nombre_organizacion_editar").val());
    var direccion = $.trim($("#direccion_editar").val());
    var localidad = $.trim($("#localidad_editar").val());
    var telefono = $.trim($("#telefono_editar").val());
    var correo = $.trim($("#correo_editar").val());
    var rector = $.trim($("#rector_editar").val());
    var referente = $.trim($("#referente_editar").val());

    if(validar_editar())
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Instituciones/editar",
          type: "POST",
          data:{id:id_trabajando,nombre_organizacion:nombre_organizacion,direccion:direccion,localidad:localidad,telefono:telefono,correo:correo,rector:rector,referente:referente},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data === true)
            {
              location.reload();
            }
          },
          error: function(event){
            alert("ERROR: verifique que la institucion no este agregada");
          },
      });
    }
  }

  function validar_editar()
  {
    var respuesta = true;

    var nombre_organizacion = $.trim($("#nombre_organizacion_editar").val());
    var direccion = $.trim($("#direccion_editar").val());
    var localidad = $.trim($("#localidad_editar").val());
    var telefono = $.trim($("#telefono_editar").val());
    var correo = $.trim($("#correo_editar").val());
    var rector = $.trim($("#rector_editar").val());
    var referente = $.trim($("#referente_editar").val());

    if(nombre_organizacion == "")
    {
      activar_error("label_nombre_organizacion_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_nombre_organizacion_editar");
    }

    if(direccion == "")
    {
      activar_error("label_direccion_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_direccion_editar");
    }

    if(localidad == "")
    {
      activar_error("label_localidad_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_localidad_editar");
    }

    if(telefono == "")
    {
      activar_error("label_telefono_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_telefono_editar");
    }

    if(correo == "" || !validarEmail(correo))
    {
      activar_error("label_correo_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_correo_editar");
    }

    if(rector == "")
    {
      activar_error("label_rector_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_rector_editar");
    }

    if(referente == "")
    {
      activar_error("label_referente_editar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_referente_editar");
    }

    return respuesta;
  }

  function agregar()
  {
    var nombre_organizacion = $.trim($("#nombre_organizacion_agregar").val());
    var direccion = $.trim($("#direccion_agregar").val());
    var localidad = $.trim($("#localidad_agregar").val());
    var telefono = $.trim($("#telefono_agregar").val());
    var correo = $.trim($("#correo_agregar").val());
    var rector = $.trim($("#rector_agregar").val());
    var referente = $.trim($("#referente_agregar").val());

    if(validar_agregar())
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Instituciones/agregar",
          type: "POST",
          data:{nombre_organizacion:nombre_organizacion,direccion:direccion,localidad:localidad,telefono:telefono,correo:correo,rector:rector,referente:referente},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data === true)
            {
              location.reload();
            }
          },
          error: function(event){
            alert("ERROR: verifique que la institucion no este agregada");
          },
      });
    }
  }

  function validar_agregar()
  {
    var respuesta = true;

    var nombre_organizacion = $.trim($("#nombre_organizacion_agregar").val());
    var direccion = $.trim($("#direccion_agregar").val());
    var localidad = $.trim($("#localidad_agregar").val());
    var telefono = $.trim($("#telefono_agregar").val());
    var correo = $.trim($("#correo_agregar").val());
    var rector = $.trim($("#rector_agregar").val());
    var referente = $.trim($("#referente_agregar").val());

    if(nombre_organizacion == "")
    {
      activar_error("label_nombre_organizacion_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_nombre_organizacion_agregar");
    }

    if(direccion == "")
    {
      activar_error("label_direccion_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_direccion_agregar");
    }

    if(localidad == "")
    {
      activar_error("label_localidad_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_localidad_agregar");
    }

    if(telefono == "")
    {
      activar_error("label_telefono_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_telefono_agregar");
    }

    if(correo == "" || !validarEmail(correo))
    {
      activar_error("label_correo_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_correo_agregar");
    }

    if(rector == "")
    {
      activar_error("label_rector_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_rector_agregar");
    }

    if(referente == "")
    {
      activar_error("label_referente_agregar");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_referente_agregar");
    }

    return respuesta;
  }

  $(document).ready(function(){

    $("#localidad_agregar").select2({        
        ajax: {
            url: "<?=base_url()?>index.php/Localidades/get_localidad_busqueda_select2",
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

    $("#localidad_editar").select2({        
        ajax: {
            url: "<?=base_url()?>index.php/Localidades/get_localidad_busqueda_select2",
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
