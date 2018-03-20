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

  <style>
  .fila{
      margin-top: 20px;
  }
  
  .marco
  {
      width: 99%;
      border-width: 2px;
      border-color: #000;
      border-style: solid;
      margin: 2px 2px 2px 2px;
      padding: 10px 10px 20px 10px;
      background-color: #fff;
  }
  </style>
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
        Agregar Presupuesto
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i>Presupuestos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
          
        <div class="col-md-12">
            <div class="col-md-12 marco">
                <div class="col-md-2">
                    <div class="col-md-12">
                        <p><img height="100" src="<?php echo base_url()?>recursos/images/imagen_factura.png"/></p>
                    </div>
                </div>
               
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <label>Numero</label>
                            <input type="text" class="form-control" id="numero" value="<?php echo $numero_proximo?>" disabled>
                        </div>
                        <div class="col-md-2">
                            <label>Fecha</label>
                            <input type="text" class="form-control datetimepicker"  id="fecha" value="<?php echo Date("Y-m-d")?>" readonly="" style="background-color: #fff;">
                        </div>
                        <div class="col-md-6">
                            <label>Institucion</label>
                            <select class="form-control"  id="establecimiento" style="width: 100% !important;">
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label></label>
                            <button class="btn btn-primary form-control" onClick="$('#modal_agregar_institucion').modal('show')">
                              <i class="fa  fa-user-plus"></i> Nuevo
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-offset-2 col-md-10">
                  <div class="col-md-2">
                      <label>Fecha llegada</label>
                      <input type="text" class="form-control datetimepicker" id="fecha_llegada"  readonly="" style="background-color: #fff;">
                  </div>
                  <div class="col-md-5">
                      <label>Direccion</label>
                      <input type="text" class="form-control"  id="direccion">
                  </div>
                  <div class="col-md-5">
                      <label>Localidad</label>
                      <select class="form-control"  id="localidad" style="width: 100% !important;">
                      </select>
                  </div>
              </div>

            </div>
        </div>

          
        <div class="col-md-12">
            <div class="col-md-12 marco">
                <div class="col-md-12 fila">
                    <span><strong>DETALLES DE PRESUPUESTO</strong></span> 
                    <button class="btn btn-primary disabled" id='btn_agregar_producto_detalle' onClick="ver_modal_lista_productos()"><i class="fa fa-plus"></i> Rubro</button>
                    <button class="btn btn-primary disabled" id="btn_asociar_pedido"><i class="fa fa-plus"></i> Producto</button>
                    <button class="btn btn-primary disabled" id="btn_agregar_producto_detalle_vacio" onclick="agregar_detalle_vacio()"><i class="fa fa-plus"></i> Agregar vacio</button>        
                </div>
                <div class="col-md-12 fila">
                    <div class="box">
                        <div class="box-header">
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="tabla_listado" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style='display: none;'>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Desc</th>
                                        <th>Subtotal</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo_tabla_listado">

                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
        <div class="col-md-12" >
            <div class="col-md-offset-6 col-md-6">
                <div class="marco" style="font-size: 18px;">
                    <p>SUB-TOTAL: $<span id='subtotal'>0</span></p>
                    <p>DESC. GRAL: <input type="number"  class=""  id="descuento_general" value="" onChange='generar_html_tabla_listado()' disabled> -$<span id="pesos_de_descuento">0</span></p>
                    <!--<p>IMPUESTOS: $<span id='impuestos'>0</span></p>-->
                    <p>TOTAL: $<span id='total'>0</span></p>
                    <label>ESTADO FACTURA:</label>
                    <select id="estado_factura">
                        <option value="1">PAGO</option>
                        <option value="2">PENDIENTE PAGO</option>
                    </select>
                    <br><br>

                    <div style="font-size: 12px;">
                      <div class="col-md-6">
                        <label>Docente</label>
                        <input type="text" class="form-control" name="docente_a_cargo" id="docente_a_cargo">
                      </div>

                      <div class="col-md-6">
                        <label>Grado</label>
                        <input type="text" class="form-control" name="grado" id="grado">
                      </div>

                      <div class="col-md-6">
                        <label>Acompañante</label>
                        <input type="text" class="form-control" name="acompaniante" id="acompaniante">
                      </div>

                      <div class="col-md-6">
                        <label>Año</label>
                        <input type="text" class="form-control" name="anio" id="anio">
                      </div>

                      <div class="col-md-6">
                        <label>Mujeres</label>
                        <input type="text" class="form-control" name="mujeres" id="mujeres">
                      </div>

                      <div class="col-md-6">
                        <label>Varones</label>
                        <input type="text" class="form-control" name="varones" id="varones">
                      </div>

                      <p>Perfil / Observaciones:</p>
                      <textarea id="observaciones" class="form-control">
                      </textarea>
                    </div>
                    
                    <p style="text-align: center;margin-top: 20px;">
                        <button class="btn btn-primary disabled" id="btn_guardar" onclick="abrir_modal_guardar();"><i class="fa fa-save"></i><br/>GUARDAR</button>
                        <button class="btn btn-primary disabled" id="btn_nuevo" onclick=""><i class="fa fa-calculator"></i><br/>Nuevo</button>
                    </p>
                </div>
            </div>
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

<!-- EDITADO -->


<div class="modal modal-default modal_agregar" id="modal_agregar_institucion">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Institucion:</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <label for="nombre_organizacion_agregar_institucion" id="label_nombre_organizacion_agregar_institucion">Nombre: *</label>
                    <input type="text" id="nombre_organizacion_agregar_institucion" class="form-control" name="nombre_organizacion_agregar_institucion">
                </div>
                <div class="col-md-6">
                    <label for="direccion_agregar_institucion" id="label_direccion_agregar_institucion">Direccion: *</label>
                    <input type="text" id="direccion_agregar_institucion" class="form-control" name="direccion_agregar_institucion">
                </div>
                <div class="col-md-6">
                    <label for="telefono_agregar_institucion" id="label_telefono_agregar_institucion">Telefono: *</label>
                    <input type="text" id="telefono_agregar_institucion" class="form-control" name="telefono_agregar_institucion">
                </div>
                <div class="col-md-6">
                    <label for="correo_agregar_institucion" id="label_correo_agregar_institucion">Correo: *</label>
                    <input type="text" id="correo_agregar_institucion" class="form-control" name="correo_agregar_institucion">
                </div>
                <div class="col-md-6">
                    <label for="rector_agregar_institucion" id="label_rector_agregar_institucion">Rector: *</label>
                    <input type="text" id="rector_agregar_institucion" class="form-control" name="rector_agregar_institucion">
                </div>
                <div class="col-md-6">
                    <label for="referente_agregar_institucion" id="label_referente_agregar_institucion">Referente: *</label>
                    <input type="text" id="referente_agregar_institucion" class="form-control" name="referente_agregar_institucion">
                </div>
                <div class="col-md-12">
                    <label for="localidad_agregar_institucion" id="label_localidad_agregar_institucion">Localidad: *</label>
                    <select id="localidad_agregar_institucion" class="form-control" name="localidad_agregar_institucion" style="width: 100% !important;">
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_agregar_institucion').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
              <button class="btn btn-sm btn-primary pull-right" onCLick="agregar_institucion()">
                <i class="fa fa-save"></i> Guardar
              </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<!-- // FIN EDITADO -->

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

<script>
$(document).ready(function(){
  $("#establecimiento").select2({        
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

  $("#localidad_agregar_institucion").select2({        
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

  $("#localidad").select2({        
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

});

function agregar_institucion()
  {
    var nombre_organizacion = $.trim($("#nombre_organizacion_agregar_institucion").val());
    var direccion = $.trim($("#direccion_agregar_institucion").val());
    var localidad = $.trim($("#localidad_agregar_institucion").val());
    var telefono = $.trim($("#telefono_agregar_institucion").val());
    var correo = $.trim($("#correo_agregar_institucion").val());
    var rector = $.trim($("#rector_agregar_institucion").val());
    var referente = $.trim($("#referente_agregar_institucion").val());

    if(validar_agregar_institucion())
    {
      $.ajax({
          url: "<?php echo base_url()?>index.php/Instituciones/agregar",
          type: "POST",
          data:{nombre_organizacion:nombre_organizacion,direccion:direccion,localidad:localidad,telefono:telefono,correo:correo,rector:rector,referente:referente},
          success: function(data)
          {
            data= JSON.parse(data);
            
            if(data)
            {
              var html_option = "<option value='"+data["id"]+"'>"+data["nombre_organizacion"]+"</option>";

              $("#establecimiento").html(html_option);
              $("#establecimiento").val(data["id"]).trigger("change");

              $("#modal_agregar_institucion").modal("hide");
            }
            else
            {
              alert("ERROR: verifique que la institucion no este agregada");
            }
          },
          error: function(event){
            alert("ERROR: verifique que la institucion no este agregada");
          },
      });
    }
  }

  function validar_agregar_institucion()
  {
    var respuesta = true;

    var nombre_organizacion = $.trim($("#nombre_organizacion_agregar_institucion").val());
    var direccion = $.trim($("#direccion_agregar_institucion").val());
    var localidad = $.trim($("#localidad_agregar_institucion").val());
    var telefono = $.trim($("#telefono_agregar_institucion").val());
    var correo = $.trim($("#correo_agregar_institucion").val());
    var rector = $.trim($("#rector_agregar_institucion").val());
    var referente = $.trim($("#referente_agregar_institucion").val());

    if(nombre_organizacion == "")
    {
      activar_error("label_nombre_organizacion_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_nombre_organizacion_agregar_institucion");
    }

    if(direccion == "")
    {
      activar_error("label_direccion_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_direccion_agregar_institucion");
    }

    if(localidad == "")
    {
      activar_error("label_localidad_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_localidad_agregar_institucion");
    }

    if(telefono == "")
    {
      activar_error("label_telefono_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_telefono_agregar_institucion");
    }

    if(correo == "" || !validarEmail(correo))
    {
      activar_error("label_correo_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_correo_agregar_institucion");
    }

    if(rector == "")
    {
      activar_error("label_rector_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_rector_agregar_institucion");
    }

    if(referente == "")
    {
      activar_error("label_referente_agregar_institucion");
      respuesta = false;
    }
    else
    {
      desactivar_error("label_referente_agregar_institucion");
    }

    return respuesta;
  }

</script>

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
  });
    </script>
</body>
</html>
