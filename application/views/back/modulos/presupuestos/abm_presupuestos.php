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
        Presupuestos
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i>Presupuestos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12">
          <a href="<?php echo base_url()?>index.php/Presupuestos/agregar" class="btn btn-primary" >
            <i class='fa fa-plus'></i> Agregar Presupuesto
          </a>

            <div class="box" style="margin-top: 10px;">
                <div class="box-header">
                   Filtro de busqueda:
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="<?php echo base_url() ?>index.php/Presupuestos/abm_presupuestos" method="post">
                    <div class="col-md-2">
                      <label>Fecha Desde</label>
                      <input type="text" name="desde" id="fecha_desde" class="form-control datetimepicker" readonly="" style="background-color: #fff !important;" value="<?php echo $desde ?>">
                    </div>
                    <div class="col-md-2">
                      <label>Fecha Hasta</label>
                      <input type="text" name="hasta" id="fecha_hasta" class="form-control datetimepicker" readonly="" style="background-color: #fff !important;" value="<?php echo $hasta ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Institucion</label>
                      <select id="institucion" name="institucion" class="form-control">
                        <?php
                          if($institucion)
                          {
                            echo "<option value='".$institucion["id"]."'>".$institucion["nombre_organizacion"]."</option>";
                          }
                          else
                          {
                            echo "<option value='0'>Todas</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label>&nbsp;</label>
                      <button type="text" onClick='' class="btn btn-primary form-control">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
         </div>


        <div class="col-md-12">
            <div class="box">
                
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                    <thead>
                      <tr >
                        <th>Numero</th>
                        <th>Fecha</th>
                        <th>Fecha llegada</th>
                        <th>Establecimiento</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th style="width: 105px;">Controles</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php foreach ($presupuestos as $value)
                      { 
                        echo "
                        <tr>
                            <td>".$value["numero"]."</td>
                            <td>".$value["fecha"]."</td>
                            <td>".$value["fecha_llegada"]."</td>
                            <td>".$value["establecimiento_nombre_organizacion"]."</td>
                            <td>".$value["total"]."</td>
                            <td>".$value["estado"]."</td>
                            <td>
                                <a href='".base_url()."index.php/Presupuestos/editar/".$value["numero"]."' class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Editar' onClick='modal_editar(".$value["numero"].")'><i class='fa fa-edit'></i></a>&nbsp;
                                <a target='_blank' href='".base_url()."index.php/Presupuestos/generar_pdf/".$value["numero"]."' class='btn btn-sm btn-info' data-toggle='tooltip' title='' data-original-title='Generar PDF' >
                                  <i class='fa fa-file-pdf-o'></i>
                                  </a>&nbsp;
                                <button class='btn btn-sm btn-danger' data-toggle='tooltip' title='' data-original-title='Eliminar' onClick='modal_eliminar(".$value["numero"].")'>
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

<div class="modal modal-default modal_eliminar" id="modal_eliminar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Eliminar Presupuesto:</h4>
            </div>
            <div class="modal-body">
                
                <p>¿Desea eliminar el presupuesto seleccionado?</p>
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
          url: "<?php echo base_url()?>index.php/Presupuestos/eliminar",
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
            alert("ERROR: No se ha podido eliminar");
          },
    });
  }


  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
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

         format:'Y-m-d'
    });

    $("#institucion").select2({        
          ajax: {
              url: "<?=base_url()?>index.php/Instituciones/get_institucion_busqueda_select2",
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
    </script>
</body>
</html>
