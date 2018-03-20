<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
     public function __construct()
    {
        parent::__construct();
    }
    
    public function abm_usuarios()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS))
        {
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_datetimepicker();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_datetimepicker();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $output["usuarios"]= $this->Usuario_model->get_usuarios();
            $output["estados_usuarios"]=$this->Usuario_model->get_estados_usuarios();
            $output["tipos_usuarios"]=$this->Usuario_model->get_tipos_usuarios();
            
            $this->load->view("back/modulos/usuarios/abm_usuarios",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }
    
    public function administrar_modulos_de_usuario($id_usuario = null)
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $id_usuario != null)
        {
            $output["css"]="";
            $output["js"]="";
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            
            $output["modulos_faltantes"] = $this->Usuario_model->get_modulos_faltantes_usuario($id_usuario); 
            $output["id_usuario"]=$id_usuario;
            $output["usuario"]=$usuario=$this->Usuario_model->get_usuario_por_id($id_usuario);
            $output["modulos_existentes"] = $this->Usuario_model->get_modulos_usuario($id_usuario,$usuario["tipo_usuario"]);
            $this->load->view("back/modulos/usuarios/adm_modulos_usuario",$output);
        }
        else
        {
            redirect("Administrador/abm_usuarios");
        }
    }
    
    
    public function agregar_usuario()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS))
        {
             $data =null;
            if($this->input->post() && $this->input->is_ajax_request())
            {
                $respuesta = false;

                // SUBIR IMAGEN 
                $config['upload_path']          = './recursos/images/foto_perfil/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config["file_name"]="user_".$this->Usuario_model->get_proxima_id();
                $config['overwrite']= true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_perfil'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $respuesta= true;
                }
                
                // SI SE SUBIO LA IMAGEN
                
                $this->load->library("Md5");
                $mymd5= new Md5();
                // SE INTENTA CREAR EL USUARIO
                $foto_perfil="default.jpg";
                    
                $correo=$this->input->post("correo");
                $pass=$this->input->post("password");
                $pass = $mymd5->cifrar($pass);
                $nombre=$this->input->post("nombre");
                $apellido=$this->input->post("apellido");

                $nacimiento=$this->input->post("nacimiento");
                $nacimiento = DateTime::createFromFormat("d-m-Y",$nacimiento);
                $nacimiento = $nacimiento->format("Y-m-d");

                $edad=$this->input->post("edad");
                $sexo=$this->input->post("sexo");
                $ocupacion=$this->input->post("ocupacion");
                $direccion=$this->input->post("direccion");
                $id_localidad=$this->input->post("localidad");
                $telefono=$this->input->post("telefono");
                $movil=$this->input->post("movil");

                $fecha_registro=$this->input->post("fecha_registro");
                $fecha_registro = DateTime::createFromFormat("d-m-Y",$fecha_registro);
                $fecha_registro = $fecha_registro->format("Y-m-d");

                $fecha_suspension="0000-00-00";
                $estado=$this->input->post("estado");

                if($estado== 2){$fecha_suspension= date("Y-m-d");}

                $tipo_usuario=$this->input->post("tipo");

                
                if($respuesta)
                {
                   $foto_perfil=$data["upload_data"]["file_name"];
                }
                
                $respuesta= $this->Usuario_model->agregar_usuario($correo,$pass,$nombre,$apellido,$nacimiento,$edad,$sexo,$ocupacion,$direccion,$id_localidad,$telefono,$movil,$foto_perfil,$fecha_registro,$fecha_suspension,$estado,$tipo_usuario);

                echo json_encode($respuesta);
            }
            else
            {
                $output["css"]=$this->adminlte->get_css_datetimepicker();
                $output["css"].=$this->adminlte->get_css_select2();
                $output["js"]=$this->adminlte->get_js_datetimepicker();
                $output["js"].=$this->adminlte->get_js_select2();
                $output["menu"]=$this->adminlte->getMenu();
                $output["header"]=$this->adminlte->getHeader();
                $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
                $output["footer"]=$this->adminlte->getFooter();

                $output["estados_usuarios"]=$this->Usuario_model->get_estados_usuarios();
                $output["tipos_usuarios"]=$this->Usuario_model->get_tipos_usuarios();

                $this->load->view("back/modulos/usuarios/agregar_usuario",$output);
            }
        }
        else
        {
            redirect("Login");
        }
    }
    
    public function editar_usuario($id_usuario = null)
    {
        

        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS))
        {
            $this->load->library("Md5");
            $mymd5= new Md5();

            

            if($this->input->post() && $this->input->is_ajax_request())
            {
                $id=$this->input->post("id_editar_usuario");

                $respuesta = false;

                // SUBIR IMAGEN 
                $config['upload_path']          = './recursos/images/foto_perfil/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name']='user_'.$id;
                $config['overwrite']= true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto_perfil'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $respuesta= true;
                }
                
                // SI SE SUBIO LA IMAGEN
                
                
                // SE INTENTA CREAR EL USUARIO
                $foto_perfil="";
                    
                $correo=$this->input->post("correo");
                $pass=$this->input->post("password");
                $pass = $mymd5->cifrar($pass);
                $nombre=$this->input->post("nombre");
                $apellido=$this->input->post("apellido");

                $nacimiento=$this->input->post("nacimiento");
                $nacimiento = DateTime::createFromFormat("d-m-Y",$nacimiento);
                $nacimiento = $nacimiento->format("Y-m-d");

                $edad=$this->input->post("edad");
                $sexo=$this->input->post("sexo");
                $ocupacion=$this->input->post("ocupacion");
                $direccion=$this->input->post("direccion");
                $id_localidad=$this->input->post("localidad");
                $telefono=$this->input->post("telefono");
                $movil=$this->input->post("movil");

                $fecha_registro=$this->input->post("fecha_registro");
                $fecha_registro = DateTime::createFromFormat("d-m-Y",$fecha_registro);
                $fecha_registro = $fecha_registro->format("Y-m-d");

                $fecha_suspension="0000-00-00";
                $estado=$this->input->post("estado");

                if($estado== 2){$fecha_suspension= date("Y-m-d");}

                $tipo_usuario=$this->input->post("tipo");

                
                if($respuesta)
                {
                   $foto_perfil=$data["upload_data"]["file_name"];
                }
                
                $respuesta= $this->Usuario_model->editar_usuario($id,$correo,$pass,$nombre,$apellido,$nacimiento,$edad,$sexo,$ocupacion,$direccion,$id_localidad,$telefono,$movil,$foto_perfil,$fecha_registro,$fecha_suspension,$estado,$tipo_usuario);

                echo json_encode($respuesta);
            }
            else
            {
                $usuario = $this->Usuario_model->get_usuario_por_id($id_usuario);
                $usuario["pass"]= $mymd5->descifrar($usuario["pass"]);

                $usuario["fecha_registro"] = DateTime::createFromFormat("Y-m-d",$usuario["fecha_registro"]);
                $usuario["fecha_registro"] = $usuario["fecha_registro"]->format("d-m-Y");

                $usuario["nacimiento"] = DateTime::createFromFormat("Y-m-d",$usuario["nacimiento"]);
                $usuario["nacimiento"] = $usuario["nacimiento"]->format("d-m-Y");

                $usuario["fecha_suspension"] = DateTime::createFromFormat("Y-m-d",$usuario["fecha_suspension"]);
                $usuario["fecha_suspension"] = $usuario["fecha_suspension"]->format("d-m-Y");

                $output["css"]=$this->adminlte->get_css_datetimepicker();
                $output["css"].=$this->adminlte->get_css_select2();
                $output["js"]=$this->adminlte->get_js_datetimepicker();
                $output["js"].=$this->adminlte->get_js_select2();
                $output["menu"]=$this->adminlte->getMenu();
                $output["header"]=$this->adminlte->getHeader();
                $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
                $output["footer"]=$this->adminlte->getFooter();

                $output["estados_usuarios"]=$this->Usuario_model->get_estados_usuarios();
                $output["tipos_usuarios"]=$this->Usuario_model->get_tipos_usuarios();

                $output["usuario"]=$usuario;

                $this->load->view("back/modulos/usuarios/editar_usuario",$output);
            }
        }
        else
        {
            redirect("Login");
        }
    }
    
    public function get_usuario()
    {
        $respuesta = false;
        
        
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $respuesta = $this->Usuario_model->get_usuario_por_id($this->input->post("id")); 
            $this->load->library("Md5");
            $mymd5= new Md5();
            $respuesta["pass"]= $mymd5->descifrar($respuesta["pass"]);
        }
        
        echo json_encode($respuesta);
    }
    
    public function get_modulos_usuario()
    {
        $respuesta = false;
        
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $modulos_existentes = $this->Usuario_model->get_modulos_usuario($this->input->post("id"));
            $modulos_faltantes = $this->Usuario_model->get_modulos_faltantes_usuario($this->input->post("id")); 
            $respuesta= Array($modulos_existentes,$modulos_faltantes);
            
        }
        
        echo json_encode($respuesta);
    }

    public function abm_tipos_usuarios()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS))
        {
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $output["tipos_usuarios"]=$this->Usuario_model->get_tipos_usuarios();
            
            $this->load->view("back/modulos/usuarios/abm_tipos_usuarios",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }

    public function agregar_tipo_usuario(){

        $respuesta = false;
        
        
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $respuesta = $this->Usuario_model->agregar_tipo_usuario($this->input->post("tipo_usuario"));
        }
        
        echo json_encode($respuesta);
    }

    public function get_tipo_usuario()
    {
        $respuesta = false;
        
        
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $respuesta = $this->Usuario_model->get_tipo_usuario($this->input->post("id"));
        }
        
        echo json_encode($respuesta);
    }

    public function editar_tipo_usuario()
    {
        $respuesta = false;
        
        
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $respuesta = $this->Usuario_model->editar_tipo_usuario($this->input->post("id"),$this->input->post("tipo_usuario"));
        }
        
        echo json_encode($respuesta);
    }

    public function eliminar_tipo_usuario()
    {
        $respuesta = false;
        
        
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $respuesta = $this->Usuario_model->eliminar_tipo_usuario($this->input->post("id"));
        }
        
        echo json_encode($respuesta);
    }
    
    public function administrar_modulos_tipo_usuario($id_tipo_usuario)
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS))
        {
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_datetimepicker();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_datetimepicker();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $output["id_tipo_usuario"]= $id_tipo_usuario;
            $output["tipo_usuario"]= $this->Usuario_model->get_tipo_usuario($id_tipo_usuario);
            $output["modulos_existentes"]=$this->Usuario_model->get_modulos_tipo_usuario($id_tipo_usuario);
            $output["modulos_faltantes"]=$this->Usuario_model->get_modulos_faltantes_tipo_usuario($id_tipo_usuario);
            
            $this->load->view("back/modulos/usuarios/abm_modulos_tipo_usuario",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }

    public function activar_modulo_tipo_usuario()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $id_tipo_usuario= $this->input->post("id_tipo_usuario");
            $id_modulo= $this->input->post("id_modulo");
            
            $respuesta = $this->Usuario_model->activar_modulo_tipo_usuario($id_modulo,$id_tipo_usuario);
        
            echo json_encode($respuesta);
        }
    }
    
    public function desactivar_modulo_tipo_usuario()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $id_tipo_usuario= $this->input->post("id_tipo_usuario");
            $id_modulo= $this->input->post("id_modulo");
            
            $respuesta = $this->Usuario_model->desactivar_modulo_tipo_usuario($id_modulo,$id_tipo_usuario);
        
            echo json_encode($respuesta);
        }
    }

    public function eliminar_usuario()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::USUARIOS) && $this->input->is_ajax_request())
        {
            $id= $this->input->post("id");
            $respuesta = $this->Usuario_model->eliminar_usuario($id);
        
            echo json_encode($respuesta);
        }
    } 

    public function mi_perfil()
    {
        if($this->session->userdata("ingresado") === true)
        {
            $output["css"]=$this->adminlte->get_css_datetimepicker();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["js"]=$this->adminlte->get_js_datetimepicker();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();

            $this->load->library("Md5");
            $mymd5= new Md5();
            
            // OBTENIENDO PERFIL

            $mi_perfil= $this->Usuario_model->get_usuario_por_id($this->session->userdata("id"));

            $nacimiento= $mi_perfil["nacimiento"];

            $nacimiento = DateTime::createFromFormat("Y-m-d",$nacimiento);
            $nacimiento = $nacimiento->format("d-m-Y");
            $mi_perfil["nacimiento"]= $nacimiento;

            $fecha_registro= $mi_perfil["fecha_registro"];
            $fecha_registro = DateTime::createFromFormat("Y-m-d",$fecha_registro);
            $fecha_registro = $fecha_registro->format("d-m-Y");
            $mi_perfil["fecha_registro"]= $fecha_registro;

            $output["mi_perfil"]=$mi_perfil;
            $output["mi_perfil"]["pass"]= $mymd5->descifrar($output["mi_perfil"]["pass"]);
            $output["estados_usuarios"]=$this->Usuario_model->get_estados_usuarios();
            $output["tipos_usuarios"]=$this->Usuario_model->get_tipos_usuarios();
                
            $this->load->view("back/modulos/usuarios/mi_perfil",$output);      
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }
    
    public function actualizar_perfil()      
    {
        if($this->session->userdata("ingresado") === true && $this->input->is_ajax_request())
        {
            $id=$this->session->userdata("id");

            $foto_perfil=$this->session->userdata("foto_perfil");
            
            // SUBIR IMAGEN 
            $config['upload_path']          = './recursos/images/foto_perfil/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']= "user_".$id;
            $config['overwrite']= true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto_perfil'))
            {
                //$this->upload->display_errors();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                
                $foto_perfil=$data["upload_data"]["file_name"];
            }
              
            $this->load->library("Md5");
                
            $mymd5= new Md5();
            $pass = $mymd5->cifrar($this->session->userdata("pass"));

            $nueva_password= $this->input->post("nueva_password");
            $nueva_password2=$this->input->post("nueva_password2");
            
            if($nueva_password!="" && $nueva_password==$nueva_password2)
            {
                $pass = $mymd5->cifrar($nueva_password);
            }
            
            
            $nombre=$this->input->post("nombre_editar_perfil");
            $apellido= $this->input->post("apellido_editar_perfil");
            $correo= $this->input->post("correo_editar_perfil");
            $nacimiento= $this->input->post("nacimiento_editar_perfil");
            $nacimiento = DateTime::createFromFormat("d-m-Y",$nacimiento);
            $nacimiento = $nacimiento->format("Y-m-d");
            $edad = $this->input->post("edad_editar_perfil");
            $sexo= $this->input->post("sexo_editar_perfil");
            $ocupacion= $this->input->post("ocupacion_editar_perfil");
            $localidad= $this->input->post("localidad_editar_perfil");
            $direccion= $this->input->post("direccion_editar_perfil");
            $telefono= $this->input->post("telefono_editar_perfil");
            $movil= $this->input->post("movil_editar_perfil");

            $usuario_row = $this->Usuario_model->get_usuario_por_id($id);

            $tipo_usuario= $usuario_row["tipo_usuario"];
            $fecha_registro =  $usuario_row["fecha_registro"];
            $estado = $usuario_row["estado"];

            if($usuario_row["tipo_usuario"] == 1)
            {
                $tipo_usuario= $this->input->post("tipo_editar_perfil");
                $fecha_registro = $this->input->post("fecha_registro_editar_perfil");
                $fecha_registro = DateTime::createFromFormat("d-m-Y",$fecha_registro);
                $fecha_registro = $fecha_registro->format("Y-m-d");
                $estado = $this->input->post("estado_editar_perfil");
            }

            $fecha_suspension= $this->session->userdata("fecha_suspension");
            
            $respuesta = $this->Usuario_model->editar_usuario($id,$correo,$pass,$nombre,$apellido,$nacimiento,$edad,$sexo,$ocupacion,$direccion,$localidad,$telefono,$movil,$foto_perfil,$fecha_registro,$fecha_suspension,$estado,$tipo_usuario);

            $this->funciones_generales->actualizarSesion();
            echo json_encode($respuesta);
        }
    }
}

