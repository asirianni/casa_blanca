<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Escritorio extends MY_Controller
{
     public function __construct()
    {
        parent::__construct();

        $this->load->model("Establecimiento_model");
        $this->load->model("Rubro_model");
        $this->load->model("Producto_model");
        $this->load->model("Presupuesto_model");
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
            
            $output["cantidad_instituciones"]= $this->Establecimiento_model->get_cantidad();
            $output["cantidad_rubros"]= $this->Rubro_model->get_cantidad();
            $output["cantidad_productos"]= $this->Producto_model->get_cantidad();
            $output["cantidad_presupuestos_pendientes"]= $this->Presupuesto_model->get_cantidad_pendientes();
            $this->load->view("back/modulos/usuarios/escritorio",$output);
        }
        else
        {
            redirect($this->funciones_generales->redireccionar_usuario());
        }
    }
}