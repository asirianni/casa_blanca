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
        Agregar Usuario
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>MENU DE NAVEGACION</a></li>
        <li class="active">ABM USUARIOS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo base_url()?>index.php/Usuarios/abm_usuarios" class="btn btn-primary" ><i class='fa fa-reply'></i> Volver</a>   
            <div class="box" style="margin-top: 10px;">
                <div class="box-body">
                  <form action="#" method="post" id="formulario">
                        <div class="col-md-12" style="text-align: center;">
                                <img height="200" class="" src="<?php echo base_url()?>recursos/images/foto_perfil/default.jpg">
                        </div>

                       <div class="col-md-offset-4 col-md-8" >
                            <label>Seleccione una foto de perfil (opcional)</label>
                            <input type="file" name="foto_perfil">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre*</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido*</label>
                                <input type="text" class="form-control" name="apellido" id="apellido"/>
                            </div>
                        </div>

                        <div class="col-md-6" style="">
                            <div class="form-group">
                                <label for="correo">Correo*</label>
                                <input type="email" class="form-control" name="correo" id="correo"/>
                            </div>
                        </div>

                        <div class="col-md-6" style="">
                            <label for="fecha_registro">Fecha Registro*</label>
                            <input type="text" class="form-control datetimepicker" name="fecha_registro" id="fecha_registro" value="<?php echo date("d-m-Y")?>" readonly="" style="background-color: #fff"/>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>
                        </div>

                        <div class="col-md-6" style="">
                            <div class="form-group">
                                <label for="password2">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password2" name="password2"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nacimiento">Nacimiento: *</label>
                                <input type="text" class="form-control datetimepicker" name="nacimiento" id="nacimiento" readonly="" style="background-color: #fff"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input type="text" class="form-control" name="edad" id="edad" readonly=""/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexo">Sexo: *</label>
                                <select class="form-control" name="sexo" id="sexo">
                                  <option value="h" selected>Hombre</option>
                                  <option value="m">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ocupacion">Ocupacion: *</label>
                                <input type="text" class="form-control" name="ocupacion" id="ocupacion"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="localidad">Localidad: *</label>
                                <select class="form-control" name="localidad" id="localidad"/>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Direccion: *</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Telefono: *</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="movil">Movil: *</label>
                                <input type="text" class="form-control" name="movil" id="movil"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo">Tipo de usuario*</label>
                                <select name="tipo" class="form-control" id="tipo">
                                <?php 
                                foreach($tipos_usuarios as $value)
                                {
                                    echo "<option value='".$value["id"]."'>".$value["tipo"]."</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="estado">Estado*</label>
                            <select name="estado" class="form-control" id="estado">
                            <?php 
                            foreach($estados_usuarios as $value)
                            {
                                echo "<option value='".$value["id"]."'>".$value["estado"]."</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-12" style="text-align:center;">
                            <p style="font-size: 16px;font-weight: bold;color: #F00;" id="mensaje_error_editar"></p>
                        </div>
                        <div class="col-md-12" style="text-align:center;margin-top: 20px;">
                            <input type="button" class="btn btn-primary" value="Guardar Cambios" onClick="guardar_cambios()"/>
                        </div>
                    </form>
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
    function guardar_cambios()
    {
        var nueva_password = $("#nueva_password").val();
        var nueva_password2 = $("#nueva_password2").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var correo = $("#correo").val();
        var tipo= $("#tipo").val();
        var fecha_registro = $("#fecha_registro").val();
        var estado= $("#estado").val();
        
        if(nombre !="" && apellido != "" && correo != ""
           && fecha_registro != "")
        {
            if(!validarEmail(correo))
            {
                $("#mensaje_error_editar").text("Por favor ingrese un correo valido");
            }
            else if(nueva_password != "" && nueva_password != nueva_password2)
            {
                $("#mensaje_error_editar").text("Las contraseñas no coinciden");
            }
            else
            {
                var d = $("#formulario");
                formdata = new FormData();

                // En el formdata colocamos todos los archivos que vamos a subir
                for (var i = 0; i < (d.find('input[type=file]').length); i++) { 
                    // buscará todos los input con el valor "file" y subirá cada archivo. Serán diferenciados en el PHP gracias al "name" de cada uno.
                    formdata.append((d.find('input[type="file"]').eq(i).attr("name")),((d.find('input[type="file"]:eq('+i+')')[0]).files[0]));            
                }

                for (var i = 0; i < (d.find('input').not('input[type=file]').not('input[type=submit]').length); i++) { 
                    // buscará todos los input menos el valor "file" y "sumbit . Serán diferenciados en el PHP gracias al "name" de cada uno.
                    formdata.append( (d.find('input').not('input[type=file]').not('input[type=submit]').eq(i).attr("name")),(d.find('input').not('input[type=file]').not('input[type=submit]').eq(i).val()) );            
                    formdata.append( (d.find('select').not('select[type=file]').not('select[type=submit]').eq(i).attr("name")),(d.find('select').not('select[type=file]').not('select[type=submit]').eq(i).val()) );            

                }
                
                $.ajax({
                    url: "<?php echo base_url()?>index.php/Usuarios/agregar_usuario",
                    type: "POST",
                    contentType: false,
                    data:formdata,
                    processData:false,
                    success: function(data)
                    {
                       data= JSON.parse(data);
                       
                       if(data)
                       {
                           location.href="<?php echo base_url()?>index.php/Usuarios/abm_usuarios";
                       }
                       else
                       {
                         $("#mensaje_error_editar").text("Ha ocurrido un error: asegurese que el usuario y correo no se encuentre agregado y el archivo seleccionado sea una imagen");
                       }
                    },
                    error: function(event){
                       $("#mensaje_error_editar").text("Ha ocurrido un error: asegurese que el usuario y correo no se encuentre agregado y el archivo seleccionado sea una imagen");
                    },
                });  
            }
        }
        else
        {
            $("#mensaje_error_editar").text("Por favor complete todos los campos");
        }
    }
    
    function btn_modificar(){
                var texto = $("#btn_cambiar_password").val();
                
                if(texto == "Modificar")
                {
                    $("#modificar_password").removeAttr("hidden");
                    $("#modificacion_password").val("true");
                    $("#btn_cambiar_password").val("Cancelar modificacion");
                }
                else
                {
                    $("#modificacion_password").val("false");
                    $("#modificar_password").attr("hidden","true");
                    $("#btn_cambiar_password").val("Modificar");
                }
        }
        
        
        
        function validarEmail( email ) 
        {
            for(var i=0; i < email.length;i++)
            {
                if(email.substr(i,1) == "ñ" || email.substr(i,1) == "Ñ" )
                {
                    email= email.substr(0,i)+email.substr(i+1,email.length);
                }
            }
            
           
            var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if ( !expr.test(email) )
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        
        $("#nueva_password").blur(function(){
            var valor =$("#nueva_password").val();
            
            if(valor == "")
            {
                $("#nueva_password").css("border-color","F00");
                $("#nueva_password").css("border-width","2px");
                $("#nueva_password").css("border-style","solid");
            }
            else
            {
                $("#nueva_password").css("border","none");
            }
        });
        $("#nueva_password2").blur(function(){
            
        });

        document.getElementById("edad").value=calcularEdad();

        $("#nacimiento").change(function(){
          document.getElementById("edad").value=calcularEdad();
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

           format:'d-m-Y'
        });

function isValidDate(day,month,year)
{
  var dteDate;

  month=month-1;

  dteDate=new Date(year,month,day);
  return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));

}

function validate_fecha(fecha)
{

  var values=fecha.split("-");

  if(isValidDate(values[0],values[1],values[2]))
  {
    return true;
  }
  

  return false;
}

function calcularEdad()
{
  var fecha=document.getElementById("nacimiento").value;

  if(validate_fecha(fecha)==true)
  {

    var values=fecha.split("-");

    var dia = values[0];
    var mes = values[1];
    var ano = values[2];

    // cogemos los valores actuales

    var fecha_hoy = new Date();
    var ahora_ano = fecha_hoy.getYear();
    var ahora_mes = fecha_hoy.getMonth()+1;
    var ahora_dia = fecha_hoy.getDate();

    // realizamos el calculo

    var edad = (ahora_ano + 1900) - ano;

    if ( ahora_mes < mes ){
     edad--;
    }

    if ((mes == ahora_mes) && (ahora_dia < dia)){
      edad--;
    }

    if (edad > 1900){
      edad -= 1900;
    }

    var meses=0;

    if(ahora_mes>mes){
      meses=ahora_mes-mes;
    }

    if(ahora_mes<mes){
      meses=12-(mes-ahora_mes);
    }

    if(ahora_mes==mes && dia>ahora_dia){
      meses=11;
    }

    var dias=0;

    if(ahora_dia>dia){
      dias=ahora_dia-dia;
    }

    if(ahora_dia<dia){

      ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
      dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
    }



    return edad;

  }else{return 0;}

}
    </script>
</body>
</html>
