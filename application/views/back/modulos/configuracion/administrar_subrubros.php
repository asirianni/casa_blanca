<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CASA BLANCA</title>
  <link rel="icon" href="<?php echo base_url()?>recursos/images/favicon.ico" type="image/x-icon"/>
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
  <link rel="stylesheet" href="<?php echo base_url()?>recursos/dist/css/skins/skin-blue-light.min.css">
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
        Subrubros de <?=$rubro["rubro"]?>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gear"></i>CONFIGURACION</a></li>
        <li class="active">Rubros</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo base_url()?>index.php/Rubros" class="btn btn-sm btn-primary" ><i class='fa fa-reply'></i> Volver</a>
        </div>
        <div class="col-md-12" style="margin-top: 10px;">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-sm btn-primary" onCLick='abrir_modal_agregar()'><i class='fa fa-plus'></i> Agregar Subrubro</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listado" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>SUBRUBRO</th>
                        <th>MOSTRAR</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($subrubros as $value)
                      {
                        echo "
                        <tr>
                            <td><span id='subrubro_".$value["id"]."'>".$value["subrubro"]."</span></td>
                            <td><span id='mostrar_".$value["id"]."'>".$value["mostrar"]."</span></td><td>
                                <a href='#' class='btn btn-sm btn-success' data-toggle='tooltip' title='' data-original-title='Editar' onCLick='abrir_modal_editar(".$value["id"].")'><i class='fa fa-edit'></i></a>&nbsp;
                                <a href='#' class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onCLick='abrir_modal_eliminar(".$value["id"].")'><i class='fa fa-trash-o'></i></a>&nbsp;";
                                
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

<div class="modal modal-default" id="modal_agregar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar un subrubro:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Rubros/agregar_subrubro" method="post" id="formulario_agregar">
                <div class="col-md-12">
                    <input type='text' id='id_rubro_agregar' name="id_rubro_agregar" value="<?=$rubro["id"]?>" hidden=""/>
                    <div class="form-group">
                        <label for="subrubro_agregar">Subrubro*</label>
                        <input class="form-control" id="subrubro_agregar" name="subrubro_agregar" value="" type="text">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mostrar_agregar">Mostrar*</label>
                        <select class="form-control" id="mostrar_agregar" name="mostrar_agregar" >
                            <option value='si'>si</option>
                            <option value='no'>no</option>
                        </select>
                    </div>
                </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_agregar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-primary pull-right" onClick="agregar_subrubro()"><i class='fa fa-save'></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default" id="modal_editar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar subrubro:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Rubros/editar_subrubro" method="post" id="formulario_editar">
                <input type='text' id='id_rubro_editar' name="id_rubro_editar" value="<?=$rubro["id"]?>" hidden=""/>
                <div class="col-md-12">
                    <input type='text' id='id_editar' name="id_editar" hidden="">
                    <div class="form-group">
                        <label for="subrubro_editar">Subrubro*</label>
                        <input class="form-control" id="subrubro_editar" name="subrubro_editar" value="" type="text">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mostrar_editar">Mostrar*</label>
                        <select class="form-control" id="mostrar_editar" name="mostrar_editar" >
                            <option value='si'>si</option>
                            <option value='no'>no</option>
                        </select>
                    </div>
                </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_editar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-primary pull-right" onClick="editar_subrubro()"><i class='fa fa-save'></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default" id="modal_eliminar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Eliminar subrubro:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Rubros/eliminar_subrubro" method="post" id="formulario_eliminar">
                    <input type='text' id='id_eliminar' name="id_eliminar" hidden="">
                    <input type='text' id='id_rubro_eliminar' name="id_rubro_eliminar" value="<?=$rubro["id"]?>" hidden=""/>
                
                    <div class="col-md-12">
                        <p style="font-size: 17px;font-weight: bold;text-align: center;">¿Seguro desea eliminar el sub-rubro?</p>
                    </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_eliminar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-primary pull-right" onClick="eliminar()"><i class='fa fa-trash-o'></i> Eliminar</button>
                    </div>
                </div>
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
    
    var mi_datatable = null;

    function abrir_modal_agregar()
    {
      $("#subrubro_agregar").val("");
      $("#mostrar_agregar").val("si");
      $("#modal_agregar").modal("show");
    }

    function agregar_subrubro()
    {
        if(validar_vacio("subrubro_agregar") && validar_vacio("mostrar_agregar"))
        {
            var fd = new FormData($("#formulario_agregar")[0]);

            $.ajax({
                url: "<?php echo base_url()?>index.php/Rubros/agregar_subrubro",
                type: "POST",
                data:fd,
                processData: false,
                contentType: false,
                success: function(data)
                {
                  data= JSON.parse(data);

                  if(data["respuesta"] == true)
                  {
                    var row = data["row"];

                    var html_button=
                    "<a href='#' class='btn btn-sm btn-success' data-toggle='tooltip' title='' data-original-title='Editar' onCLick='abrir_modal_editar("+row["id"]+")'><i class='fa fa-edit'></i></a>&nbsp; \n\
                    \n\
                    <a href='#' class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onCLick='abrir_modal_eliminar("+row["id"]+")'><i class='fa fa-trash-o'></i></a>&nbsp;";

                    var subrubro = "<span id='subrubro_"+row["id"]+"'>"+row["subrubro"]+"</span>";
                    var mostrar = "<span id='mostrar_"+row["id"]+"'>"+row["mostrar"]+"</span>";

                    mi_datatable.row.add([subrubro,mostrar,html_button]).draw();
                  }
                  else
                  {
                    alert("No se ha podido agregar");
                  }

                  $("#modal_agregar").modal("hide");
                   
                },
                error: function(event){
                  alert("No se ha podido agregar, compruebe que el subrubro no se encuentre agregado");
                },
            });    
        }
    }
    
    function abrir_modal_editar(id)
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Rubros/get_subrubro",
          type: "POST",
          data:{id:id},
          success: function(data)
          {
            data= JSON.parse(data);

            if(data["respuesta"] == true)
            {
              var row = data["row"];

              $("#id_editar").val(row["id"]);
              $("#subrubro_editar").val(row["subrubro"]);
              $("#mostrar_editar").val(row["mostrar"]);
              $("#modal_editar").modal("show");
            }
            else
            {
              alert("No se ha encontrado el subrubro");
            }
          },
          error: function(event){
            alert("No se ha podido editar, compruebe que el subrubro no se encuentre agregado");
          },
      });    
    }
    
    function editar_subrubro()
    {
        if(validar_vacio("subrubro_editar") && validar_vacio("mostrar_editar") && validar_vacio("id_editar"))
        {
            var fd = new FormData($("#formulario_editar")[0]);

            $.ajax({
                url: "<?php echo base_url()?>index.php/Rubros/editar_subrubro",
                type: "POST",
                data:fd,
                processData: false,
                contentType: false,
                success: function(data)
                {
                  data= JSON.parse(data);

                  if(data["respuesta"])
                  {
                    var row = data["row"];

                    var object  = $("#subrubro_"+row["id"]).parent("td");
                    var cell = mi_datatable.cell(object);
                    cell.data(row["subrubro"]).draw();

                    var object  = $("#mostrar_"+row["id"]).parent("td");
                    var cell = mi_datatable.cell(object);
                    cell.data(row["mostrar"]).draw();

                  }
                  else
                  {
                    alert("No se ha podido editar");
                  }

                  $("#modal_editar").modal("hide");
                   
                },
                error: function(event){
                  alert("No se ha podido editar, compruebe que el subrubro no se encuentre agregado");
                },
            });    
        }
    }
    
    function abrir_modal_eliminar(id)
    {
        $("#id_eliminar").val(id);
        $("#modal_eliminar").modal("show");
    }

    function eliminar()
    {

      var fd = new FormData($("#formulario_eliminar")[0]);

      $.ajax({
          url: "<?php echo base_url()?>index.php/Rubros/eliminar_subrubro",
          type: "POST",
          data:fd,
          processData: false,
          contentType: false,
          success: function(data)
          {
            data= JSON.parse(data);

            if(data["respuesta"])
            {
              var id = $("#id_eliminar").val();

              var tr =$("#subrubro_"+id).parent("td");
              tr = tr.parent("tr");
              mi_datatable.row(tr).remove();
              mi_datatable.draw();
            }
            else
            {
              alert("No se ha podido eliminar");
            }

            $("#modal_eliminar").modal("hide");
             
          },
          error: function(event){
            alert("No se ha podido eliminar");
          },
      });
    }
    
      $(function () {
        mi_datatable = $("#listado").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "responsive": true
          });
      });
    </script>
</body>
</html>


