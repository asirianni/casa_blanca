<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $funciones_generales;
    public $adminlte;
    public $controller_usuario;

    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        
        $this->load->library("Funciones_generales");
        $this->load->library("AdminLTE");
        $this->load->library("Modulos");

        $this->load->model("Usuario_model");
        
        $this->funciones_generales= new Funciones_generales();
        
        $this->adminlte= new AdminLTE();
        
        $this->controller_usuario= $this->funciones_generales->get_name_controller_usuario();


    }
    
    
   
}

