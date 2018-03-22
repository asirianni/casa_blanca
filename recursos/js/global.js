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
        
function validar_correo(id_elemento)
{
    var valor = $("#"+id_elemento).val();
    
    if(!validarEmail(valor)){activar_error(id_elemento);return false;}
    else{desactivar_error(id_elemento);return true;}
}

function validar_vacio(id_elemento)
{
    var respuesta = true;
    var valor = $("#"+id_elemento).val();
    
    if(valor == ""){activar_error(id_elemento);respuesta=false;}
    else{desactivar_error(id_elemento);}
    
    return respuesta;
}

function validar_mayor_cero(id_elemento)
{
    var respuesta = true;
    var valor = $("#"+id_elemento).val();
    
    if(valor <= 0 || valor == null){activar_error(id_elemento);respuesta=false;}
    else{desactivar_error(id_elemento);}
    
    return respuesta;
}

function validar_numero(id_elemento)
{
    var respuesta = true;
    var valor = $("#"+id_elemento).val();

    
    if(valor != null || isNaN(parseFloat(valor)) || valor == null){activar_error(id_elemento);respuesta=false;}
    else{desactivar_error(id_elemento);}
    
    return respuesta;
}

function validar_igualdad(id_elemento1,id_elemento2)
{
    var respuesta = true;
    var valor1 = $("#"+id_elemento1).val();
    var valor2 = $("#"+id_elemento2).val();
         
    if(valor1 != valor2){activar_error(id_elemento2);respuesta=false;}
    else{desactivar_error(id_elemento2);}
    
    return respuesta;
}


function activar_error(id)
{
    $("#"+id).css("border-width","2px");
    $("#"+id).css("border-style","solid");
    $("#"+id).css("border-color","#F00");
}

function desactivar_error(id)
{
    $("#"+id).css("border-width","0.1px");
    $("#"+id).css("border-style","solid");
    $("#"+id).css("border-color","#4e565a");
}

function activar_error_label(id)
{
  $("#"+id).css("color","#dd4b39");
}

function desactivar_error_label(id)
{
  $("#"+id).css("color","#000");
}

// VALIDA LA FECHA FORMATO Y SI EXISTE
function validar_fecha_spanish(valor)
{
    var respuesta = true;

    // SI LA FECHA VIENE CON - REMPLAZO POR /

    valor = $.trim(valor);

    if(valor == "")
    {
        return false;
    }

    valor = valor.replace(/-/g, "/");

    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if (!(valor.match(RegExPattern)) && (valor!='')){
            respuesta = false;
      }

    if(respuesta)
    {
        var fechaf = valor.split("/");
        var day = fechaf[0];
        var month = fechaf[1];
        var year = fechaf[2];
        var date = new Date(year,month,'0');

        if((day-0)>(date.getDate()-0)){
              respuesta= false;
        }
    }

    return respuesta;
}

function validar_fecha_hora_spanish(valor)
{
    var respuesta = true;

    // SI LA FECHA VIENE CON - REMPLAZO POR /

    valor= valor.split(" ");

    if(valor.length < 2)
    {
        return false;
    }

    var hora = valor[1];
    valor = valor[0];

    hora = hora.split(":");


    valor = valor.replace(/-/g, "/");

    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if (!(valor.match(RegExPattern)) && (valor!='')){
            respuesta = false;
      }

    if(respuesta)
    {
        var fechaf = valor.split("/");
        var day = fechaf[0];
        var month = fechaf[1];
        var year = fechaf[2];
        var date = new Date(year,month,'0');

        if((day-0)>(date.getDate()-0)){
              respuesta= false;
        }
    }

    if(respuesta == true && hora.length != 3)
    {
        respuesta = false;
    }

    return respuesta;
}

function validar_hora(valor)
{
    var respuesta = true;

    // SI LA FECHA VIENE CON - REMPLAZO POR /

    valor= valor.split(":");

    if(valor.length < 3)
    {
        return false;
    }

    return respuesta;
}

function validar_float(valor)
{
    valor = valor.replace(",",".");

    valor= parseFloat(valor);

    if(isNaN(valor) || valor == "")
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validar_numero_no_cero(valor)
{
    valor = valor.replace(",",".");

    valor= parseFloat(valor);

    if(!isNaN(valor) && valor > 0)
    {
        return true;
    }
    else
    {
        return false;
    }

}



  function validar_longitud_int(valor,longitud)
  {
     var respuesta = false;

     if(valor != null)
     {
        var cantidad_digitos= valor.length;
       
       valor = parseInt(valor);

       if(!isNaN(valor) && cantidad_digitos <= longitud)
       {
          respuesta = true;
       }
     }

     return respuesta;
  }

  function validar_longitud_string(valor,longitud)
  {
     var respuesta = false;

     if(valor.length <= longitud)
     {
        respuesta = true;
     }

     return respuesta;
  }

  function validar_campo_vacio(valor)
  {
    var respuesta = false;

    valor = $.trim(valor);

     if(valor!= "")
     {
        respuesta=true;
     }

     return respuesta;
  }

    


