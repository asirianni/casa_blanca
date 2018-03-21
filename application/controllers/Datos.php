<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function abm_datos()
    {
        $permiso= $this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION,$this->session->userdata("tipo_usuario"));
        
        if($permiso)
        {
            $this->load->model("Configuracion_empresa_model");
            $this->load->model("Configuraciones_model");
            
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            
            $output["configuraciones"]= $this->Configuracion_empresa_model->get_configuraciones();
            $output["titulo_login"] = $this->Configuraciones_model->get_titulo_login();
            $this->load->view("back/modulos/configuracion_empresa/abm_configuraciones",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }

    public function editar_configuracion_empresa()
    {
        if($this->input->is_ajax_request() && $this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION,$this->session->userdata("tipo_usuario")))
        {
            $id= $this->input->post("id");
            $valor= $this->input->post("valor");


            if(isset($_FILES))
            {
                $respuesta = false;

                // SUBIR IMAGEN 
                $config['upload_path']          = './recursos/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000;
                $config['max_width']            = 3724;
                $config['max_height']           = 3768;
                $config["file_name"]="logo-completo";
                $config['overwrite']= true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('imagen'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $respuesta= true;
                }

                if($respuesta)
                {
                   $valor=$data["upload_data"]["file_name"];
                }
            }
            
            $this->load->model("Configuracion_empresa_model");
            $respuesta = $this->Configuracion_empresa_model->editar_configuracion($id,$valor);
            echo json_encode($respuesta);
        }
    }
} 
