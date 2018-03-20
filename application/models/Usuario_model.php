<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * MODELO QUE SE ENCARGA DE OBTENER
 * DATOS DE LA TABLA USUARIOS SSS
 */


class Usuario_model extends CI_Model
{
    
    
    public function get_cantidad_operativos()
  {
    $row= $this->db->query("SELECT count(id) as cantidad FROM usuarios where usuarios.estado = 1 ");     
    $row= $row->row_array(); 
    return $row["cantidad"];
  }

  public function get_cantidad_suspendidos()
  {
    $row= $this->db->query("SELECT count(id) as cantidad FROM usuarios where usuarios.estado = 2 ");     
    $row= $row->row_array(); 
    return $row["cantidad"];
  }

    public function get_usuario_busqueda_select2($termino)
    {
        $sql= "select * from usuarios where usuario like '".$termino."%'";
        $r= $this->db->query($sql);
        $datos = $r->result_array();
        
        $data = Array();
        
        // Make sure we have a result
        if(count($datos) > 0){
           foreach ($datos as $value) {
            $data[] = array('id' => $value['id'], 'text' => $value['usuario']);              
           } 
        } else {
           $data[] = array('id' => '0', 'text' => 'Buscar usuario');
        }

        return $data;
    }

    /*public function get_usuario_inicio_sesion($usuario,$password)
    {
        $r = $this->db->query("select * from usuarios where usuario = '$usuario'");
        $valor_obtenido=$r->row_array();
        
        $respuesta=array(
            "estado"=>""
        );
        
        
        if ($valor_obtenido!=null) {
            $cifrar=new Md5();
            $pass_encriptada=$valor_obtenido["pass"];
            $pass_desencriptada=$cifrar->descifrar($pass_encriptada);
            if($pass_desencriptada==$password){
                $valor_obtenido["pass"]=$password;
                $respuesta=$valor_obtenido;
            }
        }
        
        return $respuesta;
    }*/
    
    public function get_usuario_inicio_sesion_con_correo($correo,$password)
    {
        $respuesta=array(
            "estado"=>""
        );
        
        $r = $this->db->query("select * from usuarios where correo = '$correo'");
        $valor_obtenido=$r->row_array();
        

        if ($valor_obtenido!=null) {
            $cifrar=new Md5();
            $pass_encriptada=$valor_obtenido["pass"];
            $pass_desencriptada=$cifrar->descifrar($pass_encriptada);
            if($pass_desencriptada==$password){
                $valor_obtenido["pass"]=$password;
                $respuesta=$valor_obtenido;
            }
        }
        
        return $respuesta;
    }

    public function get_permiso_modulo_tipo_usuario($id_modulo,$id_tipo_usuario)
    {
       $r = $this->db->query("SELECT * FROM modulos_usuarios where id_tipo_usuario = $id_tipo_usuario and id_modulo = $id_modulo ");
       return $r->row_array(); 
    }

  public function editar_usuario($id,$correo,$pass,$nombre,$apellido,$nacimiento,$edad,$sexo,$ocupacion,$direccion,$id_localidad,$telefono,$movil,$foto_perfil,$fecha_registro,$fecha_suspension,$estado,$tipo_usuario)
    {
        $datos = Array(
            "correo"=>$correo,
            "nombre"=>$nombre,
            "pass"=>$pass,
            "apellido"=>$apellido,
            "nacimiento"=>$nacimiento,
            "edad"=>$edad,
            "sexo"=>$sexo,
            "ocupacion"=>$ocupacion,
            "direccion"=>$direccion,
            "id_localidad"=>$id_localidad,
            "telefono"=>$telefono,
            "movil"=>$movil ,
            "foto_perfil"=>$foto_perfil,
            "fecha_registro"=>$fecha_registro,
            "fecha_suspension"=>$fecha_suspension,
            "estado"=>$estado,
            "tipo_usuario"=>$tipo_usuario,
        );
        
        if($pass != "")
        {
            $datos["pass"]=$pass;
        }
        
        if($foto_perfil!="")
        {
            $datos["foto_perfil"]=$foto_perfil;  
        }
        
        $this->db->where("id",$id);
        
        return $this->db->update("usuarios",$datos);
    }

    // NO USANDO

    
    public function get_usuario_con_correo($correo)
    {
        $r = $this->db->query("select * from usuarios where correo = '$correo'");
        return $r->row_array();
    }
    
    public function get_usuario_con_usuario($usuario)
    {
        $r = $this->db->query("select * from usuarios where usuario = '$usuario'");
        return $r->row_array();
    }
    
    public function get_usuario_por_id($id)
    {
        $r = $this->db->query("select usuarios.*,localidades.localidad as localidades_localidad from usuarios left join localidades on localidades.codigo = usuarios.id_localidad where usuarios.id = $id");
        return $r->row_array();
    }

    public function get_proxima_id()
    {
        $r = $this->db->query("select max(id) as id from usuarios");
        $r= $r->row_array();
        return ((int)$r["id"] + 1);
    }
    
    public function get_usuarios()
    {
        $r = $this->db->query("select usuarios.*, estados_usuarios.estado as desc_estado, tipo_usuarios.tipo as desc_tipo from usuarios INNER JOIN estados_usuarios on estados_usuarios.id = usuarios.estado INNER JOIN tipo_usuarios on tipo_usuarios.id = usuarios.tipo_usuario ");
        return $r->result_array();
    }
    
    public function get_estados_usuarios()
    {
        $r = $this->db->query("SELECT * FROM estados_usuarios");
        return $r->result_array();
    }
    
    public function get_tipos_usuarios()
    {
        $r = $this->db->query("SELECT * FROM tipo_usuarios");
        return $r->result_array();
    }
    
    
    public function agregar_usuario($correo,$pass,$nombre,$apellido,$nacimiento,$edad,$sexo,$ocupacion,$direccion,$id_localidad,$telefono,$movil,$foto_perfil,$fecha_registro,$fecha_suspension,$estado,$tipo_usuario)
    {
        $datos = Array(
            "correo"=>$correo,
            "nombre"=>$nombre,
            "pass"=>$pass,
            "apellido"=>$apellido,
            "nacimiento"=>$nacimiento,
            "edad"=>$edad,
            "sexo"=>$sexo,
            "ocupacion"=>$ocupacion,
            "direccion"=>$direccion,
            "id_localidad"=>$id_localidad,
            "telefono"=>$telefono,
            "movil"=>$movil ,
            "foto_perfil"=>$foto_perfil,
            "fecha_registro"=>$fecha_registro,
            "fecha_suspension"=>$fecha_suspension,
            "estado"=>$estado,
            "tipo_usuario"=>$tipo_usuario,
        );
        
        
        $insertado= $this->db->insert("usuarios",$datos);
        
        return $insertado;
    }
    
    
    
    public function get_modulos_usuario($id,$tipo_usuario)
    {
        $r =null;
        if($tipo_usuario == 1)
        {
            $r =$this->db->query("SELECT modulos.id as id_modulo, modulo from modulos where activo = 'si'");
        }
        else
        {
           $r = $this->db->query("SELECT modulos_usuarios.id_usuario,modulos_usuarios.id_usuario,modulos_usuarios.id_modulo,modulos.modulo as desc_modulo FROM modulos_usuarios INNER JOIN modulos on modulos.id = modulos_usuarios.id_modulo where modulos_usuarios.id_usuario = $id and modulos.activo = 'si'");
        }
        return $r->result_array();
    }
    
    public function get_modulos_faltantes_usuario($id)
    {
        $r = $this->db->query("SELECT modulos.* from modulos where modulos.id not in (SELECT modulos_usuarios.id_modulo as id FROM modulos_usuarios INNER JOIN modulos on modulos.id = modulos_usuarios.id_modulo where modulos_usuarios.id_usuario = $id)");
        return $r->result_array();
    }
    
    


    public function get_usuarios_administradores()
    {
        $r = $this->db->query("select usuarios.*, estados_usuarios.estado as desc_estado, tipo_usuarios.tipo as desc_tipo from usuarios INNER JOIN estados_usuarios on estados_usuarios.id = usuarios.estado INNER JOIN tipo_usuarios on tipo_usuarios.id = usuarios.tipo_usuario where usuarios.tipo_usuario = 1");
        return $r->result_array();
    }

    public function agregar_tipo_usuario($tipo_usuario)
    {
       return $this->db->insert("tipo_usuarios",array("tipo"=>$tipo_usuario));
    }

    public function get_tipo_usuario($id)
    {
        $r = $this->db->query("select * from tipo_usuarios where id = ".$id);
        return $r->row_array();
    }

    public function editar_tipo_usuario($id,$tipo_usuario)
    {
        $this->db->where("id",$id);
        return $this->db->update("tipo_usuarios",array("tipo"=>$tipo_usuario));
    }

    public function eliminar_permisos_tipo_usuario($id_tipo_usuario)
    {
        $this->db->where("id_tipo_usuario",$id_tipo_usuario);
        return $this->db->delete("modulos_usuarios");
    }

    public function eliminar_tipo_usuario($id)
    {
        $this->eliminar_permisos_tipo_usuario($id);

        $this->db->where("id",$id);
        return $this->db->delete("tipo_usuarios");
    }

    public function get_modulos_tipo_usuario($id_tipo_usuario)
    {
        $r = $this->db->query("SELECT modulos.* FROM modulos_usuarios INNER JOIN modulos on modulos.id = modulos_usuarios.id_modulo where modulos_usuarios.id_tipo_usuario = ".$id_tipo_usuario);

        return $r->result_array();
    }

    public function get_modulos_faltantes_tipo_usuario($id_tipo_usuario)
    {
        $r = $this->db->query("SELECT modulos.* FROM modulos where modulos.id not in(select distinct(id_modulo) from modulos_usuarios where id_tipo_usuario = ".$id_tipo_usuario.")");

        return $r->result_array();
    }

    public function activar_modulo_tipo_usuario($id_modulo,$id_tipo_usuario)
    {
       $lo_tiene = $this->db->query("SELECT * FROM modulos_usuarios where id_tipo_usuario = $id_tipo_usuario and id_modulo = $id_modulo");
       $lo_tiene= $lo_tiene->row_array();
       
       $respuesta = true;
       
       if(!$lo_tiene)
       {
           $datos = Array(
               "id_modulo"=>$id_modulo,
               "id_tipo_usuario"=>$id_tipo_usuario,
           );
           
           $respuesta = $this->db->insert("modulos_usuarios",$datos);  
       }
       return $respuesta;
    }
    
    public function desactivar_modulo_tipo_usuario($id_modulo,$id_tipo_usuario)
    {
       $this->db->where("id_modulo",$id_modulo);
       $this->db->where("id_tipo_usuario",$id_tipo_usuario);
       
       return $this->db->delete("modulos_usuarios");
    }

    public function eliminar_usuario($id)
    {
        $this->db->where("id",$id);
       
        return $this->db->delete("usuarios");
    }
    
    public function truncate()
    {
        return $this->db->query("truncate usuarios");
    }
}

