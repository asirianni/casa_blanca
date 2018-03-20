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
        Mis datos
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
        <form action="<?=base_url()?>index.php/Welcome/mis_datos" method="post">
        <div class="col-md-4">
              <div class="form-group">
                  <label for="dni_cuit_cuil_editar_cliente">Dni - Cuit - Cuil: </label>
                  <input class="form-control" type="number" id="dni_cuit_cuil_editar_cliente" name="dni_cuit_cuil" value="<?=$mi_perfil["dni_cuit_cuil"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="razon_social_editar_cliente">Razon Social: </label>
                  <input class="form-control" type="text" id="razon_social_editar_cliente" name="razon_social" value="<?=$mi_perfil["razon_social"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="nombre_editar_cliente">Nombre: </label>
                  <input class="form-control" type="text" id="nombre_editar_cliente" name="nombre" value="<?=$mi_perfil["nombre"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="apellido_editar_cliente">Apellido: </label>
                  <input class="form-control" type="text" id="apellido_editar_cliente" name="apellido" value="<?=$mi_perfil["apellido"]?>"/>
              </div>
          </div>

          <div class="col-md-4">
              <div class="form-group">
                  <label for="telefono_editar_cliente">Telefono: </label>
                  <input class="form-control" type="number" id="telefono_editar_cliente" name="telefono" value="<?=$mi_perfil["telefono"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="correo_editar_cliente">Correo: </label>
                  <input class="form-control" type="text" id="correo_editar_cliente" name="correo" value="<?=$mi_perfil["correo"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="limite_cuenta_editar_cliente">Limite Cuenta: </label>
                  <input class="form-control" type="number" step="0.5" value="0" id="limite_cuenta_editar_cliente" name="limite_cuenta_editar_cliente" value="<?=$mi_perfil["limite_cuenta"]?>" disabled/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="lista_editar_cliente">Lista: </label>
                  <select class="form-control" id="lista_editar_cliente" name="lista_editar_cliente" disabled>
                      <option value="<?=$mi_perfil["lista"]?>"><?=$mi_perfil["lista"]?></option>
                  </select>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="direccion_editar_cliente">Direccion: </label>
                  <input class="form-control" type="text" id="direccion_editar_cliente" name="direccion" value="<?=$mi_perfil["direccion"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="contrasenia_editar_cliente">Contraseña web (OP)</label>
                  <input class="form-control" type="text" id="contrasenia_editar_cliente" name="contrasenia" value="<?=$mi_perfil["contrasenia"]?>"/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="descuento_gral_editar_cliente">Descuento General</label>
                  <select class="form-control" id="descuento_gral_editar_cliente" name="descuento_gral" disabled>
                      <option value='<?=$mi_perfil["descuento_general"]?>'><?=$mi_perfil["descuento_gral"]?></option>
                  </select>
              </div>
          </div>
          
           <div class="col-md-4">
              <div class="form-group">
                  <label for="fecha_inicio_editar_cliente">Fecha Inicio: </label>
                  <input class="form-control datetimepicker" type="text" id="fecha_inicio_editar_cliente" value="<?=$mi_perfil["fecha_inicio"]?>" disabled/>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="dia_cobro_editar_cliente">Dia de Cobro</label>
                  <select class="form-control" id="dia_cobro_editar_cliente" name="dia_cobro" disabled>
                      <option value='<?=$mi_perfil["dia_cobro"]?>'><?=$mi_perfil["dia_cobro"]?></option>
                  </select>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="id_servicio_editar_cliente">Servicio</label>
                  <select class="form-control" id="id_servicio_editar_cliente" disabled>
                  <?php 
                      foreach($servicios as $value)
                      {
                          echo "<option value='".$value["id"]."'>".$value["descripcion"]."</option>";
                      }
                  ?>
                  </select>
              </div>
          </div>
          
          <div class="col-md-4">
              <div class="form-group">
                  <label for="ingresos_brutos_editar_cliente">Ing. Brutos: </label>
                  <input type="text" class="form-control" id="ingresos_brutos_editar_cliente" name="ingresos_brutos" value="<?=$mi_perfil["ingresos_brutos"]?>">
              </div>
          </div>

          
          <div class="col-md-4">
              <div class="form-group">
                  <label for="localidad_editar_cliente">Localidad: </label>
                  <select class="form-control" id="localidad_editar_cliente" name="localidad_editar_cliente" disabled>
                      <option value='<?=$mi_perfil["localidad"]["codigo"]?>'><?=$mi_perfil["localidad"]["localidad"]?></option>
                  </select>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="localidad2_editar_cliente">Cambiar localidad: </label>
                  <select class="form-control select2" style="width: 100% !important;" id="localidad2_editar_cliente" name="localidad2">
                      <option value="0">Buscar localidad</option>
                  </select>
              </div>
          </div>

          <div class="col-md-12"  style="margin-top: 20px;text-align: center;">
            <button class="btn btn-sm btn-primary" onCLick='return validar();'><i class="fa fa-save"></i> Guardar Datos</button>
          </div>
          <div class="clearfix"></div>
        </form>
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
  $(document).ready(function(){
    $("#localidad2_editar_cliente").select2({        
            ajax: {
                url: "<?=base_url()?>index.php/Response_Ajax/get_localidad_busqueda_select2",
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

  function validar()
  {
    var dni = $.trim($("#dni_cuit_cuil_editar_cliente").val());
    var razon_social= $.trim($("#razon_social_editar_cliente").val());
    var nombre = $.trim($("#nombre_editar_cliente").val());
    var apellido = $.trim($("#apellido_editar_cliente").val());
    var telefono = $.trim($("#telefono_editar_cliente").val());
    var correo = $.trim($("#correo_editar_cliente").val());
    var direccion = $.trim($("#direccion_editar_cliente").val());
    var contrasenia = $.trim($("#contrasenia_editar_cliente").val());
    var ingresos_brutos = $.trim($("#ingresos_brutos_editar_cliente").val());

    var seguir = true;

    if(dni == ""){activar_error("dni_cuit_cuil_editar_cliente");seguir = false;}
    else{desactivar_error("dni_cuit_cuil_editar_cliente");}

    if(razon_social == ""){activar_error("razon_social_editar_cliente");seguir = false;}
    else{desactivar_error("razon_social_editar_cliente");}

    if(nombre == ""){activar_error("nombre_editar_cliente");seguir = false;}
    else{desactivar_error("nombre_editar_cliente");}

    if(apellido == ""){activar_error("apellido_editar_cliente");seguir = false;}
    else{desactivar_error("apellido_editar_cliente");}

    if(telefono == ""){activar_error("telefono_editar_cliente");seguir = false;}
    else{desactivar_error("telefono_editar_cliente");}

    if(correo == ""){activar_error("correo_editar_cliente");seguir = false;}
    else{desactivar_error("correo_editar_cliente");}

    if(direccion == ""){activar_error("direccion_editar_cliente");seguir = false;}
    else{desactivar_error("direccion_editar_cliente");}

    if(contrasenia == ""){activar_error("contrasenia_editar_cliente");seguir = false;}
    else{desactivar_error("contrasenia_editar_cliente");}
    
    if(ingresos_brutos == ""){activar_error("ingresos_brutos_editar_cliente");seguir = false;}
    else{desactivar_error("ingresos_brutos_editar_cliente");}

    return seguir;
  }

  function activar_error(id)
  {
      $("#"+id).css("border-width","2px");
      $("#"+id).css("border-style","solid");
      $("#"+id).css("border-color","#F00");
  }
  
  function desactivar_error(id)
  {
      $("#"+id).css("border-width","0px");
  }
</script>
</body>
</html>


