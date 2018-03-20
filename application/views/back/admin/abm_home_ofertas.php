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
  <!--<link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/morris/morris.css">-->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- EDICION Bootstrap-->
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/bootstrap/css/edicion_bootstrap.css">
  <?php
    echo $css;
  ?>
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
        ABM Home Ofertas
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Administrador</a></li>
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
                    <button class="btn btn-primary" onClick="$('#modal_agregar_home_ofertas').modal('show');"><i class='fa fa-plus'></i> Agregar</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Mostrar</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($listado_ofertas as $value)
                        {
                          echo 
                          '<tr>
                            <td>'.$value["titulo"].'</td>
                            <td>'.$value["descripcion"].'</td>
                            <td><img src="'.base_url().'recursos/images/home_ofertas/'.$value["imagen"].'" width="50"></td>
                            <td>'.$value["mostrar"].'</td>
                            <td>
                              <button class="btn btn-sm btn-success" onclick="abrir_modal_editar_home_ofertas('.$value["id"].');">
                                <i class="fa fa-edit"></i> EDITAR
                              </button>
                              <button class="btn btn-sm btn-danger" onclick="abrir_modal_eliminar_home_ofertas('.$value["id"].');">
                                <i class="fa fa-edit"></i> ELIMINAR
                              </button>
                            </td>
                          </tr>';
                        }
                      ?>
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            
        </div>
      </div><!-- /.row (main row) -->
    </section>
    <!-- /.content -->
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

<!--MODAL -->
<div class="modal modal-default" id="modal_agregar_home_ofertas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F07521;color: #fff;">
                <h3 class="text-center">Agregar Home ofertas</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="formulario_agregar" enctype="multipart/form-data">
                    <div class="row"> 
                      <div class="col-md-6">
                      <label id="label_titulo_agregar_home_ofertas" for="">Titulo*</label>
                      <input type="text" class="form-control" name="titulo" id="titulo_agregar_home_ofertas">
                    </div>
                    <div class="col-md-6">
                      <label id="label_descripcion_agregar_home_ofertas" for="">Descripcion*</label>
                      <input type="text" class="form-control" name="descripcion" id="descripcion_agregar_home_ofertas">
                    </div>
                    <div class="col-md-6">
                      <label id="label_mostrar_agregar_home_ofertas" for="">Mostrar*</label>
                      <select  class="form-control" name="mostrar" id="mostrar_agregar_home_ofertas">
                          <option value="si">si</option>
                          <option value="no">no</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label id="label_imagen_agregar_home_ofertas" for="">Imagen*</label>
                      <input type="file" name="imagen" id="imagen_agregar_home_ofertas">
                    </div>
                  </div>
                </form>
                    <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_agregar_home_ofertas').modal('hide')"><i class="fa fa-close"></i> Cerrar</button>

                    <button class="btn btn-sm btn-primary pull-right" onClick="agregar_home_ofertas()"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL -->   

<!--MODAL -->
<div class="modal modal-default" id="modal_editar_home_ofertas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F07521;color: #fff;">
                <h3 class="text-center">Editar Home ofertas</h3>
            </div>
            <div class="modal-body">
                <div class="row"> 
                  <form method="post" id="formulario_editar" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id_editar_home_ofertas">
                    <div class="col-md-12" style="text-align: center;">
                        <img width="100" id="imagen_actual_editar">
                    </div>
                    <div class="col-md-6">
                        <label id="label_titulo_editar_home_ofertas" for="">Titulo*</label>
                        <input type="text" class="form-control" name="titulo" id="titulo_editar_home_ofertas">
                    </div>
                    <div class="col-md-6">
                        <label id="label_descripcion_editar_home_ofertas" for="">Descripcion*</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion_editar_home_ofertas">
                    </div>
                    <div class="col-md-6">
                        <label id="label_mostrar_editar_home_ofertas" for="">Mostrar*</label>
                        <select  class="form-control" name="mostrar" id="mostrar_editar_home_ofertas">
                          <option value="si">si</option>
                          <option value="no">no</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label id="label_imagen_editar_home_ofertas" for="">Imagen</label>
                        <input type="file" name="imagen" id="imagen_editar_home_ofertas">
                    </div>
                  </form>
                  <div class="clearfix"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_editar_home_ofertas').modal('hide')"><i class="fa fa-close"></i> Cerrar</button>

                    <button class="btn btn-sm btn-primary pull-right" onClick="editar_home_ofertas()"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL -->     


<!--MODAL -->
<div class="modal modal-default" id="modal_eliminar_home_ofertas">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;color: #fff;">
                <h4 class="text-center">Eliminar</h4>
            </div>
            <div class="modal-body">
                <div class="row"> 
                  <div class="col-md-12">
                    <h5 class="text-center">¿Desea eliminar el registro seleccionado?</h5>
                  </div>
                  <div class="clearfix"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_eliminar_home_ofertas').modal('hide')"><i class="fa fa-close"></i> Cerrar</button>

                    <button class="btn btn-sm btn-danger pull-right" onClick="eliminar_home_ofertas()"><i class="fa fa-transh-o"></i> Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL -->             

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

<script src="<?php echo base_url()?>recursos/js/global.js"></script>
<?php
    echo $js;
?>

<script>


var id_home_ofertas_trabajando = 0;

function agregar_home_ofertas()
{
    if(validar_agregar_home_ofertas())
    {
      var form = $("#formulario_agregar");

      $.ajax({
            url: "<?php echo base_url()?>index.php/Home_ofertas_ajax/agregar_home_ofertas",
            type: "POST",
            contentType: false,
            data: new FormData(form[0]),
            processData:false,
            
            success: function(data)
            {
               data= JSON.parse(data);
               
               $("#modal_agregar_home_ofertas").modal("hide");

               if(data)
               {
                  location.reload();
               }
               else
               {
                  alert("No se ha podido agregar, compruebe que no haya datos que coincidan con otro registro");
               }
            },
            error: function(event){},
        });
    }
}

function validar_agregar_home_ofertas()
{
  var seguir = true;
  
  var titulo = $("#titulo_agregar_home_ofertas").val();

  if(validar_longitud_string(titulo,100) && validar_campo_vacio(titulo)){desactivar_error("label_titulo_agregar_home_ofertas");}
  else{activar_error("label_titulo_agregar_home_ofertas");seguir=false;}
  
  var descripcion = $("#descripcion_agregar_home_ofertas").val();

  if(validar_longitud_string(descripcion,250) && validar_campo_vacio(descripcion)){desactivar_error("label_descripcion_agregar_home_ofertas");}
  else{activar_error("label_descripcion_agregar_home_ofertas");seguir=false;}
  


  if(validar_input_file("imagen_agregar_home_ofertas")){desactivar_error("label_imagen_agregar_home_ofertas");}
  else{activar_error("label_imagen_agregar_home_ofertas");seguir=false;}
  

  var mostrar = $("#mostrar_agregar_home_ofertas").val();

  if(mostrar == 'si'  || mostrar == 'no' ){desactivar_error("label_mostrar_agregar_home_ofertas");}
  else{activar_error("label_mostrar_agregar_home_ofertas");seguir=false;}
    

  return seguir;
}

function abrir_modal_editar_home_ofertas(id)
{
    id_home_ofertas_trabajando = id;

    $.ajax({
        url: "<?php echo base_url()?>index.php/Home_ofertas_ajax/get_home_ofertas",
        type: "POST",
        data: { id:id_home_ofertas_trabajando},
        success: function(data)
        {
           data= JSON.parse(data);
           if(data)
           {
              $("#titulo_editar_home_ofertas").val(data["titulo"]);
              $("#mostrar_editar_home_ofertas").val(data["mostrar"]);
              $("#descripcion_editar_home_ofertas").val(data["descripcion"]);

              $("#imagen_actual_editar").attr("src","<?php echo base_url() ?>recursos/images/home_ofertas/"+data["imagen"]);
              $("#modal_editar_home_ofertas").modal("show");
           }
           else
           {
              alert("No se han podido cargar los datos");
           }
        },
        error: function(event){},
    });
}

function editar_home_ofertas()
{
    if(validar_editar_home_ofertas())
    {
       
      $("#id_editar_home_ofertas").val(id_home_ofertas_trabajando);

      var form = $("#formulario_editar");

      $.ajax({
          url: "<?php echo base_url()?>index.php/Home_ofertas_ajax/editar_home_ofertas",
          type: "POST",
          contentType: false,
          data: new FormData(form[0]),
          processData:false,
          success: function(data)
          {
             data= JSON.parse(data);
             
             $("#modal_editar_home_ofertas").modal("hide");

             if(data)
             {
                location.reload();
             }
             else
             {
                alert("No se ha podido editar, compruebe que no haya datos que coincidan con otro registro");
             }
          },
          error: function(event){},
      });
    }
}

function validar_editar_home_ofertas()
{
    var seguir = true;
    
    var titulo = $("#titulo_editar_home_ofertas").val();

    if(validar_longitud_string(titulo,100) && validar_campo_vacio(titulo)){desactivar_error("label_titulo_editar_home_ofertas");}
    else{activar_error("label_titulo_editar_home_ofertas");seguir=false;}
    
    var descripcion = $("#descripcion_editar_home_ofertas").val();

    if(validar_longitud_string(descripcion,250) && validar_campo_vacio(descripcion)){desactivar_error("label_descripcion_editar_home_ofertas");}
    else{activar_error("label_descripcion_editar_home_ofertas");seguir=false;}
    
    var mostrar = $("#mostrar_editar_home_ofertas").val();

    if(mostrar == 'si'  || mostrar == 'no' ){desactivar_error("label_mostrar_editar_home_ofertas");}
    else{activar_error("label_mostrar_editar_home_ofertas");seguir=false;}
        
    return seguir;
}

function eliminar_home_ofertas()
{
  if(id_home_ofertas_trabajando != 0)
    {
      $.ajax({
            url: "<?php echo base_url()?>index.php/Home_ofertas_ajax/eliminar_home_ofertas",
            type: "POST",
            data: {id : id_home_ofertas_trabajando},
            success: function(data)
            {
               data= JSON.parse(data);
               
               $("#modal_eliminar_home_ofertas").modal("hide");

               if(data)
               {
                  location.reload();
               }
               else
               {
                  alert("No se ha podido eliminar");
               }
            },
            error: function(event){},
        });
    }
}

function abrir_modal_eliminar_home_ofertas(id)
{
    id_home_ofertas_trabajando = id;
    $("#modal_eliminar_home_ofertas").modal("show");
}         
</script>
</body>
</html>


