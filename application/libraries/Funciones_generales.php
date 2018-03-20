<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Funciones_generales
{
    public $ci;
    
    public function __construct() {
        $this->ci= &get_instance();
    }
    
    public function dar_permiso($tipo_usuario_requerido)
    {
        $respuesta = false;
        
        $session = new Session_ci();
        
        $tipo_usuario= $session->getTipoUsuario();
        
        if($tipo_usuario == $tipo_usuario_requerido)
        {
            $respuesta = true;
        }
        
        return $respuesta;
    }
    
    public function dar_permiso_a_modulo($id_modulo)
    {
        $tipo_usuario = (int)$this->ci->session->userdata("tipo_usuario");
        
        if($tipo_usuario != 1)
        {
            $id = (int)$this->ci->session->userdata("id");

            if($id!=0)
            {
                $array=$this->ci->Usuario_model->get_permiso_modulo_tipo_usuario($id_modulo,$tipo_usuario);
                $respuesta= (boolean)$array;
                return $respuesta;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }
    
    
    public function dar_permiso_a_modulo_cargado_menu($id_modulo,$tipo_usuario)
    {
       $array=$this->ci->Usuario_model->get_permiso_modulo_tipo_usuario($id_modulo,$tipo_usuario);
       return  (boolean)$array;
    }
    
    public function redireccionar_usuario()
    {
        $session = new Session_ci();
        $tipo_usuario = $session->getTipoUsuario();
        
        $url_redireccion= base_url()."index.php/Login";
        
        if($tipo_usuario)
        {
            $url_redireccion= base_url()."index.php/Escritorio";
        }
        
        return $url_redireccion;
    }
    
    public function actualizarSesion()
    {
        $ingresado = $this->ci->session->userdata("ingresado");
        
        if($ingresado)
        {
            $id = $this->ci->session->userdata("id");
            
            $this->ci->load->model("Usuario_model");
            
            $usuario = $this->ci->Usuario_model->get_usuario_por_id($id);
            
            $sesion_ci = new Session_ci();
            
            $sesion_ci->crearSesion($usuario);
        }
    }
    
    public function get_name_controller_usuario()
    {
        $tipo_usuario = (int)$this->ci->session->userdata("tipo_usuario");
        
        $respuesta = "";
        
        switch($tipo_usuario)
        {
            case 1: $respuesta = "Administrador";
                break;
            case 2: $respuesta = "Vendedor";
                break;
        }
        
        return $respuesta;
    }
    
    public static function get_name_controller_usuario_sin_sesion($tipo_usuario)
    {
        $tipo_usuario = (int)$tipo_usuario;
        
        $respuesta = "";
        
        switch($tipo_usuario)
        {
            case 1: $respuesta = "Administrador";
                break;
            case 2: $respuesta = "Vendedor";
                break;
        }
        
        return $respuesta;
    }
}