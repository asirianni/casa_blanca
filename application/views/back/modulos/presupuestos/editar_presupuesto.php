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
        Editar Presupuesto
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
          <a href="<?php echo base_url() ?>index.php/Presupuestos/abm_presupuestos" class="btn btn-sm btn-primary">
            <i class="fa fa-reply"></i>
          </a>
            <div class="col-md-12 marco">
                <div class="col-md-2">
                    <div class="col-md-12">
                        <p><img width="150" src="<?php echo base_url()?>recursos/images/<?php echo $logo ?>"/></p>
                    </div>
                </div>
               
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <label>Numero</label>
                            <input type="text" class="form-control" id="numero" value="<?php echo $presupuesto["numero"]?>" disabled>
                        </div>
                        <div class="col-md-2">
                            <label id="label_fecha">Fecha *</label>
                            <input type="text" class="form-control datetimepicker"  id="fecha" value="<?php echo $presupuesto["fecha"]?>" readonly="" style="background-color: #fff;">
                        </div>
                        <div class="col-md-6">
                            <label id="label_establecimiento">Institucion *</label>
                            <select class="form-control"  id="establecimiento" style="width: 100% !important;">
                              <?php
                                if($institucion)
                                {
                                  echo "<option value='".$institucion["id"]."'>".$institucion["nombre_organizacion"]."</option>";
                                }
                                else
                                {
                                  echo "<option value='0'></option>";
                                }
                              ?>
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
                      <input type="text" class="form-control datetimepicker" id="fecha_llegada"  readonly="" style="background-color: #fff;" value="<?php echo $presupuesto["fecha_llegada"]?>">
                  </div>
                  <div class="col-md-5">
                      <label>Direccion</label>
                      <input type="text" class="form-control"  id="direccion" value="<?php echo $presupuesto["direccion"]?>">
                  </div>
                  <div class="col-md-5">
                      <label>Localidad</label>
                      <select class="form-control"  id="localidad" style="width: 100% !important;">
                        <?php
                        if($localidad)
                        {
                          echo "<option value='".$localidad["codigo"]."'>".$localidad["localidad"]."</option>";
                        }
                        else
                        {
                          echo "<option value='0'></option>";
                        }
                      ?>
                      </select>
                  </div>
              </div>

            </div>
        </div>

          
        <div class="col-md-12">
            <div class="col-md-12 marco">
                <div class="col-md-12 fila">
                    <span><strong>DETALLES DE PRESUPUESTO</strong></span> 
                    <button class="btn btn-primary" onclick="ver_modal_lista_rubros()"><i class="fa fa-plus"></i> Rubro</button>
                    <button class="btn btn-primary" onclick="ver_modal_lista_productos()"><i class="fa fa-plus"></i> Producto</button>
                    <button class="btn btn-primary" onclick="agregar_detalle_vacio()"><i class="fa fa-plus"></i> Agregar vacio</button>        
                </div>
                <div class="col-md-12 fila">
                    <div class="box">
                        <div class="box-header">
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="tabla_listado" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
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
                    <p>DESC. GRAL: <input type="number"  class=""  id="descuento_general" value="<?php echo $presupuesto["descuento_general"] ?>" onChange='generar_html_tabla_listado()'> -$<span id="pesos_de_descuento">0</span></p>
                    <!--<p>IMPUESTOS: $<span id='impuestos'>0</span></p>-->
                    <p>TOTAL: $<span id='total'><?php echo $presupuesto["total"] ?></span></p>
                    <label>ESTADO:</label>
                    <select id="estado">
                      <?php
                        $estados = array("pendiente","cumplido","anulado","eliminado");

                        for($i=0; $i < count($estados);$i++)
                        {
                          if($presupuesto["estado"] == $estados[$i])
                          {
                            echo "<option value='".$estados[$i]."' selected>".$estados[$i]."</option>";
                          }
                          else
                          {
                            echo "<option value='".$estados[$i]."'>".$estados[$i]."</option>";
                          }
                        }

                      ?>
                    </select>
                    <br><br>

                    <div style="font-size: 12px;">
                      <div class="col-md-6">
                        <label>Docente</label>
                        <input type="text" class="form-control" name="docente_a_cargo" id="docente_a_cargo" value="<?php echo $presupuesto["docente_a_cargo"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Acompañante</label>
                        <input type="text" class="form-control" name="acompaniante" id="acompaniante" value="<?php echo $presupuesto["acompaniantes"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Grado</label>
                        <input type="text" class="form-control" name="grado" id="grado" value="<?php echo $presupuesto["grado"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Año</label>
                        <input type="text" class="form-control" name="anio" id="anio" value="<?php echo $presupuesto["anio"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Curso</label>
                        <input type="text" class="form-control" name="curso" id="curso" value="<?php echo $presupuesto["curso"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Ciclo</label>
                        <input type="text" class="form-control" name="ciclo" id="ciclo" value="<?php echo $presupuesto["ciclo"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Mujeres</label>
                        <input type="number" class="form-control" name="mujeres" id="mujeres" value="<?php echo $presupuesto["mujeres"]?>">
                      </div>

                      <div class="col-md-6">
                        <label>Varones</label>
                        <input type="number" class="form-control" name="varones" id="varones" value="<?php echo $presupuesto["varones"]?>">
                      </div>

                      <p>Perfil / Observaciones:</p>
                      <textarea id="observaciones" class="form-control"><?php echo $presupuesto["perfil"]?></textarea>
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

<div class="modal modal-default modal_agregar" id="modal_agregar_producto">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Producto:</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-md-12">
                  <table id="listado_productos" class="table table-bordered table-hover" style="text-align: center;">
                    <thead>
                      <tr >
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th style="width: 15px !important;">Controles</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($productos as $value)
                      { 
                        echo "
                        <tr>
                            <td>".$value["descripcion"]."</td>
                            <td>".$value["precio"]."</td>
                            <td style='width: 15px !important;'>
                                <button class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Agregar' onClick='agregar_detalle_producto(".$value["id"].")'>
                                    <i class='fa fa-plus'></i>
                                </button>&nbsp;";
                                
                        echo "</td>
                        </tr>";
                      }?>
                    </tbody>
                  </table>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_agregar_producto').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default modal_agregar" id="modal_agregar_rubro">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Rubro:</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-md-12">
                  <table id="listado_rubros" class="table table-bordered table-hover" style="text-align: center;">
                    <thead>
                      <tr>
                        <th>RUBRO</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($rubros as $value)
                      {
                        echo "
                        <tr>
                            <td><span id='rubro_".$value["id"]."'>".$value["rubro"]."</span></td>
                            <td>
                                <button class='btn btn-sm btn-primary' data-toggle='tooltip' title='' data-original-title='Agregar' onCLick='agregar_detalle_rubro(".$value["id"].")'><i class='fa fa-plus'></i></button>";
                                
                      echo "</td>
                        </tr>";
                      }?>
                    </tbody>
                  </table>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-default pull-left" onCLick="$('#modal_agregar_rubro').modal('hide')"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal modal-default modal_agregar" id="modal_imprimir_presupuesto">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="text-align: center;">Imprimir</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" style='text-align: center;'>
                        <p style="font-weight: bold;font-size: 17px;">¿Desea imprimir la presupuesto?</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
               <div class="col-md-12" style="text-align: center;">
                  <button class="btn btn-default" onClick="procesar();"><i class='fa fa-close'></i> No</button>
                  <button class="btn btn-primary" onClick="si_imprimir();"><i class='fa fa-print'></i> Si</button>
               </div>
           </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal modal-default modal_agregar" id="modal_guardar_presupuesto">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="text-align: center;">Guardar</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" style='text-align: center;'>
                        <p style="font-weight: bold;font-size: 17px;">¿Desea guardar la presupuesto?</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
           <div class="col-md-12" style="text-align: center;">
                <button class="btn btn-default" onClick="$('#modal_guardar_presupuesto').modal('hide');"><i class='fa fa-close'></i> No</button>
                <button class="btn btn-primary" onClick="procesar();"><i class='fa fa-save'></i> Si</button>
           </div>
       </div>
    </div><!-- /.modal-dialog -->
</div>

<form action="" id="formulario_imprimir" target="_blank"></form>
<!-- // FIN EDITADO -->


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

var productos_cargados = false;
var arreglo_detalles = new Array();
var id_tr=1;
var imprimir = false;

function ver_modal_lista_productos()
{
  $("#modal_agregar_producto").modal("show");
}

function ver_modal_lista_rubros()
{
  $("#modal_agregar_rubro").modal("show");
}

function agregar_detalle_vacio(){
    var arreglo={id_tr:id_tr,codigo_es_rubro:0,codigo_item:0,descripcion:"",cantidad:1.0,precio:0.0,descuento:0.0};
    arreglo_detalles.push(arreglo);  
    id_tr++;

    $("#btn_guardar").removeClass("disabled");
    generar_html_tabla_listado();
}

function agregar_detalle_rubro(id){

  $.ajax({
      url: "<?php echo base_url()?>index.php/Rubros/get_rubro",
      type: "POST",
      data:{id:id},
      success: function(data)
      {
        data= JSON.parse(data);

        data=data["row"];
              
        var arreglo={id_tr:id_tr,codigo_es_rubro:1,codigo_item:data["id"],descripcion:data["rubro"],cantidad:1.0,precio:data["precio"],descuento:0.0};
        arreglo_detalles.push(arreglo);  
        id_tr++;
        
        $("#btn_guardar").removeClass("disabled");
        $("#modal_agregar_rubro").modal("hide");
        generar_html_tabla_listado();
      },
      error: function(event){alert(event.responseText);
      },
  });
}

function agregar_detalle_producto(id){

  $.ajax({
      url: "<?php echo base_url()?>index.php/Productos/get_producto",
      type: "POST",
      data:{id:id},
      success: function(data)
      {
        data= JSON.parse(data);
              
        var arreglo={id_tr:id_tr,codigo_es_rubro:0,codigo_item:data["id"],descripcion:data["descripcion"],cantidad:1.0,precio:data["precio"],descuento:0.0};
        arreglo_detalles.push(arreglo);  
        id_tr++;
        
        $("#btn_guardar").removeClass("disabled");
        $("#modal_agregar_producto").modal("hide");
        generar_html_tabla_listado();
      },
      error: function(event){alert(event.responseText);
      },
  });
}

function generar_html_tabla_listado()
{
    var html="";
    
    var suma_totales = 0;
    var suma_sub_totales= 0;
    
    for(var i=0; i < arreglo_detalles.length;i++)
    {
        
        if(arreglo_detalles[i] != undefined)
        {
          var id_tr =arreglo_detalles[i]["id_tr"];
          var descripcion =arreglo_detalles[i]["descripcion"];
          var cantidad =arreglo_detalles[i]["cantidad"];
          var precio =arreglo_detalles[i]["precio"];
          var descuento =arreglo_detalles[i]["descuento"];


          var sub_total= cantidad * precio;
          var descuento_en_pesos= (cantidad * precio) * descuento / 100;
          var total= (cantidad * precio) - descuento_en_pesos;

          suma_sub_totales+= sub_total;
          suma_totales+=total;
          
          html+="<tr id='tr_"+id_tr+"'>";
          html+="<td><textarea rows='1' cols='30' id='descripcion_"+id_tr+"' onChange='cambio_valor("+id_tr+")'>"+descripcion+"</textarea></td>";
          html+="<td><input type='text' id='cantidad_"+id_tr+"' value='"+cantidad+"' onChange='cambio_valor("+id_tr+")'></td>";
          html+="<td><input type='text' id='precio_"+id_tr+"' value='"+precio+"' onChange='cambio_valor("+id_tr+")'></td>";
          html+="<td><input type='text' id='descuento_"+id_tr+"' value='"+descuento+"' onChange='cambio_valor("+id_tr+")'></td>";
          
          html+="<td style='font-weight: bold;' id='subtotal_"+id_tr+"'>$"+sub_total.toFixed(2)+"</td>";
          html+="<td style='font-weight: bold;' id='total_"+id_tr+"'>$"+total.toFixed(2)+"</td>";
          html+="<td><button class='btn btn-sm btn-danger' onClick='eliminar_registro("+id_tr+")'><i class='fa fa-trash-o'></i></button></td>";
          html+="</tr>";
        }
    }
    
    $("#subtotal").text(suma_sub_totales.toFixed(2));

    var descuento_general = parseFloat($("#descuento_general").val());

    if(isNaN(descuento_general)){descuento_general=0;}

    suma_totales = suma_totales - ((suma_totales * descuento_general) / 100);

    $("#total").text((suma_totales).toFixed(2));
    $("#cuerpo_tabla_listado").html(html);
    
    verificar_descripciones_vacias();
 }

function verificar_descripciones_vacias()
{
  var respuesta = true;

  for(var i=0; i < arreglo_detalles.length;i++)
  {
      if(arreglo_detalles[i] != undefined)
      {
          var id_tr = arreglo_detalles[i]["id_tr"];

          var descripcion = $("#descripcion_"+id_tr).val();
          descripcion = $.trim(descripcion);

          if(descripcion == "")
          {
            activar_error_input("descripcion_"+id_tr);
            respuesta=false;
          }
          else
          {
            desactivar_error_input("descripcion_"+id_tr);
          }
      }
  }

  return respuesta;
}

function cambio_valor(id_tr)
{
  var i= get_posicion_codigo_en_arreglo(id_tr);
   
  var descripcion =$("#descripcion_"+id_tr).val();
  descripcion = $.trim(descripcion);
  
  var cantidad = $("#cantidad_"+id_tr).val();
  cantidad = cantidad.replace(",",".");
  cantidad = parseFloat(cantidad);
  
  var precio = $("#precio_"+id_tr).val();
  precio = precio.replace(",",".");
  precio= parseFloat(precio);

  var descuento = $("#descuento_"+id_tr).val();
  descuento = descuento.replace(",",".");
  descuento= parseFloat(descuento);
  
  if(isNaN(cantidad))
  {
      cantidad=arreglo_detalles[i]["cantidad"];
  }

  if(isNaN(precio))
  {
      precio=arreglo_detalles[i]["precio"];
  }

  if(isNaN(descuento))
  {
      descuento=arreglo_detalles[i]["descuento"];
  }
  
  var descuento_en_pesos=((precio*cantidad) * descuento / 100);
  var total = (precio*cantidad) - descuento_en_pesos;

  arreglo_detalles[i]["descripcion"]=descripcion;
  arreglo_detalles[i]["cantidad"]=cantidad;
  arreglo_detalles[i]["precio"]=precio;
  arreglo_detalles[i]["descuento"]=descuento;
  arreglo_detalles[i]["subtotal"]= (precio*cantidad);
  arreglo_detalles[i]["total"]=total;
  
  generar_html_tabla_listado();
}

function get_posicion_codigo_en_arreglo(id_tr)
{
    var i=0;
    var valor = -1;
    
    while( i < arreglo_detalles.length)
    {
        if(arreglo_detalles[i] != undefined)
        {
            if(arreglo_detalles[i]["id_tr"] == id_tr)
            {
                valor = i;
                i= arreglo_detalles.length;
            }
        }
        i++;
    }
    
    return valor;
}

function eliminar_registro(id_tr)
{
  var posicion = get_posicion_codigo_en_arreglo(id_tr);
        
  delete arreglo_detalles[posicion];

  ccleaner_arreglo_detalle();
  
  if(arreglo_detalles.length <= 0)
  {
    $("#btn_guardar").addClass("disabled");
  }
  else
  {
    $("#btn_guardar").removeClass("disabled");
  }

  generar_html_tabla_listado();
}

function ccleaner_arreglo_detalle()
{
    var aux=new Array();
    
    for(var i=0; i < arreglo_detalles.length;i++)
    {
        if(arreglo_detalles[i] != undefined)
        {
            aux.push(arreglo_detalles[i]);
        }
    }
    
    arreglo_detalles=aux;
}

function abrir_modal_guardar()
{
  $('#modal_imprimir_presupuesto').modal('show');
}

function no_imprimir()
{
    imprimir= false;
    $("#modal_imprimir_presupuesto").modal("hide");
    $("#modal_guardar_presupuesto").modal("show");
}
function si_imprimir()
{
    imprimir=true;
    $("#modal_imprimir_presupuesto").modal("hide");
    procesar();
}

function procesar()
{
   
  $("#modal_imprimir_presupuesto").modal("hide");
  $("#modal_guardar_presupuesto").modal("hide");

  ccleaner_arreglo_detalle();
  
  var fecha = $("#fecha").val();
  var establecimiento = $("#establecimiento").val();

  var fecha_llegada = $("#fecha_llegada").val();
  var direccion = $("#direccion").val();
  var localidad = $("#localidad").val();
  var docente_a_cargo = $("#docente_a_cargo").val();
  var grado = $("#grado").val();
  var acompaniante = $("#acompaniante").val();
  var anio = $("#anio").val();
  var mujeres = $("#mujeres").val();
  var varones = $("#varones").val();
  var perfil = $("#observaciones").val();
  var curso = $("#curso").val();
  var ciclo = $("#ciclo").val();
  var estado = $("#estado").val();
  var descuento_general = $("#descuento_general").val();

  if(validar_procesar() && verificar_descripciones_vacias())
  {
    $.ajax({
        url: "<?php echo base_url()?>index.php/Presupuestos/editar",
        type: "POST",
        data:{
            numero_presupuesto:<?php echo $presupuesto["numero"]?>,
            fecha:fecha,
            establecimiento:establecimiento,
            fecha_llegada:fecha_llegada,
            direccion:direccion,
            localidad:localidad,
            docente_a_cargo:docente_a_cargo,
            grado:grado,
            acompaniante:acompaniante,
            anio:anio,
            mujeres:mujeres,
            varones:varones,
            perfil:perfil,
            curso:curso,
            ciclo:ciclo,
            estado:estado,
            descuento_general:descuento_general,
            detalle:arreglo_detalles
        },
        success: function(data)
        {
           data= JSON.parse(data);
                
          if(data["respuesta"])
          {
            if(imprimir)
            {
              $("#formulario_imprimir").attr("action","<?php echo base_url()?>index.php/Presupuestos/generar_pdf/"+data["numero_presupuesto"]);
              $("#formulario_imprimir").submit();
            }
            
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
  else
  {
    alert("Complete los datos obligatorios");
  }
}

function validar_procesar()
{
  var respuesta = true;

  var fecha = $("#fecha").val();
  var establecimiento = parseFloat($("#establecimiento").val());

  if(arreglo_detalles.length == 0)
  {
    respuesta=false;
    alert("El presupuesto no tiene ningun detalle agregado");
  }

  if(fecha == "")
  {
    activar_error("label_fecha");
    respuesta= false;
  }
  else
  {
    desactivar_error("label_fecha");
  }

  if(isNaN(establecimiento) || establecimiento == 0)
  {
    activar_error("label_establecimiento");
    respuesta= false;
  }
  else
  {
    desactivar_error("label_establecimiento");
  }

  return respuesta;
}

function activar_error_input(id)
{
    $("#"+id).css("border-width","2px");
    $("#"+id).css("border-style","solid");
    $("#"+id).css("border-color","#dd4b39");
}

function desactivar_error_input(id)
{
    $("#"+id).css("border-width","0px");
}

$(document).ready(function(){

<?php
$productos= $detalle_presupuesto["productos"];
$rubros= $detalle_presupuesto["rubros"];
$no_rubros_no_productos= $detalle_presupuesto["no_rubros_no_productos"];

foreach ($productos as $value)
{
    $cantidad = (float)$value["cantidad"];
    $unitario = (float)$value["precio"];


    $subtotal =$unitario;
    $total=$subtotal*$cantidad;

?>
    var arreglo= {id_tr:id_tr,codigo_es_rubro:<?php echo $value["codigo_es_rubro"]?>,codigo_item:<?php echo $value["codigo_item"]?>,descripcion:'<?php echo $value["descripcion"]?>',cantidad:<?php echo $value["cantidad"]?>,precio:<?php echo $value["precio"]?>,descuento:<?php echo $value["descuento"]?>};
    arreglo_detalles.push(arreglo);  
    id_tr++;
    $("#btn_guardar").removeClass("disabled");
<?php } ?>

<?php
foreach ($rubros as $value)
{
    $cantidad = (float)$value["cantidad"];
    $unitario = (float)$value["precio"];


    $subtotal =$unitario;
    $total=$subtotal*$cantidad;

?>
    var arreglo= {id_tr:id_tr,codigo_es_rubro:<?php echo $value["codigo_es_rubro"]?>,codigo_item:<?php echo $value["codigo_item"]?>,descripcion:'<?php echo $value["descripcion"]?>',cantidad:<?php echo $value["cantidad"]?>,precio:<?php echo $value["precio"]?>,descuento:<?php echo $value["descuento"]?>};
    arreglo_detalles.push(arreglo);  
    id_tr++;
    $("#btn_guardar").removeClass("disabled");
<?php } ?>

<?php
foreach ($no_rubros_no_productos as $value)
{
    $cantidad = (float)$value["cantidad"];
    $unitario = (float)$value["precio"];


    $subtotal =$unitario;
    $total=$subtotal*$cantidad;

?>
    var arreglo= {id_tr:id_tr,codigo_es_rubro:<?php echo $value["codigo_es_rubro"]?>,codigo_item:<?php echo $value["codigo_item"]?>,descripcion:'<?php echo $value["descripcion"]?>',cantidad:<?php echo $value["cantidad"]?>,precio:<?php echo $value["precio"]?>,descuento:<?php echo $value["descuento"]?>};
    arreglo_detalles.push(arreglo);  
    id_tr++;
    $("#btn_guardar").removeClass("disabled");
<?php } ?>

  
  generar_html_tabla_listado();

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

    $("#listado_productos").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    $("#listado_rubros").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
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
</body>
</html>
