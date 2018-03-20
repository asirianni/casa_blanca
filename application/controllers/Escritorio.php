<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Escritorio extends MY_Controller
{
     public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->session->userdata("ingresado"))
        {
            $output["css"]="";
            $output["js"]="";
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            $output["controller_usuario"]=$this->controller_usuario;
            
            $output["cantidad_publicados"]= 0;
            $output["cantidad_denunciados"]= 0;
            $output["cantidad_operativos"]= $this->Usuario_model->get_cantidad_operativos();
            $output["cantidad_suspendidos"]= $this->Usuario_model->get_cantidad_suspendidos();
            $this->load->view("back/admin/escritorio",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }
}