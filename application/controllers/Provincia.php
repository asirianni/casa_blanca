<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Provincia_model");
    }
    
    public function index()
    {
        $this->abm_provincias();
    }
    
    public function abm_provincias()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION))
        {
            
            $output["css"]=$this->adminlte->get_css_datatables();
            $output["css"].=$this->adminlte->get_css_select2();
            $output["js"]=$this->adminlte->get_js_datatables();
            $output["js"].=$this->adminlte->get_js_select2();
            $output["menu"]=$this->adminlte->getMenu();
            $output["header"]=$this->adminlte->getHeader();
            $output["menu_configuracion"]=$this->adminlte->getMenuConfiguracion();
            $output["footer"]=$this->adminlte->getFooter();
                
            $output["provincias"]= $this->Provincia_model->get_provincias();
            
            $this->load->view("back/modulos/configuracion/abm_provincias",$output);
        }
    }

    public function agregar_provincia()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {
            $respuesta = array("respuesta"=>false);

            $provincia_agregar = trim($this->input->post("provincia_agregar"));

            if($provincia_agregar != "")
            {
                $row = $this->Provincia_model->agregar($provincia_agregar);

                if($row)
                {
                    $respuesta["respuesta"]=true;
                    $respuesta["row"]= $row;
                }
            }
            
            echo json_encode($respuesta);
        }
    }

    public function editar_provincia()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {
            $respuesta = array("respuesta"=>false);

            $id = $this->input->post("id_editar");
            $provincia = trim($this->input->post("provincia_editar"));

            if(is_numeric($id))
            {
                $row = $this->Provincia_model->editar($id,$provincia);

                if($row)
                {
                    $respuesta["respuesta"]=true;
                    $respuesta["row"]= $row;
                }
            }
            
            echo json_encode($respuesta);
        }
    }

    public function eliminar_provincia()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {
            $respuesta = array("respuesta"=>false);

            $id = $this->input->post("id_eliminar");
            
            if(is_numeric($id))
            {
                $respuesta["respuesta"]= $this->Provincia_model->eliminar($id);
            }
            
            echo json_encode($respuesta);
        }
    }

    public function get_provincia_busqueda_select2()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $respuesta = $this->Provincia_model->get_provincia_busqueda_select2($this->input->post("q"));
            
            echo json_encode($respuesta);
        }
    }

    public function get_provincia()
    {
        if($this->funciones_generales->dar_permiso_a_modulo(Modulos::CONFIGURACION) 
            && $this->input->is_ajax_request())
        {

            $id = $this->input->post("id");
            $respuesta = array("respuesta"=>false);

            if(is_numeric($id))
            {
                $row = $this->Provincia_model->get_provincia($id);
            
                if($row)
                {
                    $respuesta["respuesta"]=true;
                    $respuesta["row"]=$row;
                }
            }
            
            echo json_encode($respuesta);
        }
    }
}

