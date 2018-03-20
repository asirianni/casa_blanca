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
        Localidades <?php if($id_provincia != null){ echo "por provincia";}?>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gear"></i>CONFIGURACION</a></li>
        <li class="active">Localidades</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn_primary btn-primary" onCLick='abrir_modal_agregar()'>
                      <i class='fa fa-plus'></i> 
                      Agregar Localidad
                    </button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listado" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Localidad</th>
                        <th>Provincia</th>
                        <th style="width: 100px;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($localidades as $value)
                      {
                        echo "
                        <tr>
                            <td >
                              <span id='localidad_".$value["codigo"]."'>".$value["localidad"]."</span>
                            </td>
                            <td>
                              <span id='provincia_".$value["codigo"]."'>".$value["desc_provincia"]."<span>
                            </td>
                            <td> 
                                <a href='#' class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Editar' onCLick='abrir_modal_editar(".$value["codigo"].")'><i class='fa fa-edit'></i></a>&nbsp;
                                
                                <a href='#' class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onCLick='abrir_modal_eliminar(".$value["codigo"].")'><i class='fa fa-trash-o'></i></a>&nbsp;";
                                
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar una localidad:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Localidades/agregar_localidad" method="post" id="formulario_agregar">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="localidad_agregar">Localidad*</label>
                        <input class="form-control" id="localidad_agregar" name="localidad_agregar" value="" type="text">
                    </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="provincia_agregar">Provincia:</label>
                    <select id="provincia_agregar" name="provincia_agregar" class="form-control" style="width: 100%;">
                    </select>
                  </div>
                </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-default pull-left" onClick="$('#modal_agregar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-primary pull-right" onClick="agregar()"><i class='fa fa-save'></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default" id="modal_editar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar localidad:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Localidades/editar_localidad" method="post" id="formulario_editar">
                <div class="col-md-12">
                    <input type='text' id='id_editar' name="id_editar" hidden="">
                    <div class="form-group">
                        <label for="localidad_editar">Localidad*</label>
                        <input class="form-control" id="localidad_editar" name="localidad_editar" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="provincia_editar">Provincia*</label>
                        <select class="form-control" id="provincia_editar" name="provincia_editar" style="width: 100%">
                        </select>
                    </div>
                </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-default pull-left" onClick="$('#modal_editar').modal('hide');">
                          <i class='fa fa-close'></i> 
                          Cerrar
                        </button>

                        <button class="btn btn-primary pull-right" onClick="editar()">
                          <i class='fa fa-save'></i> 
                          Guardar
                        </button>

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
                <h4 class="modal-title">Eliminar localidad:</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>index.php/Localidades/eliminar_localidad" method="post" id="formulario_eliminar">
                    <input type='text' id='id_eliminar' name="id_eliminar" hidden="">
                    <div class="col-md-12">
                        <p style="font-size: 17px;font-weight: bold;text-align: center;">¿Seguro desea eliminar la localidad seleccionada?</p>
                    </div>
                
                <div class='clearfix'></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="form-group" style="text-align: center;">
                        <button class="btn btn-sm btn-default pull-left" onClick="$('#modal_eliminar').modal('hide');"><i class='fa fa-close'></i> Cerrar</button>
                        <button class="btn btn-sm btn-danger pull-right" onClick="eliminar()"><i class='fa fa-trash-o'></i> Eliminar</button>
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

<script>
    
    var mi_datatable = null;

    function abrir_modal_agregar()
    {
      $("#localidad_agregar").val("");
      $("#modal_agregar").modal("show");
    }

    function agregar()
    {
        if(validar_vacio("localidad_agregar") && validar_mayor_cero("provincia_agregar"))
        {
            var fd = new FormData($("#formulario_agregar")[0]);

            $.ajax({
                url: "<?php echo base_url()?>index.php/Localidades/agregar_localidad",
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

                    var html_button=
                    "<a href='#' class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Editar' onCLick='abrir_modal_editar("+row["codigo"]+")'><i class='fa fa-edit'></i></a>&nbsp;<a href='#' class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onCLick='abrir_modal_eliminar("+row["codigo"]+")'><i class='fa fa-trash-o'></i></a>&nbsp;";

                    var localidad = "<span id='localidad_"+row["codigo"]+"'>"+row["localidad"]+"</span>";

                    mi_datatable.row.add([localidad,row["desc_provincia"],html_button]).draw();
                  }
                  else
                  {
                    alert("No se ha podido agregar");
                  }

                  $("#modal_agregar").modal("hide");
                   
                },
                error: function(event){
                  alert("No se ha podido agregar, compruebe que la localidad no se encuentre agregada");
                },
            });    
        }
    }
    
    function abrir_modal_editar(id)
    {
      
      $.ajax({
          url: "<?php echo base_url()?>index.php/Localidades/get_localidad",
          type: "POST",
          data:{id:id},
          success: function(data)
          {
            alert(data);
            data= JSON.parse(data);

            if(data["respuesta"])
            {
              $("#id_editar").val(id);
              var row = data["row"];

              var option_provincia = "<option value='"+row["id_provincia"]+"'>"+row["desc_provincia"]+"</option>";
              $("#provincia_editar").html(option_provincia);
              $("#provincia_editar").val(row["id_provincia"]).trigger('change');

              $("#localidad_editar").val(row["localidad"]);

              $("#modal_editar").modal("show");
            }
            else
            {
              alert("No se ha encontrado la localidad");
            }
             
          },
          error: function(event){
            alert("No se ha encontrado la localidad");
          },
      }); 
    }
    
    function editar()
    {
        if(validar_vacio("localidad_editar") && validar_mayor_cero("provincia_editar"))
        {
            var fd = new FormData($("#formulario_editar")[0]);

            $.ajax({
                url: "<?php echo base_url()?>index.php/Localidades/editar_localidad",
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

                    var html_button=
                    "<a href='#' class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Editar' onCLick='abrir_modal_editar("+row["codigo"]+")'><i class='fa fa-edit'></i></a>&nbsp;<a href='#' class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onCLick='abrir_modal_eliminar("+row["codigo"]+")'><i class='fa fa-trash-o'></i></a>&nbsp;";

                    var object  = $("#localidad_"+row["codigo"]).parent("td");
                    var cell = mi_datatable.cell(object);
                    cell.data(row["localidad"]).draw();

                    var object  = $("#provincia_"+row["codigo"]).parent("td");
                    var cell = mi_datatable.cell(object);
                    cell.data(row["desc_provincia"]).draw();

                  }
                  else
                  {
                    alert("No se ha podido editar");
                  }

                  $("#modal_editar").modal("hide");
                   
                },
                error: function(event){
                  alert(event.responseText);
                  alert("No se ha podido editar, compruebe que la localidad no se encuentre agregada");
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
          url: "<?php echo base_url()?>index.php/Localidades/eliminar_localidad",
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

              var tr =$("#localidad_"+id).parent("td");
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
            alert("No se ha podido eliminar, compruebe que la localidad se encuentre agregada");
          },
      });
    }
    
      $(document).ready(function(){

        $("#provincia_agregar").select2({        
            ajax: {
                url: "<?=base_url()?>index.php/Provincia/get_provincia_busqueda_select2",
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

        $("#provincia_editar").select2({        
            ajax: {
                url: "<?=base_url()?>index.php/Provincia/get_provincia_busqueda_select2",
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


