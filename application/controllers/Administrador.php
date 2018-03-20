<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends MY_Controller
{
     public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->funciones_generales->dar_permiso(1))
        {
            $this->load->model("Anuncios_model");

            $output["css"]="";
            $output["js"]="";
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            $output["controller_usuario"]=$this->controller_usuario;
            
            $output["cantidad_publicados"]= $this->Anuncios_model->get_cantidad_publicados();
            $output["cantidad_denunciados"]= $this->Anuncios_model->get_cantidad_denunciados();
            $output["cantidad_operativos"]= $this->Usuario_model->get_cantidad_operativos();
            $output["cantidad_suspendidos"]= $this->Usuario_model->get_cantidad_suspendidos();
            $this->load->view("back/admin/escritorio",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }


    public function abm_configuracion()
    {
        if($this->funciones_generales->dar_permiso(1))
        {
            $this->load->model("Anuncios_model");

            $output["css"]="";
            $output["js"]="";
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
            $output["controller_usuario"]=$this->controller_usuario;

            $this->load->model("Configuraciones_model");
            
            $output["configuraciones"]= $this->Configuraciones_model->get_configuraciones();

            $this->load->view("back/admin/abm_configuraciones",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }
}

